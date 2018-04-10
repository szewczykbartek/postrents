<?php

/*
  Title: Param
  Template: tpl_about
 */


piklist('field', array(
    'type' => 'text',
    'field' => 'aboutHeaderTitle',
    'label' => 'Header Title',
));
piklist('field', array(
    'type' => 'editor',
    'field' => 'aboutHeaderText',
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
    'type' => 'editor',
    'field' => 'aboutHistory',
    'label' => 'History',
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
    'type' => 'editor',
    'field' => 'aboutInvestors',
    'label' => 'Investors',
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
    , 'field' => 'aboutTeam'
    , 'columns' => 12
    , 'add_more' => true
    , 'label' => 'Team'
    , 'fields' => array(
        array(
            'type' => 'file'
            , 'field' => 'teamPhoto'
            , 'label' => 'Photo'
            , 'columns' => 12
            , 'options' => array(
                'modal_title' => __('Add picture', 'piklist')
                , 'button' => __('Add', 'piklist')
            )
        ),
        array(
            'type' => 'text'
            , 'field' => 'teamName'
            , 'label' => 'Name'
            , 'columns' => 6
        ),
        array(
            'type' => 'text'
            , 'field' => 'teamPosition'
            , 'label' => 'Position'
            , 'columns' => 6
        ),
        array(
            'type' => 'textarea'
            , 'field' => 'teamDescription'
            , 'label' => 'Description'
            , 'columns' => 12
        )
    )
));


piklist('field', array(
    'type' => 'group'
    , 'field' => 'aboutCareers'
    , 'columns' => 12
    , 'add_more' => true
    , 'label' => 'Careers'
    , 'fields' => array(
        array(
            'type' => 'text'
            , 'field' => 'careersName'
            , 'label' => 'Name'
            , 'columns' => 12
        ),
        array(
            'type' => 'textarea'
            , 'field' => 'careersDescription'
            , 'label' => 'Description'
            , 'columns' => 12
        )
    )
));



