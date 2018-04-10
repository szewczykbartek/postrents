<?php
/*
  Template Name: Admin
 */

get_header();
global $ActId, $ParentId;
?>

<div class="Page Admin">
    <div class="Background">
        <div class="TopSide"></div>
    </div>

    <div class="Container">
        <div class="SelectBuilding">
            <div class="Select">
                <div class="Act">
                    <div class="Text">Goldtex</div>
                    <div class="Arrow">
                        <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                        <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                        </svg>
                    </div>
                </div>
                <div class="Change">
                    <div class="Mask"></div>
                    <a data-value="1" class="active">Goldtex</a>
                    <a data-value="2">1401 Spruce</a>
                    <a data-value="3">Rittenhouse Hill</a>
                    <a data-value="4">Dellmar Morris</a>
                    <a data-value="4">Pastorius Court</a>
                    <a data-value="4">Cloverly Park</a>
                </div>
            </div>
        </div>
        <div class="Table">
            <div class="Header">
                <div class="Cl">Name</div>
                <div class="Cl">Id</div>
                <div class="Cl">Bathrooms</div>
                <div class="Cl">Bedrooms</div>
                <div class="Cl">SQ.FT</div>
                <div class="Cl">Floor<br/>Plan</div>
                <div class="Cl">Price</div>
                <div class="Cl">Availability</div>
                <div class="Clear"></div>
            </div>
            <div class="Body">
                <div class="Row">
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Input">
                                <div class="Act"><div class="Text">Studio C</div></div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <input type="text" name="" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Input">
                                <div class="Act"><div class="Text">#345</div></div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <input type="text" name="" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Select">
                                <div class="Act">
                                    <div class="Text">1 Bath</div>
                                    <div class="Arrow">
                                        <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                                        <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <a data-value="1" class="active">1 Bath</a>
                                    <a data-value="2">2 Bath</a>
                                    <a data-value="3">3 Bath</a>
                                    <a data-value="4">4 Bath</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Select">
                                <div class="Act">
                                    <div class="Text">2 Bedrooms</div>
                                    <div class="Arrow">
                                        <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                                        <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <a data-value="1">1 Bedroom</a>
                                    <a data-value="2" class="active">2 Bedrooms</a>
                                    <a data-value="3">3 Bedrooms</a>
                                    <a data-value="4">4 Bedrooms</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Input">
                                <div class="Act"><div class="Text">400</div></div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <input type="text" name="" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos Text">
                            <svg x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                            <polygon fill="#010101" points="10.699,1.337 10.699,3.653 13.132,3.653 	"/>
                            <path fill="#010101" d="M13.399,5.376H8.851V1.103H2.928c0,0-0.328,0-0.328,0.312v13.4c0,0.312,0.328,0.312,0.328,0.312h10.375"/>
                            </svg>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Input">
                                <div class="Act"><div class="Text">$ 1.40</div></div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <input type="text" name="" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Select">
                                <div class="Act">
                                    <div class="Text">Available</div>
                                    <div class="Arrow">
                                        <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                                        <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <a data-value="1" class="active">Available</a>
                                    <a data-value="2">Not Available</a>
                                    <a data-value="3">Hide</a>
                                    <a data-value="4">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Clear"></div>
                </div>

                
                
                <div class="Row">
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Input">
                                <div class="Act"><div class="Text">Studio C</div></div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <input type="text" name="" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Input">
                                <div class="Act"><div class="Text">#345</div></div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <input type="text" name="" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Select">
                                <div class="Act">
                                    <div class="Text">1 Bath</div>
                                    <div class="Arrow">
                                        <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                                        <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <a data-value="1" class="active">1 Bath</a>
                                    <a data-value="2">2 Bath</a>
                                    <a data-value="3">3 Bath</a>
                                    <a data-value="4">4 Bath</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Select">
                                <div class="Act">
                                    <div class="Text">2 Bedrooms</div>
                                    <div class="Arrow">
                                        <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                                        <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <a data-value="1">1 Bedroom</a>
                                    <a data-value="2" class="active">2 Bedrooms</a>
                                    <a data-value="3">3 Bedrooms</a>
                                    <a data-value="4">4 Bedrooms</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Input">
                                <div class="Act"><div class="Text">400</div></div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <input type="text" name="" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos Text">
                            <svg x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                            <polygon fill="#010101" points="10.699,1.337 10.699,3.653 13.132,3.653 	"/>
                            <path fill="#010101" d="M13.399,5.376H8.851V1.103H2.928c0,0-0.328,0-0.328,0.312v13.4c0,0.312,0.328,0.312,0.328,0.312h10.375"/>
                            </svg>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Input">
                                <div class="Act"><div class="Text">$ 1.40</div></div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <input type="text" name="" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Select">
                                <div class="Act">
                                    <div class="Text">Available</div>
                                    <div class="Arrow">
                                        <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                                        <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <a data-value="1" class="active">Available</a>
                                    <a data-value="2">Not Available</a>
                                    <a data-value="3">Hide</a>
                                    <a data-value="4">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Clear"></div>
                </div>
                <div class="Row">
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Input">
                                <div class="Act"><div class="Text">Studio C</div></div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <input type="text" name="" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Input">
                                <div class="Act"><div class="Text">#345</div></div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <input type="text" name="" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Select">
                                <div class="Act">
                                    <div class="Text">1 Bath</div>
                                    <div class="Arrow">
                                        <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                                        <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <a data-value="1" class="active">1 Bath</a>
                                    <a data-value="2">2 Bath</a>
                                    <a data-value="3">3 Bath</a>
                                    <a data-value="4">4 Bath</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Select">
                                <div class="Act">
                                    <div class="Text">2 Bedrooms</div>
                                    <div class="Arrow">
                                        <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                                        <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <a data-value="1">1 Bedroom</a>
                                    <a data-value="2" class="active">2 Bedrooms</a>
                                    <a data-value="3">3 Bedrooms</a>
                                    <a data-value="4">4 Bedrooms</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Input">
                                <div class="Act"><div class="Text">400</div></div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <input type="text" name="" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos Text">
                            <svg x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
                            <polygon fill="#010101" points="10.699,1.337 10.699,3.653 13.132,3.653 	"/>
                            <path fill="#010101" d="M13.399,5.376H8.851V1.103H2.928c0,0-0.328,0-0.328,0.312v13.4c0,0.312,0.328,0.312,0.328,0.312h10.375"/>
                            </svg>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Input">
                                <div class="Act"><div class="Text">$ 1.40</div></div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <input type="text" name="" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Cl">
                        <div class="Pos">
                            <div class="Select">
                                <div class="Act">
                                    <div class="Text">Available</div>
                                    <div class="Arrow">
                                        <svg x="0px" y="0px" width="13.417px" height="6.218px" viewBox="0 0 13.417 6.218" enable-background="new 0 0 13.417 6.218" xml:space="preserve">
                                        <polygon fill="#000000" points="6.75,0 0,0 6.75,6.218 13.417,0 "/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="Change">
                                    <div class="Mask"></div>
                                    <a data-value="1" class="active">Available</a>
                                    <a data-value="2">Not Available</a>
                                    <a data-value="3">Hide</a>
                                    <a data-value="4">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Clear"></div>
                </div>
                
                

            </div>
            <div class="Footer">
                <a class="Add">Add New Apartment</a>
                <a class="Preview">Preview</a>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>

