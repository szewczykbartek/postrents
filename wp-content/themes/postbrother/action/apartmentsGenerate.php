<?php
define('WP_USE_THEMES', false);
require('../../../../wp-blog-header.php');
include_once(ABSPATH . WPINC . '/post.php');
include_once(ABSPATH . WPINC . '/functions.php');


ob_start();

// Remove Old

$myqueryApartments = new WP_Query(
        array(
    'post_type' => 'apartments',
    'posts_per_page' => -1,
    'order' => "ASC",
    'orderby' => "title",
    'ignore_sticky_posts' => 1,
    'post_status' => 'publish'
        )
);
while ($myqueryApartments->have_posts()) : $myqueryApartments->the_post();
    $idNow = $post->ID;
    wp_delete_post($idNow, true);
endwhile;


$x = 1;
$myqueryBuilding = new WP_Query(
        array(
    'post_type' => 'buildings',
    'posts_per_page' => -1,
    'order' => "ASC",
    'orderby' => "title",
    'ignore_sticky_posts' => 1,
    'post_status' => 'publish'
        )
);
while ($myqueryBuilding->have_posts()) : $myqueryBuilding->the_post();
    $buildingId = $post->ID;
    $buildingCode = get_post_meta($post->ID, 'propertyCode', true);
    $buildingName = get_the_title($buildingId);

    echo $buildingName . ' (' . $x . '/' . $myqueryBuilding->post_count . ')';

    echo '<div style="margin: 20px 0 20px 40px">';

    if (get_post_meta($buildingId, 'propertyCode', true)) {
        $jsonUrl = 'https://api.rentcafe.com/rentcafeapi.aspx?requestType=floorplan&APIToken=NDY5OTI%3d-XDY6KCjhwhg%3d&propertyCode=' . $buildingCode; // From Dima: I changed this line 07/31/2017. removed &companyCode=C00000046992 added &APIToken=NDY5OTI%3d-XDY6KCjhwhg%3d
        echo '<small>' . $jsonUrl . '</small>';
        $json = file_get_contents($jsonUrl);
        $jsonParse = json_decode($json, true);

        //  echo '<pre>', print_r($jsonParse, 1), '</pre>';
        // APARTMENT ONE

        $y = 1;
        foreach ($jsonParse as $key => $value) {

            $title = $buildingName . ' - ' . $value['FloorplanName'] . ' (' . $y . '/' . sizeof($jsonParse) . ')';
            echo '<small style="display: block; margin: 10px 0">' . $title . '<br/>Available units: ' . $value['AvailableUnitsCount'] . '</small>';

            $my_post = array();
            //$my_post['post_title'] = $value['FloorplanId'];
            $my_post['post_title'] = $buildingName . ' - ' . $value['FloorplanName'] . ' ' . $value['PropertyId'] . '/' . $value['FloorplanId'];
            $my_post['post_date'] = date('Y-m-d H:i:s');
            $my_post['post_type'] = 'apartments';
            $my_post['post_status'] = 'publish';

            $post_id = wp_insert_post($my_post);

            $my_post['ID'] = $post_id;
            wp_update_post($my_post);


            update_post_meta($post_id, 'building', $buildingId);
            //update_post_meta($post_id, 'district', get_post_meta($buildingId, 'address', true)['address_districts'][0]);
            update_post_meta($post_id, 'district', get_post_meta($buildingId, 'address', true)['address_districts']);

            foreach ($value as $keyIn => $valueIn) {
                switch ($keyIn) {
                    case 'xxxx':
                        break;

                    default:
                        update_post_meta($post_id, $keyIn, $valueIn);
                        break;
                }
            }

            $y++;
        }
    } else {
        echo 'None';
    }


    echo '</div>';

    $x++;
endwhile;

$var = ob_get_clean();

$fileLocation = "cron/Report " . date('Y-m-d H:i:s') . ".html";
$file = fopen($fileLocation, "w");

$message = $var;

fwrite($file, $message);
fclose($file);

echo $message;
