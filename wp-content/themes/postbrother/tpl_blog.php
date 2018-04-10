<?php
/*
  Template Name: Blog
 */

get_header();
global $ActId, $ParentId;
?>

<?php include 'inc_googleadservices.php'; ?>
<div class="Page Blog">
    <div class="Section Start">
        <div class="Photo"></div>
        <div class="Container">
            <div class="Breadcrumb">
                <a class="LoadAjax" href="<?php bloginfo('home'); ?>">Home</a> / Blog
            </div>
            <div class="Inside">
                <div class="Table">
                    <div class="TableCell">
                        <div class="Title">Blog</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Section List">
        <div class="Container">
            <div class="Posts">
                <?php
                $x = 1;
                $myqueryPost = new WP_Query(
                        array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'order' => "DESC",
                    'orderby' => "date",
                    'ignore_sticky_posts' => 1,
                    'post_status' => 'publish'
                        )
                );
                while ($myqueryPost->have_posts()) : $myqueryPost->the_post();
                    $idNow = $post->ID;

                    $image_id = get_post_thumbnail_id($idNow);
                    $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                    ?>

                    <div class="Post">
                        <div class="Cl Text">
                            <div class="Date"><?php echo the_time('jS F, Y'); ?></div>
                            <div class="Title"><?php echo get_the_title($idNow); ?></div>
                            <div class="Excerpt"><?php echo the_excerpt($idNow); ?></div>
                            <a class="Bt LoadAjax" href="<?php echo get_permalink($idNow); ?>">Read more</a>
                        </div>
                        <a class="Cl Picture LoadAjax" style="background-image: url('<?php echo $image_url[0]; ?>')" href="<?php echo get_permalink($idNow); ?>"></a>
                        <div class="Clear"></div>
                    </div>

                    <?php
                    $x++;
                endwhile;
                ?>

            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>
