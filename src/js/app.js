jQuery(document).ready(function( $ ) {
  "use strict";

  $('body').scrollspy({ target: '#interior-nav', offset: 500});

$( '.mychart' ).click( function(e) {
  e.preventDefault();
  $('#mychart').modal('show');
});

$( 'a[href="#onmyway"]' ).click( function(e) {
  e.preventDefault();
  $('#onmyway').modal('show');
});

$( 'a[href="#mychart"]' ).click( function(e) {
  e.preventDefault();
  $('#mychart').modal('show');
});

$('.nav-tabs .nav-link').click(function(e) {
  $('.nav-tabs .nav-link').not(this).each(function() {
    $(this).removeClass('active');
    $(this).prop('aria-selected', false);
  });
});

$('.nav-tabs .nav-link').on('touchstart', function(){
  $('.nav-tabs .nav-link').not(this).each(function() {
    $(this).removeClass('active');
    $(this).prop('aria-selected', false);
  });
});

/// Add classes to header on scroll to hide in mobile
/*$(window).scroll(function() {
    var scroll = $(window).scrollTop();

     //>=, not <=
    if (scroll > 0) {
        //clearHeader, not clearheader - caps H
        $(".main-header-top").addClass("scrolled");
    } else {
      $(".main-header-top").removeClass("scrolled");
    }
}); //missing );*/


/***********************************
 *  Bootstrap Clickable Dropdown   *
 ***********************************/
  $('.main-header .navbar .dropdown').hover(function() {
        const myButton = $(this);
        const myDropDown = myButton.find('.dropdown-menu');
        const myParent = myButton.find('.dropdown-toggle');
        myDropDown.first().addClass('show');
        myParent.first().addClass('hovered');
       // dropDownFixPosition(myButton,myDropDown);
      }, function() {
          $(this).find('.dropdown-menu').first().removeClass('show');
          $(this).find('.dropdown-toggle').first().removeClass('hovered');
    });

  $('.navbar .dropdown > a').click(function() {
      location.href = this.href;
    });

    $('#page-nav .dropdown, #myTab .dropdown').hover(function() {
          const myButton = $(this);
          const myDropDown = myButton.find('.dropdown-menu');
          const myParent = myButton.find('.dropdown-toggle');
          myDropDown.first().addClass('show');
          myParent.first().addClass('hovered');
         // dropDownFixPosition(myButton,myDropDown);
        }, function() {
            $(this).find('.dropdown-menu').first().removeClass('show');
            $(this).find('.dropdown-toggle').first().removeClass('hovered');
      });

/*****************************
 *   Sidebar Menu (Mobile)   *
 *****************************/
 $( '.nav-toggle' ).click( function() {
    $( 'body' ).toggleClass( 'menu-open' );
  } );

  $( '.nav-close, .mobile-overlay' ).click( function() {
    $( 'body' ).removeClass( 'menu-open' );
  } );





// Mega Menu
$( '#mega-nav .menu-item' ).mouseenter( function() {
  var panel = $(this).data('target');
  $( '#mega-nav .menu-item' ).removeClass('active');
  if ($( '#'+panel ).hasClass('active')) {
    $('.mega-panel').removeClass('active');
  } else {
    $('.mega-panel').removeClass('active');
    $( '#'+panel ).addClass( 'active' );
    $(this).addClass('active');
  }

 } );

 $('.main-header-nav').mouseleave( function() {
   $( '#mega-nav .menu-item' ).removeClass('active');
   $('.mega-panel').removeClass('active');
 });

 // Search
 $('#search-toggle').click( function() {
     $('#search-bar').toggleClass('active');
     $(this).toggleClass('active');
 } );

// Hero Block tabs
 $( '.hero-tab' ).mouseenter( function() {

   if (!$(this).hasClass('active')) {
     $('.hero-tab.active').removeClass('active');
     $(this).addClass( 'active' );
   }

  } );

 $( '.hero-tab' ).mouseleave(function() {

   if (!$(this).hasClass('default-tab') && $(this).hasClass('active')) {
     console.log('this  tab is not default');
     $('.hero-tab.default-tab').addClass('active');
     $(this).removeClass( 'active' );
   }

 });

// Footer logos
 $(".logo-slider").each(function(){
   var options = {};
   var thisSwiper = $(this).find(".swiper-container");
   // Checks the slider has more than one slide. If it doesn't, pagination is disabled for that slider.
   if ( $(this).find(".swiper-slide").length > 1 ) {
     options = {
       loop: true,
       slidesPerView: 5,
       slidesPerGroup: 5,
       autoplay: {
        delay: 7000,
        disableOnInteraction: false
       },
       // Responsive breakpoints
         breakpoints: {
           676: {
             slidesPerView: 1,
             slidesPerGroup: 1,
             autoplay: {
              delay: 4000,
             }
           },
           1200: {
             slidesPerView: 3,
             slidesPerGroup: 3,
             autoplay: {
              delay: 6000,
             }
           }
         }
     }
   } else {
     options = {
         loop: false,
         autoplay: false,
     }
   }
   var swiper = new Swiper(thisSwiper, options);
 });


 /***** Doctor Table *****/
 if ($('#directory-list').length) {
   var targetTable = $('#directory-list');
   var pageLength = 9;
   var docCount = $('#doc-count');

 targetTable.DataTable({
   "bInfo": false,
   "pageLength": pageLength,
   "order": [[ 0, "desc" ]],
   //"bSort": false,
   //"sDom": '<"top"><"bottom"p><"clear">',
   //"sDom": '<"top"Bi>rt<"bottom"p><"clear">',
  "language": {
     "paginate": {
       "previous": '<i class="far fa-chevron-left"></i>',
       "next": '<i class="far fa-chevron-right"></i>'
     }
   }
 });
 var table = targetTable.DataTable();


 $('#sortSearch').keyup(function(){
     table.search($(this).val()).draw();
     docCount.text( table.rows( {search:'applied'} ).count() );
   });

   var myFilters = $(".select-wrapper select");

   myFilters.change(function() {
     resetRows();

     myFilters.each(function() {
       var keyword = $(this).val();
       var filter = $(this).attr('data-filter');
       if (keyword !== "default") {
         $.fn.dataTable.ext.search.push(
              function(settings, data, dataIndex) {
                var data = $(table.row(dataIndex).node()).attr('data-'+filter);
                return data == keyword;
              }
           );
       }
       drawTable();

     });

   });



   // Alphabet Search
   $('.alphabet .btn').on( 'click', function () {
       var keyword = $(this).val();
       resetRows();
       if (keyword !== "all") {
         $.fn.dataTable.ext.search.push(
              function(settings, data, dataIndex) {
                var data = $(table.row(dataIndex).node()).attr('data-alpha');
                return data == keyword;
              }
           );
          drawTable();
       }

   });

   $('#clearFilter').on( 'click', function () {
     myFilters.each(function() {
       $(this).val("default");
     });
       resetRows();
   });



   function resetRows() {
     $.fn.dataTable.ext.search.pop();
     drawTable();
   }
   function drawTable() {
     table.draw();
     docCount.text( table.rows( {search:'applied'} ).count() );
     //console.log('rows count:', table.rows( {search:'applied'} ).count());
   }

 }

 /***** Doctor Table *****/
 if ($('#press-list').length) {
   var targetTable = $('#press-list');
   var pageLength = 10;
   var docCount = $('#doc-count');

 targetTable.DataTable({
   "bInfo": false,
   "pageLength": pageLength,
   //"bSort": false,
   //"sDom": '<"top"><"bottom"p><"clear">',
   //"sDom": '<"top"Bi>rt<"bottom"p><"clear">',
  "language": {
     "paginate": {
       "previous": '<i class="far fa-chevron-left"></i>',
       "next": '<i class="far fa-chevron-right"></i>'
     }
   }
 });
 var table = targetTable.DataTable();


 $('#sortSearch').keyup(function(){
     table.search($(this).val()).draw();
     docCount.text( table.rows( {search:'applied'} ).count() );
   });


 }

 /******************
  * Collapsing Nav *
  ******************/
var autocollapse = function (menu,maxHeight) {

  var nav = $(menu);
  var navHeight = nav.innerHeight();
  if (navHeight >= maxHeight) {
    console.log('nav overflowing');
    $(menu + ' .dropdown').removeClass('d-none');
   $(".navbar-nav").removeClass('w-auto').addClass("w-100");
     while (navHeight > maxHeight) {

      //  add child to dropdown
      var children = nav.children(menu + ' li:not(:last-child)');
      var count = children.length;
      $(children[count - 1]).prependTo(menu + ' .dropdown-menu');
      navHeight = nav.innerHeight();
    }
   $(".navbar-nav").addClass("w-auto").removeClass('w-100');
  } else {

    var collapsed = $(menu+'.dropdown-menu').children(menu+'li');
    if (collapsed.length===0) {
      $(menu + ' .dropdown').addClass('d-none');
    }

    while (navHeight < maxHeight &&
      (nav.children(menu + ' li').length > 0) &&
      collapsed.length > 0) {
      //  remove child from dropdown
      collapsed = $(menu + ' .dropdown-menu').children('li');
      $(collapsed[0]).insertBefore(nav.children(menu+'li:last-child'));
      navHeight = nav.innerHeight();
    }
    if (navHeight > maxHeight) {
      autocollapse(menu,maxHeight);
    }
  } // end if-else
}; // end function

    // when the page loads
    autocollapse('#page-nav-inner',56);

    // Keeps crashing on resize
    // when the window is resized
    //$(window).on('resize', function () {
  //    autocollapse('#page-nav',56);
  //  });
/////

var autocollapsetabs = function (menu,maxHeight) {

  var nav = $(menu);
  var navHeight = nav.innerHeight();
  if (navHeight >= maxHeight) {
    console.log('tabs overflowing');
    $(menu + ' .dropdown').removeClass('d-none');
   //$(".navbar-nav").removeClass('w-auto').addClass("w-100");
     while (navHeight > maxHeight) {

      //  add child to dropdown
      var children = nav.children(menu + ' li:not(:last-child)');
      var count = children.length;
      $(children[count - 1]).prependTo(menu + ' .dropdown-menu');
      navHeight = nav.innerHeight();
    }
   //$(".navbar-nav").addClass("w-auto").removeClass('w-100');
  } else {

    var collapsed = $(menu+'.dropdown-menu').children(menu+'li');
    if (collapsed.length===0) {
      $(menu + ' .dropdown').addClass('d-none');
    }

    while (navHeight < maxHeight &&
      (nav.children(menu + ' li').length > 0) &&
      collapsed.length > 0) {
      //  remove child from dropdown
      collapsed = $(menu + ' .dropdown-menu').children('li');
      $(collapsed[0]).insertBefore(nav.children(menu+'li:last-child'));
      navHeight = nav.innerHeight();
    }
    if (navHeight > maxHeight) {
      autocollapse(menu,maxHeight);
    }
  } // end if-else
}; // end function
autocollapse('#myTab',72);

 } );


