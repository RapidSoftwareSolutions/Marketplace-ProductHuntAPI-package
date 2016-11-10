<?php

namespace Test\Functional;

class ProductHuntAPITest extends BaseTestCase {
    
    public function testGetClientAccessToken() {
        
        $var = '{
                    "args": {
                            "clientId": "ae6d0adcef73e15cd689d7c13977c28cf0870e59cc2f6120a96434ee5d101a68",
                            "clientSecret": "5729e015abfaa23ded4a50ccc6169cf09c1faf70dce5d6d7ba059b8d6c0048c1"
                            
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getClientAccessToken', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetTechPosts() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706"
                            
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getTechPosts', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetPostByCategory() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "categoryName": "games"        
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getPostByCategory', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetAllPosts() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getAllPosts', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetPostsCreatedByUser() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "userId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getPostsCreatedByUser', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetPostsMadeByUser() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "userId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getPostsMadeByUser', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetPost() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "postId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getPost', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetUsers() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getUsers', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetSingleUser() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "userId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getSingleUser', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetCollections() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getCollections', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetUserCollections() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "userId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getUserCollections', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetCollectionsWithPost() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "postId": "100"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getCollectionsWithPost', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetSingleCollection() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "collectionId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getSingleCollection', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetNotifications() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getNotifications', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetPostVotes() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "postId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getPostVotes', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetUserVotes() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "userId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getUserVotes', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetMySettings() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getMySettings', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetFollowers() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "userId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getFollowers', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetInteractions() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getInteractions', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetCategories() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getCategories', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetLiveEvents() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getLiveEvents', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetSingleLiveEvent() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "liveEventId": "100"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getSingleLiveEvent', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetTopics() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getTopics', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetSingleTopic() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "topicId": "100"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getSingleTopic', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testSubscribeToPushNotifications() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "desktopPushToken": "Push Service Vendor Token"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/subscribeToPushNotifications', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetComments() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "perPage": "5"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getComments', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetUserComments() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "userId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getUserComments', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetPostThreads() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "postId": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getPostThreads', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetLiveEventThreads() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "liveEventId": "100"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getLiveEventThreads', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetCommentVotes() {
        
        $var = '{
                    "args": {
                            "accessToken": "bd82d3c080c66a3bec0aac9456b14a4e7469adfd7064c6e09555a779c0004706",
                            "commentId": "100"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/ProductHuntAPI/getCommentVotes', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
}
