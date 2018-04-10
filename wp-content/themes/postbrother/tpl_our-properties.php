<?php
/*
  Template Name: Our properties
 */

get_header();
global $ActId, $ParentId;
?>

<?php include 'inc_googleadservices.php'; ?>
<div class="Page OurProperties">
    <div class="Section Start">
        <div class="Photo"></div>
        <div class="Container">
            <div class="Breadcrumb">
                <a class="LoadAjax" href="<?php bloginfo('home'); ?>">Home</a> / Our Properties
            </div>
            <div class="Inside">
                <div class="Table">
                    <div class="TableCell">
                        <div class="Title">A New Standard of Living</div>
                        <div class="Text">With modern loft spaces and high-rise apartments available in scenic Center City, Germantown, and Philadelphia’s most desirable neighborhoods, Post Brothers provides world-class, ecofriendly solutions for residents looking for sophistication and convenience.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Section List">
        <div class="Container">
            <?php
            $floorplanArray = array();
            $min = 9999999;
            $max = 0;
            $meta_query[] = array(
                'relation' => 'AND',
                'key' => 'MinimumRent',
                'value' => -1,
                'compare' => '>',
                'type' => 'numeric'
            );
            $myqueryApartments = new WP_Query(
                    array(
                'post_type' => 'apartments',
                'posts_per_page' => -1,
                'order' => "ASC",
                'orderby' => "title",
                'ignore_sticky_posts' => 1,
                'meta_query' => $meta_query,
                'post_status' => 'publish'
                    )
            );
            while ($myqueryApartments->have_posts()) : $myqueryApartments->the_post();
                $idNow = $post->ID;
                if (get_post_meta($idNow, 'MinimumRent', true) > $max) {
                    $max = get_post_meta($idNow, 'MinimumRent', true);
                }
                if (get_post_meta($idNow, 'MinimumRent', true) < $min) {
                    $min = get_post_meta($idNow, 'MinimumRent', true);
                }

                $floorplan = explode(',', get_post_meta($idNow, 'FloorplanImageURL', true));
                foreach ($floorplan as $value) {
                    array_push($floorplanArray, $value);
                }
            endwhile;

            $params = array(
                'priceMin' => $min,
                'priceMax' => $max,
            );
            getTemplatePart('', 'inc_filter', $params);
            ?>

            <div class="Buildings">
                <div class="Data">
                    <?php getTemplatePart('', 'inc_listApartments'); ?>
                </div>
                <?php
                $x = 1;
                $myqueryBuilding = new WP_Query(
                        array(
                    'post_type' => 'buildings',
                    'posts_per_page' => -1,
                    'order' => "ASC",
                    'orderby' => 'menu_order',
                    'ignore_sticky_posts' => 1,
                    'post_status' => 'publish'
                        )
                );
                while ($myqueryBuilding->have_posts()) : $myqueryBuilding->the_post();
                    $idNow = $post->ID;
                    $invert = '';
                    if ($x % 2 == 0)
                        $invert = 'invert';

                    $district = get_post_meta($idNow, 'address', true)['address_districts'][0];
                    ?>

                    <a class="Building <?php echo $invert; ?> LoadAjax" data-building="<?php echo $post->post_name; ?>" href="<?php echo get_permalink($idNow); ?>" data-district="<?php echo $district; ?>">
                        <div class="Mask"></div>
                        <div class="Cl Cl4-8 ClDesc ClH100p Pad20">
                            <div class="Address">
                                <?php
                                $address = get_post_meta($idNow, 'address', true);
                                if ($address['address_city'])
                                    echo $address['address_city'] . '<br />';
                                echo $address['address_street'];
                                ?>
                            </div>
                            <div class="Name">
                                <div class="Table">
                                    <div class="TableCell">
                                        <?php
                                        $titleArray = explode(' ', get_the_title($idNow));
                                        if ($titleArray[1])
                                            echo $titleArray[0] . '<br />' . $titleArray[1];
                                        else
                                            echo get_the_title($idNow);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="Units">
                                <div class="Count">
                                    <span class="Count">0</span>
                                    <div class="Load"></div>
                                </div>
                                <div class="Txt">Units available</div>
                            </div>

                            <div class="Description">
                                <div class="Table">
                                    <div class="TableCell">
                                        <div class="Name">
                                            <?php
                                            $titleArray = explode(' ', get_the_title($idNow));
                                            if ($titleArray[1])
                                                echo $titleArray[0] . '<br />' . $titleArray[1];
                                            else
                                                echo get_the_title($idNow);
                                            ?>
                                        </div>
                                        <div class="Txt">
                                            <?php echo get_post_meta($idNow, 'seo_text', true); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Cl Cl4-8 ClPhoto ClH100p">
                            <?php
                            $image_id = get_post_thumbnail_id($idNow);
                            $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                            ?>
                            <div class="PhotoContainer"><div class="Apla"></div><div class="Photo" style="background-image: url('<?php echo $image_url[0]; ?>')"></div></div>
                            <img class="Buffor" data-src="<?php echo $image_url[0]; ?>" />
                        </div>
                        <div class="Clear"></div>
                    </a>

                    <?php
                    $x++;
                endwhile;
                ?>



<!--                <div class="Building coming-soon" data-building="roosevelt">
                    <div class="Mask"></div>
                    <div class="Cl Cl4-8 ClDesc ClH100p Pad20">
                        <div class="Address">
                            2220 Walnut Street,<br>Philadelphia, PA 19103<br><br><br>
                            <div class="ComingSoon">Coming soon</div>
                        </div>
                        <div class="Name">
                            <div class="Table">
                                <div class="TableCell">Roosevelt</div>
                            </div>
                        </div>
                        <div class="Units">
                            <div class="Count count1">
                                <span class="Count">0</span>
                                <div class="Load"></div>
                            </div>
                            <div class="Txt">Units available</div>
                        </div>
                    </div>
                    <div class="Cl Cl4-8 ClPhoto ClH100p">
                        <div class="PhotoContainer"><div class="Apla"></div><div class="Photo" style="background-image: url('<?php bloginfo('template_url'); ?>/img/Building8Big.jpg')"></div></div>
                        <img class="Buffor" src="<?php bloginfo('template_url'); ?>/img/Building8Big.jpg">
                    </div>
                    <div class="Clear"></div>
                </div>-->




            </div>
        </div>
    </div>


    <script>
        var Markers = [
<?php
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
    $idNow = $post->ID;
    echo "['" . $post->post_name . "', " . get_post_meta($idNow, 'address', true)['address_latLang'] . ", 'imageMain','" . get_the_title($idNow) . "','" . get_the_permalink($idNow) . "','" . get_post_meta($idNow, 'address', true)['address_side'][0][0] . "'],";

endwhile;
?>

        ];
    </script>
    <div class="Section Map">
        <a class="ZoomMap In">+</a>
        <a class="ZoomMap Out">-</a>
        <div class="MapContent" id="MapOurProperties" data-center="<?php echo get_post_meta($ActId, 'address', true)['address_latLang'][0]; ?>"></div>
    </div>



</div>

<?php get_footer(); ?>
