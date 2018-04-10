<?php
get_header();
?>

<?php include 'inc_googleadservices.php'; ?>
<div class="Page Blog">
    <div class="Section Start">
        <div class="Photo"></div>
        <div class="Container">
            <div class="Breadcrumb">
                <a class="LoadAjax" href="<?php bloginfo('home'); ?>">Home</a> / <a class="LoadAjax" href="<?php bloginfo('home'); ?>/blog">Blog</a>
            </div>
        </div>
    </div>
    <div class="Section One">
        <div class="Container">
            <div class="PostOne">
                <div class="Text">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            ?>

                            <div class="Date"><?php echo the_time('jS F, Y'); ?></div>
                            <div class="Title"><?php echo the_title($idNow); ?></div>

                            <?php
                            $image_id = get_post_thumbnail_id(get_the_ID());
                            $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                            ?>
                            <div class="Picture" style="background-image: url('<?php echo $image_url[0]; ?>')"></div>

                            <div class="Txt"><?php the_content(); ?></div>

                            <a class="Bt LoadAjax" href="<?php bloginfo('home'); ?>/blog">Go Back</a>

                            <?php comments_template( '', true ); ?>

                            <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>



<?php
get_footer();
?>
