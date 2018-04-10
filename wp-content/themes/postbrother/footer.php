</div>

<?php
global $Content, $ActId;

foreach ($Content as $key => $value) {
    echo '<div class="Content pt-page" data-content="' . $key . '" data-loaded="false"></div>';
}
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
} else {
    ?>
    </div>
    </div>
    <div id="Footer">
        <div class="Container">
            <div class="Cl Cl1-8 PadClLeft15 PadClRight15">
                <div class="Header">Our<br />Properties</div>
            </div>
            <div class="Cl Cl1-8 PadClLeft15 PadClRight15">
                <div class="Link">
                    <?php
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
                        $idNow = $post->ID;

                        echo '<a class="LoadAjax" href="' . get_permalink($idNow) . '">' . get_the_title($idNow) . '</a>';
                    endwhile;
                    ?>
                </div>
            </div>
            <div class="Cl Cl1-8 PadClLeft15 PadClRight15">
                <div class="Header">About<br />Company</div>
            </div>
            <div class="Cl Cl1-8 PadClLeft15 PadClRight15">
                <div class="Link">
                    <a href="<?php bloginfo('home'); ?>/about-company">History</a>
                    <a href="<?php bloginfo('home'); ?>/about-company?e=our-team">Our Team</a>
                    <a href="<?php bloginfo('home'); ?>/about-company?e=investors">Investors</a>
                    <a href="<?php bloginfo('home'); ?>/about-company?e=careers">Careers</a>
                </div>
            </div>
            <div class="Cl Cl1-8 PadClLeft15 PadClRight15">
                <div class="Header">Social<br />Responsibilities</div>
            </div>
            <div class="Cl Cl1-8 PadClLeft15 PadClRight15">
                <div class="Link">
                    <a href="<?php bloginfo('home'); ?>/social-responsibilities">Green Features</a>
                    <a href="<?php bloginfo('home'); ?>/social-responsibilities">Donations & Charity</a>
                    <a href="<?php bloginfo('home'); ?>/social-responsibilities">Awards</a>
                    <a href="<?php bloginfo('home'); ?>/social-responsibilities">Community Development</a>
                </div>
            </div>
            <div class="Cl Cl1-8 PadClLeft15 PadClRight15">
                <div class="Header">Contact</div>
            </div>
            <div class="Cl Cl1-8 PadClLeft15 PadClRight15">
                <div class="Link">
                    <div class="Number">215-586-4111</div>
                    <a class="LoadAjax" href="<?php bloginfo('home'); ?>/contact">Contact Form</a>
                    <a class="ActionManagement">Existing Residences</a>
                    <a class="LoadAjax" href="<?php bloginfo('home'); ?>/blog">Blog</a>
                </div>
            </div>
            <div class="Clear"></div>
        </div>
    </div>
  </body>
</html>

<?php } ?>

<script type="text/javascript" src="https://s3.amazonaws.com/phonescript/phonedivwrapper_v1_3.js"></script>
<script type="text/javascript">
    addPhoneNumber("215", "839", "1042");
    addPhoneNumber("215", "586", "4111");
    addPhoneNumber("215", "987", "5848");
    addPhoneNumber("215", "987", "5996");
    addPhoneNumber("215", "987", "5896");
    addPhoneNumber("215", "987", "5761");
    addPhoneNumber("215", "987", "5849");
    addPhoneNumber("215", "839", "1034");
    replaceText("", "");
</script>
<script type="text/javascript" src="https://s3.amazonaws.com/phonescript/46428.js"></script>

<script type="text/javascript" src="//cdn.callrail.com/companies/305449415/d8a83e64cee07e0cfed0/12/swap.js"></script>
