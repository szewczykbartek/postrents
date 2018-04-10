<?php
if (function_exists('add_image_size'))
    add_theme_support('post-thumbnails');

if (function_exists('add_image_size'))
    add_image_size('bigger', 1800, 1800);

apply_filters('the_content', get_the_content());

function disableAutoSave() {
    wp_deregister_script('autosave');
}



add_action( 'init', 'my_custom_init' );
function my_custom_init() {
	remove_post_type_support( 'press', 'editor' );
  remove_post_type_support( 'press', 'custom-fields' );
  //remove_post_type_support( 'post', 'editor' );
  //remove_post_type_support( 'post', 'custom-fields' );
}

add_filter('wpseo_metabox_prio', 'move_yoast_metabox_to_bottom');
function move_yoast_metabox_to_bottom() {
  return 'low';
}


add_action('do_meta_boxes', 'replace_featured_image_box');
function replace_featured_image_box()
{
    remove_meta_box( 'postimagediv', 'buildings', 'side' );
    add_meta_box('postimagediv', __('Projects Page Thumb'), 'post_thumbnail_meta_box', 'buildings', 'side', 'low');
}




add_action('wp_print_scripts', 'disableAutoSave');

function getTemplatePart($folder = null, $name = null, array $params = array()) {
    global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

    do_action("get_template_part_{$name}", $folder, $name);
    $templates = array();

    if (isset($folder))
        $templates[] = "{$folder}/{$name}.php";

    $templates[] = "{$name}.php";

    $_template_file = locate_template($templates, false, false);

    if (is_array($wp_query->query_vars)) {
        extract($wp_query->query_vars, EXTR_SKIP);
    }
    extract($params, EXTR_SKIP);

    require($_template_file);
}

function limit_words($string, $word_limit) {
    $words = explode(' ', $string);
    return implode(' ', array_slice($words, 0, $word_limit));
}

//
// GENERATE COLUMN
//

function generate_column($string, $column, $className) {

    $pos = strpos($string, '==column==');

    if ($pos === false) {

        $words = explode(' ', $string);
        $countWords = count($words);
        $countForColumn = ceil($countWords / $column);
        $countForColumnLast = $countWords - $countForColumn * ($column - 1);

        if ($column == 2)
            $cl = 'Cl Cl4-8';
        if ($column == 3)
            $cl = 'Cl Cl1-3';

        if ($className != '')
            $cl = $className;

        // column
        for ($i = 0; $i < ($column - 1); $i++) {
            echo '<div class="' . $cl . ' PadClLeft30 PadClRight30">';
            $display = array_slice($words, ($countForColumn * $i), $countForColumn);
            foreach ($display as $value) {
                echo $value . ' ';
            }
            echo '</div>';
        }
        // last column
        $display = array_slice($words, ($countWords - $countForColumnLast), $countForColumnLast);
        echo '<div class="' . $cl . ' PadClLeft30 PadClRight30">';
        foreach ($display as $value) {
            echo $value . ' ';
        }
        echo '</div>';
    } else {

        $stringArray = preg_split("/==column==/", $string);

        if (sizeof($stringArray) == 2)
            $cl = 'Cl Cl4-8';
        if (sizeof($stringArray) == 3)
            $cl = 'Cl Cl1-3';

        if ($className != '')
            $cl = $className;

        foreach ($stringArray as $value) {
            echo '<div class="' . $cl . ' PadClLeft30 PadClRight30">' . $value . '</div>';
        }
    }
}

function get_the_slug($id = null) {
    if (empty($id)):
        global $post;
        if (empty($post))
            return '';
        $id = $post->ID;
    endif;

    $slug = basename(get_permalink($id));
    return $slug;
}

register_nav_menus(array('menuleft' => __('Menu'),));



// page

add_action('admin_init', 'hide_editor');

function hide_editor() {
    remove_post_type_support('page', 'editor');
}

//
// PAGES Product
//

function wpse_178112_permastruct_html($post_type, $args) {
    if ($post_type === 'template') {
        add_permastruct($post_type, "{$args->rewrite['slug']}/%$post_type%.html", $args->rewrite);
    }
    if ($post_type === 'page') {
        add_permastruct($post_type, "{$args->rewrite['slug']}/%$post_type%/", $args->rewrite);
    }
}

add_action('registered_post_type', 'wpse_178112_permastruct_html', 10, 2);


add_filter('piklist_post_types', 'demo_post_type');

function demo_post_type($post_types) {
  $labels = array(
  	'name' => _x( 'News & Press', 'post type general name', 'your-plugin-textdomain' ),
  	'singular_name' => _x( 'News & Press', 'post type singular name', 'your-plugin-textdomain' ),
  	'menu_name' => _x( 'News & Press', 'admin menu', 'your-plugin-textdomain' ),
  );


  $post_types['press'] = array(
      'labels' => $labels,
      'title' => 'Add',
      'public' => true,
      'rewrite' => array('slug' => 'press'),
      'supports' => array('title', 'thumbnail')
  );
    $post_types['buildings'] = array(
        'labels' => piklist('post_type_labels', 'Buildings'),
        'title' => 'Add',
        'public' => true,
        'rewrite' => array('slug' => 'buildings'),
        'supports' => array('title', 'thumbnail')
    );

    $post_types['apartments'] = array(
        'labels' => piklist('post_type_labels', 'Apartments'),
        'title' => 'Add',
        'public' => true,
        'rewrite' => array('slug' => 'apartments'),
        'supports' => array('title')
    );

    $post_types['template'] = array(
        'labels' => piklist('post_type_labels', 'Template'),
        'title' => 'Add',
        'public' => true,
        'rewrite' => array('slug' => '/', 'with_front' => false),
        'supports' => array('title')
    );

    return $post_types;
}

