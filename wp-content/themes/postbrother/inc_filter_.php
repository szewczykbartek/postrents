<div class="Filter">
    <div class="Handle">
        <a class="Cl Cl2-8 first">
            <?php if (!$building) { ?>
            <span class="Txt">Neighborhood</span>
                <div class="Arrow">
                    <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                    <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                    </svg>
                </div>
            <?php } else { ?>
            <span class="Txt">Filter</span>
            <?php } ?>
        </a>
        <a class="Cl Cl2-8">
            <span class="Txt">Price range</span>
            <div class="Arrow">
                <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                </svg>
            </div>
        </a>
        <a class="Cl Cl2-8 BorderNo">
            <span class="Txt">Bathrooms</span>
            <div class="Arrow">
                <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                </svg>
            </div>
        </a>
        <a class="Cl Cl2-8 last">
            <span class="Txt">Bedrooms</span>
            <div class="Arrow">
                <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                </svg>
            </div>
        </a>
        <div class="Clear"></div>
    </div>
    <div class="More">
        <form>
            <input name="building" type="hidden" value="<?php echo $building; ?>" />

            <div class="Box TableCell Cl Cl2-8 first">
                <?php
                if (!$building) {
                    $districtsName = array(
                        'EastFalls' => 'East Falls'
                        , 'Callowhill' => 'Callowhill'
                        , 'WestMount Airy' => 'West Mount Airy'
                        , 'CityAvenue' => 'City Avenue'
                        , 'AvenueoftheArts' => 'Avenue of the Arts'
                        , 'CenterCity' => 'Center City'
                        , 'WestPhiladelphia' => 'West Philadelphia'
                        , 'NorthBergen' => 'North Bergen'
                        , 'UniversityCity' => 'University City'

                    );
                    $districtsArray = array();
                    $myqueryBuilding = new WP_Query(
                            array(
                        'post_type' => 'buildings',
                        'posts_per_page' => -1,
                        'order' => "ASC",
                        'orderby' => "title",
                        'ignore_sticky_posts' => 1,
                        'post_status' => 'publish'
                            )
                    );
                    while ($myqueryBuilding->have_posts()) : $myqueryBuilding->the_post();
                        $idNow = $post->ID;

                        $districts = get_post_meta($idNow, 'address', true)['address_districts'];
                        $districtsArray[$districts] = $districtsName[$districts];

                    endwhile;
                    foreach ($districtsArray as $key => $value) {
                        ?>

                        <label class="NiceCheckbox Cl Cl4-8">
                            <input name="district[]" type="checkbox" value="<?php echo $key; ?>"> <?php echo $value; ?>
                        </label>

                    <?php } ?>
                <?php } else { ?>

                    <div style="width: 100%"></div>

                <?php } ?>
                <div class="Clear"></div>
            </div>
            <div class="Box TableCell Range Cl Cl2-8">
                <div class="Table">
                    <div class="TableCell">
                        <input class="RangePrice" name="price" data-min="<?php echo $priceMin; ?>"  data-max="<?php echo $priceMax; ?>" />
                    </div>
                </div>
            </div>
            <div class="Box TableCell Cl Cl2-8">
                <div class="Table">
                    <div class="TableCell">
                        <label class="NiceCheckbox Cl Cl1-3">
                            <input name="bathrooms[]" type="checkbox" value="0"> 0
                        </label>
                        <label class="NiceCheckbox Cl Cl1-3">
                            <input name="bathrooms[]" type="checkbox" value="1.00"> 1
                        </label>
                        <label class="NiceCheckbox Cl Cl1-3">
                            <input name="bathrooms[]" type="checkbox" value="1.50"> 1,5
                        </label>
                        <label class="NiceCheckbox Cl Cl1-3">
                            <input name="bathrooms[]" type="checkbox" value="2.00"> 2
                        </label>
                        <label class="NiceCheckbox Cl Cl1-3">
                            <input name="bathrooms[]" type="checkbox" value="2.50"> 2,5
                        </label>
                        <label class="NiceCheckbox Cl Cl1-3">
                            <input name="bathrooms[]" type="checkbox" value="3.00"> 3
                        </label>
                        <div class="Clear"></div>
                    </div>
                </div>
            </div>
            <div class="Box TableCell Cl Cl2-8 last">
                <div class="Table">
                    <div class="TableCell">
                        <label class="NiceCheckbox Cl Cl1-3">
                            <input name="bedrooms[]" type="checkbox" value="0"> 0
                        </label>
                        <label class="NiceCheckbox Cl Cl1-3">
                            <input name="bedrooms[]" type="checkbox" value="1"> 1
                        </label>
                        <label class="NiceCheckbox Cl Cl1-3">
                            <input name="bedrooms[]" type="checkbox" value="1"> 1,5
                        </label>
                        <label class="NiceCheckbox Cl Cl1-3">
                            <input name="bedrooms[]" type="checkbox" value="2"> 2
                        </label>
                        <label class="NiceCheckbox Cl Cl1-3">
                            <input name="bedrooms[]" type="checkbox" value="2"> 2,5
                        </label>
                        <label class="NiceCheckbox Cl Cl1-3">
                            <input name="bedrooms[]" type="checkbox" value="3"> 3
                        </label>
                        <div class="Clear"></div>
                    </div>
                </div>
            </div>
            <div class="Clear"></div>
            <div class="Bt">Filter</div>
        </form>
    </div>
</div>
