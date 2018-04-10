<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    define('WP_USE_THEMES', false);

    if (strlen(stristr($_SERVER['SCRIPT_NAME'], 'inc_listApartments.php')) > 0) {
        require('../../../wp-blog-header.php');
    } else {
        require('wp-blog-header.php');
    }

    include_once(ABSPATH . WPINC . '/post.php');
    include_once(ABSPATH . WPINC . '/functions.php');
}



if ($_GET['building'])
    $building = $_GET['building'];


$x = 1;
$meta_query[] = array(
    'relation' => 'AND',
    'key' => 'MinimumRent',
    'value' => -1,
    'compare' => '>',
    'type' => 'numeric'
);
if ($building != '') {
    $meta_query[] = array(
        'relation' => 'AND',
        'key' => 'building',
        'value' => $building,
        'compare' => '=',
        'type' => 'numeric'
    );
}

if ($_GET['district']) {
    $meta_query[] = array(
        'relation' => 'AND',
        'key' => 'district',
        'value' => $_GET['district'],
        'compare' => 'IN',
    );
}
if ($_GET['price']) {
    $priceArray = explode(';', $_GET['price']);
    $meta_query[] = array(
        'relation' => 'AND',
        'key' => 'MinimumRent',
        'value' => array(($priceArray[0]), ($priceArray[1])),
        'compare' => 'BETWEEN',
        'type' => 'numeric'
    );
}
if ($_GET['bathrooms']) {
    $meta_query[] = array(
        'relation' => 'AND',
        'key' => 'Baths',
        'value' => $_GET['bathrooms'],
        'compare' => 'IN',
    );
}
if ($_GET['bedrooms']) {
    $meta_query[] = array(
        'relation' => 'AND',
        'key' => 'Beds',
        'value' => $_GET['bedrooms'],
        'compare' => 'IN',
    );
}




$myqueryApartments = new WP_Query(
        array(
    'post_type' => 'apartments',
    'posts_per_page' => -1,
    'order' => "ASC",
    'meta_key' => 'MinimumSQFT',
    'orderby' => 'meta_value_num',
    'ignore_sticky_posts' => 1,
    'meta_query' => $meta_query,
    'post_status' => 'publish'
        )
);
while ($myqueryApartments->have_posts()) : $myqueryApartments->the_post();
    $idNow = $post->ID;

    $invert = '';
    if ($x >= 5 && $x <= 8)
        $invert = 'invert';
    if ($x >= 13 && $x <= 16)
        $invert = 'invert';
    
    $post_Id = get_post(get_post_meta($idNow, 'building', true));
    ?>

    <div class="Apartment <?php echo $invert; ?> ActionFloorplanOverlay" data-building="<?php echo $post_Id->post_name; ?>" data-availablecount="<?php echo get_post_meta($idNow, 'AvailableUnitsCount', true); ?>">
        <div class="Name"><?php echo get_post_meta($idNow, 'FloorplanName', true); ?> <small><?php echo get_post_meta($idNow, 'AvailableUnitsCount', true); ?> Units</small></div>
        <a class="RentNow" href="<?php echo get_post_meta($idNow, 'AvailabilityURL', true); ?>" target="_blank">Rent Now!</a>
        <a class="Floorplan">Floorplan</a>
        <div class="Data">
            <div class="Table">
                <div class="TableCell"> 
                    <div class="Cl Cl4-8"><?php echo round(get_post_meta($idNow, 'Baths', true), 2); ?> Bath</div>
                    <div class="Cl Cl4-8"><?php echo get_post_meta($idNow, 'MinimumSQFT', true); ?> SQ.FT</div>
                    <div class="Cl Cl4-8"><?php echo round(get_post_meta($idNow, 'Beds', true), 2); ?> Bedrooms</div>
                    <div class="Cl Cl4-8">$ <?php echo get_post_meta($idNow, 'MinimumRent', true); ?></div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $x++;
endwhile;

$blankCount = (ceil($myqueryApartments->post_count/4)*4) - $myqueryApartments->post_count;
for ($index = 0; $index <  $blankCount; $index++) {
    ?>
    <div class="Apartment Blank <?php echo $invert; ?>">
        <div class="Line"></div>
    </div>
<?php } ?>


<?php if ($building != '') { ?>

    <div class="Clear"></div>
    <?php if ($myqueryApartments->post_count > 4) { ?>
        <a class="ShowMore">Show more (<?php echo $myqueryApartments->post_count - 4; ?>)</a>
    <?php } ?>

    <div class="FloorplanOverlay">
        <?php
        while ($myqueryApartments->have_posts()) : $myqueryApartments->the_post();
            $idNow = $post->ID;
            ?>

            <div class="Box">
                <div class="Header">
                    <div class="Title"><?php echo get_post_meta($idNow, 'FloorplanName', true); ?></div>
                    <div class="Parametr"><?php echo round(get_post_meta($idNow, 'Baths', true), 2); ?> Bath</div>
                    <div class="Parametr"><?php echo round(get_post_meta($idNow, 'Beds', true), 2); ?> Bedrooms</div>
                    <div class="Parametr"><?php echo get_post_meta($idNow, 'MinimumSQFT', true); ?> SQ.FT</div>
                    <div class="Parametr">$ <?php echo get_post_meta($idNow, 'MinimumRent', true); ?></div>
                    <a class="Close">
                        <svg x="0px" y="0px" width="11.121px" height="11.122px" viewBox="0 0 11.121 11.122" enable-background="new 0 0 11.121 11.122" xml:space="preserve">
                        <line fill="none" stroke="#fff" stroke-width="3" stroke-miterlimit="10" x1="1.061" y1="1.061" x2="10.061" y2="10.061"/>
                        <line fill="none" stroke="#fff" stroke-width="3" stroke-miterlimit="10" x1="10.061" y1="1.061" x2="1.061" y2="10.061"/>
                        </svg>
                    </a>
                    <a class="Next ActionFloorplanOverlayNext">Next</a>
                    <a class="Prev ActionFloorplanOverlayPrev">Prev</a>
                    <div class="Clear"></div>
                </div>
                <div class="Pics SliderGallery">
                    <div class="Photos">
                        <?php
                        $photos = explode(',', get_post_meta($idNow, 'FloorplanImageURL', true));
                        $active = 'active';
                        foreach ($photos as $value) {
                            ?>

                            <div class="Photo <?php echo $active; ?>" style="background-image: url('<?php echo $value; ?>')"></div>

                            <?php
                            $active = '';
                        }
                        ?>
                    </div>
                    <div class="Nav">
                        <?php
                        $active = 'active';
                        if (count($photos) > 1) {
                            for ($i = 0; $i < count($photos); $i++) {
                                echo '<a class="' . $active . '"></a>';
                                $active = '';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="Rent">
                    <a class="RentNow" href="<?php echo get_post_meta($idNow, 'AvailabilityURL', true); ?>" target="_blank">Rent Now!</a>
                </div>
            </div>

        <?php endwhile; ?>
        <div class="Mask"></div>    
    </div>

<?php } ?>