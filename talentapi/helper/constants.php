<?php

$USER_TABLE = 'users';
$POSTS_TABLE = 'posts_data';

class User{
	const USER_ID = "user_id";
	const PASSWORD = "password";
	const USERNAME ="username";
	const FNAME = "fname"; 
	const LNAME = "lname"; 
	const FULL_NAME = "full_name";
	const PHONE = "phone";
	const EMAIL = "email";
	const DISABLED = "disabled";
	const POINTS = "points";
	const PROFILE_PIC = "profile_pic";
	const CREATED_DATE = "created_date";
	const UPDATED_DATE = "updated_date";
	const TOKEN = "auth_token";
}

class POST{
	const ID = "id";
	const USER_ID = "user_id";
	const TITLE = "title";
	const DESCRIPTION = "description";
	const TAGS = "tags";
	const MIMETYPE = "mimetype";
	const CONTENT_URL = "content_url";
	const POINTS = "points";
	const FEEDBACKS = "feedbacks";
	const CREATED_DATE = "created_date";
	const UPDATED_DATE = "updated_date";
}

class Ratings{
	const RATING_ID = "rating_id";
	const POST_ID = "post_id";
	const USER_ID = "user_id";
	const RATING = "rating";
	const CREATED_DATE = "created_date";
	const UPDATED_DATE = "updated_date";
}

class Comments{
	const COMMENT_ID = "comment_id";
	const POST_ID = "post_id";
	const USER_ID = "user_id";
	const TEXT = "text";
	const CREATED_DATE = "created_date";
	const UPDATED_DATE = "updated_date";
	const SUB_COMMENTS = "sub_comments";
	const TAGS = "tags";
}
?>