<?php
/*
  Template Name: Corporate Housing
 */

get_header();
global $actId, $ParentId;
?>

<?php include 'inc_googleadservices.php'; ?>
<div class="Page CorporateHousing">

    <div class="Section Start">
        <div class="Photo" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/corporate-housing/Background.jpg')">
            <img class="Buffor" src="<?php bloginfo('template_url'); ?>/assets/corporate-housing/Background.jpg">
        </div>
        <div class="Container">
            <div class="Breadcrumb">
                <a class="LoadAjax" href="<?php bloginfo('home'); ?>">Home</a> / Corporate Housing
            </div>
        </div>
    </div>

    <div class="Section Description">
        <div class="Container">
            <div class="Mask"></div>
            <div class="Cl Cl4-8 PadClLeft30">
                <div class="Title">Corporate<br />Housing</div>
            </div>
            <div class="Cl Cl4-8">
                <div class="Text">
                    <div class="Cl Cl4-8 PadClLeft30 PadClRight30">Post Brothers Apartments now offers fully furnished, temporary residences in the Philadelphia area. Our rental homes are ideal for individuals and their families traveling for work, leisure, or receiving medical treatment, as well as locals in-between homes, in life transition, or renovating </div>
                    <div class="Cl Cl4-8 PadClLeft30 PadClRight30">their permanent residence. Each home is dressed with modern furnishings, extensive housewares and linens, top-of-the-line electronics, and access to the incomparable amenities Post Brothers offers their residents.</div>                          
                    <div class="Clear"></div>
                </div>
            </div>
            <div class="Clear"></div>
        </div>
    </div>

    <div class="Section Brochure">
        <div class="Container">
            <div class="Slider">
                <div class="TabsPhoto">
                    <div class="Tab SliderGallery active" data-tab="1">
                        <div class="Photos">
                            <div class="Photo" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/corporate-housing/Background2.jpg');">
                                <img class="Buffor" src="<?php bloginfo('template_url'); ?>/assets/corporate-housing/Background2.jpg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="TabsContent">
                    <div class="Tab">
                        <div class="Mask"></div>
                        <div class="Content">
                            <div class="Cl Cl4-8">
                                <div class="Title">Corporate Apartment<br />Services and Extras</div>
                            </div>
                            <div class="Cl Cl4-8 PadClLeft30 PadClRight30">
                                Enjoy complimentary high-speed wireless Internet and premium cable services, top-of-the-line bedding and towels, premium mattresses, and luxurious toiletries. Each apartment also comes with a fully equipped kitchen, including an elite coffee maker and chef-quality kitchenware, a 50” flat screen TV and state-of-the-art electronics package, chic furniture and accessories, as well as weekly housekeeping services.
                            </div>                    
                            <div class="Clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Section Description2">
        <div class="ContainerPlus">
            <div class="Photo" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/corporate-housing/Background3.jpg')"></div>
            <div class="Inside">
                <div class="Cl Cl4-8 BackYellow">
                    <div class="Title">Apartment Features</div>
                    <p>Apartments include generous open-concept layouts, large closets with millwork built-ins, front-loading washers and dryers, and world-class kitchen appliances. Each is equipped with hardwood floors, sustainable and ecofriendly materials and fixtures, and includes a gourmet-inspired kitchen with Italian-style custom cabinets. Sleek bathrooms include a floating vanity, oversized bathtub, and a rain-style showerhead, body jets, and brass handle sprays.</p>
                </div>
                <div class="Cl Cl4-8 BackWhite">
                    <div class="Title">Amenities</div>
                    <p>Corporate Housing residents enjoy round-the-clock concierge services and full access to a 24-hour world-class fitness center, outdoor pool and hot tub, cabanas and lounge areas, as well as dog parks. Surface and garage parking options are included.</p>
                </div>
                <div class="Clear"></div>
                <div class="Cl Cl4-8 BackGray">
                    <div class="Title">Terms</div>
                </div>
                <div class="Cl Cl4-8 BackGray">
                    <p>A minimum stay of 30 days is required. After 30 days, a 10-day notice period is required to vacate. No security deposit or fees are required. Utilities, cable, and Internet services are included.</p>
                </div>
                <div class="Clear"></div>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>

