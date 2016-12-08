<?php

$app->post('/api/ProductHuntAPI/updateMySettings', function ($request, $response, $args) {
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
        $result['contextWrites']['to']['status_code'] = 'JSON_VALIDATION';
        $result['contextWrites']['to']['status_msg'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $error = [];
    if(empty($post_data['args']['accessToken'])) {
        $error[] = 'accessToken';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query_str = $settings['api_url'] . '/settings';
    
    $headers['Content-Type'] = 'application/json';
    $headers['Accept'] = 'application/json';
    $headers['Authorization'] = 'Bearer '.$post_data['args']['accessToken'];
    
    $body = [];
    if(!empty($post_data['args']['email'])) {
        $body['user']['email'] = $post_data['args']['email'];
    }
    if(!empty($post_data['args']['name'])) {
        $body['user']['name'] = $post_data['args']['name'];
    }
    if(!empty($post_data['args']['headline'])) {
        $body['user']['headline'] = $post_data['args']['headline'];
    }
    if(!empty($post_data['args']['sendMentionEmail'])) {
        $body['user']['send_mention_email'] = $post_data['args']['sendMentionEmail'];
    }
    if(!empty($post_data['args']['sendMentionPush'])) {
        $body['user']['send_mention_push'] = $post_data['args']['sendMentionPush'];
    }
    if(!empty($post_data['args']['sendFriendPostEmail'])) {
        $body['user']['send_friend_post_email'] = $post_data['args']['sendFriendPostEmail'];
    }
    if(!empty($post_data['args']['sendFriendPostPush'])) {
        $body['user']['send_friend_post_push'] = $post_data['args']['sendFriendPostPush'];
    }
    if(!empty($post_data['args']['sendNewFollowerPush'])) {
        $body['user']['send_new_follower_push'] = $post_data['args']['sendNewFollowerPush'];
    }
    if(!empty($post_data['args']['sendNewFollowerEmail'])) {
        $body['user']['send_new_follower_email'] = $post_data['args']['sendNewFollowerEmail'];
    }
    if(!empty($post_data['args']['sendAnnouncementPush'])) {
        $body['user']['send_announcement_push'] = $post_data['args']['sendAnnouncementPush'];
    }
    if(!empty($post_data['args']['sendAnnouncementEmail'])) {
        $body['user']['send_announcement_email'] = $post_data['args']['sendAnnouncementEmail'];
    }
    if(!empty($post_data['args']['sendProductRecommendationPush'])) {
        $body['user']['send_product_recommendation_push'] = $post_data['args']['sendProductRecommendationPush'];
    }
    if(!empty($post_data['args']['sendProductRecommendationEmail'])) {
        $body['user']['send_product_recommendation_email'] = $post_data['args']['sendProductRecommendationEmail'];
    }
    if(!empty($post_data['args']['subscribedToPush'])) {
        $body['user']['subscribed_to_push'] = $post_data['args']['subscribedToPush'];
    }
    
    $client = $this->httpClient;

    try {

        $resp = $client->put( $query_str, 
            [
                'headers' => $headers,
                'json' => $body
            ]);
        $responseBody = $resp->getBody()->getContents();
  
        if($resp->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }
    
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
