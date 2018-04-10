<?php
/*
  Title: Param
  Post Type: template
 */




piklist('field', array(
    'type' => 'text',
    'field' => 'tplApartmentTitle',
    'label' => 'Apartment Title',
));
piklist('field', array(
    'type' => 'text',
    'field' => 'tplApartmentNameFirst',
    'label' => 'Apartment name<br />(First name)',
));
piklist('field', array(
    'type' => 'text',
    'field' => 'tplApartmentName',
    'label' => 'Apartment name',
));
piklist('field', array(
    'type' => 'editor'
    , 'field' => 'tplApartmentDescription'
    , 'label' => 'Description'
    , 'columns' => 12
    , 'options' => array(
        'wpautop' => true
        , 'media_buttons' => false
        , 'tabindex' => ''
        , 'editor_css' => ''
        , 'editor_class' => ''
        , 'teeny' => false
        , 'dfw' => false
        , 'tinymce' => true
        , 'quicktags' => false
    )
));

piklist('field', array(
    'type' => 'editor'
    , 'field' => 'tplApartmentDescription2'
    , 'label' => 'Description 2'
    , 'columns' => 12
    , 'options' => array(
        'wpautop' => true
        , 'media_buttons' => false
        , 'tabindex' => ''
        , 'editor_css' => ''
        , 'editor_class' => ''
        , 'teeny' => false
        , 'dfw' => false
        , 'tinymce' => true
        , 'quicktags' => false
    )
));