<?php

/*
  Title: Data
  Template: tpl_contact
 */


piklist('field', array(
    'type' => 'group'
    , 'field' => 'contact'
    , 'label' => 'Contact property manager'
    , 'columns' => 12
    , 'add_more' => true
    , 'fields' => array(
        array(
            'type' => 'text'
            , 'field' => 'title'
            , 'label' => 'Title'
            , 'columns' => 12
        )
        , array(
            'type' => 'editor'
            , 'field' => 'text'
            , 'label' => 'Text'
            , 'columns' => 12
        )
    )
));