<?php
global $u_agent, $ieVersion, $Horror, $deviceType;
$u_agent = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('/linux/i', $u_agent)) {
    $platform = 'linux';
} elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
    $platform = 'mac';
} elseif (preg_match('/windows|win32/i', $u_agent)) {
    $platform = 'windows';
}

if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
    $bname = 'ie';
    $ub = "ie";
} elseif (preg_match('/Firefox/i', $u_agent)) {
    $bname = 'firefox';
    $ub = "firefox";
} elseif (preg_match('/Chrome/i', $u_agent)) {
    $bname = 'chrome';
    $ub = "chrome";
} elseif (preg_match('/Safari/i', $u_agent)) {
    $bname = 'safari';
    $ub = "safari";
} elseif (preg_match('/Opera/i', $u_agent)) {
    $bname = 'opera';
    $ub = "opera";
}

global $actId;
$actId = get_the_ID();

$ieVersion = 'ieNo';
$Horror = '';

if ($bname == "ie") {
    preg_match('/MSIE (.*?);/', $u_agent, $matches);
    if (count($matches) > 1) {
        $ieOld = $matches[1];

        if ($ieOld <= 9) {
            $ieVersion = 'ie ieOld';
        } else {
            $ieVersion = 'ie Noeffect';
        }

        if ($ieOld <= 7) {
            $Horror = 'Horror';
        }
    }
}
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) {
    $ieVersion = 'ie ie11';
}

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
global $deviceType;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

