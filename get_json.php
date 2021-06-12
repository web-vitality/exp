<?php 

require_once '_bootstrap.php'; 

// http://intername.loc/get_json.php?post_id=:id
// http://intername.loc/get_json.php?user_id=:id

if(isset($_GET['post_id']) && is_numeric($_GET['post_id'])){
    $post = new Post();
    $result = $post->searchById($_GET['post_id']);
    $json = json_encode($result, JSON_PRETTY_PRINT);
    header("Content-type: application/json; charset=utf-8");
    echo $json;
}
 	

if(isset($_GET['user_id']) && is_numeric($_GET['user_id'])){
    $post = new Post();
	$result =$post->searchByUserId($_GET['user_id']);
	$json = json_encode($result, JSON_PRETTY_PRINT);
    header("Content-type: application/json; charset=utf-8");
    echo $json;
}
