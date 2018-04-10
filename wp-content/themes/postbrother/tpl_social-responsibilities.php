<?php
/*
  Template Name: Social Responsibilities
 */

get_header();
global $actId, $ParentId;
?>

<?php include 'inc_googleadservices.php'; ?>
<div class="Page SocialResponsibilities">
    <div class="Section Start">
        <div class="Photo" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/social-responsibilities/Background.jpg')"></div>
        <div class="Container">
            <div class="Breadcrumb">
                <a class="LoadAjax" href="<?php bloginfo('home'); ?>">Home</a> / Social Responsibilities
            </div>
            <div class="Inside">
                <div class="Table">
                    <div class="TableCell">
                        <div class="Title"><?php echo get_post_meta($actId, 'socialHeaderTitle', true); ?></div>
                        <div class="Text"><?php echo get_post_meta($actId, 'socialHeaderText', true); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Section Content">
        <div class="Container">
            <div class="Mask"></div>
            <h1>Green Features</h1>

            <?php
            $features = get_post_meta($actId, 'socialFeatures', true);
            if ($features) {
                for ($i = 0; $i < sizeof($features); $i++) {
                    ?>

                    <div class="Cl Cl4-8 ">
                        <div class="Cl Cl4-8 PadClLeft30 PadClRight30">
                            <h2><?php echo $features[$i]['featuresName']; ?></h2>
                            <hr />
                        </div>
                        <div class="Cl Cl4-8 Text PadClLeft30 PadClRight30">
                            <?php echo $features[$i]['featuresDescription']; ?>
                        </div>
                        <div class="Clear"></div>

                    </div>

                    <?php
                    if ($i == 1 || $i == 3 || $i == 5 || $i == 7 || $i == 9)
                        echo '<div class="Clear"></div><div class="Enter"></div>';
                }
            }
            ?>
            <div class="Clear"></div>
        </div>
    </div>


    <div class="Section Footer" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/social-responsibilities/Background2.jpg')">
        <div class="Container">
            <div class="Mask"></div>
            <div class="Inside">
                <div class="Table">
                    <div class="TableCell">
                        <div class="Text">
                            <h2>Charity</h2>
                            <p class="Big">Post Brothers prides itself on giving back to the community, and regularly donates their time and money to non-profit and local groups across fields such as architecture, arts, community development, medical aid and research, education, youth development, athletics, and cultural awareness. </p>
                            <p>Post Brothers has provided donations to the following organizations and programs: the Asian Arts Initiative, Avenue of the Arts, Inc., the Callowhill Neighborhood Association, Cancer Foundation, Inc., CHAD, CultureWorks Greater Philadelphia, The Decathalon, Friends of Rail Park, Friends of Cloverly Park, Germantown United Community Corporation, Hidden City, Independence Mission Schools, the Kimmel Center, Mt. Airy, USA, PCDC, Scenic Philadelphia, St. Martin de Porres School, Drexel University Wrestling, Beat the Streets Philadelphia, and St. Thomas Aquinas.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>
