<?php

/*
  Title: Param
  Template: tpl_social-responsibilities
 */


piklist('field', array(
    'type' => 'text',
    'field' => 'socialHeaderTitle',
    'label' => 'Header Title',
));
piklist('field', array(
    'type' => 'editor',
    'field' => 'socialHeaderText',
    'label' => 'Header Text',
    'columns' => 12
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
    'type' => 'group'
    , 'field' => 'socialFeatures'
    , 'columns' => 12
    , 'add_more' => true
    , 'label' => 'Features'
    , 'fields' => array(
        array(
            'type' => 'text'
            , 'field' => 'featuresName'
            , 'label' => 'Name'
            , 'columns' => 12
        ),
        array(
            'type' => 'textarea'
            , 'field' => 'featuresDescription'
            , 'label' => 'Description'
            , 'columns' => 12
        )
    )
));
