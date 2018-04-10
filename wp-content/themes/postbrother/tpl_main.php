<?php
/*
  Template Name: Home
 */

get_header();
global $ActId, $ParentId;
?>

<?php include 'inc_googleadservices.php'; ?>
<div class="Page Main">
    <div class="PageBackground">
        <div class="LeftSide"></div><div class="RightSide"></div>
    </div>
    <div class="Container FilterContainer">
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
    </div>
    <div class="Video bottom">
        <div class="Text">
            <div class="Container">
            Transcending<br />Luxury
            </div>
        </div>
        <?php if ($deviceType == 'computer' || $deviceType == 'tablet') { ?>
            <video id="video-main" class="video-js" controls autoplay preload="auto" poster="" data-setup='{"loop": "true"}'></video>
        <?php } ?>
        <a class="BigPlay"></a>
    </div>
    <div class="Container">
        <div class="Buildings">
            <div class="Data">
                <?php getTemplatePart('', 'inc_listApartments'); ?>
            </div>

            <?php
            $src = '';
            $photosGoldtex = get_post_meta(65, 'cover', false);
            $photosGoldtex = $photosGoldtex[sizeof($photosGoldtex) - 1];
            if ($photosGoldtex)
                $src = wp_get_attachment_image_src($photosGoldtex, 'full');
            ?>
            <a class="Building Size2x1 MargT LoadAjax" data-building="goldtex" href="<?php bloginfo('home'); ?>/buildings/goldtex" data-district="Callowhill">
                <?php if ($photosGoldtex) { ?>
                    <img class="Buffor" data-src="<?php echo $src[0]; ?>" />
                <?php } ?>
                <div class="Mask"></div>
                <div class="Cl Cl4-8 ClH100p Pad20 first">
                    <div class="Address">
                        315 N 12th Street
                        <div class="ShowOnMap ActionShowOnMap">Show on map</div>
                    </div>
                    <div class="Name">
                        <div class="Table">
                            <div class="TableCell">Goldtex</div>
                        </div>
                    </div>
                    <div class="Units">
                        <div class="Count">
                            <span class="Count">0</span>
                            <div class="Load"></div>
                        </div>
                        <div class="Txt">Units available</div>
                    </div>
                </div>
                <div class="Cl Cl4-8 ClH100p second">
                    <div class="PhotoContainer"><div class="Apla"></div><div class="Photo" style="background-image: url('<?php echo $src[0]; ?>')"></div></div>
                </div>
                <div class="Clear"></div>
            </a>

            <?php
            $src = '';
            $photos1401Spruce = get_post_meta(227, 'cover', false);
            $photos1401Spruce = $photos1401Spruce[sizeof($photos1401Spruce) - 1];
            if ($photos1401Spruce)
                $src = wp_get_attachment_image_src($photos1401Spruce, 'full');
            ?>
            <a class="Building Size2x2 LoadAjax" data-building="1401-spruce" href="<?php bloginfo('home'); ?>/buildings/the-atlantic" data-district="AvenueoftheArts">
                <?php if ($photos1401Spruce) { ?>
                    <img class="Buffor" data-src="<?php echo $src[0]; ?>" />
                <?php } ?>
                <div class="Mask"></div>
                <div class="Cl Cl4-8 ClH100p Pad20 first">
                    <div class="Change"></div>
                    <div class="Address">
                        1401 Spruce Street
                        <div class="ShowOnMap ActionShowOnMap">Show on map</div>
                    </div>
                    <div class="Name">
                        <div class="Table">
                            <div class="TableCell">The<br />Atlantic</div>
                        </div>
                    </div>
                    <div class="Units">
                        <div class="Count">
                            <span class="Count">0</span>
                            <div class="Load"></div>
                        </div>
                        <div class="Txt">Units available</div>
                    </div>
                </div>
                <div class="Cl Cl4-8 ClH100p second">
                    <div class="PhotoContainer"><div class="Apla"></div><div class="Photo" style="background-image: url('<?php echo $src[0]; ?>')"></div></div>
                </div>
                <div class="Clear"></div>
            </a>

            <?php
            $src = '';
            $photosRittenhouseHill = get_post_meta(229, 'cover', false);
            $photosRittenhouseHill = $photosRittenhouseHill[sizeof($photosRittenhouseHill) - 1];
            if ($photosRittenhouseHill)
                $src = wp_get_attachment_image_src($photosRittenhouseHill, 'full');
            ?>
            <a class="Building Size2x1 LoadAjax invert" data-building="rittenhouse-hill" href="<?php bloginfo('home'); ?>/buildings/rittenhouse-hill" data-district="EastFalls">
                <?php if ($photosRittenhouseHill) { ?>
                    <img class="Buffor" data-src="<?php echo $src[0]; ?>" />
                <?php } ?>
                <div class="Mask"></div>
                <div class="Cl Cl4-8 ClH100p first">
                    <div class="PhotoContainer"><div class="Apla"></div><div class="Photo" style="background-image: url('<?php echo $src[0]; ?>')"></div></div>
                </div>
                <div class="Cl Cl4-8 ClH100p Pad20 second">
                    <div class="Address">
                        633 W Rittenhouse Street
                        <div class="ShowOnMap ActionShowOnMap">Show on map</div>
                    </div>
                    <div class="Name">
                        <div class="Table">
                            <div class="TableCell">Rittenhouse <br />Hill</div>
                        </div>
                    </div>
                    <div class="Units">
                        <div class="Count">
                            <span class="Count">0</span>
                            <div class="Load"></div>
                        </div>
                        <div class="Txt">Units available</div>
                    </div>
                </div>
                <div class="Clear"></div>
            </a>

            <?php
            $src = '';
            $photosDelmarMorris = get_post_meta(230, 'cover', false);
            $photosDelmarMorris = $photosDelmarMorris[sizeof($photosDelmarMorris) - 1];
            if ($photosDelmarMorris)
                $src = wp_get_attachment_image_src($photosDelmarMorris, 'full');
            ?>
            <a class="Building Size2x1 LoadAjax invert" data-building="delmar-morris" href="<?php bloginfo('home'); ?>/buildings/delmar-morris" data-district="EastFalls">
                <?php if ($photosDelmarMorris) { ?>
                    <img class="Buffor" data-src="<?php echo $src[0]; ?>" />
                <?php } ?>
                <div class="Mask"></div>
                <div class="Cl Cl4-8 ClH100p first">
                    <div class="PhotoContainer"><div class="Apla"></div><div class="Photo" style="background-image: url('<?php echo $src[0]; ?>')"></div></div>
                </div>
                <div class="Cl Cl4-8 ClH100p Pad20 second">
                    <div class="Address">
                        319 W Chelten Ave
                        <div class="ShowOnMap ActionShowOnMap">Show on map</div>
                    </div>
                    <div class="Name">
                        <div class="Table">
                            <div class="TableCell">Delmar <br />Morris</div>
                        </div>
                    </div>
                    <div class="Units">
                        <div class="Count">
                            <span class="Count">0</span>
                            <div class="Load"></div>
                        </div>
                        <div class="Txt">Units available</div>
                    </div>
                </div>
                <div class="Clear"></div>
            </a>

            <?php
            $src = '';
            $photosPastoriusCourt = get_post_meta(97352, 'cover', false);
            $photosPastoriusCourt = $photosPastoriusCourt[sizeof($photosPastoriusCourt) - 1];
            if ($photosPastoriusCourt)
                $src = wp_get_attachment_image_src($photosPastoriusCourt, 'full');
            ?>
            <a class="Building Size2x2 LoadAjax" data-building="hamilton-court" href="<?php bloginfo('home'); ?>/buildings/hamilton-court" data-district="WestMount Airy">
                <?php if ($photosPastoriusCourt) { ?>
                    <img class="Buffor" data-src="<?php echo $src[0]; ?>" />
                <?php } ?>
                <div class="Mask"></div>
                <div class="Cl Cl4-8 ClH100p Pad20 first">
                    <div class="Address">
                        101 S. 39th Street
                        <div class="ShowOnMap ActionShowOnMap">Show on map</div>
                    </div>
                    <div class="Name">
                        <div class="Table">
                            <div class="TableCell">Hamilton <br />Court</div>
                        </div>
                    </div>
                    <div class="Units">
                        <div class="Count">
                            <span class="Count">0</span>
                            <div class="Load"></div>
                        </div>
                        <div class="Txt">Units available</div>
                    </div>
                </div>
                <div class="Cl Cl4-8 ClH100p second">
                    <div class="PhotoContainer"><div class="Apla"></div><div class="Photo" style="background-image: url('<?php echo $src[0]; ?>')"></div></div>
                </div>
                <div class="Clear"></div>
            </a>

            <?php
            $src = '';
            $photosPresidentialCity = get_post_meta(231, 'cover', false);
            $photosPresidentialCity = $photosPresidentialCity[sizeof($photosPresidentialCity) - 1];
            if ($photosPresidentialCity)
                $src = wp_get_attachment_image_src($photosPresidentialCity, 'full');
            ?>
            <a class="Building Size2x2 LoadAjax" data-building="presidential-city" href="<?php bloginfo('home'); ?>/buildings/presidential-city" data-district="CityAvenue">
                <?php if ($photosPresidentialCity) { ?>
                    <img class="Buffor" data-src="<?php echo $src[0]; ?>" />
                <?php } ?>
                <div class="Mask"></div>
                <div class="Cl Cl4-8 ClH100p Pad20 first">
                    <div class="Address">
                        3900 City Avenue
                        <div class="ShowOnMap ActionShowOnMap">Show on map</div>
                    </div>
                    <div class="Name">
                        <div class="Table">
                            <div class="TableCell">Presidential <br />City</div>
                        </div>
                    </div>
                    <div class="Units">
                        <div class="Count">
                            <span class="Count">0</span>
                            <div class="Load"></div>
                        </div>
                        <div class="Txt">Units available</div>
                    </div>
                </div>
                <div class="Cl Cl4-8 ClH100p second">
                    <div class="PhotoContainer"><div class="Apla"></div><div class="Photo" style="background-image: url('<?php echo $src[0]; ?>')"></div></div>
                </div>
                <div class="Clear"></div>
            </a>


            <?php
            $src = '';
            $photosRoosevelt = get_post_meta(1041, 'cover', false);
            $photosRoosevelt = $photosRoosevelt[sizeof($photosRoosevelt) - 1];
            if ($photosRoosevelt)
                $src = wp_get_attachment_image_src($photosRoosevelt, 'full');
            ?>
            <a class="Building Size2x1 invert" data-building="roosevelt" href="<?php bloginfo('home'); ?>/buildings/roosevelt" data-district="EastFalls">
                <?php if ($photosPresidentialCity) { ?>
                    <img class="Buffor" data-src="<?php echo $src[0]; ?>" />
                <?php } ?>
                <div class="Cl Cl4-8 ClH100p first">
                    <div class="PhotoContainer"><div class="Apla"></div><div class="Photo" style="background-image: url('<?php echo $src[0]; ?>')"></div></div>
                </div>
                <div class="Cl Cl4-8 ClH100p Pad20 second">
                    <div class="Address">
                        2220 Walnut Street
                        <div class="ShowOnMap ActionShowOnMap">Show on map</div>
                    </div>
                    <div class="Name">
                        <div class="Table">
                            <div class="TableCell">Roosevelt</div>
                        </div>
                    </div>
                    <div class="Units">
                        <div class="Count">
                            <span class="Count">0</span>
                            <div class="Load"></div>
                        </div>
                        <div class="Txt">Units available</div>
                    </div>
                </div>
                <div class="Clear"></div>
            </a>

            <?php
            $src = '';
            $photosTheDuchess = get_post_meta(132418, 'cover', false);
            $photosTheDuchess = $photosTheDuchess[sizeof($photosTheDuchess) - 1];
            if ($photosTheDuchess)
              $src = wp_get_attachment_image_src($photosTheDuchess, 'full');
            ?>
            <a class="Building Size2x1" data-building="the-duchess" href="<?php bloginfo('home'); ?>/buildings/the-duchess" data-district="NorthBergen">
                <img class="Buffor" data-src="<?php echo $src[0]; ?>" />
                <div class="Cl Cl4-8 ClH100p second">
                    <div class="PhotoContainer"><div class="Apla"></div><div class="Photo" style="background-image: url('<?php echo $src[0]; ?>')"></div></div>
                </div>
                <div class="Cl Cl4-8 ClH100p Pad20 first">
                    <div class="Address">
                        North Bergen<br>7601 River Road
                        <div class="ShowOnMap ActionShowOnMap">Show on map</div>
                    </div>
                    <div class="Name">
                        <div class="Table">
                            <div class="TableCell">The Duchess</div>
                        </div>
                    </div>
                    <div class="Units">
                        <div class="Count">
                            <span class="Count">0</span>
                            <div class="Load"></div>
                        </div>
                        <div class="Txt">Units available</div>
                    </div>
                </div>
                <div class="Clear"></div>
            </a>

             <?php
            $src = '';
            $photosGardenCourt = get_post_meta(1046, 'cover', false);
            $photosGardenCourt = $photosGardenCourt[sizeof($photosGardenCourt) - 1];
            if ($photosGardenCourt)
                $src = wp_get_attachment_image_src($photosGardenCourt, 'full');
            ?>
            <a class="Building Size2x2 invert MargL25p" data-building="garden-court" href="<?php bloginfo('home'); ?>/buildings/garden-court" data-district="EastFalls">
                <?php if ($photosGardenCourt) { ?>
                    <img class="Buffor" data-src="<?php echo $src[0]; ?>" />
                <?php } ?>
                <div class="Cl Cl4-8 ClH100p first">
                    <div class="PhotoContainer"><div class="Apla"></div><div class="Photo" style="background-image: url('<?php echo $src[0]; ?>')"></div></div>
                </div>
                <div class="Cl Cl4-8 ClH100p Pad20 second">
                    <div class="Address">
                        4701 Pine Street
                        <div class="ShowOnMap ActionShowOnMap">Show on map</div>
                    </div>
                    <div class="Name">
                        <div class="Table">
                            <div class="TableCell">Garden<br />Court</div>
                        </div>
                    </div>
                    <div class="Units">
                        <div class="Count">
                            <span class="Count">0</span>
                            <div class="Load"></div>
                        </div>
                        <div class="Txt">Units available</div>
                    </div>
                </div>
                <div class="Clear"></div>
            </a>

            <div class="Clear"></div>
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
        <?php $post_Id = get_post($ActId); ?>
        <div class="MapContent" id="MapHome" data-center="<?php echo get_post_meta($ActId, 'address', true)['address_latLang'][0]; ?>"></div>
    </div>
</div>

<?php get_footer(); ?>