global $Content;
$Content = array();

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

} else {
    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html xmlns:fb="http://ogp.me/ns/fb#" class="WpReset" lang="en-EN">
    <head profile="http://gmpg.org/xfn/11">

        <title><?php wp_title('|', true, 'right'); ?></title>
        <?php wp_head(); ?>
        <!-- update 2017 -->
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NK6ML9J');</script>
        <!-- End Google Tag Manager -->


        <meta name="Content-language" content="en" />
        <meta name="viewport" width="device-width"  content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" />
        <meta http-equiv="X-UA-Compatible" content="IE=9">
        <meta name="google-site-verification" content="8GQU3vyBNYMBDCCfuJobN9T4I88dwrUovtcBmNAx6YM" />

        <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animations.css?v=<?php echo date('U'); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css?v=<?php echo date('U'); ?>" />
        <link href="<?php bloginfo('template_url'); ?>/favicon.gif" rel="SHORTCUT ICON" />

        <script src="<?php bloginfo('template_url'); ?>/js/jquery.tools.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery.tinyscrollbar.js?v=<?php echo date('U'); ?>" type="text/javascript"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery.mousewheel.js?v=<?php echo date('U'); ?>" type="text/javascript"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/ion.rangeSlider.min.js"></script>

        <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a60b8fefcbedb3d"></script> -->

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBks4yg4LG9xwrrOfxD8TjwUtgNg_jSR3E&v=3.exp"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/infobox.js" type="text/javascript"></script>

        <script src="<?php bloginfo('template_url'); ?>/js/jquery.ba-hashchange.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.js"></script>

        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.animateNumber.js"></script>

        <?php if ($deviceType == 'computer' || $deviceType == 'tablet') { ?>
        <script src="<?php bloginfo('template_url'); ?>/js/video.js"></script>
        <script>videojs.options.flash.swf = "<?php bloginfo('template_url'); ?>/js/video-js.swf";</script>
        <?php } ?>


        <?php if ($Horror != 'Horror') { ?>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery.history.min.js" type="text/javascript"></script>
        <?php } ?>

        <script type="text/javascript">
            var domainHome = "<?php bloginfo('home'); ?>";
            var domainTemplate = "<?php bloginfo('template_url'); ?>";
        </script>

        <script type="text/javascript">
            var PageClass = 'home homeReady buildings buildingsReady other otherReady <?php
            $my_query = new WP_Query(
            array(
            'post_type' => 'page',
            'post_parent' => 0,
            'posts_per_page' => -1,
            'order' => "DESC",
            'orderby' => 'date',
            'ignore_sticky_posts' => 0,
            'post_status' => 'publish'
            )
            );
            while ($my_query->have_posts()) : $my_query->the_post();
            $idShow = $post->ID;
            echo get_the_slug($idShow) . ' ';
            echo get_the_slug($idShow) . 'Ready ';
            endwhile;

            $my_query = new WP_Query(
            array(
            'post_type' => 'buildings',
            'orderby' => 'title',
            'posts_per_page' => -1,
            'order' => 'DESC',
            'ignore_sticky_posts' => 1,
            'post_status' => 'publish'
            )
            );
            $x = 0;
            while ($my_query->have_posts()) : $my_query->the_post();
            $idShow = $post->ID;
            echo get_the_slug($idShow) . ' ';
            echo get_the_slug($idShow) . 'Ready ';
            endwhile;
            ?>';




            var PageAll = 'home buildings other <?php
            $my_query = new WP_Query(
            array(
            'post_type' => 'page',
            'post_parent' => 0,
            'posts_per_page' => -1,
            'order' => "DESC",
            'orderby' => 'date',
            'ignore_sticky_posts' => 0,
            'post_status' => 'publish'
            )
            );
            while ($my_query->have_posts()) : $my_query->the_post();
            $idShow = $post->ID;
            echo get_the_slug($idShow) . ' ';
            endwhile;

            $my_query = new WP_Query(
            array(
            'post_type' => 'buildings',
            'orderby' => 'title',
            'posts_per_page' => -1,
            'order' => 'DESC',
            'ignore_sticky_posts' => 1,
            'post_status' => 'publish'
            )
            );
            $x = 0;
            while ($my_query->have_posts()) : $my_query->the_post();
            $idShow = $post->ID;
            echo get_the_slug($idShow) . ' ';
            endwhile;
            ?>thank-you';
        </script>
        <script src="<?php bloginfo('template_url'); ?>/js/script.js?v=<?php echo date('U'); ?>" type="text/javascript"></script>


        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-44670644-1', 'postrents.com');
            ga('send', 'pageview');

        </script>

    <?php
    wp_reset_postdata();

    $phone_num = '';
    $phone_label = '';

    switch( get_the_ID() ) {

    // Roosevelt Edition
        case 56062:
        $phone_num = '215-586-4099';
        $phone_label = 'IraoCKa4-WsQtKa-1AM';
        break;

    // Presidential City
        case 231:
        $phone_num = '(215) 987-5848';
        $phone_label = 'vNoLCI2U_msQtKa-1AM';
        break;

    // Rittenhouse Hill
        case 229:
        $phone_num = '(215) 987-5896';
        $phone_label = 'IGV0COz1-msQtKa-1AM';
        break;

    // Pastorius Court
        case 200:
        $phone_num = '(215) 987-5761';
        $phone_label = 'eIusCLKi4msQtKa-1AM';
        break;

    // Goldtex
        case 65:
        $phone_num = '(215) 839-1042';
        $phone_label = 'yQyHCL70-msQtKa-1AM';
        break;

    // Delmar Morris
        case 230:
        $phone_num = '(215) 987-5849';
        $phone_label = '8uFmCM2i4msQtKa-1AM';
        break;

    // Garden Court
        case 1046:
        $phone_num = '(215) 987-5996';
        $phone_label = '3_7oCNml4msQtKa-1AM';
        break;

    // Roosevelt
        case 1041:
        $phone_num = '(215) 839-1034';
        $phone_label = 'vkKUCJPA-WsQtKa-1AM';
        break;

    }

    if( !empty($phone_num)) { ?>

    <!-- Google Call Extension -->
    <!--script type="text/javascript">
        (function(a,e,c,f,g,h,b,d){var k={ak:"982487860",cl:"<?php echo $phone_label; ?>",autoreplace:"<?php echo $phone_num; ?>"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[g]||(a[g]=k.ak);b=e.createElement(h);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(h)[0];d.parentNode.insertBefore(b,d);a[f]=function(b,d,e){a[c](2,b,k,d,null,new Date,e)};a[f]()})(window,document,"_googWcmImpl","_googWcmGet","_googWcmAk","script");
    </script>
    <!-- /Google Call Extension -->

    <?php } ?>

</head>
<?php
if($post->post_type == 'press'){
  $overlay = 'overlay';
}
?>
<body <?php body_class( [ 'Hide', $deviceType, $bname, 'ieOld', $Horror, $overlay, $platform ] ); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NK6ML9J"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="Rotate"></div>
    <div class="Loader Main">
        <div class="Background">
            <div class="Cut">
                <div class="Table">
                    <div class="TableCell">
                        <div class="Logo"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="OverlayClient">
        <div class="Table">
            <div class="TableCell">
                <div class="Mask"></div>
                <div class="Box">
                    <div class="Header">Select Property</div>
                    <div class="List">
                        <a target="_blank" href="https://postrents.securecafe.com/residentservices/260-south/userlogin.aspx">
                            1401 Spruce Management
                        </a>
                        <a target="_blank" href="https://postrents.securecafe.com/residentservices/delmar-morris/userlogin.aspx">
                            Delmar Morris Management
                        </a>
                        <a target="_blank" href="https://postrents.securecafe.com/residentservices/goldtex/userlogin.aspx">
                            Goldtex Management
                        </a>
                        <a target="_blank" href="https://postrents.securecafe.com/residentservices/pastorius-court/userlogin.aspx">
                            Pastorius Court Management
                        </a>
                        <a target="_blank" href="https://postrents.securecafe.com/residentservices/presidential-city/userlogin.aspx">
                            Presidential City Management
                        </a>
                        <a target="_blank" href="https://postrents.securecafe.com/residentservices/rittenhouse-hill/userlogin.aspx">
                            Rittenhouse Hill Management
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Background">
        <div class="LeftSide"></div><div class="RightSide"></div>
    </div>
    <div id="Header">
        <div class="Container">
            <?php
            $activeStatus = false;
            $active = '';
            if ($actId == 19) {
                $activeStatus = true;
                $active = 'active';
            }
            $Content['home'] = $active;

            $Content['other'] = '';

            $my_query = new WP_Query(
                array(
                    'post_type' => 'buildings',
                    'orderby' => 'title',
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                    'ignore_sticky_posts' => 1,
                    'post_status' => 'publish'
                    )
                );
            $x = 0;
            while ($my_query->have_posts()) : $my_query->the_post();
            $active = '';
            if ($actId == $post->ID) {
                $activeStatus = true;
                $active = 'active';
            }
            $Content[get_the_slug($idNow)] = $active;
            endwhile;

            wp_reset_query();
            $my_query = new WP_Query(
                array(
                    'post_type' => 'page',
                    'orderby' => 'title',
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                    'ignore_sticky_posts' => 1,
                    'post_status' => 'publish'
                    )
                );
            $x = 0;
            while ($my_query->have_posts()) : $my_query->the_post();

            if (get_the_slug($idNow) != 'postbrothers') {

                $active = '';
                if ($actId == $post->ID) {
                    $activeStatus = true;
                    $active = 'active';
                }
                $Content[get_the_slug($idNow)] = $active;
            }
            endwhile;


            if ($activeStatus == false) {
                $Content['other'] = 'active';
            }
                    //echo $activeStatus . '<pre>', print_r($Content, 1), '</pre>';
            ?>

            <div class="Cl Cl2-8 ClLogo PadClLeft20 ">
                <a class="Logo LoadAjax" href="<?php bloginfo('home'); ?>" data-slug="home"></a>
            </div>

            <?php
            $items = wp_get_nav_menu_items('Menu');
            foreach ($items as $item) {
                $active = '';
                if ($actId == $item->object_id) {
                    $active = 'active';
                }
                $title = explode(' ', $item->title);

                $class = '';
                if (!$title[1])
                    $class = 'MargT';

                //echo '<a class="Pos LoadAjax Id' . $item->object_id . ' ' . $active . ' ' . $item->classes[0] . ' ' . $class . '" href="' . $item->url . '" data-slug="' . get_the_slug($item->object_id) . '">' . $title[0] . '<br />' . $title[1] . '</a>';
            }
            ?>

            <a class="Pos LoadAjax Id5   " href="<?php bloginfo('home'); ?>/our-properties" data-slug="our-properties">Our<br>Properties</a>
            <a class="Pos LoadAjax Id9   " href="<?php bloginfo('home'); ?>/about-company" data-slug="about-company">About<br>Company</a>
            <a class="Pos LoadAjax Id13   " href="<?php bloginfo('home'); ?>/social-responsibilities" data-slug="social-responsibilities">Social<br>Responsibilities</a>
            <a class="Pos LoadAjax Id20918   " href="<?php bloginfo('home'); ?>/news-press" data-slug="news-press">News <br>& Press</a>
            <a class="Pos LoadAjax Id17   MargT" href="<?php bloginfo('home'); ?>/contact" data-slug="contact">Contact<br></a>

            <a class="Client ActionManagement">
                <div class="Text">Existing<br />Residents</div>
                <div class="Icon">
                    <svg x="0px" y="0px" width="40px" height="40.188px" viewBox="0 0 40 40.188" enable-background="new 0 0 40 40.188" xml:space="preserve">
                        <path d="M10.658,30.188h18.685c0-1.951-1.512-6.229-4.803-7.476c-1.268,1.001-2.84,1.556-4.492,1.556
                        c-1.67,0-3.258-0.566-4.531-1.588C12.157,23.912,10.658,28.221,10.658,30.188z"/>
                        <circle cx="20.048" cy="17.013" r="5.442"/>
                    </svg>
                </div>
            </a>
            <div class="Clear"></div>
            <div class="BtSwitch"></div>
            <div class="MenuMobile">
              <a class="LoadAjax Line2" href="<?php bloginfo('home'); ?>/our-properties" data-slug="our-properties">Our<br>Properties</a>
              <a class="LoadAjax Line2" href="<?php bloginfo('home'); ?>/about-company" data-slug="about-company">About<br>Company</a>
              <a class="LoadAjax Line2" href="<?php bloginfo('home'); ?>/social-responsibilities" data-slug="social-responsibilities">Social<br>Responsibilities</a>
              <a class="LoadAjax Line2" href="<?php bloginfo('home'); ?>/news-press" data-slug="news-press">News <br>& Press</a>
              <a class="LoadAjax Line1" href="<?php bloginfo('home'); ?>/contact" data-slug="contact">Contact<br></a>

                <?php
                foreach ($items as $item) {
                    $title = explode(' ', $item->title);

                    $class = 'Line2';
                    if (!$title[1])
                        $class = 'Line1';
                    //echo '<a class="LoadAjax ' . $class . '" href="' . $item->url . '" data-slug="' . get_the_slug($item->object_id) . '">' . $title[0] . '<br />' . $title[1] . '</a>';
                }
                ?>
            </div>
        </div>
    </div>
    <div id="Contents" class="">
        <div class="Space">
            <?php arsort($Content); ?>
            <?php
            foreach ($Content as $key => $value) {
                $loaded = 'true';
                if ($key == 'other')
                    $loaded = '';
                echo '<div class="Content pt-page" data-content="' . $key . '" data-active="active" data-loaded="' . $loaded . '">';
                unset($Content[$key]);
                break;
            }
            ?>

            <?php } ?>
