<?php

$app->post('/api/ProductHuntAPI/subscribeToPushNotifications', function ($request, $response, $args) {
    $settings =  $this->settings;
    
    $data = $request->getBody();

    if($data=='') {
        $post_data = $request->getParsedBody();
    } else {
        $toJson = $this->toJson;
        $data = $toJson->normalizeJson($data); 
        $data = str_replace('\"', '"', $data);
        $post_data = json_decode($data, true);
    }
    
    if(json_last_error() != 0) {
        $error[] = json_last_error_msg() . '. Incorrect input JSON. Please, check fields with JSON input.';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $error = [];
    if(empty($post_data['args']['accessToken'])) {
        $error[] = 'accessToken is required';
    }
    if(empty($post_data['args']['desktopPushToken']) && empty($post_data['args']['mobilePushToken']) && empty($post_data['args']['browserPushToken'])) {
        $error[] = 'one of tokens is required';
    }
    if(!empty($post_data['args']['desktopPushToken']) && !empty($post_data['args']['mobilePushToken']) && !empty($post_data['args']['browserPushToken'])) {
        $error[] = 'define only one of tokens';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['message'] = "There are incomplete fields in your request";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query_str = $settings['api_url'] . '/me/notifications_subscribers';
    
    $headers['Content-Type'] = 'application/json';
    $headers['Accept'] = 'application/json';
    $headers['Authorization'] = 'Bearer '.$post_data['args']['accessToken'];
    
    $body = [];
    if(!empty($post_data['args']['desktopPushToken'])) {
        $body['notification_subscriber']['desktop_push_token'] = $post_data['args']['desktopPushToken'];
    }
    if(!empty($post_data['args']['mobilePushToken'])) {
        $body['notification_subscriber']['mobile_push_token'] = $post_data['args']['mobilePushToken'];
    }
    if(!empty($post_data['args']['browserPushToken'])) {
        $body['notification_subscriber']['browser_push_token'] = $post_data['args']['browserPushToken'];
    }
    
    $client = $this->httpClient;
    
    try {

        $resp = $client->post( $query_str, 
            [
                'headers' => $headers,
                'json' => $body
            ]);
        $responseBody = $resp->getBody()->getContents();
  
        if($resp->getStatusCode() == '201') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = "subscribed";
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }
    
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
