<?php
/*
  Title: Content
  Post Type: press
  Context: advanced
  Priority: high
  Order: 1
 */


piklist('field', array(
      'type' => 'textarea',
      'field' => 'extra_lead',
      'label' => 'Lead',
      'attributes' => array(
        'rows' => 10,
        'cols' => 50,
        'class' => 'large-text'
      )
));

piklist('field', array(
    'type' => 'radio',
    'field' => 'extra_lead_stat',
    'label' => 'Enable Lead Paragraph',
    'choices' => array(
      'off' => 'Off',
      'on' => 'On'
    )
));

 piklist('field', array(
     'type' => 'editor',
     'scope' => 'post',
     'field' => 'post_content',
     'label' => 'Content',
     'options' => array(
      'wpautop' => true,
      'media_buttons' => true,
      'shortcode_buttons' => true,
      'teeny' => false,
      'dfw' => false,
      'quicktags' => true,
      'drag_drop_upload' => true,
      'tinymce' => array(
        'resize' => false,
        'wp_autoresize_on' => true
      )
    )
 ));
