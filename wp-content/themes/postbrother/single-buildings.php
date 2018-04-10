<?php
get_header();
global $ActId, $ParentId;

$floorplanArray = array();

if (have_posts()) :
    while (have_posts()) : the_post();

        $ActId = get_the_ID();
        ?>

        <div class="Page Building">
            <div class="Section Start SliderGallery">
                <div class="Photos">
                    <?php
                    $photos = get_post_meta($ActId, 'gallery', true);
                    $active = 'active';
                    if ($photos) {
                        $count = sizeof($photos);
                    }
                    if ($photos) {

                        for ($i = 0; $i < $count; $i++) {
                            $photoArray = $photos[$i][photos];
                            $lastIt = sizeof($photoArray) - 1;

                            $link = wp_get_attachment_image_src($photoArray[$lastIt], 'bigger');
                            $src2 = $link[0];
                            $position = $photos[$i][position];

                            if ($i == 0) {
                                $attrStyle = 'style';
                            } else {
                                $attrStyle = 'data-style';
                            }

                            if ($link[0]) {
                                ?>

                                <div class="Photo <?php echo $active; ?>" <?php echo $attrStyle; ?>="background-image: url('<?php echo $src2; ?>'); background-position: <?php echo $position; ?>">
                                <?php if ($active == 'active') { ?>
                                         <img class="Buffor" data-src="<?php echo $src2; ?>" />
                                         <?php } ?>
                                </div>

                                <?php
                            }
                            $active = '';
                        }
                    }
                    ?>
                </div>
                <?php if ($count > 1) { ?>
                    <div class="NavArrow">
                        <div class="Container">
                            <a class="Prev">
                                <div class="Arrow">
                                    <svg x="0px" y="0px" width="43.061px" height="84.708px" viewBox="250.559 26 43.061 84.708" enable-background="new 250.559 26 43.061 84.708" xml:space="preserve">
                                    <polyline fill="none" stroke-width="1" stroke="#ffffff" stroke-miterlimit="10" points="293.266,110.354 251.266,68.354 293.266,26.354 "/>
                                    </svg>
                                </div>
                            </a>
                            <a class="Next">
                                <div class="Arrow">
                                    <svg x="0px" y="0px" width="43.061px" height="84.708px" viewBox="374.768 31.925 43.061 84.708" enable-background="new 374.768 31.925 43.061 84.708" xml:space="preserve">
                                    <polyline fill="none" stroke-width="1" stroke="#ffffff" stroke-miterlimit="10" points="375.122,32.279 417.122,74.279 375.122,116.279 "/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="Nav">
                        <?php
                        $active = 'active';
                        if ($photos) {
                            for ($i = 0; $i < $count; $i++) {
                                echo '<a class="' . $active . '"></a>';
                                $active = '';
                            }
                        }
                        ?>
                    </div>
                <?php } ?>
                <div class="Container">
                    <div class="BreadcrumbInfo">
                        <span class="number"><?php
                        if (get_post_meta($ActId, 'address', true)['phone'])
                            echo get_post_meta($ActId, 'address', true)['phone'];
                        ?></span>
                    </div>
                    <div class="Breadcrumb">
                        <a class="LoadAjax" href="<?php bloginfo('home'); ?>">Home</a> / <?php echo get_the_title($ActId); ?>
                    </div>
                </div>
            </div>
            <div class="Section Description">
                <div class="Container">
                    <div class="Mask"></div>
                    <div class="Cl Cl4-8 PadClLeft30">
                        <div class="Title"><?php echo get_the_title($ActId); ?></div>
                        <div class="Website">
                            <?php
                            if (get_post_meta($ActId, 'address', true)['www']) {
                                $link = 'www.' . get_post_meta($ActId, 'address', true)['www'];

                                $pos = strpos($link, 'www');
                                if ($pos === false) {
                                    $link = 'www.' . get_post_meta($ActId, 'address', true)['www'];
                                } else {
                                    $link = get_post_meta($ActId, 'address', true)['www'];
                                }
                                echo 'Website: <a href="http://' . $link . '" target="_blank">' . get_post_meta($ActId, 'address', true)['www'] . '</a>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="Cl Cl4-8">
                        <div class="Text">
                            <?php echo generate_column(get_post_meta($ActId, 'description_top', true), 2, ''); ?>
                            <div class="Clear"></div>
                        </div>
                    </div>
                    <div class="Clear"></div>
                </div>
            </div>
            <div class="Section Filter">
                <div class="Container">
                    <?php
                    $min = 9999999;
                    $max = 0;
                    $meta_query[] = array(
                        'relation' => 'AND',
                        'key' => 'MinimumRent',
                        'value' => -1,
                        'compare' => '>',
                        'type' => 'numeric'
                    );
                    $meta_query[] = array(
                        'relation' => 'AND',
                        'key' => 'building',
                        'value' => $ActId,
                        'compare' => '=',
                        'type' => 'numeric'
                    );
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
                        if (get_post_meta($idNow, 'MinimumRent', true) > $max) {
                            $max = get_post_meta($idNow, 'MinimumRent', true);
                        }
                        if (get_post_meta($idNow, 'MinimumRent', true) < $min) {
                            $min = get_post_meta($idNow, 'MinimumRent', true);
                        }

                        $floorplanName = get_post_meta($idNow, 'FloorplanName', true);
                        $floorplanArea = get_post_meta($idNow, 'MinimumSQFT', true);
                        $floorplan = explode(',', get_post_meta($idNow, 'FloorplanImageURL', true));
                        $floorplan = explode(',', get_post_meta($idNow, 'FloorplanImageURL', true));
                        foreach ($floorplan as $value) {
                            if ($value != '') {
                                $oneArray = array(
                                    'pic' => $value,
                                    'name' => $floorplanName,
                                    'area' => $floorplanArea
                                );
                                array_push($floorplanArray, $oneArray);
                            }
                        }
                    endwhile;

                    if ($myqueryApartments->post_count == 0) {
                        $min = $max = 0;
                    }

                    $params = array(
                        'building' => $ActId,
                        'priceMin' => $min,
                        'priceMax' => $max,
                    );
                    getTemplatePart('', 'inc_filter', $params);
                    ?>
                    <div class="Apartments">
                        <?php
                        $params = array(
                            'building' => $ActId
                        );
                        getTemplatePart('', 'inc_listApartments', $params);
                        ?>
                    </div>
                </div>

            </div>

            <div class="Section Brochure">
                <div class="Container">
                    <div class="Slider">
                        <div class="TabsArrow">
                            <a class="Prev">
                                <svg x="0px" y="0px" width="8.304px" height="17.917px" viewBox="0 0 8.304 17.917" enable-background="new 0 0 8.304 17.917" xml:space="preserve">
                                <polygon fill="#000" points="8.304,9.013 8.304,0 0,9.013 8.304,17.917 "/>
                                </svg>
                            </a>
                            <a class="Next">
                                <svg x="0px" y="0px" width="8.304px" height="17.917px" viewBox="0 0 8.304 17.917" enable-background="new 0 0 8.304 17.917" xml:space="preserve">
                                <polygon fill="#000" points="-0.001,8.903 -0.001,17.917 8.303,8.903 -0.001,0 "/>
                                </svg>
                            </a>
                        </div>
                        <div class="TabsPhoto">
                            <div class="Tab SliderGallery active" data-tab="1">
                                <div class="Photos">
                                    <?php
                                    $photos = get_post_meta($ActId, 'slider1_gallery', true);
                                    $active = 'active';
                                    if ($photos) {
                                      $count = sizeof($photos);
                                    }
                                    if ($photos) {
                                        for ($i = 0; $i < $count; $i++) {
                                            $photoArray = $photos[$i]['slider_img_photos'];

                                            $lastIt = sizeof($photoArray) - 1;

                                            $link = wp_get_attachment_image_src($photoArray[$lastIt], 'bigger');
                                            $src2 = $link[0];
                                            $position = $photos[position][$i];

                                            if ($i == 0) {
                                                $attrStyle = 'style';
                                            } else {
                                                $attrStyle = 'data-style';
                                            }
                                            ?>

                                            <div class="Photo <?php echo $active; ?>" <?php echo $attrStyle; ?>="background-image: url('<?php echo $src2; ?>'); background-position: <?php echo $position; ?>">
                                        </div>

                                        <?php
                                        $active = '';
                                    }
                                }
                                ?>
                            </div>
                            <?php if ($count > 1) { ?>
                                <div class="NavArrow">
                                    <div class="Container">
                                        <a class="Prev">
                                            <div class="Arrow">
                                                <svg x="0px" y="0px" width="43.061px" height="84.708px" viewBox="250.559 26 43.061 84.708" enable-background="new 250.559 26 43.061 84.708" xml:space="preserve">
                                                <polyline fill="none" stroke-width="1" stroke="#ffffff" stroke-miterlimit="10" points="293.266,110.354 251.266,68.354 293.266,26.354 "/>
                                                </svg>
                                            </div>
                                        </a>
                                        <a class="Next">
                                            <div class="Arrow">
                                                <svg x="0px" y="0px" width="43.061px" height="84.708px" viewBox="374.768 31.925 43.061 84.708" enable-background="new 374.768 31.925 43.061 84.708" xml:space="preserve">
                                                <polyline fill="none" stroke-width="1" stroke="#ffffff" stroke-miterlimit="10" points="375.122,32.279 417.122,74.279 375.122,116.279 "/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="Nav">
                                    <?php
                                    $active = 'active';
                                    if ($photos) {
                                        for ($i = 0; $i < $count; $i++) {
                                            echo '<a class="' . $active . '"></a>';
                                            $active = '';
                                        }
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="Tab SliderGallery" data-tab="2">
                            <div class="Photos">
                                <?php
                                $photos = get_post_meta($ActId, 'slider2_gallery', true);
                                $active = 'active';
                                if ($photos) {
                                  $count = sizeof($photos);
                                }
                                if ($photos) {
                                    for ($i = 0; $i < $count; $i++) {
                                        $photoArray = $photos[$i]['slider_img_photos'];

                                        $lastIt = sizeof($photoArray) - 1;
                                        $link = wp_get_attachment_image_src($photoArray[$lastIt], 'bigger');
                                        $src2 = $link[0];
                                        $position = $photos[position][$i];

                                        if ($i == 0) {
                                            $attrStyle = 'style';
                                        } else {
                                            $attrStyle = 'data-style';
                                        }
                                        ?>

                                        <div class="Photo <?php echo $active; ?>" <?php echo $attrStyle; ?>="background-image: url('<?php echo $src2; ?>'); background-position: <?php echo $position; ?>">
                                    </div>

                                    <?php
                                    $active = '';
                                }
                            }
                            ?>
                        </div>

                        <?php if ($count > 1) { ?>
                            <div class="NavArrow">
                                <div class="Container">
                                    <a class="Prev">
                                        <div class="Arrow">
                                            <svg x="0px" y="0px" width="43.061px" height="84.708px" viewBox="250.559 26 43.061 84.708" enable-background="new 250.559 26 43.061 84.708" xml:space="preserve">
                                            <polyline fill="none" stroke-width="1" stroke="#ffffff" stroke-miterlimit="10" points="293.266,110.354 251.266,68.354 293.266,26.354 "/>
                                            </svg>
                                        </div>
                                    </a>
                                    <a class="Next">
                                        <div class="Arrow">
                                            <svg x="0px" y="0px" width="43.061px" height="84.708px" viewBox="374.768 31.925 43.061 84.708" enable-background="new 374.768 31.925 43.061 84.708" xml:space="preserve">
                                            <polyline fill="none" stroke-width="1" stroke="#ffffff" stroke-miterlimit="10" points="375.122,32.279 417.122,74.279 375.122,116.279 "/>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="Nav">
                                <?php
                                $active = 'active';
                                if ($photos) {
                                    for ($i = 0; $i < $count; $i++) {
                                        echo '<a class="' . $active . '"></a>';
                                        $active = '';
                                    }
                                }
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="Tab SliderGallery" data-tab="3">
                        <div class="Photos">
                            <?php
                            $photos = get_post_meta($ActId, 'slider3_gallery', true);
                            $active = 'active';
                            if ($photos) {
                              $count = sizeof($photos);
                            }
                            if ($photos) {
                                for ($i = 0; $i < $count; $i++) {
                                    $photoArray = $photos[$i]['slider_img_photos'];

                                    $lastIt = sizeof($photoArray) - 1;
                                    $link = wp_get_attachment_image_src($photoArray[$lastIt], 'bigger');
                                    $src2 = $link[0];
                                    $position = $photos[$i][position];

                                    if ($i == 0) {
                                        $attrStyle = 'style';
                                    } else {
                                        $attrStyle = 'data-style';
                                    }
                                    ?>

                                    <div class="Photo <?php echo $active; ?>" <?php echo $attrStyle; ?>="background-image: url('<?php echo $src2; ?>'); background-position: <?php echo $position; ?>">
                                </div>

                                <?php
                                $active = '';
                            }
                        }
                        ?>
                    </div>
                    <?php if ($count > 1) { ?>
                        <div class="NavArrow">
                            <div class="Container">
                                <a class="Prev">
                                    <div class="Arrow">
                                        <svg x="0px" y="0px" width="43.061px" height="84.708px" viewBox="250.559 26 43.061 84.708" enable-background="new 250.559 26 43.061 84.708" xml:space="preserve">
                                        <polyline fill="none" stroke-width="1" stroke="#ffffff" stroke-miterlimit="10" points="293.266,110.354 251.266,68.354 293.266,26.354 "/>
                                        </svg>
                                    </div>
                                </a>
                                <a class="Next">
                                    <div class="Arrow">
                                        <svg x="0px" y="0px" width="43.061px" height="84.708px" viewBox="374.768 31.925 43.061 84.708" enable-background="new 374.768 31.925 43.061 84.708" xml:space="preserve">
                                        <polyline fill="none" stroke-width="1" stroke="#ffffff" stroke-miterlimit="10" points="375.122,32.279 417.122,74.279 375.122,116.279 "/>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="Nav">
                            <?php
                            $active = 'active';
                            if ($photos) {
                                for ($i = 0; $i < $count; $i++) {
                                    echo '<a class="' . $active . '"></a>';
                                    $active = '';
                                }
                            }
                            ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="Tab SliderGallery" data-tab="4">
                    <div class="Photos">
                        <?php
                        $photos = get_post_meta($ActId, 'slider4_gallery', true);
                         echo '<!-- <pre>',print_r($photos,1),'</pre> -->';
                        $active = 'active';
                        if ($photos) {
                          $count = sizeof($photos);
                        }
                        if ($photos) {
                            for ($i = 0; $i < $count; $i++) {
                                $photoArray = $photos[$i]['slider_img_photos'];

                                $lastIt = sizeof($photoArray) - 1;
                                $link = wp_get_attachment_image_src($photoArray[$lastIt], 'bigger');
                                $src2 = $link[0];
                                $position = $photos[position][$i];

                                if ($i == 0) {
                                    $attrStyle = 'style';
                                } else {
                                    $attrStyle = 'data-style';
                                }
                                ?>

                                <?php if(strlen($src2) > 0 ){ ?>
                                <div class="Photo <?php echo $active; ?>" <?php echo $attrStyle; ?>="background-image: url('<?php echo $src2; ?>'); background-position: <?php echo $position; ?>"></div>
                                <?php } ?>

                            <?php
                            $active = '';
                        }
                    }
                    ?>
                </div>
                <?php if ($count > 1) { ?>
                    <div class="NavArrow">
                        <div class="Container">
                            <a class="Prev">
                                <div class="Arrow">
                                    <svg x="0px" y="0px" width="43.061px" height="84.708px" viewBox="250.559 26 43.061 84.708" enable-background="new 250.559 26 43.061 84.708" xml:space="preserve">
                                    <polyline fill="none" stroke-width="1" stroke="#ffffff" stroke-miterlimit="10" points="293.266,110.354 251.266,68.354 293.266,26.354 "/>
                                    </svg>
                                </div>
                            </a>
                            <a class="Next">
                                <div class="Arrow">
                                    <svg x="0px" y="0px" width="43.061px" height="84.708px" viewBox="374.768 31.925 43.061 84.708" enable-background="new 374.768 31.925 43.061 84.708" xml:space="preserve">
                                    <polyline fill="none" stroke-width="1" stroke="#ffffff" stroke-miterlimit="10" points="375.122,32.279 417.122,74.279 375.122,116.279 "/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="Nav">
                        <?php
                        $active = 'active';
                        if ($photos) {
                            for ($i = 0; $i < $count; $i++) {
                                echo '<a class="' . $active . '"></a>';
                                $active = '';
                            }
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="TabsNav">
            <div class="Tab active"><?php echo get_post_meta($ActId, 'slider1_title', true); ?></div>
            <div class="Tab"><?php echo get_post_meta($ActId, 'slider2_title', true); ?></div>
            <div class="Tab"><?php echo get_post_meta($ActId, 'slider3_title', true); ?></div>
            <div class="Tab"><?php echo get_post_meta($ActId, 'slider4_title', true); ?></div>
            <div class="Clear"></div>
        </div>
        <div class="TabsContent">
            <div class="Tab active">
                <div class="Mask"></div>
                <div class="Content">
                    <div class="Cl Cl2-8">
                        <div class="Title"><?php echo get_post_meta($ActId, 'slider1_title', true); ?></div>
                    </div>
                    <?php echo generate_column(get_post_meta($ActId, 'slider1_description', true), 2, 'Cl Cl3-8'); ?>
                    <div class="Clear"></div>
                </div>
            </div>
            <div class="Tab">
                <div class="Mask"></div>
                <div class="Content">
                    <div class="Cl Cl2-8">
                        <div class="Title"><?php echo get_post_meta($ActId, 'slider2_title', true); ?></div>
                    </div>
                    <?php echo generate_column(get_post_meta($ActId, 'slider2_description', true), 2, 'Cl Cl3-8'); ?>
                    <div class="Clear"></div>
                </div>
            </div>
            <div class="Tab">
                <div class="Mask"></div>
                <div class="Content">
                    <div class="Cl Cl2-8">
                        <div class="Title"><?php echo get_post_meta($ActId, 'slider3_title', true); ?></div>
                    </div>
                    <?php echo generate_column(get_post_meta($ActId, 'slider3_description', true), 2, 'Cl Cl3-8'); ?>
                    <div class="Clear"></div>
                </div>
            </div>
            <div class="Tab">
                <div class="Mask"></div>
                <div class="Content">
                    <div class="Cl Cl2-8">
                        <div class="Title"><?php echo get_post_meta($ActId, 'slider4_title', true); ?></div>
                    </div>
                    <?php echo generate_column(get_post_meta($ActId, 'slider4_description', true), 2, 'Cl Cl3-8'); ?>
                    <div class="Clear"></div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>


        <div class="Section Amenities SliderGallery">
            <div class="Container">
                <div class="Cl Cl4-8 TableCell H330">
                    <div class="Photos">
                        <?php
                        $photos = get_post_meta($ActId, 'amenities_gallery', true);
                        $active = 'active';
                        if ($photos) {
                          $count = sizeof($photos);
                        }
                        if ($photos) {
                            for ($i = 0; $i < $count; $i++) {
                                $photoArray = $photos[$i]['amenities_img_photos'];

                                $lastIt = sizeof($photoArray) - 1;
                                $link = wp_get_attachment_image_src($photoArray[$lastIt], 'bigger');
                                $src2 = $link[0];
                                $position = $photos[$i][position];

                                if ($i == 0) {
                                    $attrStyle = 'style';
                                } else {
                                    $attrStyle = 'data-style';
                                }
                                ?>

                                <div class="Photo <?php echo $active; ?>" <?php echo $attrStyle; ?>="background-image: url('<?php echo $src2; ?>'); background-position: <?php echo $position; ?>">
                            </div>

                            <?php
                            $active = '';
                        }
                    }
                    ?>
                </div>
                <?php if ($count > 1) { ?>
                    <div class="NavArrow">
                        <a class="Prev">
                            <div class="Arrow">
                                <svg x="0px" y="0px" width="43.061px" height="84.708px" viewBox="250.559 26 43.061 84.708" enable-background="new 250.559 26 43.061 84.708" xml:space="preserve">
                                <polyline fill="none" stroke-width="1" stroke="#ffffff" stroke-miterlimit="10" points="293.266,110.354 251.266,68.354 293.266,26.354 "/>
                                </svg>
                            </div>
                        </a>
                        <a class="Next">
                            <div class="Arrow">
                                <svg x="0px" y="0px" width="43.061px" height="84.708px" viewBox="374.768 31.925 43.061 84.708" enable-background="new 374.768 31.925 43.061 84.708" xml:space="preserve">
                                <polyline fill="none" stroke-width="1" stroke="#ffffff" stroke-miterlimit="10" points="375.122,32.279 417.122,74.279 375.122,116.279 "/>
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div class="Nav">
                        <?php
                        $active = 'active';
                        if ($photos) {
                            for ($i = 0; $i < $count; $i++) {
                                echo '<a class="' . $active . '"></a>';
                                $active = '';
                            }
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
            <div class="Cl Cl4-8 TableCell PadT50 PadB50">
                <div class="Table">
                    <div class="TableCell">
                        <div class="Title PadClLeft30">Amenities</div>
                        <?php echo generate_column(get_post_meta($ActId, 'amenities_description', true), 2, 'Cl Cl4-8'); ?>
                        <div class="Clear"></div>
                    </div>
                </div>
            </div>
            <div class="Clear"></div>
        </div>
        </div>

        <?php if (sizeof($floorplanArray) > 0) { ?>
            <div class="Section Floorplans" data-slide="0">
                <div class="Container">
                    <div class="Nav Prev">
                        <svg x="0px" y="0px" width="8.304px" height="17.917px" viewBox="0 0 8.304 17.917" enable-background="new 0 0 8.304 17.917" xml:space="preserve">
                        <polygon fill="#000" points="8.304,9.013 8.304,0 0,9.013 8.304,17.917 "/>
                        </svg>
                    </div>
                    <div class="Nav Next">
                        <svg x="0px" y="0px" width="8.304px" height="17.917px" viewBox="0 0 8.304 17.917" enable-background="new 0 0 8.304 17.917" xml:space="preserve">
                        <polygon fill="#000" points="-0.001,8.903 -0.001,17.917 8.303,8.903 -0.001,0 "/>
                        </svg>
                    </div>
                    <div class="Cut">
                        <div class="Items" style="width: <?php echo sizeof($floorplanArray) * 100; ?>%">
                            <?php
                            $x = 0;
                            foreach ($floorplanArray as $value) {
                                if ($x == 0) {
                                    $attrStyle = 'style';
                                } else {
                                    $attrStyle = 'data-style';
                                }
                                ?>
                                <div class="Floorplan" style="width: <?php echo 100 / sizeof($floorplanArray); ?>%">
                                    <div class="Header">
                                        <div class="Size1">Floor Plans</div>
                                        <div class="Title"><?php echo $value[name]; ?></div>
                                        <div class="Size1">Area <?php echo $value[area]; ?> SQ.FT</div>
                                    </div>
                                    <div class="Pic" <?php echo $attrStyle; ?>="background-image: url('<?php echo $value[pic]; ?>')">
                                    <?php if ($x == 0) { ?>
                                             <img class="Buffor" data-src="<?php echo $value[pic]; ?>" />
                                             <?php } ?>
                                    </div>
                                </div>
                                <?php
                                $x++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="Section Eco">
            <div class="Container">
                <div class="Cl Cl4-8 TableCell">
                    <div class="Table">
                        <div class="TableCell textCenter">
                            <img src="<?php bloginfo('template_url'); ?>/assets/buildings/Tmp5.png" />
                        </div>
                    </div>
                </div>
                <div class="Cl Cl4-8 TableCell">
                    <?php echo generate_column(get_post_meta($ActId, 'eco_description', true), 2, 'Cl Cl4-8'); ?>
                </div>
                <div class="Clear"></div>
            </div>
        </div>


        <script>
            var Markers = [
        <?php
        echo "['-1', " . get_post_meta($ActId, 'address', true)['address_latLang'] . ", 'imageMain','" . get_the_title($ActId) . "','" . get_the_permalink($ActId) . "',''],";

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

            if ($ActId != $idNow)
                echo "['0', " . get_post_meta($idNow, 'address', true)['address_latLang'] . ", 'imageMainSmall','" . get_the_title($idNow) . "','" . get_the_permalink($idNow) . "','" . get_post_meta($idNow, 'address', true)['address_side'][0] . "'],";

        endwhile;
        ?>


        <?php
        $mapArray = get_post_meta($ActId, 'Map', true);
        for ($index = 0; $index < count($mapArray[latLang]); $index++) {
            if ($mapArray[latLang][$index] != '' && $mapArray[latLang][$index] != 'undefined,undefined')
                echo "['" . $index . "', " . $mapArray[latLang][$index] . ", 'imageOther','" . $mapArray[title][$index] . "','" . $mapArray[link][$index] . "','']";
        }
        ?>
            ];
        </script>
        <div class="Section Map">
            <a class="ZoomMap In">+</a>
            <a class="ZoomMap Out">-</a>
            <?php $post_Id = get_post($ActId); ?>
            <div class="MapContent" id="Map<?php echo $post_Id->post_name; ?>" data-center="<?php echo get_post_meta($ActId, 'address', true)['address_latLang']; ?>"></div>
        </div>
        </div>

        <?php
    endwhile;
endif;

get_footer();
?>
