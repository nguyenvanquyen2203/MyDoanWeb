<?php
    require '../config.php';
    require '../classes/database.php';
    require '../classes/state.php';
    require '../classes/user.php';
    require '../classes/postContent.php';
    require '../classes/category.php';
    require '../classes/postToCategories.php';
    require '../classes/post.php';

    $conn = require '../inc/db.php';
    $postImg = $_POST['postImg'];
    $postContent = $_POST['postContent'];
    $postTitle = $_POST['postTitle'];
    $stateID = $_POST['state'];
    $categories = $_POST['categories'];
    $userID = 1;
    $categoriesArray = explode(',', $categories);
    date_default_timezone_set('Asia/Ho_Chi_Minh'); // Set the timezone
    $currentDate = date('Y-m-d H:i:s'); // Output the current date and time in the 'Y-m-d H:i:s' format  

    // save post infomation
    // insert post content
    $newPostcontent = new PostContent($postContent);
    $postContentID = $newPostcontent->addPostContent($conn);
    // insert post
    $newPost = new Post($postTitle, $postContentID, $postImg, $stateID, $userID, $currentDate);
    $postID = $newPost->addPost($conn);
    // insert categories for that post
    $fetchedCategories = Category::getCategories($categoriesArray, $conn);
    foreach($fetchedCategories as $fetchedCategory){
        $newPostToCategory = new PostToCategories($postID, $fetchedCategory->id);
        $newPostToCategory->addPostToCategories($conn);
    }
    // redirect
    header('Location: /');
    exit;
    // try {
    // } catch (PDOException $e) {
    //     $e->getMessage();
    // }



?>