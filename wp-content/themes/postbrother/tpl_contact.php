<?php
/*
  Template Name: Contact
 */

get_header();
global $ActId;


if (have_posts()) :
    while (have_posts()) : the_post();

        $ActId = get_the_ID();

    endwhile;
endif;
?>

<?php include 'inc_googleadservices.php'; ?>
<div class="Page Contact">
    <?php if ($post->post_name == 'thank-you') {
        $style = 'style="display: block;"';
    } ?>
    <div class="Validation Success" <?php echo $style; ?>>
        <div class="Table">
            <div class="TableCell">
                <p>Thank you for your message,<br />we will contact you shortly.</p>
                <button class="BtClose">Ok</button>
            </div>
        </div>
        <div class="Mask"></div>
    </div>

    <div class="Validation Error">
        <div class="Table">
            <div class="TableCell">
                <p>Please fill the required fields</p>
                <button class="BtClose">Ok</button>
            </div>
        </div>
        <div class="Mask"></div>
    </div>

    <div class="Section Form">
        <div class="Photo" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/about/Background.jpg')"></div>
        <div class="Container">
            <div class="Breadcrumb">
                <a class="LoadAjax" href="<?php bloginfo('home'); ?>">Home</a> / Contact
            </div>

            <div class="Cl Cl3-8 FloatL PadClRight30">
                <h2>Management requests</h2>
                <div>
                    <a class="Bt BorderB ActionManagement">
                        <div class="Icon">
                            <svg x="0px" y="0px" width="24.958px" height="27.876px" viewBox="0 0 24.958 27.876" enable-background="new 0 0 24.958 27.876" xml:space="preserve">
                            <path d="M17.826,16.097c-1.494,1.18-3.346,1.834-5.291,1.834c-1.967,0-3.837-0.67-5.337-1.873c-3.956,1.453-5.723,6.526-5.723,8.843
                                  h22.007C23.482,22.605,21.703,17.565,17.826,16.097z M18.945,9.384c0,3.541-2.87,6.41-6.41,6.41c-3.539,0-6.409-2.869-6.409-6.41
                                  c0-3.54,2.87-6.409,6.409-6.409C16.075,2.975,18.945,5.844,18.945,9.384z"/>
                            </svg>
                        </div>
                        <div class="Txt">Login to your RentCafe account</div>
                    </a>
                    <a class="Bt BorderB RollAction" data-roll="address">
                        <div class="Icon">
                            <svg x="0px" y="0px" width="24.958px" height="27.875px" viewBox="0 0 24.958 27.875" enable-background="new 0 0 24.958 27.875" xml:space="preserve">
                            <path fill="#010101" d="M22.581,27.163c-1.763,0.822-5.875,3.225-12.505-9.98C3.5,4.09,7.897,2.054,9.517,1.194
                                  C9.557,1.173,11.888,0.001,11.89,0l3.933,7.829l-2.345,1.178c-2.466,1.348,2.668,11.576,5.19,10.328
                                  c0.102-0.047,2.316-1.155,2.326-1.16l3.963,7.803C24.95,25.981,22.717,27.1,22.581,27.163 M13.526,26.333l-1.244-1.604
                                  c-1.722,1.338-4.197,1.468-4.933,0.201c-0.545-0.939-0.36-2.008-0.147-3.245c0.234-1.349,0.499-2.878-0.342-4.31
                                  c-1.417-2.41-4.527-2.301-6.86-0.777l1.11,1.699c0.963-0.629,2.073-0.9,2.896-0.709c1.921,0.451,1.338,2.935,1.197,3.752
                                  c-0.246,1.42-0.524,3.031,0.392,4.607C7.035,28.435,10.906,28.368,13.526,26.333"/>
                            </svg>
                        </div>
                        <div class="Txt">Contact property manager</div>
                    </a>
                    <div class="RollContent" data-roll="address">
                      <div class="Address">
                          <div class="Title">Rittenhouse Hill Apartments Management</div>
                          <div class="Text"><p>Phone: 215-586-4112<br> Email: <a href="mailto:management@rittenhousehill.com">management@rittenhousehill.com</a></p></div>
                      </div>
                      <div class="Address">
                          <div class="Title">Delmar Morris Property Management</div>
                          <div class="Text"><p>Phone: 215-586-4112<br> Email: <a href="mailto:management@delmarmorris.com">management@delmarmorris.com</a></p></div>
                      </div>
                      <div class="Address">
                          <div class="Title">Goldtex Property Management</div>
                          <div class="Text"><p>Phone: 215-849-9396<br> Email: <a href="mailto:management@goldtex.com">management@goldtex.com</a></p></div>
                      </div>
                      <div class="Address">
                          <div class="Title">Presidential City Management</div>
                          <div class="Text"><p>Phone: 215-586-4097<br> Email: <a href="mailto:management@presidentialcity.com">management@presidentialcity.com</a></p></div>
                      </div>
                      <div class="Address">
                          <div class="Title">The Atlantic Property Management</div>
                          <div class="Text"><p>Phone: 215-859-5034</p></div>
                      </div>


                      <div class="Address">
                          <div class="Title">Duchess Property Management</div>
                          <div class="Text"><p>Phone: 201-549-9080<br> Email: <a href="mailto:Management@DuchessApartments.com">Management@DuchessApartments.com</a></p></div>
                      </div>
                      <div class="Address">
                          <div class="Title">Garden Court Property Management</div>
                          <div class="Text"><p>Phone: 215-987​-​5950<br> Email: <a href="mailto:Management@GardenCourtPhilly.com">Management@GardenCourtPhilly.com</a></p></div>
                      </div>
                      <div class="Address">
                          <div class="Title">Hamilton Court Property Management</div>
                          <div class="Text"><p>Phone: 215-839-1006<br> Email: <a href="mailto:Management@GoHamCo.com">Management@GoHamCo.com</a></p></div>
                      </div>
                      <div class="Address">
                          <div class="Title">Roosevelt Property Management</div>
                          <div class="Text"><p>Phone: 215-987-5852<br> Email: <a href="mailto:Management@RooseveltPhilly.com">Management@RooseveltPhilly.com</a></p></div>
                      </div>

                        <?php
                        $contact = get_post_meta(17, 'contact', true);
                        if ($contact) {
                            for ($i = 0; $i < count($contact['title']); $i++) {
                                ?>

                                <!-- <div class="Address">
                                    <div class="Title"><?php echo $contact['title'][$i]; ?></div>
                                    <div class="Text"><?php echo $contact['text'][$i]; ?></div>
                                </div> -->

                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <h2>Leasing & Offices</h2>
                <div class="Contacts">
                    <div class="Contact">
                        <div class="Title">Leasing</div>
                        <div class="Text">
                            <div class="Number" itemprop="Telephone"><div id="PhoneDiv2">215-586-4111</div></div>
                            <a class="Email" href="mailto:rent@postrents.com">rent@postrents.com</a>
                        </div>
                        <div class="Clear"></div>
                    </div>
                    <div class="Seperator">
                        <div class="Line Left"></div>
                        <div class="Line Right"></div>
                    </div>
                    <div class="Contact">
                        <div class="Title">Corporate Office</div>
                        <div class="Text">
                            <div class="Number" itemprop="Telephone"><div id="PhoneDiv3">215-253-8300</div></div>
                        </div>
                        <div class="Clear"></div>
                    </div>
                    <div class="Seperator">
                        <div class="Line Left"></div>
                        <div class="Line Right"></div>
                    </div>
                    <div class="Contact">
                        <div class="Title">Careers</div>
                        <div class="Text">
                            <a class="Email" href="mailto:hr@postcre.com">hr@postcre.com</a>
                        </div>
                        <div class="Clear"></div>
                    </div>
                </div>
            </div>
            <div class="Cl Cl5-8 FloatL PadClLeft30">
                <h2>Contact For</h2>
                <form>
                    <div class="Cl Cl4-8 FloatL PadClRight30">
                        <div class="Label">
                            <input type="text" name="FirstName" value="" placeholder="First Name" required="required" />
                        </div>
                        <div class="Label">
                            <input type="text" name="Phone" value="" placeholder="Phone" required="required" pattern="[0-9-+. ]{1,}" />
                        </div>
                    </div>
                    <div class="Cl Cl4-8 FloatL PadClLeft30">
                        <div class="Label">
                            <input type="text" name="LastName" value="" placeholder="Last Name" required="required" />
                        </div>
                        <div class="Label">
                            <input type="email" name="Email" value="" placeholder="Email" required="required" />
                        </div>
                    </div>
                    <div class="Clear"></div>

                    <div class="Label Select">
                        <div class="SelectAct">
                            <div class="Value">Select property</div>
                            <input type="hidden" name="emailTo" value="svetlana@postrents.com" />
                            <div class="Arrow">
                                <svg x="0px" y="0px" width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                                <rect fill="#DCCA54" width="50" height="50"/>
                                <polygon points="16.453,20.922 24.641,29.109 33.547,20.891 "/>
                                </svg>
                            </div>
                        </div>
                        <div class="Dropdown">
                            <a data-value="Goldtex.CorpWebsite.Post@aptleasing.info">Goldtex</a>
                            <a data-value="Presidential.CorpWebsite.post@aptleasing.info">Presidential City</a>
                            <a data-value="Roosevelt.CWpostrentscom.Post@aptleasing.info">Roosevelt</a>
                            <a data-value="GardenCourt.CorporateWebsite.Post@aptleasing.info">Garden Court</a>
                            <a data-value="RittenhouseHill.CorporateWebsite.post@aptleasing.info">Rittenhouse Hill</a>
                            <a data-value="DelmarMorris.CorporateWebsite.post@aptleasing.info">Delmar Morris</a>
                            <a data-value="svetlana@postrents.com">The Atlantic</a>
                            <a data-value="svetlana@postrents.com">The Duchess</a>
                            <div class="Mask"></div>
                        </div>
                    </div>

                    <div class="Label">
                        <textarea type="text" name="Message" placeholder="Enter message" required="required" ></textarea>
                    </div>
                    <input type="submit" name="" value="Send" />
                    <div class="Score">We Will contact You as soon as possible</div>
                    <div class="Clear"></div>
                </form>
            </div>
            <div class="Clear"></div>
        </div>
    </div>


</div>

<?php get_footer(); ?>
