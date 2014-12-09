/*
**
**             File: freshops.js
**            Title: Freshops Javascript, v.1.0
**         Site URL: http://www.freshops.com/
**      Description: Base javascript for website: http://www.freshops.com/
**          Created: 03/31/08
**         Modified: 03/31/08
**
*/

// Cookies:
var cookieMenu = 'freshops_menu';
var cookiePath = '/';
var cookieDomain = 'freshops.com';

function setCookie(cookie, val) {
    $.cookie(cookie, val, { path: cookiePath, domain: cookieDomain }); // set cookie.
}

function killCookie(cookie) {
    $.cookie(cookie, null, { path: cookiePath, domain: cookieDomain }); // Delete menu cookie.
}

jQuery(function ($) {

    // Master object references:
    var $relExternal = $('a[rel$="external"]'); // New window links.
    var $order = $('ul#menu-order li.order'); // Order button.
    var $tabs = $('.tabs div'); // Tabs.
    var $menu = $('ul#menu-main-nav'); // Main navigation.

    // Other:
    var $animOptions01 = { opacity: 'toggle', height: 'toggle', speed: 'slow' };
    var speed01 = 500;
    var speed02 = 800;
    // var speed03 = 5000;

    //meanMenu:
    jQuery('header nav').meanmenu({
        meanScreenWidth:"768px"
    });



    // jQuery UI tabs:
    if($tabs.length > 0) {
        /* http://jqueryui.com/demos/tabs/ */
        var tabsOptions = { cookie: {} };
        $tabs.tabs(); // Initialize.
    } // $tabs



    // Handle "_blank" links:
    if($relExternal.length > 0) {
        /* target="_foo" is invalid due to our DTD.
        ** If you want the link to open in a new window, add attribute "rel="external"". */
        $relExternal.click(function() { this.target = "_blank"; });
    } // $relExternal

    // Hoverintent: http://cherne.net/brian/resources/jquery.hoverIntent.html
    if ($order.length > 0) {
        var $orderUL = $('#menu-order ul.order');
        $order.hoverIntent({
            over: function() { $orderUL.animate($animOptions01); },
            timeout: 250,
            out: function() { $orderUL.animate($animOptions01); }
        });
    } // $order

    /*
    ** Initialize the menu: */
    if($menu.length > 0) {
        var menuID = '#menu-main-nav';
        var menuType = 'ul';
        var menuClicker = 'a';
        var ignoreCookieRel = 'no-cookie';
        var $menuEle = $(menuType + menuID + ' ' + menuType);
        var $menuFire = $(menuType + menuID + ' ' + menuClicker);
        $menuEle.hide();
        if($.cookie(cookieMenu)) {
            var $checkEleCookie = $('#' + $.cookie(cookieMenu)).next();
            if(($checkEleCookie.is(menuType)) && (!$checkEleCookie.is(':visible'))) {
                $(menuType + menuID + ' ' + menuType + ':visible').hide(); // Hide all other sub-menu items.
                $checkEleCookie.show(); // Show the cookie one.
            }
        }
        $menuFire.click(function() {
            var ignoreCookie = this.rel;
            var clickID = this.id;
            var $checkEle = $(this).next(); // Needs to be $(this)... Do not use "$menuFire".
            if(($checkEle.is(menuType)) && ($checkEle.is(':visible'))) {
                //$.cookie(cookieMenu, null, { path: cookiePath, domain: cookieDomain }); // Delete menu cookie.
                if(ignoreCookie !== ignoreCookieRel) { killCookie(cookieMenu); }
                $checkEle.animate($animOptions01, speed02); // Hide if one clicked is open.
                this.blur();
                return false;
            }
            if(($checkEle.is(menuType)) && (!$checkEle.is(':visible'))) {
                //$.cookie(cookieMenu, clickID, { path: cookiePath, domain: cookieDomain }); // set cookie.
                if(ignoreCookie !== ignoreCookieRel) { setCookie(cookieMenu, clickID); }
                $(menuType + menuID + ' ' + menuType + ':visible').animate($animOptions01, speed01); // Hide all other sub-menu items.
                $checkEle.animate($animOptions01, speed02); // Show the clicked one.
                this.blur();
                return false;
            }
        });
        // Sub-sub-menus:
        jQuery('ul#menu-main-nav li ul > li').hoverIntent({
            over: function() {
                $('ol', this).animate($animOptions01);
            },
            timeout: 250,
            out: function() {
                $('ol', this).animate($animOptions01);
            }
        });
    } // $menu

    /*
    ** Custom Fragment to check all the anchors on the page, and change the behavior of any that link to a tab, to open it.
    ** Note that this skips the actual tabs on a page, so their behavior is not affected
    ** http://fragmentedthought.com/code-fragment/jquery-ui-tabs-extending-tab-behavior-anchor-links
    */
    // jQuery('a[href]').each(function() {
    //     if (this.hash) {
    //         if ($(this.hash + '.ui-tabs-panel').length > 0 && $(this).parents('div.ui-tabs').length == 0 ) {
    //             var link = this.href.replace(this.hash, '');
    //             var page = window.location.href.replace(window.location.hash, '');
    //             if (link === page || link === '') {
    //                 this.onclick = function() {
    //                     $tabs.tabs('select', this.hash);
    //                     //return false;
    //                 }
    //             }
    //         }
    //     }
    // });

});
// End closure
