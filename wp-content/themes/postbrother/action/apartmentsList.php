<html>
    <body>
        <?php
        define('WP_USE_THEMES', false);
        require('../../../../wp-blog-header.php');
        include_once(ABSPATH . WPINC . '/post.php');
        include_once(ABSPATH . WPINC . '/functions.php');


        $buildArray = array();
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
            $idNowBuilding = $post->ID;

            $building = $post->post_name;

            $buildArray[$idNowBuilding] = '';

            echo '<h1><b>' . $building . '</b></h2>';
            ?>

         <?php
            $meta_query[] = array(
                'relation' => 'AND',
                'key' => 'building',
                'value' => $idNowBuilding,
                'compare' => '=',
                'type' => 'numeric'
            );
            $myqueryApartments = new WP_Query(
                    array(
                'post_type' => 'apartments',
                'posts_per_page' => -1,
                'order' => "ASC",
                'orderby' => "title",
                'ignore_sticky_posts' => 1,
                'post_status' => 'publish',
                'meta_query' => $meta_query,
                    )
            );

            while ($myqueryApartments->have_posts()) : $myqueryApartments->the_post();
                $idNow = $post->ID;
                ?>

                <div><?php echo get_the_title($idNow) . ' (' . $idNow . ')'; ?></div>
                <div>Building: <?php echo get_post_meta($idNow, 'building', true); ?> </div>
                <div>District: <?php echo get_post_meta($idNow, 'district', true); ?> </div>
                <div>Count: <?php echo get_post_meta($idNow, 'AvailableUnitsCount', true); ?> </div>
                <br /><br />

                <?php
            endwhile;
            unset($meta_query);
            ?>


        <?php endwhile; ?>
    </body>
</html>
