<?php
/*
  Title: Lead
  Post Type: post242
 */

piklist('field', array(
    'type' => 'editor',
    'field' => 'contentFirst',
    'label' => 'Lead'
));

piklist('field', array(
     'type' => 'radio',
     'field' => 'contentFirstEnable',
     'label' => 'Enable Lead Paragraph',
     'value' => 'off',
     'choices' => array(
       'off' => 'Off'
       ,'on' => 'On'
     )
 ));
