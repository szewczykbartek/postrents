<?php
get_header();

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
  include 'inc_pressSingle.php';
} else {
  include 'tpl_press.php';
}
?>

<?php
get_footer();
?>
