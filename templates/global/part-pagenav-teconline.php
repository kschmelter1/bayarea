<?php

/**
 * Page nav
 *
 * @var array $nav_links Array of assoc arrays with items:
 *                          'url'         => string,
 *                          'text'        => string,
 *                          'attributes'  => []
 */

$nav_links = get_pages(array(
    'child_of' => $post->post_parent,
    'parent' => $post->post_parent
));

if ( !empty( $nav_links ) ): ?>
    <div class="progressively-collapsing-nav-wrapper">
        <div class="row page-nav-wrapper">
            <div class="col-24 col-md-12 offset-md-3 page-nav-col">
                <ul class="nav page-nav">
                    <?php foreach ( $nav_links as $link ): ?>
                        <li>
                            <a href="<?= get_the_permalink($link->ID); ?>">
                                <?= $link->post_title; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li class="more">
                        <a href="#">More <?php echo cim_bootstrap()->font_awesome->get_icon_svg_tag( 'chevron-down', 'solid' ); ?></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row page-nav-wrapper more">
            <div class="col-24 col-md-12 offset-md-3 more-col">
                <ul class="nav page-nav">
                    <?php foreach ( $nav_links as $link ): ?>
                        <li>
                          <a href="<?= get_the_permalink($link->ID); ?>">
                              <?= $link->post_title; ?>
                          </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif;

/* PCN Script


    // Progressively collapsing page navs.
    function checkElementsAffectedByNavs() {
        var affectedByNavTop = 70 + 72;

        if ( $( '.progressively-collapsing-nav-wrapper' ).hasClass( 'show-more' ) ) {
            affectedByNavTop += $( '.page-nav-wrapper.more' ).innerHeight();
        }

        // Update the .affected-by-nav elements.
        $( '.page-header-overlap-image.affected-by-nav' ).css( 'top', -affectedByNavTop + 'px' );
        $( '.match-overlap-image-height.height-third.affected-by-nav' ).css( 'min-height', 'calc(33vh - ' + affectedByNavTop + 'px)' );
    }

    function checkProgressivelyCollapsingNavs() {
        $( '.progressively-collapsing-nav-wrapper' ).each( function() {
            var wrapper = $( this );
            var pageNavCol = wrapper.find( '.page-nav-col' );
            var navItems = pageNavCol.find( 'li:not(.more)' );

            // Determine the width of each nav item and save it.
            navItems.each( function() {
                var originalDisplay = $( this ).css( 'display' );

                $( this )
                    .css( 'display', 'block' )
                    .data( 'nav-width', $(this).innerWidth() )
                    .css( 'display', originalDisplay );
            } );

            var availableWidth = pageNavCol.innerWidth();
            var navItemWidth = 0.0;

            navItems.each( function() {
                navItemWidth += $( this ).data( 'nav-width' );
            } );

            var moreItem = pageNavCol.find( 'li.more' );

            console.log( 'availableWidth', availableWidth );
            console.log( 'navItemWidth', navItemWidth );

            if ( availableWidth < navItemWidth ) {
                moreItem.css( 'display', 'block' );

                // Move items to the More nav.
                var moreWidth = moreItem.innerWidth();
                console.log( 'moreWidth', moreWidth );

                // Figure out the index of the last item that is visible in the nav.
                var index = 0;
                var widthRemaining = availableWidth - moreWidth;

                while ( widthRemaining > 0 ) {
                    var item = $( navItems[ index ] );
                    var itemWidth = item.data( 'nav-width' );

                    console.log( widthRemaining, itemWidth );

                    if ( widthRemaining > itemWidth ) {
                        widthRemaining -= itemWidth;
                        index++;
                    } else {
                        break;
                    }
                }

                var splitIndex = index;

                var moreItems = wrapper.find( '.page-nav-wrapper.more li' );
                var moreCol = wrapper.find( '.more-col' );

                // First hide everything.
                navItems.css( 'display', 'none' );
                moreItems.css( 'display', 'none' );

                // Show everything before the split in the main nav.
                navItems.slice( 0, splitIndex ).css( 'display', 'block' );

                // Show everything after the split in the "More" nav.
                moreItems.slice( splitIndex ).css( 'display', 'block' );

                moreCol.css( 'padding-right', widthRemaining + 'px' );
            } else {
                wrapper.removeClass( 'show-more' );
                navItems.css( 'display', 'block' );
                moreItem.css( 'display', 'none' );
            }

            checkElementsAffectedByNavs();
        } );
    }

    $( '.progressively-collapsing-nav-wrapper li.more a' ).click( function( e ) {
        $( this ).closest( '.progressively-collapsing-nav-wrapper' ).toggleClass( 'show-more' );
        checkElementsAffectedByNavs();
        e.preventDefault();
        return false;
    } );

    checkProgressivelyCollapsingNavs();

    $( window ).resize( function() {
        window.requestAnimationFrame( function() {
            checkProgressivelyCollapsingNavs();
        } );
    } );


    // Progressively collapsing nav smooth scroll.
    $( '.progressively-collapsing-nav-wrapper a[href^="#"]' ).click( function( e ) {
        var href = $( this ).attr( 'href' );

        var el = $( href );
        if ( el.length ) {
            var headerHeight = $( '.header-wrapper' ).innerHeight();
            var scrollTop = el.offset().top - headerHeight - 50;

            $( 'html, body' ).animate( {
                'scrollTop': scrollTop + 'px'
            }, 750 );
        }

        e.preventDefault();
        return false;
    } );


*/ ?>

<?php /* CSS

// Progressively collapsing nav.
.progressively-collapsing-nav-wrapper {
  .page-nav-wrapper {
    ul.nav {
      flex-wrap: nowrap;

      li {
        &.hidden {
          visibility: hidden;
        }

        a {
          white-space: nowrap;
        }
      }
    }
  }

  .page-nav-more-wrapper {
    background-color: $gray-200;
    //display: none;

    .more-col {
      padding-left: #{$grid-column-width * 3};
    }

    ul.nav {
      li {

      }
    }
  }

  &.show-more {
    .page-nav-more-wrapper {
      display: flex;
    }
  }
}
*/ ?>
