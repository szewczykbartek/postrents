<?php
/*
  Title: Param
  Post Type: buildings
 */


piklist('field', array(
    'type' => 'text',
    'field' => 'propertyCode',
    'label' => 'Property code',
));
piklist('field', array(
    'type' => 'text',
    'field' => 'managementLink',
    'label' => 'Management link',
));


piklist('field', array(
    'type' => 'group'
    , 'field' => 'address'
    , 'columns' => 12
    , 'label' => 'Address'
    , 'fields' => array(
        array(
            'type' => 'text'
            , 'field' => 'address_city'
            , 'label' => 'City'
            , 'columns' => 6
        )
        , array(
            'type' => 'text'
            , 'field' => 'address_street'
            , 'label' => 'Street'
            , 'columns' => 6
        )
        , array(
            'type' => 'select'
            , 'field' => 'address_districts'
            , 'label' => 'Districts'
            , 'columns' => 12
            , 'value' => 'center center'
            , 'choices' => array(
                'EastFalls' => 'East Falls'
                , 'Callowhill' => 'Callowhill'
                , 'WestMount Airy' => 'West Mount Airy'
                , 'CityAvenue' => 'City Avenue'
                , 'AvenueoftheArts' => 'Avenue of the Arts'
                , 'CenterCity' => 'Center City'
                , 'WestPhiladelphia' => 'West Philadelphia'
                , 'NorthBergen' => 'North Bergen'
                , 'UniversityCity' => 'University City'
            )
        )
        , array(
            'type' => 'text'
            , 'field' => 'phone'
            , 'label' => 'Phone'
            , 'columns' => 6
        )
        , array(
            'type' => 'text'
            , 'field' => 'www'
            , 'label' => 'WWW'
            , 'columns' => 6
        )
        , array(
            'type' => 'text'
            , 'field' => 'address_latLang'
            , 'label' => 'Coordinates'
            , 'columns' => 12
        )
        , array(
            'type' => 'html',
            'label' => 'Map',
            'value' => '<div class="MapMain"><img src="a" style="max-width: 100%" /></div>',
            'columns' => 12
        )
        , array(
            'type' => 'checkbox'
            , 'field' => 'address_side'
            , 'label' => 'Tooltip invert'
            , 'columns' => 6
            , 'choices' => array(
                'invert' => 'Invert (left)'
            )
        )
    )
));

piklist('field', array(
    'type' => 'editor'
    , 'field' => 'seo_text'
    , 'label' => 'Seo Text'
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
    'type' => 'file'
    , 'field' => 'cover'
    , 'label' => 'Home Page Thumb'
    , 'columns' => 12
    , 'options' => array(
        'modal_title' => __('Add picture', 'piklist')
        , 'button' => __('Add', 'piklist')
    )
));






piklist('field', array(
    'type' => 'group'
    , 'field' => 'gallery'
    , 'label' => 'Gallery (top)'
    , 'columns' => 12
    , 'add_more' => true
    , 'fields' => array(
        array(
            'type' => 'file'
            , 'field' => 'photos'
            , 'label' => 'Photos'
            , 'columns' => 6
            , 'options' => array(
                'modal_title' => __('Add picture', 'piklist')
                , 'button' => __('Add', 'piklist')
            )
        )
        , array(
            'type' => 'select'
            , 'field' => 'position'
            , 'label' => 'Position'
            , 'columns' => 4
            , 'value' => 'center center'
            , 'choices' => array(
                'top left' => 'Top Left'
                , 'top center' => 'Top Center'
                , 'top right' => 'Top Right'
                , 'center left' => 'Center Left'
                , 'center center' => 'Center Center'
                , 'center right' => 'Center Right'
                , 'bottom left' => 'Bottom Left'
                , 'bottom center' => 'Bottom Center'
                , 'bottom right' => 'Bottom Right'
            )
        )
    )
));




