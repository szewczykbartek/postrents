<?php
global $actId;

$postOne  = get_post($actId);
$contentFirstAdmin = get_post_meta($actId, 'extra_lead', true);
$contentFirstEnable = get_post_meta($actId, 'extra_lead_stat', true);
//$contentFirstEnable = 'off';

if($contentFirstEnable == 'on'){
//if(strlen($contentFirstAdmin) > 0){
  $contentFirst = $contentFirstAdmin;
  $contentSecond = $postOne->post_content;
}else{
  preg_match_all('/<p.*?\>(.*?)<\/p>/si', $postOne->post_content, $matches);
  $contentFirst = '';
  $contentSecond = $postOne->post_content;

  // preg_match_all('/<p.*?\>(.*?)<\/p>/si', $postOne->post_content, $matches);
  // $contentFirst = strip_tags($matches[1][0]);
  // $contentSecond = '';
  // foreach ($matches[0] as $key => $value) {
  //   if($key != 0)
  //     $contentSecond .= $value;
  // }
}
?>

<div class="PressOne">
  <div class="Container">
    <?php
    $image_id = get_post_thumbnail_id($actId);
    $image_url = wp_get_attachment_image_src($image_id, 'full', true);
    if($image_id){
    ?>
      <div class="Picture" style="background-image: url('<?php echo $image_url[0]; ?>')"></div>
    <?php } ?>
    <?php
    if (have_posts()) :
    while (have_posts()) : the_post();
    ?>
      <div class="Info">
        <!-- <div class="Title"><?php echo $contentFirstEnable; ?></div> -->
        <div class="Title"><?php echo the_title(); ?></div>
        <div class="Date"><?php echo the_time('jS F, Y'); ?></div>
        <?php if($contentFirstEnable == 'on'){ ?>
          <div class="FirstParagraf"><?php echo $contentFirst; ?></div>
        <?php } ?>
        <div class="Social">
          <a class="BtFb actBlogSocial" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>">
            <svg x="0px" y="0px" width="13.3px" height="13.3px" viewBox="0 0 13.3 13.3" enable-background="new 0 0 13.3 13.3" xml:space="preserve">
               <path fill="#fff" stroke="none" d="M5,4.4H3.3v2.2H5v6.6h2.8V6.6h2L10,4.4H7.7V3.5c0-0.5,0.1-0.7,0.6-0.7H10V0H7.8C5.9,0,5,0.9,5,2.5V4.4z"/>
            </svg>
          Share
          </a>
          <a class="BtTwitter actBlogSocial" href="https://twitter.com/home?status=<?php echo get_permalink(); ?>">
            <svg x="0px" y="0px" width="13.3px" height="13.3px" viewBox="0 0 13.3 13.3" enable-background="new 0 0 13.3 13.3" xml:space="preserve">
            <path fill="#fff" stroke="none" d="M13.3,2.5c-0.5,0.2-1,0.4-1.6,0.4c0.6-0.3,1-0.9,1.2-1.5c-0.5,0.3-1.1,0.5-1.7,0.7c-0.5-0.5-1.2-0.9-2-0.9
            	c-1.8,0-3,1.6-2.7,3.3C4.3,4.5,2.3,3.4,0.9,1.7C0.2,3,0.6,4.6,1.8,5.4C1.3,5.4,0.9,5.2,0.5,5c0,1.3,0.9,2.4,2.2,2.7
            	c-0.4,0.1-0.8,0.1-1.2,0C1.8,8.9,2.8,9.6,4,9.7c-1.1,0.9-2.6,1.3-4,1.1C1.2,11.6,2.6,12,4.2,12c5.1,0,7.9-4.3,7.7-8.1
            	C12.4,3.5,12.9,3.1,13.3,2.5z"/>
            </svg>
          Tweet
          </a>
        </div>
      </div>
      <div class="Text">
        <div class="Txt"><?php echo $contentSecond; ?></div>
      </div>

    <?php
        endwhile;
      endif;
    ?>
  </div>
  <div class="Mask actBlogClose"></div>
</div>
