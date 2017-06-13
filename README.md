[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/ProductHuntAPI/functions?utm_source=RapidAPIGitHub_ProductHuntFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# ProductHuntAPI Package
Retrieve ProductHunt posts, users and categories.
* Domain: producthunt.com
* Credentials: clientId, clientSecret, redirectUri

## How to get credentials: 
0. Log in on [Producthunt website](https://www.producthunt.com/).
1. Go to [API Dashboard](https://www.producthunt.com/v1/oauth/applications)
2. Add new application.
3. After creating a new app you will see client ID, client Secret and redirect URI.
4. To generate authorization code use this link https://api.producthunt.com/v1/oauth/authorize?client_id=_your_client_id_&redirect_uri=_your_redirect_uri_&response_type=code&scope=private public

## Custom datatypes:
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]```
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```


## ProductHuntAPI.getUserAccessToken
This endpoint allows to get a token on behalf of a user.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Required: The id of your application obtained from ProductHunt.
| clientSecret| credentials| Required: The secret of your application obtained from ProductHunt.
| redirectUri | credentials| Required: Your redirect uri.
| code        | String     | Required: The access grant code you received via the callback from ProductHunt.

## ProductHuntAPI.getClientAccessToken
This endpoint allows to get a token without user context. (eg before a user logs in). Please remember that this tokens limit you to public endpoints that don't require user context.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Required: The id of your application obtained from ProductHunt.
| clientSecret| credentials| Required: The secret of your application obtained from ProductHunt.

## ProductHuntAPI.getTechPosts
This endpoint allows to get the tech posts of today.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| daysAgo    | String| Optional: Parameter for pagination.
| day        | DatePicker| Optional: Alternate parameter for requesting specific days (Format: day=YYYY-MM-DD).


## ProductHuntAPI.getPostByCategory
This endpoint allows to get the posts of today for given category.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Required: The valid accessToken.
| categoryName| String| Required: The name of the category.
| daysAgo     | String| Optional: Parameter for pagination.
| day         | DatePicker| Optional: Alternate parameter for requesting specific days (Format: day=YYYY-MM-DD).


## ProductHuntAPI.getAllPosts
This endpoint allows to get all the newest posts.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Required: The valid accessToken.
| searchUrl     | String| Optional: Filter parameter: can filter posts by url.
| searchCategory| String| Optional: Filter parameter: can filter posts by category. Default = unspecified (All categories). 
| searchTopic   | String| Optional: Filter parameter: can filter posts by topic id or slug. Default = unspecified (All topics).
| older         | String| Optional: Filter parameter: get only records older than the provided id.
| newer         | String| Optional: Filter parameter: get only records newer than the provided id.
| perPage       | String| Optional: Filter parameter: define the amount of records sent per call (max 50).


## ProductHuntAPI.getPostsCreatedByUser
This endpoint allows to get all posts created by a user.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| userId     | String| Required: The valid user ID.
| older      | String| Optional: Filter parameter: get only records older than the provided id.
| newer      | String| Optional: Filter parameter: get only records newer than the provided id.
| perPage    | String| Optional: Filter parameter: define the amount of records sent per call (max 50).


## ProductHuntAPI.getPostsMadeByUser
This endpoint allows to get all posts made by a user.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| userId     | String| Required: The valid user ID.
| older      | String| Optional: Filter parameter: get only records older than the provided id.
| newer      | String| Optional: Filter parameter: get only records newer than the provided id.
| perPage    | String| Optional: Filter parameter: define the amount of records sent per call (max 50).


## ProductHuntAPI.getPost
This endpoint allows to get details of a post.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| postId     | String| Required: The valid post ID.


## ProductHuntAPI.getUsers
This endpoint allows to get all users.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| older      | String| Optional: Filter parameter: get only records older than the provided id.
| newer      | String| Optional: Filter parameter: get only records newer than the provided id.
| perPage    | String| Optional: Filter parameter: define the amount of records sent per call (max 50).
| order      | Select| Optional: Filter parameter: define the order you want to receive the records (does not affect older/newer behaviour). Valid values are asc or desc.


## ProductHuntAPI.getSingleUser
This endpoint allows to get details of a user.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| userId     | String| Required: The ID or username of the User you want to fetch.
| exclude    | String| Optional: Option to exclude certain values from the request. Options - "relationships".


## ProductHuntAPI.getCollections
This endpoint allows to get newest collections.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Required: The valid accessToken.
| older         | String| Optional: Filter parameter: get only records older than the provided id.
| newer         | String| Optional: Filter parameter: get only records newer than the provided id.
| perPage       | String| Optional: Filter parameter: define the amount of records sent per call (max 50).
| order         | Select| Optional: Filter parameter: define the order you want to receive the records (does not affect older/newer behaviour). Valid values are asc or desc.
| sortBy        | String| Optional: Filter parameter: valid values are created_at, updated_at or featured_at.
| searchFeatured| String| Optional: Only return collections that have been featured on Product Hunt. true or false. Default = false.
| searchCategory| String| Optional: Only return collections from certain category. Default = unspecified (All categories).
| searchSlug    | String| Optional: Filter by the url slug of the collection.
| searchUsername| String| Optional: Filter by the username of the creator of the collection.


## ProductHuntAPI.getUserCollections
This endpoint allows to get all collections created by a user.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Required: The valid accessToken.
| userId        | String| Required: The valid user ID.
| page          | String| Optional: Parameter for pagination.
| perPage       | String| Optional: Filter parameter: define the amount of records sent per call (max 50).
| order         | Select| Optional: Filter parameter: define the order you want to receive the records (does not affect older/newer behaviour). Valid values are asc or desc.
| sortBy        | String| Optional: Filter parameter: valid values are created_at, updated_at or featured_at.
| searchFeatured| String| Optional: Only return collections that have been featured on Product Hunt. true or false. Default = false.


## ProductHuntAPI.getCollectionsWithPost
This endpoint allows to get all collections that include a certain post.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Required: The valid accessToken.
| postId        | String| Required: The valid post ID.
| page          | String| Optional: Parameter for pagination.
| perPage       | String| Optional: Filter parameter: define the amount of records sent per call (max 50).
| order         | Select| Optional: Filter parameter: define the order you want to receive the records (does not affect older/newer behaviour). Valid values are asc or desc.
| sortBy        | String| Optional: Filter parameter: valid values are created_at, updated_at or featured_at.
| searchFeatured| String| Optional: Only return collections that have been featured on Product Hunt. true or false. Default = false.


## ProductHuntAPI.getSingleCollection
This endpoint allows to get details of a collection.

| Field       | Type  | Description
|-------------|-------|----------
| accessToken | String| Required: The valid accessToken.
| collectionId| String| Required: The numeric ID of the Collection you want to fetch.


## ProductHuntAPI.getNotifications
This endpoint allows to receive your latest Post related notifications.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| perPage    | String| Optional: Filter parameter: define the amount of records sent per call (max 50).
| searchType | String| Optional: Type of reference object accepted, defaults to 'Post', use 'all' for every notification type.


## ProductHuntAPI.getPostVotes
This endpoint allows to see all votes for a post.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| postId     | String| Required: The ID of the post you want to find votes for.
| older      | String| Optional: Filter parameter: get only records older than the provided id.
| newer      | String| Optional: Filter parameter: get only records newer than the provided id.
| perPage    | String| Optional: Filter parameter: define the amount of records sent per call (max 50).
| order      | Select| Optional: Filter parameter: define the order you want to receive the records (does not affect older/newer behaviour). Valid values are asc or desc.


## ProductHuntAPI.getUserVotes
This endpoint allows to see all votes for a user.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| userId     | String| Required: The ID of the user you want to find votes for.
| older      | String| Optional: Filter parameter: get only records older than the provided id.
| newer      | String| Optional: Filter parameter: get only records newer than the provided id.
| perPage    | String| Optional: Filter parameter: define the amount of records sent per call (max 50).
| order      | Select| Optional: Filter parameter: define the order you want to receive the records (does not affect older/newer behaviour). Valid values are asc or desc.


## ProductHuntAPI.getMySettings
This endpoint allows to get your own details.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| exclude    | String| Optional: Option to exclude certain values from the request. Options - "relationships".


## ProductHuntAPI.getFollowers
This endpoint allows to get list all followers.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| userId     | String| Required: The ID of the user you want to fetch all followers from.
| older      | String| Optional: Filter parameter: get only records older than the provided id.
| newer      | String| Optional: Filter parameter: get only records newer than the provided id.
| perPage    | String| Optional: Filter parameter: define the amount of records sent per call (max 50).
| order      | Select| Optional: Filter parameter: define the order you want to receive the records (does not affect older/newer behaviour). Valid values are asc or desc.


## ProductHuntAPI.getInteractions
This endpoint allows to get user's interactions.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| include    | Select| Optional: Interactions to be included. Possible values: following_user_ids, voted_post_ids, voted_comment_ids, collected_post_ids, subscribed_collection_ids, subscribed_live_event_ids, followed_topics_ids.


## ProductHuntAPI.getCategories
This endpoint allows to get user's interactions.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.


## ProductHuntAPI.getLiveEvents
This endpoint allows to get list of live events.

| Field          | Type  | Description
|----------------|-------|----------
| accessToken    | String| Required: The valid accessToken.
| offset         | String| Optional: Filter parameter: define the amount of records to be skipped.
| perPage        | String| Optional: Filter parameter: define the amount of records sent per call (default 20, max 50).
| older          | DatePicker| Optional: Filter parameter: get only records with older "start_at" date than the provided date (format "YYYY-MM-DD").
| newer          | DatePicker| Optional: Filter parameter: get only records with newer "start_at" date (includes events with unspeficifed date) than the provided date (format "YYYY-MM-DD").
| searchCategory | String| Optional: Retrieve events for a specific category.
| searchDate     | DatePicker| Optional: Retrieve events for a specific month (format "YYYY-MM"), use alse" for events without a start_at date.
| searchLiveVideo| String| Optional: Retrieve LIVE on camera events. true or false. Default: false.
| searchSlug     | String| Optional: Filter by the url slug of the collection.


## ProductHuntAPI.getSingleLiveEvent
This endpoint allows to get details of a live event.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| liveEventId| String| Required: The numeric ID of the live event you want to fetch.


## ProductHuntAPI.generateShareableImage
This endpoint allows to generate a shareable image for a comment.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| commentId  | String| Required: The ID of the comment you want an image for.


## ProductHuntAPI.getTopics
This endpoint allows to get list of topics.

| Field           | Type  | Description
|-----------------|-------|----------
| accessToken     | String| Required: The valid accessToken.
| older           | DatePicker| Optional: Filter parameter: get only records older than the provided id (format "YYYY-MM-DD").
| newer           | DatePicker| Optional: Filter parameter: get only records newer than the provided id (format "YYYY-MM-DD").
| perPage         | String| Optional: Filter parameter: define the amount of records sent per call (max 50).
| sortBy          | String| Optional: Sort api response: valid parameters to sort by: created_at, id, updated_at.
| order           | Select| Optional: Sort api response: valid parameters are desc and asc.
| searchTrending  | String| Optional: Filter parameter: can filter only trending topics.
| searchFollowerId| String| Optional: Filter parameter: can filter topics by follower user id.
| searchSlug      | String| Optional: Filter parameter: filter by the slug of the url.


## ProductHuntAPI.getSingleTopic
This endpoint allows to get details of a topic.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| topicId    | String| Required: The numeric ID of the Topic you want to fetch.


## ProductHuntAPI.subscribeToPushNotifications
This endpoint allows to subscribe a logged-in user to desktop push notifications.

| Field           | Type  | Description
|-----------------|-------|----------
| accessToken     | String| Required: The valid accessToken.
| desktopPushToken| String| Optional: PushService Vendor Token for Desktop App Push Notifications (define one of those 3 tokens).
| mobilePushToken | String| Optional: PushService Vendor Token for Mobile App Push Notifications (define one of those 3 tokens).
| browserPushToken| String| Optional: PushService Vendor Token for Browser Push Notification (define one of those 3 tokens).


## ProductHuntAPI.getComments
This endpoint allows to fetch a stream of all recent comments.

| Field           | Type  | Description
|-----------------|-------|----------
| accessToken     | String| Required: The valid accessToken.
| older           | String| Optional: Filter parameter: get only records older than the provided id.
| newer           | String| Optional: Filter parameter: get only records newer than the provided id.
| perPage         | String| Optional: Filter parameter: define the amount of records sent per call (max 50).
| order           | Select| Optional: Filter parameter: define the order you want to receive the records (does not affect older/newer behaviour). Valid values are asc or desc..
| searchUserId    | String| Optional: The id of a user you want to filter for. If you pass this id the user won't be nested.
| searchPostId    | String| Optional: The id of a post you want to filter for. If you pass this id the post won't be nested.
| searchAmaEventId| String| Optional: The id of a post you want to filter for. If you pass this id the ama_event won't be nested.


## ProductHuntAPI.getUserComments
This endpoint allows to fetch comments of a user (not nested).

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| userId     | String| Required: The ID of the user you want to fetch comments.


## ProductHuntAPI.getPostThreads
This endpoint allows to fetch all threads of a post (nested and sorted).

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| postId     | String| Required: The id the post the comment belongs to (passed via URL).
| older      | String| Optional: Filter parameter: get only records older than the provided id.
| newer      | String| Optional: Filter parameter: get only records newer than the provided id.
| perPage    | String| Optional: Filter parameter: define the amount of records sent per call (max 50).
| order      | Select| Optional: Filter parameter: define the order you want to receive the records (does not affect older/newer behaviour). Valid values are asc or desc.


## ProductHuntAPI.getLiveEventThreads
This endpoint allows to fetch all threads of a live event (nested and sorted).

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| liveEventId| String| Required: The id the live event the comment belongs to (passed via URL).
| older      | String| Optional: Filter parameter: get only records older than the provided id.
| newer      | String| Optional: Filter parameter: get only records newer than the provided id.
| perPage    | String| Optional: Filter parameter: define the amount of records sent per call (max 50).
| order      | Select| Optional: Filter parameter: define the order you want to receive the records (does not affect older/newer behaviour). Valid values are asc or desc.


## ProductHuntAPI.getCommentVotes
This endpoint allows to see all votes for a comment.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: The valid accessToken.
| commentId  | String| Required: The ID of the comment you want to find votes for.
| older      | String| Optional: Filter parameter: get only records older than the provided id.
| newer      | String| Optional: Filter parameter: get only records newer than the provided id.
| perPage    | String| Optional: Filter parameter: define the amount of records sent per call (max 50).
| order      | Select| Optional: Filter parameter: define the order you want to receive the records (does not affect older/newer behaviour). Valid values are asc or desc.

