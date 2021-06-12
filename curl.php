<?php

require_once '_bootstrap.php';

function getData($url){

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $url);
	$result = curl_exec($ch);
	curl_close($ch);

	return json_decode($result, true);

}

$users_data = getData('https://jsonplaceholder.typicode.com/users');
$posts_data = getData('https://jsonplaceholder.typicode.com/posts');

$userClass = new User();
echo "Users insert<br>";
foreach ($users_data as $val) {

    $user = htmlspecialchars($val['name']);
    $email = htmlspecialchars($val['email']);
    $res = $userClass->create($user, $email);
    echo  "#Name:# {$user}, #Email:# {$email}<br>";
	echo  "Insert ID: {$res}";
	echo "<br><br>";

}

$postClass = new Post();
echo "####################################<br>";
echo "Users insert<br>";
foreach ($posts_data as $post) {

    $title = htmlspecialchars($post['title']);
    $body = htmlspecialchars($post['body']);
    $userId = htmlspecialchars($post['userId']);

    $res = $postClass->create($userId, $title, $body);
    echo  "#Title#: {$title}, #Text#: {$body}<br>";
	echo  "Insert ID: {$res}";
	echo "<br><br>";
    
}

