<?php
/*
  Template Name: About
 */

  get_header();
  global $actId, $ParentId;
  ?>

  <?php include 'inc_googleadservices.php'; ?>
  <div class="Page About">
    <div class="Section Start">
        <div class="Photo" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/about/Background.jpg?2')"></div>
        <div class="Inside">
            <div class="Title">
                About <br />Post Brothers
                <?php // echo get_post_meta($actId, 'aboutHeaderTitle', true); ?>
            </div>
            <div class="Text">
                Post Brothers Apartments was founded in 2007 by Matthew and Michael Pestronk to exclusively focus on creating and operating infill, class-A, “best-in-class” Philadelphia apartment buildings at a superior cost basis.
                <?php // echo get_post_meta($actId, 'aboutHeaderText', true); ?>
            </div>
            <div class="Clear"></div>
        </div>
        <div class="Container">
            <div class="Breadcrumb">
                <a class="LoadAjax" href="<?php bloginfo('home'); ?>">Home</a> / About Company
            </div>
        </div>
    </div>

    <div class="Section StartPhone">
    <div class="Container">
        <div class="Title">
                About <br />Post Brothers
                <?php // echo get_post_meta($actId, 'aboutHeaderTitle', true); ?>
            </div>
            <div class="Text">
                Post Brothers Apartments was founded in 2007 by Matthew and Michael Pestronk to exclusively focus on creating and operating infill, class-A, “best-in-class” Philadelphia apartment buildings at a superior cost basis.
                <?php // echo get_post_meta($actId, 'aboutHeaderText', true); ?>
            </div>
            </div>
    </div>

    <div class="Section History">
        <div class="Container">
            <div class="Cl Cl2-8 TableCell PadClLeft30">
                <div class="Table">
                    <div class="TableCell">
                        <div class="Title">History</div>
                    </div>
                </div>
            </div>
            <div class="Cl Cl6-8 TableCell">
                <?php echo generate_column(get_post_meta($actId, 'aboutHistory', true), 2, 'Cl Cl4-8 PadClLeft30 PadClRight30'); ?>
            </div>
            <div class="Clear"></div>
        </div>
    </div>

    <a name="our-team"></a>
    <div class="Section Team">
        <div class="Container">
            <div class="Mask Top"></div>
            <div class="Mask Bottom"></div>
            <div class="Header">Post Brothers<br />Team</div>
            <div class="Persons showAll">
                <div class="Row">
                    <?php
                    $team = get_post_meta($actId, 'aboutTeam', true);
                    if ($team) {
                        for ($i = 0; $i < sizeof($team); $i++) {

                            $photoArray = $team[$i]['teamPhoto'];
                            foreach ($photoArray as $value) {
                                if ($value != 'undefined') {
                                    $src = wp_get_attachment_image_src($value, 'full');
                                    break;
                                }
                            }
                            ?>

                            <div class="Person">
                                <div class="Cl Cl1-8">
                                    <div class="Photo" style="background-image: url('<?php echo $src[0]; ?>')"></div>
                                </div>
                                <div class="Cl Cl3-8 PadClLeft30 PadClRight30">
                                    <div class="Name">
                                        <?php
                                        $nameArray = explode(' ', $team[$i]['teamName']);
                                        foreach ($nameArray as $value) {
                                            echo $value . '<br />';
                                        }
                                        ?>
                                    </div>
                                    <div class="Position"><?php echo $team[$i]['teamPosition']; ?></div>
                                    <div class="Text"><?php echo $team[$i]['teamDescription']; ?></div>
                                    <a class="ReadMore">
                                        <div class="Txt">Read More</div>
                                        <span class="Arrow">
                                            <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                                                <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div class="Clear"></div>
                            </div>

                            <?php
                            if ($i == 1 || $i == 3 || $i == 5 || $i == 7 || $i == 9)
                                echo '<div class="Clear"></div></div><div class="Row">';
                        }
                    }
                    ?>
                </div>
                <div class="Clear"></div>
                <a class="ShowMore">Show more</a>
            </div>
        </div>
    </div>

    <a name="investors"></a>
    <div class="Section Investors">
        <div class="Container">
            <div class="Cl Cl2-8 TableCell PadClLeft30">
                <div class="Table">
                    <div class="TableCell">
                        <div class="Title">Investors</div>
                    </div>
                </div>
            </div>
            <div class="Cl Cl6-8 TableCell">
                <?php echo generate_column(get_post_meta($actId, 'aboutInvestors', true), 2, 'Cl Cl4-8 PadClLeft30 PadClRight30'); ?>
            </div>
            <div class="Clear"></div>
        </div>
    </div>

    <a name="careers"></a>
    <div class="Section Careers">
        <div class="Container">
            <div class="Table">
                <div class="Cl Cl2-8 PadClLeft30 TableCell">
                    <div class="Title">Careers</div>
                </div>
                <div class="Cl Cl2-8 PadClLeft30 TableCell">
                    <?php
                    $careers = get_post_meta($actId, 'aboutCareers', true);
                    ?>
                      <!-- <?php echo '<pre>',print_r($careers,1),'</pre>'; ?> -->
                    <?php
                    $countForCl = ceil(sizeof($careers) / 3);
                    $countForClLast = sizeof($careers) - ($countForCl * 2);
                    if ($careers) {
                        for ($i = 0; $i < count($careers); $i++) {
                            ?>

                            <a class="Pos" data-title="<?php echo $careers[$i]['careersName']; ?>" data-text="<?php echo $careers[$i]['careersDescription']; ?>"><?php echo $careers[$i]['careersName']; ?></a>

                            <?php
                            if (($i + 1) == $countForCl || ($i + 1) == $countForCl * 2)
                                echo '</div><div class="Cl Cl2-8 PadClLeft30 TableCell">';
                        }
                    }
                    ?>
                </div>
                <div class="Clear"></div>
                <div class="Popup">
                    <div class="Mask"></div>
                    <div class="Box">
                        <a class="Close">
                            <svg x="0px" y="0px" width="11.121px" height="11.122px" viewBox="0 0 11.121 11.122" enable-background="new 0 0 11.121 11.122" xml:space="preserve">
                                <line fill="none" stroke="#000" stroke-width="3" stroke-miterlimit="10" x1="1.061" y1="1.061" x2="10.061" y2="10.061"/>
                                <line fill="none" stroke="#000" stroke-width="3" stroke-miterlimit="10" x1="10.061" y1="1.061" x2="1.061" y2="10.061"/>
                            </svg>
                        </a>
                        <div class="Title">Investror</div>
                        <div class="Text">Nam fermentum eros a ipsum euismod finibus. In rhoncus libero et turpis tempor, at interdum nunc eleifend. Nam nec semper libero. Proin tempor luctus mauris, lobortis pretium massa venenatis eget. Vestibulum iaculis tempor est, a consequat metus porta eget.</div>
                        <a class="BtContact LoadAjax" href="<?php bloginfo('home'); ?>/contact">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
