<?php
get_header();
global $actId;

$ApartmentTitle = get_post_meta($actId, 'tplApartmentTitle', true);
$ApartmentNameFirst = get_post_meta($actId, 'tplApartmentNameFirst', true);
$ApartmentName = get_post_meta($actId, 'tplApartmentName', true);
?>

<?php include 'inc_googleadservices.php'; ?>

<div class="Page Template">
    <div class="Section Start">
        <div class="Photo"></div>
        <div class="Container">
            <div class="Breadcrumb">
                <a class="LoadAjax" href="<?php bloginfo('home'); ?>">Home</a> / <a class="LoadAjax" href="<?php bloginfo('home'); ?>/our-properties">Philadelphia Apartments</a> / <?php echo $ApartmentName; ?>
            </div>
        </div>
    </div>

    <div class="Section One">
        <div class="Container">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>

                    <div class="Cl ClFirst">
                        <h1 class="Title"><?php echo $ApartmentTitle; ?></h1>
                        <h2 class="SubTitle">Exceptional value, Exceptional living</h2>

                    </div>
                    <div class="Clear"></div>

                    <div class="Cl ClFirst">
                        <?php echo get_post_meta($actId, 'tplApartmentDescription', true); ?>

                        <div class="Box">
                            <div class="Cl Cl4-8 PadClRight7 TableCell First">
                                <img class="Photo" alt="<?php echo $ApartmentName; ?>. <?php echo $ApartmentName; ?> Rentals. Luxury <?php echo $ApartmentName; ?>. Looking For Apartments in <?php echo $ApartmentNameFirst; ?>? POST BROTHERS <?php echo $ApartmentName; ?> Are New Affordable, Luxurious &amp; Environmentally_Friendly Rental Apartments in <?php echo $ApartmentNameFirst; ?>'s Most Beautiful Neighborhoods." src="<?php bloginfo('template_url'); ?>/img/TemplateKitchen.jpg">
                            </div>
                            <div class="Cl Cl4-8 PadClLeft7 TableCell Second">
                                <div class="BoxGray">
                                    <h2>
                                        EXCEPTIONAL VALUE, EXCEPTIONAL LIVING …<br />
                                        DISCOVER POST BROTHERS <?php echo $ApartmentName; ?>
                                    </h2>
                                    <p>Call To Schedule A Tour Or Walk-In, Open Til 7pm Seven Days A Week.</p>
                                    <div id="PhoneDiv2"><p>Rent <?php echo $ApartmentName; ?> 267-233-6699</p></div>
                                </div>
                            </div>
                            <div class="Clear"></div>
                        </div>


                        <h2 class="SubTitle EcoLearnToggle ActionKeyPlaces">Post Brothers Has Hundreds of New <?php echo $ApartmentName; ?> For Rent</h2>
                        <div class="KeyPlaces">
                            <ul class="twocolumnbullets">
                                <li><?php echo $ApartmentNameFirst; ?> Apt</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apts</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartment</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartment Rental</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartment Rentals</li>
                                <li>Rent <?php echo $ApartmentNameFirst; ?> Apartment</li>
                                <li>Rent <?php echo $ApartmentNameFirst; ?> Apartments</li>
                                <li>Apartment Rental <?php echo $ApartmentNameFirst; ?></li>
                                <li>Apartment Rentals <?php echo $ApartmentNameFirst; ?></li>
                                <li>Apartment For Rent <?php echo $ApartmentNameFirst; ?></li>
                                <li>Apartments For Rent <?php echo $ApartmentNameFirst; ?></li>
                                <li>Apartment In <?php echo $ApartmentNameFirst; ?></li>
                                <li>Apartments In <?php echo $ApartmentNameFirst; ?></li>
                                <li>Luxury <?php echo $ApartmentNameFirst; ?> Apartment</li>
                                <li>Luxury <?php echo $ApartmentNameFirst; ?> Apartments</li>
                                <li>New <?php echo $ApartmentNameFirst; ?> Apartment</li>
                                <li>New <?php echo $ApartmentNameFirst; ?> Apartments</li>
                                <li>Pet-Friendly <?php echo $ApartmentNameFirst; ?> Apartment</li>
                                <li>Pet-Friendly <?php echo $ApartmentNameFirst; ?> Apartments</li>
                                <li><?php echo $ApartmentNameFirst; ?> Loft</li>
                                <li><?php echo $ApartmentNameFirst; ?> Lofts</li>
                                <li>Luxury Lofts <?php echo $ApartmentNameFirst; ?></li>
                                <li>1 Bedroom Apartment <?php echo $ApartmentNameFirst; ?></li>
                                <li>2 Bedroom Apartment <?php echo $ApartmentNameFirst; ?></li>
                                <li>3 Bedroom Apartment <?php echo $ApartmentNameFirst; ?></li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartment Lincoln Drive</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartment Close To Downtown</li>
                                <li>Studio Apartment <?php echo $ApartmentNameFirst; ?></li>
                                <li>Studio Apartments <?php echo $ApartmentNameFirst; ?></li>
                                <li><?php echo $ApartmentNameFirst; ?> Apt Rental</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apt For Rent</li>
                                <li>Eco-Friendly <?php echo $ApartmentNameFirst; ?> Apartments</li>
                                <li>Green <?php echo $ApartmentNameFirst; ?> Apartments</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Close To Downtown</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Near Center City</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Temple Campus</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Drexel Campus</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Drexel Hospital</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Lasalle Campus</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Villanova Campus</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments St Joe's Campus</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Sju Campus</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Penn Campus</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Upmc</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Wharton Campus</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Philadelphia University</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Pcom</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Philadelphia College Of Osteopathic Medicine</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Villanova</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Lasalle</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Temple</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Temple Hospital</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Einstein Hospital</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Pennsylvania Hospital</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Children's Hospital Of Pennsylvania</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Chops Hospital</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Hahnemann Hospital</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments St. Christopher's Hospital For Children</li>
                                <li>One Bedroom Apartments <?php echo $ApartmentNameFirst; ?></li>
                                <li>Two Bedroom Apartments <?php echo $ApartmentNameFirst; ?></li>
                                <li>Three Bedroom Apartments <?php echo $ApartmentNameFirst; ?></li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments With Pool</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments With Gym</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Hardwood Floors</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Stainless Steel Appliances</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Septa Train Lines</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Near I-76</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Near Route 1</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Lincoln Drive</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Near King Of Prussia Mall</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments In Westmount</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Mt. Airy</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Fairmount Park</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Wissahickon Park</li>
                                <li>Historic <?php echo $ApartmentNameFirst; ?> Apartments</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Near Downtown</li>
                                <li><?php echo $ApartmentNameFirst; ?> Apartments Near Towpath Trail</li>
                                <li>Eco-Friendly <?php echo $ApartmentNameFirst; ?> Apartments</li>
                                <li>Energy Efficient <?php echo $ApartmentNameFirst; ?> Apartments</li>
                                <li>Sustainable <?php echo $ApartmentNameFirst; ?> Apartments</li>
                            </ul>
                        </div>

                        <p class="EcoLearnToggle ActionEcoLearn">Post Brothers Apartments are Green & Eco-Friendly!</p>
                        <div class="EcoLearn">
                            <p>Post Brothers <?php echo $ApartmentName; ?> was founded in 2007 to exclusively focus on creating and operating infill, Class A, "best-in-class" <?php echo $ApartmentNameFirst; ?> apartment buildings at a superior cost basis.</p>
                            <p>Post is a vertically integrated operating company, with in-­house expertise in <?php echo $ApartmentNameFirst; ?> apartment leasing, property management of <?php echo $ApartmentName; ?>, <?php echo $ApartmentNameFirst; ?> apartment development, <?php echo $ApartmentNameFirst; ?> apartment construction management, general contracting, <?php echo $ApartmentNameFirst; ?> apartment transactions, and financing of <?php echo $ApartmentName; ?>. Post Brothers has been one of the top 5 most active <?php echo $ApartmentNameFirst; ?> apartment developers of multifamily loft and apartment properties in Philadelphia over the past four years, and to date has acquired seven <?php echo $ApartmentNameFirst; ?> apartment properties totaling over 1,000 rental apartments in <?php echo $ApartmentNameFirst; ?>. </p>
                            <p>The owners of the Post <?php echo $ApartmentNameFirst; ?> apartment management company are the controlling general partners in all <?php echo $ApartmentNameFirst; ?> apartment properties developed by Post, and Post does not perform any 3rd party management of <?php echo $ApartmentName; ?>. Post's greatest competitive advantage is our consumer-­product-­focused business model, and our success in renting <?php echo $ApartmentName; ?> can be attributed to three important factors: correctly identifying demand in the <?php echo $ApartmentNameFirst; ?> apartment rental market; renovated historic <?php echo $ApartmentNameFirst; ?> apartment buildings that deliver luxury <?php echo $ApartmentName; ?> that are ideal for the philadelphia market, high quality and value; and excelling in marketing <?php echo $ApartmentName; ?> to consumers.  Post Brothers has an extremely successful track record of finding <?php echo $ApartmentName; ?> and marketing <?php echo $ApartmentNameFirst; ?> apartment rentals, and each of Post's completed <?php echo $ApartmentNameFirst; ?> apartment projects has achieved a rent level far higher than previously existed in their submarket.  Post <?php echo $ApartmentName; ?> offer a differentiated luxury product within the <?php echo $ApartmentNameFirst; ?> apartment rental market with completely unique and higher-­grade finishes and amenity packages.</p> 
                        </div>

                        <?php echo get_post_meta($actId, 'tplApartmentDescription2', true); ?>

                        <div class="BoxGray">
                            <div class="Cl Cl4-8 PadClRight15 TableCell First">
                                <h2>
                                    EXCEPTIONAL VALUE, EXCEPTIONAL LIVING …<br /> 
                                    DISCOVER POST BROTHERS <?php echo $ApartmentName; ?>
                                </h2>
                            </div>
                            <div class="Cl Cl4-8 PadClLeft15 TableCell Second">
                                <p>Call To Schedule A Tour Or Walk-In, Open Til 7pm Seven Days A Week.</p>
                                <p>Rent <?php echo $ApartmentName; ?> <div id="PhoneDiv3">267-233-6699</div></p>
                            </div>
                            <div class="Clear"></div>
                        </div>
                        <br /><br /><br />
                        <h2>Post Brothers also has Apartments available in these areas:</h2>
                        <ul class="Links">
                            <?php
                            $x = 0;
                            $myqueryTemplate = new WP_Query(
                                    array(
                                'post_type' => 'template',
                                'posts_per_page' => -1,
                                'order' => "ASC",
                                'orderby' => 'menu_order',
                                'ignore_sticky_posts' => 1,
                                'post_status' => 'publish'
                                    )
                            );
                            while ($myqueryTemplate->have_posts()) : $myqueryTemplate->the_post();
                                $idNow = $post->ID;

                                echo '<li><a class="LoadAjax" href="' . get_permalink($idNow) . '">' . get_post_meta($idNow, 'tplApartmentName', true) . '</a></li>';

                                $x++;
                                if ($x % 3 == 0) {
                                    echo '<div class="Clear"></div>';
                                    $x = 0;
                                }
                            endwhile;
                            ?>
                        </ul>
                    </div>
                    <div class="Cl ClSecond">
                        <p>Post Brothers newly renovated state of the art King of Prussia apartments in Philadelphia provide tenants with <strong>new stainless steel appliances</strong>, new washers, new dryers, new dishwashers, <strong>walk in closets, hardwood floors</strong>, European cabinetry, on-site parking, <strong>24/7 security</strong> and more.</p>
                        <p>Our top-class <?php echo $ApartmentNameFirst; ?> apartments feature these amenities:</p>
                        <div id="amenities">
                            <ul>
                                <li>All New Apartments</li>
                                <li>New Stainless Steel Appliances</li>
                                <li>New Washers</li>
                                <li>New Dryers</li>
                                <li>New Dishwashers</li>
                                <li>Walk-In Closets</li>
                                <li>Hardwood Floors</li>
                                <li>Furnished Apartments</li>
                                <li>Corporate Apartments</li>
                                <li>European Cabinetry </li>
                                <li>New Quartz Countertops</li>
                                <li>Luxurious Ceramic Tile Bathrooms</li>
                                <li>5 Star Energy Rated</li>
                                <li>Energy Efficient</li>
                                <li>Skyline Views</li>
                                <li>City Views</li>
                                <li>Park Views</li>
                                <li>Pet-Friendly Apartments</li>
                                <li>Free Wireless Internet</li>
                                <li>Juice Bar</li>
                                <li>Business Center</li>
                                <li>Community Room</li>
                                <li>Pool</li>
                                <li>Gym</li>
                                <li>Bike Racks</li>
                                <li>Storage</li>
                                <li>Front-Desk Attendant</li>
                                <li>On-Site Security</li>
                                <li>On-Site Property Management Team</li>
                                <li>Convenient Locations</li>
                                <li>Close To Downtown Philadelphia</li>
                                <li>Close To SEPTA Train Stations</li>
                                <li>Close To Major Highways</li>
                                <li>Near I-76 And Route 1</li>
                                <li>Walkable Neighborhoods</li>
                                <li>Shopping</li>
                                <li>Dining</li>
                                <li>Nightlife</li>
                                <li>Entertainment</li>
                                <li>Close To Philadelphia Universities</li>
                                <li>Close To Philadelphia Hospitals And Medical Centers </li>
                            </ul>
                        </div>

                    </div>
                    <div class="Clear"></div>


                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>
