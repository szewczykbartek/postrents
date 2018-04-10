// 2017.06.07;
var ControlPack;

var isAnimating = false;

var scrollAction = false;

var timeNow = new Date().getTime();
var lastAnimation = 0;
var animationTime = 350;
var quietPeriod = 350;
var quietPeriodTouch = 350;

var console = console || {"log": function() {
    }};




var setTimeoutListApartment;

var mapSoho = [];
var Markers;
var MarkersArray = [];
var bounds;


var scrollbarContentApi;


$(document).ready(function() {

    function Control() {
        var self = this;

        $.extend(this, {
            Render: function() {

                // Design

                wWindow = $(window).width();
                hWindow = $(window).height();


                wContent = wWindow - 60 - 60;
                hContent = hWindow - 200 - 60;

                $('.Cl33pJs').width(wContent * 0.33);


                $('.hWindow').height(hWindow);
                $('.hContent').height(hContent);

                // Home

                $('#Background').height('100%')
                if (wWindow < 768)
                    $('#Background').height($('#Contents').height())


                $('.NiceCheckbox').each(function() {
                    if ($(this).find('input').is(':checked'))
                        $(this).addClass('on');
                    else
                        $(this).removeClass('on');
                });


                hMax = 0;
                $('.Page.Building:visible .Section.Brochure .Slider .TabsContent .Tab').height('');
                $('.Page.Building:visible .Section.Brochure .Slider .TabsContent .Tab').each(function() {
                    if ($(this).height() > hMax)
                        hMax = $(this).height()
                });
                $('.Page.Building:visible .Section.Brochure .Slider .TabsContent .Tab').height(hMax);


                idName = $('.Content:visible .MapContent').attr('id');
                if (mapSoho[idName]) {

                    setTimeout(function() {
                        mapSoho[idName].fitBounds(bounds);
                    }, 1500);
                }





                $('.Page.Building .Apartments .Apartment').removeClass('hide')
                aa = [];
                cApartmentRow = Math.round($('.Page.Building .Apartments').outerWidth() / $('.Page.Building .Apartments .Apartment').outerWidth());


                cc = 0;
                $('.Page.Building .Apartments .Apartment').each(function(key) {
                    cClass = 'x';
                    if ($(this).hasClass('Blank'))
                        cClass = 'blank';

                    aa[cc] = cClass;
                    cc++;
                    if (cc == cApartmentRow && ($('.Page.Building .Apartments .Apartment').length - 1) != key) {
                        cc = 0;
                        aa = [];
                    }
                })

                actionRemove = true;
                $.each(aa, function(key, value) {
                    if (value != 'blank')
                        actionRemove = false;
                })

                for (i = ($('.Page.Building .Apartments .Apartment').length - 1); i > ($('.Page.Building .Apartments .Apartment').length - 1 - aa.length); i--) {
                    $('.Page.Building .Apartments .Apartment').eq(i).addClass('hide')
                }
            },
            VideoCenter: function(target, parent) {
                tt = target;
                if (parent == 'parent') {
                    parent = $(target).parent();
                } else {
                    parent = $(parent);
                }

                targetVideo = $(target).find('video');
                if ($(target).find('video').length == 0) {
                    targetVideo = $(target);
                }

                targetVideo.width('auto').height('100%').css('margin-left', 0).css('margin-top', 0);

                wWindow = parent.width();
                hWindow = parent.height();

                widthVideo = targetVideo.width();
                heightVideo = targetVideo.height();

                if (widthVideo < wWindow) {
                    targetVideo.width('100%').height('auto');
                    margTop = (targetVideo.height() - hWindow) / 2;
                    //targetVideo.css('margin-top', -margTop);
                } else {
                    targetVideo.width('auto').height('100%');
                    margLeft = (targetVideo.width() - wWindow) / 2;
                    //targetVideo.css('margin-left', -margLeft);
                }
            },
            LoadPageDisplay: function(action, target, depth) {
                switch (action) {
                    //
                    // SHOW LOADER
                    //
                    case 'show':

                        $('#Menu').removeClass('Show');

                        setTimeout(function() {

                            $('body').addClass('LoaderMain LoaderStart');

                            $('body').removeClass('Ready');
                        }, 600);

                        break;
                    case 'hideLong':

                        $('*[data-style]').each(function() {
                            $(this).attr('style', $(this).attr('data-style'))
                        })


                        s = window.location.search.split('e=');
                        if (s[1]) {
                            pos = $('.Page:visible a[name="' + s[1] + '"]').position().top
                            if (pos)
                                $('body, html').scrollTop(pos);
                        }

                        setTimeout(function() {
                            $('body').removeClass('Hide');
                            $('body').addClass('LoaderEnd');
                            setTimeout(function() {
                                $('body').removeClass('LoaderMain LoaderStart LoaderEnd');
                                $('body').addClass(target + 'Ready Ready');

                                self.LoadPageDisplay('extraAction');
                            }, 500);
                        }, 500);
                        break;
                    case 'hide':
                        $('body, html').scrollTop(0);

                        $('*[data-style]').each(function() {
                            $(this).attr('style', $(this).attr('data-style'))
                        })

                        setTimeout(function() {

                            s = window.location.search.split('=');
                            if (s[1]) {
                                pos = $('.Page:visible a[name="' + s[1] + '"]').position().top
                                $('body, html').scrollTop(pos);
                            }

                            $('body').removeClass('Hide');
                            $('body').addClass('LoaderEnd');

                            $('#Contents').removeClass('OpacityHide');

                            setTimeout(function() {
                                $('body').removeClass('LoaderMain LoaderStart LoaderEnd');
                                $('body').addClass(target + 'Ready Ready');

                                self.LoadPageDisplay('extraAction');
                            }, 500);
                        }, 500);
                        break;
                }
            },
            LoadPageClassbody: function() {

                PageExist = false;

                address = window.location.pathname;
                address = address.split("/");

                if (address[(address.length - 1)] == 'postbrothers' || address[(address.length - 1)] == 'postrents.com' || !address[(address.length - 1)]) {
                    classNew = 'home';

                    PageExist = true;
                } else {
                    classNew = address[2];
                }

                PageAllArray = PageAll.split(' ');
                $.each(PageAllArray, function(index, value) {
                    if (value == address[2])
                        PageExist = true;
                });

                if (PageExist == false)
                    classNew = 'other';

                setTimeout(function() {
                    $('body').removeClass(PageClass).addClass(classNew)
                }, 1000);
            },
            LoadPageEngine: function(addressNew, targetContainer, slugContainer) {

                picsBase = new Array();

                switch (addressNew) {
                    //
                    // GLOBAL
                    //
                    case 'global':
                        self.LoadPageClassbody();
                        self.LoadPageDisplay('show');

                        setTimeout(function() {

                            var all = 0;
                            target = targetContainer;
                            target.find('img').each(function() {
                                if ($(this).attr('data-src') && !$(this).hasClass('NoLoader')) {
                                    src = $(this).attr('data-src');
                                    picsBase.push(src);
                                    all += 1;
                                }
                            });
                            var loaded = 0;
                            var procent = 0;

                            LoaderPicList = function(order) {
                                link = picsBase[order];
                                link = link.split('/');
                                link = link[(link.length - 1)];

                                targetOne = target.find('img[data-src="' + picsBase[order] + '"]');
                                targetOne.attr('src', targetOne.attr('data-src'));

                                targetOne.bind('load', function() {
                                    targetOne.addClass('loaded').removeAttr('data-src');
                                    order++;

                                    if (picsBase[order]) {
                                        LoaderPicList(order);
                                    } else {
                                        if (slugContainer != 'other')
                                            targetContainer.attr('data-loaded', 'true');
                                        self.LoadPageDisplay('hideLong', $('#Contents .Content[data-active="active"]').data('content'));
                                        self.Render();
                                        self.PageFunction();
                                        self.PageFunctionForPage();
                                        self.CountUnits();

                                    }
                                });
                            }
                            if (picsBase.length > 0) {
                                LoaderPicList(0);
                            } else {

                                if (slugContainer != 'other')
                                    targetContainer.attr('data-loaded', 'true');
                                self.LoadPageDisplay('hideLong', $('#Contents .Content[data-active="active"]').data('content'));
                                self.Render();
                                self.PageFunction();
                                self.PageFunctionForPage();
                                self.CountUnits();

                            }

                        }, 500);


                        break;

                        //
                        // NORMAL PAGE
                        //
                    default:

                        self.LoadPageClassbody();
                        self.LoadPageDisplay('show');

                        CheckLoaded = targetContainer.attr('data-loaded');

                        if (CheckLoaded != 'true') {

                            targetContainer.html('');
                            targetContainer.load((addressNew), {
                            }, function(response, status, xhr) {

                                var all = 0;
                                target = targetContainer;
                                target.find('img').each(function() {
                                    if ($(this).attr('data-src') && !$(this).hasClass('NoLoader')) {
                                        src = $(this).attr('data-src');
                                        picsBase.push(src);
                                        all += 1;
                                    }
                                });
                                var loaded = 0;
                                var procent = 0;

                                LoaderPicList = function(order) {
                                    link = picsBase[order];
                                    link = link.split('/');
                                    link = link[(link.length - 1)];

                                    targetOne = target.find('img[data-src="' + picsBase[order] + '"]');
                                    targetOne.attr('src', targetOne.attr('data-src'));

                                    targetOne.bind('load', function() {
                                        targetOne.addClass('loaded').removeAttr('data-src');
                                        order++;

                                        if (picsBase[order]) {
                                            LoaderPicList(order);
                                        } else {

                                            if (slugContainer != 'other')
                                                targetContainer.attr('data-loaded', 'true');
                                            self.LoadPageDisplay('hide', $('#Contents .Content[data-active="active"]').data('content'));
                                            self.Render();
                                            self.PageForm();
                                            self.PageFunction();
                                            self.PageFunctionForPage();
                                            self.CountUnits();

                                        }
                                    });
                                }
                                if (picsBase.length > 0) {
                                    LoaderPicList(0);
                                } else {

                                    if (slugContainer != 'other')
                                        targetContainer.attr('data-loaded', 'true');
                                    self.LoadPageDisplay('hide', $('#Contents .Content[data-active="active"]').data('content'));
                                    self.Render();
                                    self.PageForm();
                                    self.PageFunction();
                                    self.PageFunctionForPage();
                                    self.CountUnits();

                                }
                            });

                        } else {

                            self.LoadPageDisplay('hide', $('#Contents .Content[data-active="active"]').data('content'));

                            self.PageTransition();
                            self.Render();
                            self.PageForm();
                            self.PageFunction();
                            self.PageFunctionForPage();
                            self.CountUnits();
                        }

                        //}, 500);

                }

            },
            PageTransition: function() {
                setTimeout(function() {
                    $('#Contents .Content').removeClass('pt-page-current');
                    $('#Contents .Content[data-active="active"]').addClass('pt-page-current');
                }, 1000);
            },
            CountUnits: function(action) {

                if (action == 'init') {
                    $('.Page:visible .Buildings .Building').each(function(key, value) {
                        var t = $(this);
                        var tBuilding = $(this).data('building');

                        setTimeout(function() {
                            t.addClass('anim');
                        }, 100 * key);

                        setTimeout(function() {
                            $('.Page:visible .Buildings .Building[data-building="' + tBuilding + '"] div.Count span.Count').html('&nbsp;');
                            t.find('div.Count .Load').show();
                        }, 100 * key + 300);
                    })
                    return false;

                } else {

                    countUnitsArray = {};
                    $('.Page:visible .Buildings .Data .Apartment').each(function() {
                        if (countUnitsArray[$(this).attr('data-building')]) {
                            val = countUnitsArray[$(this).attr('data-building')];
                        } else {
                            val = 0;
                        }
                        countUnitsArray[$(this).attr('data-building')] = Number(val) + Number($(this).attr('data-availablecount'));
                    })
                    $.each(countUnitsArray, function(i, item) {
                        if (item > 20)
                            countUnitsArray[i] = 20;
                    })


                    $('.Page:visible .Buildings .Building').each(function(key, value) {
                        var t = $(this);
                        var tBuilding = $(this).data('building');

                        s = 0;
                        if (countUnitsArray[tBuilding])
                            s = String(countUnitsArray[tBuilding]);

                        setTimeout(function() {
                            t.removeClass('anim');
                            t.find('div.Count .Load').hide();

                            if (countUnitsArray[tBuilding]) {
                                countClass = 'count' + String(countUnitsArray[tBuilding]).length;
                                $('.Page:visible .Buildings .Building[data-building="' + tBuilding + '"] div.Count span.Count').html(countUnitsArray[tBuilding]);
                            } else {
                                countClass = 'count1';
                                $('.Page:visible .Buildings .Building[data-building="' + tBuilding + '"] div.Count span.Count').html('0');
                            }

                            $('.Page:visible .Buildings .Building[data-building="' + tBuilding + '"] div.Count').removeClass('count1 count2 count3 count4');
                            $('.Page:visible .Buildings .Building[data-building="' + tBuilding + '"] div.Count').addClass(countClass);
                        }, 100 * key + 1000);
                    })


                    arrayDistrict = $('.Page:visible .Filter form input[name="district[]"]').serializeArray();
                    if (arrayDistrict.length > 0) {
                        $('.Page:visible .Buildings .Building').addClass('off');
                        $.each(arrayDistrict, function(i, item) {
                            $('.Page:visible .Buildings .Building[data-district="' + item.value + '"]').removeClass('off');
                        })
                    } else {
                        $('.Page:visible .Buildings .Building').removeClass('off');
                    }

                }
            },
            PageFunctionStart: function() {


                $(document).on('touchend', 'body:not(.computer) #Header .BtSwitch', function(event) {
                    if ($('#Header .MenuMobile').is(':visible'))
                        $('#Header .MenuMobile').hide();
                    else
                        $('#Header .MenuMobile').show();
                });
                $(document).on('click', 'body.computer #Header .BtSwitch', function(event) {
                    if ($('#Header .MenuMobile').is(':visible'))
                        $('#Header .MenuMobile').hide();
                    else
                        $('#Header .MenuMobile').show();
                });



                $(document).on('click', '.ActionManagement', function(event) {
                    $('#OverlayClient').show();
                });
                $(document).on('click', '#OverlayClient .Mask, #OverlayClient a', function(event) {
                    $('#OverlayClient').hide();
                });



                $(document).on('click', '.infoBox:not(.other)', function(event) {
                    link = $(this).find('.Title').attr('data-link');

                    window.open(link,"_self")

                    $.ajax({
                        url: domainTemplate + '/action/page_title.php',
                        data: {url: link}
                    }).done(function(msg) {
                        $('head title').html(msg)
                    });

                    History.pushState({
                        rand: Math.random()
                    }, null, link);

                    return false;
                });



                //
                // NiceCheckbox
                //

                $(document).on('click', '.NiceCheckbox', function(event) {
                    $('.NiceCheckbox').each(function() {
                        if ($(this).find('input').is(':checked'))
                            $(this).addClass('on');
                        else
                            $(this).removeClass('on');
                    });
                });


                $(document).on('click', '.Filter .Handle', function(event) {
                    $('.Filter').toggleClass('show');
                    $(this).closest('.Page').toggleClass('showFilter');
                });

                $(document).on('click', '.Filter .More .Bt:not(.wait)', function(event) {

                    $(this).addClass('wait');

                    parent = $(this).closest('.Page');

                    self.CountUnits('init');

                    if ($('.Page:visible .Buildings').length > 0) {
                        $('html, body').animate({
                            scrollTop: $('.Page:visible .Buildings').offset().top
                        }, 500);
                    }

                    $.ajax({
                        type: "GET",
                        url: domainTemplate + '/inc_listApartments.php',
                        data: parent.find('.Filter .More form').serialize()
                    }).done(function(msg) {
                        parent.find('.Apartments').html(msg);
                        parent.find('.Buildings .Data').html(msg);

                        self.CountUnits();

                        $('.Filter .More .Bt').removeClass('wait');
                    });
                });


                // Floorplan Overlay

                $(document).on('click', '.ActionFloorplanOverlay', function(event) {
                    if (!$(event.target).hasClass('RentNow')) {

                        $('.Page.Building:visible .Apartments .Apartment').removeClass('active');
                        $(this).closest('.Apartment').addClass('active');

                        i = $(this).closest('.Apartment').index();
                        $('.Page.Building:visible .FloorplanOverlay .Box').eq(i).addClass('show');

                        $('.Page.Building:visible .FloorplanOverlay').addClass('show');
                    }
                })
                $(document).on('click', '.Page.Building .FloorplanOverlay .Mask, .Page.Building .FloorplanOverlay .Box .Header .Close', function(event) {
                    $('.Page.Building:visible .FloorplanOverlay').removeClass('show');
                    $('.Page.Building:visible .FloorplanOverlay .Box').removeClass('show');
                })
                $(document).on('click', '.ActionFloorplanOverlayPrev, .ActionFloorplanOverlayNext', function(event) {
                    i = $('.Page.Building:visible .FloorplanOverlay .Box.show').index();

                    if ($(this).hasClass('Prev'))
                        i--;
                    if ($(this).hasClass('Next'))
                        i++;

                    if (i < 0)
                        i = ($('.Page.Building:visible .FloorplanOverlay .Box').length - 1);
                    if (i > ($('.Page.Building:visible .FloorplanOverlay .Box').length - 1))
                        i = 0;


                    $('.Page.Building:visible .FloorplanOverlay .Box').removeClass('show');
                    $('.Page.Building:visible .FloorplanOverlay .Box').eq(i).addClass('show');
                })


                // Slider Gallery

                $(document).on('click', '.SliderGallery .Nav a', function(event) {
                    i = $(this).index();
                    $(this).closest('.Nav').find('a').removeClass('active');
                    $(this).addClass('active');

                    $(this).closest('.SliderGallery').find('.Photos .Photo').removeClass('active');
                    $(this).closest('.SliderGallery').find('.Photos .Photo').eq(i).addClass('active');
                });
                $(document).on('click', '.SliderGallery .NavArrow a', function(event) {
                    i = $(this).closest('.SliderGallery').find('.Nav a.active').index();
                    iMax = $(this).closest('.SliderGallery').find('.Nav a').length - 1;

                    if ($(this).hasClass('Prev'))
                        i--;
                    if ($(this).hasClass('Next'))
                        i++;

                    if (i < 0)
                        i = iMax;
                    if (i > iMax)
                        i = 0;

                    $(this).closest('.SliderGallery').find('.Nav a').removeClass('active');
                    $(this).closest('.SliderGallery').find('.Nav a').eq(i).addClass('active');

                    $(this).closest('.SliderGallery').find('.Photos .Photo').removeClass('active');
                    $(this).closest('.SliderGallery').find('.Photos .Photo').eq(i).addClass('active');
                });

                $(document).on('click', '.Page.Building:visible .Section.Brochure .TabsArrow a', function(event) {
                    i = $('.Page.Building:visible .Section.Brochure .Slider .TabsNav .Tab.active').index();
                    iMax = $('.Page.Building .Section.Brochure .Slider .TabsNav .Tab').length - 1;

                    if ($(this).hasClass('Prev'))
                        i--;
                    if ($(this).hasClass('Next'))
                        i++;

                    if (i < 0)
                        i = iMax;
                    if (i > iMax)
                        i = 0;

                    $('.Page.Building:visible .Section.Brochure .Slider .TabsNav .Tab.active').removeClass('active');
                    $('.Page.Building:visible .Section.Brochure .Slider .TabsNav .Tab').eq(i).addClass('active');

                    $('.Page.Building:visible .Section.Brochure .Slider .TabsContent .Tab.active').removeClass('active');
                    $('.Page.Building:visible .Section.Brochure .Slider .TabsContent .Tab').eq(i).addClass('active');
                })





                $(document).on('click', '.Page.Building .Section.Filter .ShowMore', function(event) {
                    $('.Page.Building .Section.Filter .Apartments').addClass('showAll')
                })


                $(document).on('click', '.Page.Building:visible .Section.Brochure .TabsNav .Tab', function(event) {
                    i = $(this).index();
                    $('.Page.Building:visible .Section.Brochure .Slider .TabsNav .Tab').removeClass('active');
                    $('.Page.Building:visible .Section.Brochure .Slider .TabsNav .Tab').eq(i).addClass('active');

                    $('.Page.Building:visible .Section.Brochure .Slider .TabsPhoto .Tab').removeClass('active');
                    $('.Page.Building:visible .Section.Brochure .Slider .TabsPhoto .Tab').eq(i).addClass('active');

                    $('.Page.Building:visible .Section.Brochure .Slider .TabsContent .Tab').removeClass('active');
                    $('.Page.Building:visible .Section.Brochure .Slider .TabsContent .Tab').eq(i).addClass('active');
                })



                $(document).on('click', '.Page.Building:visible .Section.Floorplans .Nav', function(event) {
                    slide = $('.Page.Building:visible .Section.Floorplans').attr('data-slide');
                    if ($(this).hasClass('Prev'))
                        slide--;
                    if ($(this).hasClass('Next'))
                        slide++;

                    if (slide < 0)
                        slide = ($('.Page.Building:visible .Section.Floorplans .Items .Floorplan').length - 1);
                    if (slide > ($('.Page.Building:visible .Section.Floorplans .Items .Floorplan').length - 1))
                        slide = 0;

                    $('.Page.Building:visible .Section.Floorplans').attr('data-slide', slide);
                })






                $(document).on('click', '.Page.Building .Section.Filter .ShowMore', function(event) {
                    $('.Page.Building .Section.Filter .Apartments').addClass('showAll')
                })



                $(document).on('click', '.Page.About .Person .ReadMore', function(event) {
                    $(this).closest('.Row').find('.Person').toggleClass('show');
                })


                $(document).on('click', '.Page.About .ShowMore', function(event) {
                    $(this).closest('.Persons').toggleClass('showAll');
                })




                $(document).on('click', '.Page.Admin .Select .Act', function(event) {
                    $(this).closest('.Select').addClass('show');

                    h = 85 + $(this).closest('.Select').find('.Change').height();
                    $(this).closest('.Select').height(h)
                })
                $(document).on('click', '.Page.Admin .Select .Change .Mask', function(event) {
                    $(this).closest('.Select').removeClass('show');
                    $(this).closest('.Select').height('100%');
                })
                $(document).on('click', '.Page.Admin .Select .Change a', function(event) {

                    $(this).closest('.Change').find('a').removeClass('active');
                    $(this).addClass('active');

                    val = $(this).data('value');
                    txt = $(this).text()
                    $(this).closest('.Select').find('.Act .Text').html(txt);
                    $(this).closest('.Select').removeClass('show');
                    $(this).closest('.Select').height('100%');
                })




                //
                //  Location
                //

                $(document).on('click', '.ZoomMap.In, .ZoomMap.Out', function(event) {
                    idName = $('.Content:visible .MapContent').attr('id');

                    zoom = mapSoho[idName].getZoom();
                    if ($(this).hasClass('In'))
                        zoom++;
                    if ($(this).hasClass('Out'))
                        zoom--;
                    mapSoho[idName].setZoom(zoom);
                })




                $(document).on('click', '.Page.Admin .Input .Act', function(event) {
                    txt = $(this).find('.Text').text();
                    $(this).closest('.Input').find('.Change input').val(txt);

                    $(this).closest('.Input').addClass('show');
                    $(this).closest('.Input').find('.Change input').focus();

                    val = $(this).closest('.Input').find('.Change input').val();


                    if (val.length > 20) {
                        $(this).closest('.Input').find('.Change').addClass('long');
                    } else {
                        $(this).closest('.Input').find('.Change').removeClass('long');
                    }

                    if ($(this).closest('.Cl').width() < 100) {
                        $(this).closest('.Input').find('.Change').addClass('long');
                    }
                })
                $(document).on('click', '.Page.Admin .Input .Change .Mask', function(event) {
                    val = $(this).closest('.Input').find('.Change input').val();

                    $(this).closest('.Input').find('.Act .Text').html(val);
                    $(this).closest('.Input').removeClass('show');
                })
                $(document).on('keypress', '.Page.Admin .Input .Change input', function(event) {
                    val = $(this).val();
                    if (event.keyCode == 13) {
                        $(this).closest('.Input').find('.Act .Text').html(val);
                        $(this).closest('.Input').removeClass('show');
                    }

                    if (val.length > 20) {
                        $(this).closest('.Change').addClass('long');
                    } else {
                        $(this).closest('.Change').removeClass('long');
                    }

                    if ($(this).closest('.Cl').width() < 100) {
                        $(this).closest('.Input').find('.Change').addClass('long');
                    }
                })




                $(document).on('click', '.ActionShowOnMap', function(event) {
                    pos = $('.Page.Main .Section.Map').position().top;
                    building = $(this).closest('.Building').data('building');

                    $('html, body').animate({scrollTop: pos}, '500', 'swing', function() {
                        $.each(MarkersArray, function(i, item) {
                            if (item.id == building) {
                                idMarker = i;
                            }
                        })

                        mapSoho['MapHome'].panTo(MarkersArray[idMarker].getPosition());
                        mapSoho['MapHome'].setZoom(15);
                    });

                    return false;
                })


                $(document).on('click', '.RollAction', function(event) {
                    roll = $(this).data('roll');
                    $('.Page:visible .RollContent[data-roll="' + roll + '"]').toggle();
                })



                // Contact


                $(document).on('click', '.Page.Contact label', function(event) {
                    return false;
                })

                $(document).on('click', '.Page.Contact .Select .SelectAct', function(event) {
                    $('.Page.Contact .Select .Dropdown').show();
                });
                $(document).on('click', '.Page.Contact .Select .Dropdown a', function(event) {
                    val = $(this).data('value');
                    html = $(this).html();
                    $('.Page.Contact .Select .SelectAct .Value').html(html);
                    $('.Page.Contact .Select .SelectAct input').val(val);
                    $('.Page.Contact .Select .Dropdown').hide();
                });
                $(document).on('click', '.Page.Contact .Select .Dropdown .Mask', function(event) {
                    $('.Page.Contact .Select .Dropdown').hide();
                });


                $(document).on('click', '.Page.Contact .Validation .BtClose, .Page.Contact .Validation .Mask', function(event) {
                    $(this).closest('.Validation').hide();
                })




                // About

                $(document).on('click', ".Page.About .Section.Careers a.Pos", function(event) {
                    $('.Page.About .Section.Careers .Popup .Title').html($(this).data('title'));
                    $('.Page.About .Section.Careers .Popup .Text').html($(this).data('text'));
                    $('.Page.About .Section.Careers .Popup').show();
                })
                $(document).on('click', ".Page.About .Section.Careers .Popup .Close", function(event) {
                    $('.Page.About .Section.Careers .Popup').hide();
                })


                // Our buildings


                $(document).on('mouseenter', '.Page.OurProperties .Buildings .Building', function(event) {
                    $(this).closest('.Building').find('.Description').addClass('show');
                })
                $(document).on('mouseleave', '.Page.OurProperties .Buildings .Building', function(event) {
                    $(this).closest('.Building').find('.Description').removeClass('show');
                })




                // Template

                $(document).on('click', '.Page.Template .ActionKeyPlaces', function(event) {
                    $('.KeyPlaces').toggle();
                })
                $(document).on('click', '.Page.Template .ActionEcoLearn', function(event) {
                    $('.EcoLearn').toggle();
                })



                // Main

                $(document).on('click', '.Page.Main .BigPlay', function(event) {
                    videoMain.play();
                });

            },
            PageFunctionForPage: function() {
                if ($('body').hasClass('computer') || $('body').hasClass('phone')) {
                    videoSource = {
                        "0": ['PostRents2.mp4', 'PostRents2.ogv', 'PostRents2.webm', 'PostRents2.jpg', 'bottom'],
                        "1": ['PostRents4.mp4', 'PostRents4.ogv', 'PostRents4.webm', 'PostRents4.jpg', 'bottom'],
                        "2": ['PostRents5.mp4', 'PostRents5.ogv', 'PostRents5.webm', 'PostRents5.jpg', 'bottom'],
                        "3": ['PostRents11.mp4', 'PostRents11.ogv', 'PostRents11.webm', 'PostRents11.jpg', 'center'],
                        "4": ['PostRents14.mp4', 'PostRents14.ogv', 'PostRents14.webm', 'PostRents14.jpg', 'bottom'],
                        "5": ['PostRents16.mp4', 'PostRents16.ogv', 'PostRents16.webm', 'PostRents16.jpg', 'bottom'],
                        "6": ['PostRents19.mp4', 'PostRents19.ogv', 'PostRents19.webm', 'PostRents19.jpg', 'bottom'],
                        "7": ['PostRents21.mp4', 'PostRents21.ogv', 'PostRents21.webm', 'PostRents21.jpg', 'bottom'],
                        "8": ['PostRents26.mp4', 'PostRents26.ogv', 'PostRents26.webm', 'PostRents26.jpg', 'top'],
                        "9": ['PostRents30.mp4', 'PostRents30.ogv', 'PostRents30.webm', 'PostRents30.jpg', 'bottom'],
                        "10": ['PostRents32.mp4', 'PostRents32.ogv', 'PostRents32.webm', 'PostRents32.jpg', 'bottom'],
                        "11": ['PostRents33.mp4', 'PostRents33.ogv', 'PostRents33.webm', 'PostRents33.jpg', 'bottom'],
                        "12": ['PostRents36.mp4', 'PostRents36.ogv', 'PostRents36.webm', 'PostRents36.jpg', 'center'],
                        "13": ['PostRents39.mp4', 'PostRents39.ogv', 'PostRents39.webm', 'PostRents39.jpg', 'bottom'],
                        "14": ['PostRents41.mp4', 'PostRents41.ogv', 'PostRents41.webm', 'PostRents41.jpg', 'center'],
                        "15": ['PostRents44.mp4', 'PostRents44.ogv', 'PostRents44.webm', 'PostRents44.jpg', 'center'],
                        "16": ['PostRents58.mp4', 'PostRents58.ogv', 'PostRents58.webm', 'PostRents58.jpg', 'bottom'],
                        "17": ['PostRents59.mp4', 'PostRents59.ogv', 'PostRents59.webm', 'PostRents59.jpg', 'bottom'],
                        "18": ['PostRents61.mp4', 'PostRents61.ogv', 'PostRents61.webm', 'PostRents61.jpg', 'bottom'],
                        "19": ['PostRents62.mp4', 'PostRents62.ogv', 'PostRents62.webm', 'PostRents62.jpg', 'bottom']
                    }
                    VideoRandom = rand(0, 18, 0);
                }
                if ($('body').hasClass('tablet')) {
                    videoSource = {
                        "0": ['PostRents2_Tablet.mp4', '', '', 'PostRents2.jpg', 'bottom'],
                        "1": ['PostRents4_Tablet.mp4', '', '', 'PostRents4.jpg', 'bottom'],
                        "2": ['PostRents5_Tablet.mp4', '', '', 'PostRents5.jpg', 'bottom'],
                        "3": ['PostRents11_Tablet.mp4', '', '', 'PostRents11.jpg', 'bottom'],
                        "4": ['PostRents14_Tablet.mp4', '', '', 'PostRents14.jpg', 'bottom'],
                        "5": ['PostRents16_Tablet.mp4', '', '', 'PostRents16.jpg', 'bottom'],
                        "6": ['PostRents19_Tablet.mp4', '', '', 'PostRents19.jpg', 'bottom'],
                        "7": ['PostRents21_Tablet.mp4', '', '', 'PostRents21.jpg', 'bottom'],
                        "8": ['PostRents26_Tablet.mp4', '', '', 'PostRents26.jpg', 'bottom'],
                        "9": ['PostRents30_Tablet.mp4', '', '', 'PostRents30.jpg', 'bottom'],
                        "10": ['PostRents32_Tablet.mp4', '', '', 'PostRents32.jpg', 'bottom'],
                        "11": ['PostRents33_Tablet.mp4', '', '', 'PostRents33.jpg', 'bottom'],
                        "12": ['PostRents36_Tablet.mp4', '', '', 'PostRents36.jpg', 'bottom'],
                        "13": ['PostRents39_Tablet.mp4', '', '', 'PostRents39.jpg', 'bottom'],
                        "14": ['PostRents41_Tablet.mp4', '', '', 'PostRents41.jpg', 'bottom'],
                        "15": ['PostRents44_Tablet.mp4', '', '', 'PostRents44.jpg', 'bottom'],
                        "16": ['PostRents58_Tablet.mp4', '', '', 'PostRents58.jpg', 'bottom'],
                        "17": ['PostRents59_Tablet.mp4', '', '', 'PostRents59.jpg', 'bottom'],
                        "18": ['PostRents61_Tablet.mp4', '', '', 'PostRents61.jpg', 'bottom'],
                        "19": ['PostRents62_Tablet.mp4', '', '', 'PostRents62.jpg', 'bottom']
                    }
                    VideoRandom = rand(0, 18, 0);
                }

                function rand(min, max, whole) {
                    return void 0 === whole || !1 === whole ? Math.random() * (max - min + 1) + min : !isNaN(parseFloat(whole)) && 0 <= parseFloat(whole) && 20 >= parseFloat(whole) ? (Math.random() * (max - min + 1) + min).toFixed(whole) : Math.floor(Math.random() * (max - min + 1)) + min;
                }

                $('.Page.Main .Video').css('background-image', 'url(' + domainTemplate + '/assets/video/' + videoSource[VideoRandom][3] + ')');

                if ($('body').hasClass('computer') || $('body').hasClass('tablet')) {
                    if ($('#video-main').length != 0) {
                        videoMain = videojs("video-main", {"autoplay": true, "loop": true}, function() {
                        });

                        if ($('body').hasClass('computer')) {
                            videoMain.src([
                                {type: "video/mp4", src: domainTemplate + '/assets/video/' + videoSource[VideoRandom][0]},
                                {type: "video/ogg", src: domainTemplate + '/assets/video/' + videoSource[VideoRandom][1]},
                                {type: "video/webm", src: domainTemplate + '/assets/video/' + videoSource[VideoRandom][2]}
                            ]);
                        }
                        if ($('body').hasClass('tablet')) {
                            videoMain.src([
                                {type: "video/mp4", src: domainTemplate + '/assets/video/' + videoSource[VideoRandom][0]}
                            ]);
                        }

                        videoMain.poster(domainTemplate + '/assets/video/' + videoSource[VideoRandom][3]);
                        videoMain.play();

                        $('.Page.Main .Video').removeClass('top bottom center');
                        $('.Page.Main .Video').addClass(videoSource[VideoRandom][4])
                    }
                }
                if ($('body').hasClass('phone')) {
                    $('.Page.Main .Video .BigPlay').attr('href', domainTemplate + '/assets/video/' + videoSource[VideoRandom][0]);
                    $('.Page.Main .Video .BigPlay').attr('target', '_blank');
                }

            },
            PageFunction: function(start) {






//                contactDef = $('.Page.Contact form').attr('define');
//                if ($('.Page.Contact form').length != 0 && contactDef != 'true') {
//
//                    console.log('valid')
//
//
//                    $('.Page.Contact form').attr('define', 'true');

//                    $.tools.validator.addEffect("wall", function(errors, event) {
//                        console.log(errors)
//                        $('input, select, textarea').removeClass('error');
//                        $.each(errors, function(index, error) {
//
//                            $('.Page.Contact .Validation.Error').show();
//
//                            $('input[name="' + error.input.attr("name") + '"]').addClass('error');
//                            $('textarea[name="' + error.input.attr("name") + '"]').addClass('error');
//
//                        });
//                    }, function(inputs) {
//                    });
//
//                    $('.Page.Contact form').validator({
//                        effect: 'wall',
//                        errorInputEvent: null
//                    }).submit(function(e) {
//                        console.log(e)
//                        if (!e.isDefaultPrevented()) {
//                            $('input, select, textarea').removeClass('error');
//
//                            $('.Page.Contact .Validation.Error').hide();
//                            $('.Page.Contact .Validation.Success').show();
//
////                            $.ajax({
////                                url: domainTemplate + "/action/smtp.php",
////                                data: $('.Page.Contact form').serialize(),
////                                type: "POST"
////                            }).done(function(html) {
////                                //console.log(html)
////                            });
//
//                            $('form').get(0).reset();
//                            return false;
//                        }
//                    });
                //    }





                $('.RangePrice').ionRangeSlider({
                    type: "double",
                    min: $(this).attr('data-min'),
                    max: $(this).attr('data-max'),
                    from: $(this).attr('data-min'),
                    max: $(this).attr('data-max'),
                            prettify_enabled: true,
                    prefix: "$ "
                });

                setTimeout(function() {
                    if ($('.Content:visible .MapContent').length == 1 && !$('.Content:visible .MapContent').hasClass('load')) {
                        idObject = $('.Content:visible .MapContent');
                        idName = $('.Content:visible .MapContent').attr('id');

                        function setMarkers(map, locations) {
                            bounds = new google.maps.LatLngBounds();

                            if ($(window).width() > 760)
                                mobileScreen = false;
                            else
                                mobileScreen = true;

                            if (mobileScreen == false) {
                                image = {
                                    "imageMain": {
                                        url: domainTemplate + '/img/MarkerMain.png',
                                        size: new google.maps.Size(23, 17),
                                        origin: new google.maps.Point(0, 0),
                                        anchor: new google.maps.Point(0, 17)
                                    },
                                    "imageMaininvert": {
                                        url: domainTemplate + '/img/MarkerMainInvert.png',
                                        size: new google.maps.Size(23, 17),
                                        origin: new google.maps.Point(0, 0),
                                        anchor: new google.maps.Point(25, 17)
                                    },
                                    "imageMainSmall": {
                                        url: domainTemplate + '/img/MarkerMain.png',
                                        size: new google.maps.Size(23, 17),
                                        origin: new google.maps.Point(0, 0),
                                        anchor: new google.maps.Point(0, 17)
                                    },
                                    "imageMainSmallinvert": {
                                        url: domainTemplate + '/img/MarkerMainInvert.png',
                                        size: new google.maps.Size(23, 17),
                                        origin: new google.maps.Point(0, 0),
                                        anchor: new google.maps.Point(25, 17)
                                    },
                                    "imageOther": {
                                        url: domainTemplate + '/img/MarkerOther.png',
                                        size: new google.maps.Size(32, 41),
                                        origin: new google.maps.Point(0, 0),
                                        anchor: new google.maps.Point(0, 41)
                                    }
                                };
                            } else {
                                image = {
                                    "imageMain": {
                                        url: domainTemplate + '/img/MarkerPhone.png',
                                        size: new google.maps.Size(30, 33),
                                        origin: new google.maps.Point(0, 0),
                                        anchor: new google.maps.Point(15, 33)
                                    },
                                    "imageMaininvert": {
                                        url: domainTemplate + '/img/MarkerPhone.png',
                                        size: new google.maps.Size(30, 33),
                                        origin: new google.maps.Point(0, 0),
                                        anchor: new google.maps.Point(15, 33)
                                    },
                                    "imageMainSmall": {
                                        url: domainTemplate + '/img/MarkerPhone.png',
                                        size: new google.maps.Size(30, 33),
                                        origin: new google.maps.Point(0, 0),
                                        anchor: new google.maps.Point(15, 33)
                                    },
                                    "imageMainSmallinvert": {
                                        url: domainTemplate + '/img/MarkerPhone.png',
                                        size: new google.maps.Size(30, 33),
                                        origin: new google.maps.Point(0, 0),
                                        anchor: new google.maps.Point(15, 33)
                                    },
                                    "imageOther": {
                                        url: domainTemplate + '/img/MarkerOther.png',
                                        size: new google.maps.Size(32, 41),
                                        origin: new google.maps.Point(0, 0),
                                        anchor: new google.maps.Point(0, 41)
                                    }
                                };
                            }

                            for (var i = 0; i < locations.length; i++) {
                                var loc = locations[i];
                                var myLatLng = new google.maps.LatLng(loc[1], loc[2]);

                                var marker = new google.maps.Marker({
                                    position: myLatLng,
                                    map: map,
                                    id: loc[0],
                                    icon: image[loc[3] + loc[6]],
                                    info_title: loc[4],
                                    info_link: loc[5],
                                    info_extra: loc[6]
                                });

                                bounds.extend(myLatLng);
                                MarkersArray.push(marker);

                                if (loc[3] != 'imageOther') {
                                    google.maps.event.addListener(marker, 'click', function(event) {
                                        $.ajax({
                                            url: domainTemplate + '/action/page_title.php',
                                            data: {url: marker.info_link}
                                        }).done(function(msg) {
                                            $('head title').html(msg)
                                        });

                                        History.pushState({
                                            rand: Math.random()
                                        }, null, marker.info_link);
                                    })
                                }



                                switch (loc[3]) {
                                    case 'imageMain':
                                        content = '<div class="Title Main ' + marker.info_extra + '" data-link="' + marker.info_link + '">' + marker.info_title + '</div>';
                                        infobox = new InfoBox({
                                            content: content,
                                            boxClass: 'infoBox ' + marker.info_extra,
                                            disableAutoPan: false,
                                            enableEventPropagation: true,
                                            width: 100,
                                            zIndex: null,
                                            pixelOffset: new google.maps.Size(0, -62),
                                            infoBoxClearance: new google.maps.Size(1, 1)
                                        });
                                        if (mobileScreen == false)
                                            infobox.open(map, marker);
                                        break;

                                    case 'imageMainSmall':
                                        content = '<div class="Title Main Small ' + marker.info_extra + '" data-link="' + marker.info_link + '">' + marker.info_title + '</div>';
                                        infobox = new InfoBox({
                                            content: content,
                                            boxClass: 'infoBox ' + marker.info_extra,
                                            disableAutoPan: false,
                                            enableEventPropagation: true,
                                            width: 100,
                                            zIndex: null,
                                            pixelOffset: new google.maps.Size(0, -44),
                                            infoBoxClearance: new google.maps.Size(1, 1)
                                        });
                                        if (mobileScreen == false)
                                            infobox.open(map, marker);
                                        break;


                                    case 'imageOther':
                                        google.maps.event.addListener(marker, 'click', function() {
                                            $('.infoBox').each(function() {
                                                if ($(this).find('.Title.Other').length > 0)
                                                    $(this).remove();
                                            })
                                            if (marker.info_link) {
                                                link = marker.info_link;
                                                if (link.search("http") == -1) {
                                                    link = 'http://' + marker.info_link;
                                                }

                                                content = '<div class="Title Other"><a target="_blank" href="' + link + '">' + marker.info_title + '</a></div>';
                                            } else {
                                                content = '<div class="Title Other">' + this.info_title + '</div>';
                                            }
                                            infobox = new InfoBox({
                                                content: content,
                                                disableAutoPan: false,
                                                enableEventPropagation: true,
                                                boxClass: 'infoBox other',
                                                width: 100,
                                                zIndex: null,
                                                pixelOffset: new google.maps.Size(0, -80),
                                                infoBoxClearance: new google.maps.Size(1, 1)
                                            });
                                            infobox.open(map, this);
                                        });
                                        break;
                                }
                            }
                        }


                        function initialize(idObject) {
                            console.log(idObject);

                            center = idObject.data('center');
                            center = center.split(',');

                            idObject.addClass('load');

                            var featureOpts = [];
                            mapSohoOptions = {
                                zoom: 14,
                                center: new google.maps.LatLng(center[0], center[1]),
                                scrollwheel: false,
                                mapTypeControl: false,
                                panControl: false,
                                zoomControl: false,
                                scaleControl: false,
                                rotateControl: false,
                                streetViewControl: false,
                                overviewMapControl: false,
                                mapTypeControlOptions: {
                                    mapTypeIds: []
                                },
                                mapTypeId: 'custom_style'
                            };

                            mapSoho[idName] = '';
                            mapSoho[idName] = new google.maps.Map(document.getElementById(idName), mapSohoOptions);
                            var styledMapOptions = {name: 'Custom Style'};
                            var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
                            mapSoho[idName].mapTypes.set('custom_style', customMapType);

                            setMarkers(mapSoho[idName], Markers);

                            if (Markers.length > 1) {
                                mapSoho[idName].fitBounds(bounds);
                                mapSoho[idName].setCenter(new google.maps.LatLng(center[0], center[1]));
                            }
                        }
                        initialize(idObject);
                    }
                }, 1000);



            },
            PageForm: function() {

                contactDef = $('.Page.Contact form').attr('define');
                if ($('.Page.Contact form').length != 0 && contactDef != 'true') {
                    $('.Page.Contact form').attr('define', 'true');

                    $.tools.validator.addEffect("wall", function(errors, event) {
                        console.log(errors)
                        $('input, select, textarea').removeClass('error');
                        $.each(errors, function(index, error) {

                            $('.Page.Contact .Validation.Error').show();

                            $('input[name="' + error.input.attr("name") + '"]').addClass('error');
                            $('textarea[name="' + error.input.attr("name") + '"]').addClass('error');

                        });
                    }, function(inputs) {
                    });
                    $('.Page.Contact form').validator({
                        effect: 'wall',
                        errorInputEvent: null
                    }).submit(function(e) {

                        if (!e.isDefaultPrevented()) {
                            $('input, select, textarea').removeClass('error');

                            $('.Page.Contact .Validation.Error').hide();

                            $.ajax({
                                url: domainTemplate + "/action/smtp_v2.php",
                                data: $('.Page.Contact form').serialize(),
                                type: "POST"
                            }).done(function(html) {
                                console.log(html)

                                // End
                                History.pushState({
                                    rand: Math.random()
                                }, null, domainHome + '/contact/thank-you');
                                $('.Page.Contact .Validation.Success').show();
                            });
                            return false;
                        }
                    });
                }
            },
            init: function() {
                self.PageFunctionStart();
                self.LoadPageEngine('global', $('#Contents'), '');
                self.CountUnits();
                self.PageForm();
            }

        });
        this.init();
    }

    ControlPack = new Control();


    $(window).resize(function() {
        ControlPack.Render();
        ControlPack.PageFunction();
    });








    if (!$('body').hasClass('ieOld')) {

        History.Adapter.bind(window, 'statechange', function() {
            setTimeout(function() {

                var State = History.getState();

                slug = State.url.split("/");
                slugLast = slug[(slug.length - 1)];

                if (slugLast == "postbrothers") {
                    slugLast = 'home';
                }

                setTimeout(function() {
                    $('#Contents .Content').attr('data-active', '');
                    $('#Contents .Content[data-content="' + slugLast + '"]').attr('data-active', 'active');
                }, 1000);

                PageExist = false;
                PageAllArray = PageAll.split(' ');
                $.each(PageAllArray, function(index, value) {
                    if (value == slugLast)
                        PageExist = true;
                });
                if (PageExist == false)
                    slugLast = 'other';

                ControlPack.LoadPageEngine(State.url, $('#Contents .Content[data-content="' + slugLast + '"]'), slugLast);

            }, 600);
        });

    }

    $(document).on('click', ".LoadAjax:not('.off')", function(event) {
        if (!$('body').hasClass('ieOld')) {

            $('#Header .MenuMobile').hide();

            prevAddress = window.location.pathname;
            newHref = $(this).attr('data-href');
            if (!newHref) {
                newHref = $(this).attr('href');
            }

            $.ajax({
                url: domainTemplate + '/action/page_title.php',
                data: {url: newHref}
            }).done(function(msg) {
                $('head title').html(msg)
            });

            History.pushState({
                rand: Math.random()
            }, null, newHref);

            return false;

        } else {

            // RESET PAGE FOR IE

        }
    });
});
