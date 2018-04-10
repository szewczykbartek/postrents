<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    define('WP_USE_THEMES', false);
    require('../../../../wp-blog-header.php');
    header("HTTP/1.1 200 OK");
    header("Status: 200 All rosy");
    include_once(ABSPATH . WPINC . '/post.php');
    include_once(ABSPATH . WPINC . '/functions.php');
}

if ($_GET['url'])
    $url = $_GET['url'];

$postid = url_to_postid($url);
if ($postid != 0) {
    $titleSuffix = get_the_title($postid);
}

$current_user = wp_get_current_user();

//echo $titleSuffix;


echo get_post_meta($postid, '_yoast_wpseo_title', true);