/************************************
 *  Scroll offset for fixed headers *
 ************************************/
 (function(document, history, location) {
  var HISTORY_SUPPORT = !!(history && history.pushState);
  var myHeader = document.getElementById('main-header');
  var anchorScrolls = {
    ANCHOR_REGEX: /^#[^ ]+$/,
    OFFSET_HEIGHT_PX: 260,

    /**
     * Establish events, and fix initial scroll position if a hash is provided.
     */
    init: function() {
      this.scrollToCurrent();
      window.addEventListener('hashchange', this.scrollToCurrent.bind(this));
      document.body.addEventListener('click', this.delegateAnchors.bind(this));
    },

    /**
     * Return the offset amount to deduct from the normal scroll position.
     * Modify as appropriate to allow for dynamic calculations
     */
    getFixedOffset: function() {
      return myHeader.offsetHeight;
      //return this.OFFSET_HEIGHT_PX;
    },

    /**
     * If the provided href is an anchor which resolves to an element on the
     * page, scroll to it.
     * @param  {String} href
     * @return {Boolean} - Was the href an anchor.
     */
    scrollIfAnchor: function(href, pushToHistory) {
      var match, rect, anchorOffset;

      if(!this.ANCHOR_REGEX.test(href)) {
        return false;
      }

      match = document.getElementById(href.slice(1));

      if(match) {
        rect = match.getBoundingClientRect();
        anchorOffset = window.pageYOffset + rect.top - this.getFixedOffset();
        window.scrollTo(window.pageXOffset, anchorOffset);

        // Add the state to history as-per normal anchor links
        if(HISTORY_SUPPORT && pushToHistory) {
          history.pushState({}, document.title, location.pathname + href);
        }
      }

      return !!match;
    },

    /**
     * Attempt to scroll to the current location's hash.
     */
    scrollToCurrent: function() {
      this.scrollIfAnchor(window.location.hash);
    },

    /**
     * If the click event's target was an anchor, fix the scroll position.
     */
    delegateAnchors: function(e) {
      var elem = e.target;

      if(
        elem.nodeName === 'A' &&
        this.scrollIfAnchor(elem.getAttribute('href'), true)
      ) {
        e.preventDefault();
      }
    }
  };

  window.addEventListener(
    'DOMContentLoaded', anchorScrolls.init.bind(anchorScrolls)
  );
})(window.document, window.history, window.location);
