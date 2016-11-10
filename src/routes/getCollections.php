<?php

$app->post('/api/ProductHuntAPI/getCollections', function ($request, $response, $args) {
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
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['message'] = "There are incomplete fields in your request";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query_str = $settings['api_url'] . '/collections';
    
    $query = [];
    if(!empty($post_data['args']['older'])) {
        $query['older'] = $post_data['args']['older'];
    }
    if(!empty($post_data['args']['newer'])) {
        $query['newer'] = $post_data['args']['newer'];
    }
    if(!empty($post_data['args']['perPage'])) {
        $query['per_page'] = $post_data['args']['perPage'];
    }
    if(!empty($post_data['args']['order'])) {
        $query['order'] = $post_data['args']['order'];
    }
    if(!empty($post_data['args']['sortBy'])) {
        $query['sort_by'] = $post_data['args']['sortBy'];
    }
    if(!empty($post_data['args']['searchFeatured'])) {
        $query['search[featured]'] = $post_data['args']['searchFeatured'];
    }
    if(!empty($post_data['args']['searchCategory'])) {
        $query['search[category]'] = $post_data['args']['searchCategory'];
    }
    if(!empty($post_data['args']['searchSlug'])) {
        $query['search[slug]'] = $post_data['args']['searchSlug'];
    }
    if(!empty($post_data['args']['searchUsername'])) {
        $query['search[user_username]'] = $post_data['args']['searchUsername'];
    }
    
    $headers['Content-Type'] = 'application/json';
    $headers['Accept'] = 'application/json';
    $headers['Authorization'] = 'Bearer '.$post_data['args']['accessToken'];
    
    $client = $this->httpClient;

    try {

        $resp = $client->get( $query_str, 
            [
                'headers' => $headers,
                'query' => $query
            ]);
        $responseBody = $resp->getBody()->getContents();
  
        if($resp->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
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