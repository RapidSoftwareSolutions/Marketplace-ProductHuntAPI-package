<?php
$routes = [
    'getUserAccessToken',
    'getClientAccessToken',
    'getTechPosts',
    'getPostByCategory',
    'getAllPosts',
    'getPostsCreatedByUser',
    'getPostsMadeByUser',
    'getPost',
    'addPostToCollection',
    'deletePostFromCollection',
    'getUsers',
    'getSingleUser',
    'getCollections',
    'getUserCollections',
    'getCollectionsWithPost',
    'createCollection',
    'getSingleCollection',
    'updateCollection',
    'deleteCollection',
    'getNotifications',
    'clearNotifications',
    'createPostVote',
    'unvotePost',
    'getPostVotes',
    'getUserVotes',
    'getMySettings',
    'updateMySettings',
    'getFollowers',
    'followUser',
    'unfollowUser',
    'getInteractions',
    'getCategories',
    'subscribeToCollection',
    'unsubscribeToCollection',
    'getLiveEvents',
    'getSingleLiveEvent',
    'subscribeToLiveEvent',
    'unsubscribeToLiveEvent',
    'generateShareableImage',
    'getTopics',
    'getSingleTopic',
    'followTopic',
    'unfollowTopic',
    'subscribeToPushNotifications',
    'getComments',
    'getUserComments',
    'getPostThreads',
    'getLiveEventThreads',
    'createComment',
    'updateComment',
    'getCommentVotes',
    'voteForComment',
    'unvoteComment',
    'metadata'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