//add_action('init', 'my_cpt_init');
//function my_cpt_init() {
//    $args = array(
//        'public' => true,
//        'rewrite' => array('slug' => '/%postname%.html'),
//        'label' => 'Template'
//    );
//    register_post_type('template', $args);
//}

function my_rewrite_flush() {
    my_cpt_init();
    flush_rewrite_rules();
}

add_action('after_switch_theme', 'my_rewrite_flush');

///
/// Comment


function twentytwelve_comment($comment, $args, $depth) {
    if ('0' == $comment->comment_approved)
        return false;
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case 'pingback' :
        case 'trackback' :
            // Display trackbacks differently than normal comments.
            ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <p><?php _e('Pingback:', 'twentytwelve'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(__('(Edit)', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?></p>
                <?php
                break;
            default :
                // Proceed with normal comments.
                global $post;
                ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                    <header class="comment-meta comment-author vcard">
                        <?php
                        //echo get_avatar( $comment, 44 );
                        printf('<cite><b class="fn">%1$s</b> %2$s</cite>', get_comment_author_link(),
                                // If current post author is also comment author, make it known visually.
                                ( $comment->user_id === $post->post_author ) ? '<span>' . __('Post author', 'twentytwelve') . '</span>' : ''
                        );
                        printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>', esc_url(get_comment_link($comment->comment_ID)), get_comment_time('c'),
                                /* translators: 1: date, 2: time */ sprintf(__('%1$s at %2$s', 'twentytwelve'), get_comment_date(), get_comment_time())
                        );
                        ?>
                    </header><!-- .comment-meta -->

                    <?php if ('0' == $comment->comment_approved) : ?>
                        <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'twentytwelve'); ?></p>
                    <?php endif; ?>

                    <section class="comment-content comment">
                        <?php comment_text(); ?>
                        <?php edit_comment_link(__('Edit', 'twentytwelve'), '<p class="edit-link">', '</p>'); ?>
                    </section><!-- .comment-content -->

                    <div class="reply">
                        <?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'twentytwelve'), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                    </div><!-- .reply -->
                    <div class="cl"></div>
                </article><!-- #comment-## -->
                <?php
                break;
        endswitch; // end comment_type check
    }

// Admin remove

    function remove_menus() {
        //remove_menu_page('post.php');
        remove_menu_page('index.php');
        //remove_menu_page('edit.php');
        //remove_menu_page('edit.php?post_type=post');
        remove_menu_page('edit-comments.php');
        //remove_menu_page('themes.php');
        //remove_menu_page('plugins.php');
        remove_menu_page('users.php');
        //remove_menu_page('tools.php');
        //remove_menu_page('options-general.php');
    }

    add_action('admin_menu', 'remove_menus');



    add_action('admin_head', 'wpt_portfolio_icons');

    function wpt_portfolio_icons() {
        ?>
        <style type="text/css" media="screen">
            #menu-posts-apartments,
            #toplevel_page_piklist {
                display: none;
            }
            #wpfooter {
                display: none;
            }
        </style>
        <?php
    }

// Dashboard Reports

    add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

    function my_custom_dashboard_widgets() {
        global $wp_meta_boxes;

        wp_add_dashboard_widget('custom_reports_widget', 'Sync reports', 'custom_dashboard_reports');
    }

    function custom_dashboard_reports() {
        $dir = __DIR__ . '/action/cron/';
        $files = scandir($dir, 1);

        $c = 0;
        foreach ($files as $key => $value) {
            $name = explode('.', $value);


            $href = '';
            echo '<div><a target="_blank" href="http://www.postrents.com/wp-content/themes/postbrother/action/cron/' . $value . '">' . $name[0] . '</a></div>';
            $c++;
            if ($c > 10)
                break;
        }
        echo '<br /><br /><br /><a class="button button-primary button-large" href="http://www.postrents.com/wp-content/themes/postbrother/action/apartmentsGenerate.php" target="_blank">Sync Rentcafe Database manually</a>';
    }

    // Dashboard Email

    add_action('wp_dashboard_setup', 'emails_dashboard_widgets');

    function emails_dashboard_widgets() {
        global $wp_meta_boxes;

        wp_add_dashboard_widget('custom_emails_widget', 'Email form backup', 'custom_dashboard_emails');
    }

    function custom_dashboard_emails() {
        $dir = __DIR__ . '/mail/';
        $files = scandir($dir, 1);

        $c = 0;
        foreach ($files as $key => $value) {
            $name = explode('.', $value);


            $href = '';
            echo '<div><a target="_blank" href="http://www.postrents.com/wp-content/themes/postbrother/mail/' . $value . '">' . $name[0] . '</a></div>';
            $c++;
            if ($c > 30)
                break;
        }
    }