piklist('field', array(
    'type' => 'editor'
    , 'field' => 'description_top'
    , 'label' => 'Description (top)'
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





//
// Slider - Tab 1
//

piklist('field', array(
    'type' => 'html',
    'label' => '',
    'value' => '<div style="padding: 10px 0; text-align: center;"><h1>Slider (tab 1)</h1></div>',
));

piklist('field', array(
    'type' => 'text'
    , 'field' => 'slider1_title'
    , 'label' => 'Title'
    , 'columns' => 12
));
piklist('field', array(
    'type' => 'editor'
    , 'field' => 'slider1_description'
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
    'type' => 'group'
    , 'field' => 'slider1_gallery'
    , 'label' => 'Gallery'
    , 'columns' => 12
    , 'add_more' => true
    , 'fields' => array(
        array(
            'type' => 'select'
            , 'field' => 'slider_img_position'
            , 'label' => 'Position'
            , 'columns' => 12
            , 'value' => 'center center'
            , 'choices' => array(
                'top left' => 'Top Left'
                , 'top center' => 'Top Center'
                , 'top right' => 'Top Right'
                , 'center left' => 'Center Left'
                , 'center center' => 'Center Center'
                , 'center right' => 'Center Right'
                , 'bottom left' => 'Bottom Left'
                , 'bottom center' => 'Bottom Center'
                , 'bottom right' => 'Bottom Right'
            )
        )
        , array(
            'type' => 'file'
            , 'field' => 'slider_img_photos'
            , 'label' => 'Photos'
            , 'columns' => 12
            , 'options' => array(
                'modal_title' => __('Add picture', 'piklist')
                , 'button' => __('Add', 'piklist')
            )
        )
    )
));





//
// Slider - Tab 2
//

piklist('field', array(
    'type' => 'html',
    'label' => '',
    'value' => '<div style="padding: 10px 0; text-align: center;"><h1>Slider (tab 2)</h1></div>',
));

piklist('field', array(
    'type' => 'text'
    , 'field' => 'slider2_title'
    , 'label' => 'Title'
    , 'columns' => 12
));
piklist('field', array(
    'type' => 'editor'
    , 'field' => 'slider2_description'
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
    'type' => 'group'
    , 'field' => 'slider2_gallery'
    , 'label' => 'Gallery'
    , 'columns' => 12
    , 'add_more' => true
    , 'fields' => array(
        array(
            'type' => 'select'
            , 'field' => 'slider_img_position'
            , 'label' => 'Position'
            , 'columns' => 12
            , 'value' => 'center center'
            , 'choices' => array(
                'top left' => 'Top Left'
                , 'top center' => 'Top Center'
                , 'top right' => 'Top Right'
                , 'center left' => 'Center Left'
                , 'center center' => 'Center Center'
                , 'center right' => 'Center Right'
                , 'bottom left' => 'Bottom Left'
                , 'bottom center' => 'Bottom Center'
                , 'bottom right' => 'Bottom Right'
            )
        )
        , array(
            'type' => 'file'
            , 'field' => 'slider_img_photos'
            , 'label' => 'Photos'
            , 'columns' => 12
            , 'options' => array(
                'modal_title' => __('Add picture', 'piklist')
                , 'button' => __('Add', 'piklist')
            )
        )
    )
));







//
// Slider - Tab 3
//

piklist('field', array(
    'type' => 'html',
    'label' => '',
    'value' => '<div style="padding: 10px 0; text-align: center;"><h1>Slider (tab 3)</h1></div>',
));

piklist('field', array(
    'type' => 'text'
    , 'field' => 'slider3_title'
    , 'label' => 'Title'
    , 'columns' => 12
));
piklist('field', array(
    'type' => 'editor'
    , 'field' => 'slider3_description'
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
    'type' => 'group'
    , 'field' => 'slider3_gallery'
    , 'label' => 'Gallery'
    , 'columns' => 12
    , 'add_more' => true
    , 'fields' => array(
        array(
            'type' => 'select'
            , 'field' => 'slider_img_position'
            , 'label' => 'Position'
            , 'columns' => 12
            , 'value' => 'center center'
            , 'choices' => array(
                'top left' => 'Top Left'
                , 'top center' => 'Top Center'
                , 'top right' => 'Top Right'
                , 'center left' => 'Center Left'
                , 'center center' => 'Center Center'
                , 'center right' => 'Center Right'
                , 'bottom left' => 'Bottom Left'
                , 'bottom center' => 'Bottom Center'
                , 'bottom right' => 'Bottom Right'
            )
        )
        , array(
            'type' => 'file'
            , 'field' => 'slider_img_photos'
            , 'label' => 'Photos'
            , 'columns' => 12
            , 'options' => array(
                'modal_title' => __('Add picture', 'piklist')
                , 'button' => __('Add', 'piklist')
            )
        )
    )
));






//
// Slider - Tab 4
//

piklist('field', array(
    'type' => 'html',
    'label' => '',
    'value' => '<div style="padding: 10px 0; text-align: center;"><h1>Slider (tab 4)</h1></div>',
));
piklist('field', array(
    'type' => 'text'
    , 'field' => 'slider4_title'
    , 'label' => 'Title'
    , 'columns' => 12
));
piklist('field', array(
    'type' => 'editor'
    , 'field' => 'slider4_description'
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
    'type' => 'group'
    , 'field' => 'slider4_gallery'
    , 'label' => 'Gallery'
    , 'columns' => 12
    , 'add_more' => true
    , 'fields' => array(
        array(
            'type' => 'select'
            , 'field' => 'slider_img_position'
            , 'label' => 'Position'
            , 'columns' => 12
            , 'value' => 'center center'
            , 'choices' => array(
                'top left' => 'Top Left'
                , 'top center' => 'Top Center'
                , 'top right' => 'Top Right'
                , 'center left' => 'Center Left'
                , 'center center' => 'Center Center'
                , 'center right' => 'Center Right'
                , 'bottom left' => 'Bottom Left'
                , 'bottom center' => 'Bottom Center'
                , 'bottom right' => 'Bottom Right'
            )
        )
        , array(
            'type' => 'file'
            , 'field' => 'slider_img_photos'
            , 'label' => 'Photos'
            , 'columns' => 12
            , 'options' => array(
                'modal_title' => __('Add picture', 'piklist')
                , 'button' => __('Add', 'piklist')
            )
        )
    )
));




//
// Amenities
//

piklist('field', array(
    'type' => 'html',
    'label' => '',
    'value' => '<div style="padding: 10px 0; text-align: center;"><h1>Amenities</h1></div>',
));
piklist('field', array(
    'type' => 'editor'
    , 'field' => 'amenities_description'
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
    'type' => 'group'
    , 'field' => 'amenities_gallery'
    , 'label' => 'Gallery'
    , 'columns' => 12
    , 'add_more' => true
    , 'fields' => array(
        array(
            'type' => 'select'
            , 'field' => 'amenities_img_position'
            , 'label' => 'Position'
            , 'columns' => 12
            , 'value' => 'center center'
            , 'choices' => array(
                'top left' => 'Top Left'
                , 'top center' => 'Top Center'
                , 'top right' => 'Top Right'
                , 'center left' => 'Center Left'
                , 'center center' => 'Center Center'
                , 'center right' => 'Center Right'
                , 'bottom left' => 'Bottom Left'
                , 'bottom center' => 'Bottom Center'
                , 'bottom right' => 'Bottom Right'
            )
        )
        , array(
            'type' => 'file'
            , 'field' => 'amenities_img_photos'
            , 'label' => 'Photos'
            , 'columns' => 12
            , 'options' => array(
                'modal_title' => __('Add picture', 'piklist')
                , 'button' => __('Add', 'piklist')
            )
        )
    )
));




//
// Eco
//

piklist('field', array(
    'type' => 'html',
    'label' => '',
    'value' => '<div style="padding: 10px 0; text-align: center;"><h1>Eco</h1></div>',
));
piklist('field', array(
    'type' => 'editor'
    , 'field' => 'eco_description'
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


//
// Map
//

piklist('field', array(
    'type' => 'html',
    'label' => '',
    'value' => '<div style="padding: 10px 0; text-align: center;"><h1>Map</h1></div>',
));




piklist('field', array(
    'type' => 'group'
    , 'field' => 'Map'
    , 'columns' => 12
    , 'add_more' => true
    , 'label' => 'Address'
    , 'fields' => array(
        array(
            'type' => 'text'
            , 'field' => 'title'
            , 'label' => 'Title'
            , 'columns' => 12
        )
        , array(
            'type' => 'text'
            , 'field' => 'latLang'
            , 'label' => 'Coordinates'
            , 'columns' => 6
        )
        , array(
            'type' => 'text'
            , 'field' => 'link'
            , 'label' => 'Link'
            , 'columns' => 6
        )
        , array(
            'type' => 'html',
            'label' => 'Map',
            'value' => '<div class="MapPoint"><div class="Map" style="height: auto;"><img src="" style="max-width: 100%" /></div><a class="ShowMap"></a></div>',
            'columns' => 12
        )
    )
));
?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBks4yg4LG9xwrrOfxD8TjwUtgNg_jSR3E&v=3.exp"></script>
<script>
    var map;
    var geocoder = new google.maps.Geocoder();

    setTimeout(function() {
        // Building
        val = jQuery('input[name="_post_meta[address][address_latLang][]"]').val()
        if (val == '') {
            val = "39.9548994,-75.1693597";
        }
        img = 'https://maps.googleapis.com/maps/api/staticmap?center=' + val + '&zoom=15&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C' + val;
        jQuery('.MapMain img').attr('src', img);

        // Hotspot
        jQuery('.MapPoint').each(function(key, value) {
            parent = jQuery(this).closest('.piklist-field-addmore-wrapper');

            latLang = parent.find('input[name="_post_meta[Map][latLang][]"]').val();

            zoom = 15;
            if (latLang == '') {
                latLang = "39.9548994,-75.1693597";
                zoom = 10;
            }

            img = 'https://maps.googleapis.com/maps/api/staticmap?center=' + latLang + '&zoom=' + zoom + '&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C' + latLang;
            jQuery(this).find('.Map img').attr('src', img);


            jQuery(this).find('.Map').attr('id', 'Map' + key);
        });
    }, 2000);

    function codeAddress(address, parent) {
        geocoder.geocode({'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                latLang = results[0].geometry.location.A + ',' + results[0].geometry.location.F;

                img = 'https://maps.googleapis.com/maps/api/staticmap?center=' + results[0].geometry.location.A + ',' + results[0].geometry.location.F + '&zoom=15&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C' + results[0].geometry.location.A + ',' + results[0].geometry.location.F;
                parent.find('.Map img').attr('src', img);
                parent.find('input[name="_post_meta[Map][latLang][]"]').val(results[0].geometry.location.A + ',' + results[0].geometry.location.F)
            }
        });
    }
    jQuery(document).on('keyup', 'input[name="_post_meta[Map][address][]"]', function(event) {
        val = jQuery(this).val();

        if (val.length > 0) {
            codeAddress(val, jQuery(this).closest('.piklist-field-addmore-wrapper'))
        }
    });

    jQuery(document).on('keyup', 'input[name="_post_meta[address][address_latLang][]"]', function(event) {
        cor = jQuery(this).val();

        img = 'https://maps.googleapis.com/maps/api/staticmap?center=' + cor + '&zoom=15&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C' + cor;
        jQuery('.MapMain img').attr('src', img);
    })



    jQuery(document).on('keyup change', 'input[name="_post_meta[Map][latLang][]"]', function(event) {
        cor = jQuery(this).val();
        console.log(cor)

        img = 'https://maps.googleapis.com/maps/api/staticmap?center=' + cor + '&zoom=15&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C' + cor;
        console.log(jQuery(this).closest('.piklist-field-addmore-wrapper').find('img'))

        jQuery(this).closest('.piklist-field-addmore-wrapper').find('img').attr('src', img);
    })
</script>
