<?php include 'inc_googleadservices.php'; ?>
<div class="Page Press">
    <div class="Section Start">
        <div class="Photo"></div>
        <div class="Container">
            <div class="Breadcrumb">
                <a class="LoadAjax" href="<?php bloginfo('home'); ?>">Home</a> / News & Press
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
                    'post_type' => 'press',
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

                    <a class="Post actBlogOpen" href="<?php echo get_permalink($idNow); ?>">
                        <div class="Cl Text">
                            <div class="Title"><?php echo get_the_title($idNow); ?></div>
                            <div class="Date"><?php echo the_time('jS F, Y'); ?></div>
                            <div class="Excerpt"><?php echo the_excerpt($idNow); ?></div>
                            <div class="Bt">Read more</div>
                        </div>
                        <?php if($image_id){ ?>
                          <div class="Cl Picture" style="background-image: url('<?php echo $image_url[0]; ?>')"></div>
                        <?php }else{ ?>
                          <div class="Cl Picture"></div>
                        <?php } ?>
                        <div class="Clear"></div>
                    </a>

                    <?php
                    $x++;
                endwhile;
                ?>

            </div>
        </div>
    </div>

    <div class="PostOverlay">
      <div class="Load">
        <?php
        include 'inc_pressSingle.php';
        ?>
      </div>
  </div>
</div>
