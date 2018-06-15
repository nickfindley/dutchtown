/*
Item Name : FlexiNav - Flexible and Responsive Navigation
Item URI : http://codecanyon.net/item/flexinav-flexible-and-responsive-navigation/6528657
Author URI : http://codecanyon.net/user/Pixelworkshop
Version : 1.1
*/




(function($) {
    

    $.flexiNav = function(element, options) {


        var settings = {
            flexinav_effect: 'flexinav_hover',
            flexinav_show_duration: 300,
            flexinav_hide_duration: 200,
            flexinav_show_delay: 200,
            flexinav_trigger : true,
            flexinav_hide : false,
            flexinav_scrollbars: true,
            flexinav_scrollbars_height: 400,
            flexinav_responsive: true
        };
        
        var plugin = this;
        
        plugin.options = {}

        var $element = $(element);
        var element = element;

        var flexiNav = $element.find('.flexinav_menu'),
            flexiNavItem = $(flexiNav).children('li'),
            flexiNavItemFlyOut = $(flexiNav).find('.dropdown_parent'),
            flexiNavItemFlyOutSpan = $(flexiNavItemFlyOut).children('span'),
            flexiNavItemGroup = $(flexiNavItem).add(flexiNavItemFlyOut),
            flexiNavDropdown = $(flexiNav).find('.flexinav_ddown'),
            flexiNavDropdownFlyOut = $(flexiNavItemFlyOut).find('.dropdown_flyout_level'),
            flexiNavDropdownGroup = $(flexiNavDropdown).add(flexiNavDropdownFlyOut),
            flexiNavScroll = $element.find('.flexinav_ddown_scroll'),
            flexiNavForm = $element.find('#flexinav_form'),
            flexiNavButton = $element.find('.flexinav_collapse');


        plugin.init = function() {

            settings = $.extend(1, settings, options);

            hoverIntentConfig = {
                over: flexiNavOver, // function = onMouseOver callback (REQUIRED)
                out: flexiNavOut, // function = onMouseOut callback (REQUIRED)
                timeout: 200, // number = milliseconds delay before onMouseOut
                sensitivity: 2, // number = sensitivity threshold (must be 1 or higher)
                interval: settings.flexinav_show_delay // number = milliseconds for onMouseOver polling interval
            };

            flexiNavPosition();
            flexiNavEvents();
            flexiNavContactForm();

        }


        var flexiNavPosition = function(){

        	$(flexiNavDropdownGroup).css({'display': 'block', 'top' : 'auto', 'opacity' : '1'}).hide(0);

            if (settings.flexinav_responsive === true) {

                $(flexiNavButton).addClass('flexinav_collapse_noactive');

                $(flexiNavButton).click(function () {
                    $(flexiNavButton).toggleClass('flexinav_collapse_active flexinav_collapse_noactive');
                    $(flexiNavItem).not(":eq(0)").toggle(0);
                });

            }

            if (("ontouchstart" in document.documentElement) && (settings.flexinav_responsive === true)) {

                $(flexiNavItemGroup).addClass('noactive').removeClass('active');

                $(window).bind('orientationchange', function () {
                    $(flexiNavDropdownGroup).css({'display': 'block'}).hide(0);
                });

            } else if (settings.flexinav_responsive === true) {

                $(window).resize(function() {
                	/* if the menu bar was hidden before resizing down, 
                	   then keep it hidden when switching back to the desktop version */
	            	if ($('.flexinav_btn').hasClass('btn_active')) {
	            		$element.slideUp(0);
	            	}
	            	/* Hide all drop downs */
                    $(flexiNavDropdownGroup).css({'display': 'block'}).hide(0);
                    /* Show the menu bar on mobiles */
                    if(!$element.is(':visible') && $(window).width() < 768) {
                        $element.show(0);
                    }
                });

            }

        }


        var flexiNavTrigger = function(){

            $element.after('<a href="#" class="flexinav_btn"><i class="fa fa-arrow-up"></i></a>');

            var $this = $element.next('.flexinav_btn');
            
            if( flexiNavBarHide === true && $(window).width() >= 768) {
                $element.slideUp(0);
                $('.flexinav_btn').toggleClass('btn_active');
            }
            
            $this.click(function() {
                $(this).prev($element).delay(100).slideToggle(300);
                $(this).toggleClass('btn_active');
                return false;
            });

        }
        

        var flexiNavEvents = function(){
 
            if (settings.flexinav_trigger === true && $element.hasClass('flexinav_fixed')) {
                flexiNavBarHide = settings.flexinav_hide;
                flexiNavTrigger($element);
            }

            if (settings.flexinav_scrollbars === true && $(flexiNavScroll).length > 0) {
                $(flexiNavScroll).css("max-height", settings.flexinav_scrollbars_height).mCustomScrollbar({
                    theme:"dark-2",
                    set_height:settings.flexinav_scrollbars_height,
                    autoDraggerLength:true,
                    scrollButtons:{
                        enable:true
                    },
                    advanced:{
                        updateOnContentResize: true,
                        updateOnBrowserResize: true,
                        contentTouchScroll: true
                    }

                });
            }

            if (("ontouchstart" in document.documentElement) && (settings.flexinav_responsive === true)) {

                /* Menu Items */
                $(flexiNavItem).not(flexiNavButton).click(function () {
                    var $this = $(this);
                    $('.flexinav_menu > li').not(this).removeClass('active').addClass('noactive').find('.flexinav_ddown').hide(0); 
                    $this.toggleClass('active noactive')
                        .find(flexiNavDropdown).first().toggle(0)
                        .click(function (event) {
                            event.stopPropagation();
                        });
                });
                /* Fly-Outs */
                if ($(window).width() >= 768) { /* Tablets*/
	                $(flexiNavItemFlyOutSpan).click(function () {
	                    var $this = $(this);
	                    $this.parent().siblings().find(flexiNavDropdownFlyOut).hide(0);   
	                    $this.next(flexiNavDropdownFlyOut).first().toggle(0);
	                });
            	} else { /* Mobiles handeled in a different way to avoid page jump */
	                $(flexiNavItemFlyOutSpan).click(function () {
	                    var $this = $(this);
	                    $this.parent().toggleClass('active noactive');
	                    $this.next(flexiNavDropdownFlyOut).toggle(0);                    
	                });
            	}
                /* Clicks outside the menu area */
                $(document).hammer().on('tap', function () {
                    $(flexiNavItemGroup).removeClass('active').addClass('noactive');
                    $(flexiNavDropdownGroup).hide(0);
                });
                $element.hammer().on('tap', function (event) {
                    event.stopPropagation();
                });
                /* Reset on orientation change */
                $(window).bind('orientationchange', function () {
                    $(flexiNavItemGroup).removeClass('active').addClass('noactive');
                    $(flexiNavDropdownGroup).hide(0);
                });

                return;

            } else {
                
                switch (settings.flexinav_effect) {

                    case 'flexinav_hover':
                    case 'flexinav_click':
                        $(flexiNavItemGroup).hoverIntent(hoverIntentConfig);
                        break;

                }

            }            

        }


        
        

        function flexiNavOver() {

            var $this = $(this);

            switch (settings.flexinav_effect) {

                case 'flexinav_hover':
                    $this.children(flexiNavDropdownGroup).fadeIn(settings.flexinav_show_duration);
                    break;
                case 'flexinav_click':
                    $this.click(function () {
                        $this.children(flexiNavDropdownGroup).fadeIn(settings.flexinav_show_duration);
                    });
                    break;

            }

        }


        function flexiNavOut() {

            var $this = $(this);
        
            switch (settings.flexinav_effect) {
                case 'flexinav_hover':
                case 'flexinav_click':
                    $this.find(flexiNavDropdownGroup).fadeOut(settings.flexinav_hide_duration);
                    break;

            }

        }    

       
        plugin.init();


    }


    $.fn.flexiNav = function(options) {


        return this.each(function() {

            if (undefined == $(this).data('flexiNav')) {

                var plugin = new $.flexiNav(this, options);
                $(this).data('flexiNav', plugin);

            }

        });


    }


})(jQuery);


