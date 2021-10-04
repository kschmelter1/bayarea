<?php
add_filter( 'block_categories', function( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'compulse',
                'title' => 'Compulse Blocks',
            ),
        )
    );
}, 10, 2 );


/*** Blocks ***/
function register_acf_block_types() {
  /*acf_register_block_type(array(
      'name'              => 'faq',
      'title'             => __('FAQs'),
      'description'       => __('Accordion List'),
      'render_template'   => 'templates/blocks/faq.php',
      'category'          => 'compulse',
      'icon'              => 'admin-comments',
      'keywords'          => array( 'accordion', 'list' ),
      'mode'              => 'edit',
      'supports' => array(
        'mode' => false, // Turns off preview mode permanently
        'multiple' => true, // Does not allow multiple of this block on one page
        'anchor' => true // If true, allows custom ID
      )
  ));*/

  acf_register_block_type(array(
      'name'              => 'hero',
      'title'             => __('Hero'),
      'description'       => __('Homepage Hero'),
      'render_template'   => 'templates/blocks/hero.php',
      'category'          => 'compulse',
      'icon'              => 'admin-comments',
      'keywords'          => array( 'home', 'cta' ),
      'mode'              => 'edit',
      'supports' => array(
        'mode' => false, // Turns off preview mode permanently
        'multiple' => false, // Does not allow multiple of this block on one page
        'anchor' => true // If true, allows custom ID
      )
  ));

  acf_register_block_type(array(
      'name'              => 'tabs',
      'title'             => __('Tabs'),
      'description'       => __('Tabbed content section'),
      'render_template'   => 'templates/blocks/tabs.php',
      'category'          => 'compulse',
      'icon'              => 'admin-comments',
      'keywords'          => array( 'interior', 'content', 'text' ),
      'mode'              => 'edit',
      'supports' => array(
        'mode' => false, // Turns off preview mode permanently
        'multiple' => true, // Does not allow multiple of this block on one page
        'anchor' => true // If true, allows custom ID
      )
  ));

  acf_register_block_type(array(
      'name'              => 'card',
      'title'             => __('Card'),
      'description'       => __('Box with multiple columns'),
      'render_template'   => 'templates/blocks/card.php',
      'category'          => 'compulse',
      'icon'              => 'admin-comments',
      'keywords'          => array( 'interior', 'content', 'text' ),
      'mode'              => 'edit',
      'supports' => array(
        'mode' => false, // Turns off preview mode permanently
        'multiple' => true, // Does not allow multiple of this block on one page
        'anchor' => true // If true, allows custom ID
      )
  ));

  acf_register_block_type(array(
      'name'              => 'flexibleblurb',
      'title'             => __('Flexible Blurb'),
      'description'       => __('Display image, text, and or faq'),
      'render_template'   => 'templates/blocks/flex-blurb.php',
      'category'          => 'compulse',
      'icon'              => 'admin-comments',
      'keywords'          => array( 'faq', 'cta', 'image', 'text' ),
      'mode'              => 'edit',
      'supports' => array(
        'mode' => false, // Turns off preview mode permanently
        'multiple' => true, // Does not allow multiple of this block on one page
        'anchor' => true // If true, allows custom ID
      )
  ));

  acf_register_block_type(array(
      'name'              => 'cta',
      'title'             => __('Call to Action'),
      'description'       => __('Text on blue background and image, with button or form'),
      'render_template'   => 'templates/blocks/cta.php',
      'category'          => 'compulse',
      'icon'              => 'admin-comments',
      'keywords'          => array( 'cta', 'image', 'text', 'form' ),
      'mode'              => 'edit',
      'supports' => array(
        'mode' => false, // Turns off preview mode permanently
        'multiple' => true, // Does not allow multiple of this block on one page
        'anchor' => true // If true, allows custom ID
      )
  ));

  acf_register_block_type(array(
      'name'              => 'news',
      'title'             => __('News'),
      'description'       => __('Displays most recent post and events'),
      'render_template'   => 'templates/blocks/news.php',
      'category'          => 'compulse',
      'icon'              => 'admin-comments',
      'keywords'          => array( 'post', 'blog', 'event', 'press' ),
      'mode'              => 'edit',
      'supports' => array(
        'mode' => false, // Turns off preview mode permanently
        'multiple' => false, // Does not allow multiple of this block on one page
        'anchor' => true // If true, allows custom ID
      )
  ));

  acf_register_block_type(array(
      'name'              => 'physician-directory',
      'title'             => __('Physician Directory'),
      'description'       => __('Displays physician posts.'),
      'render_template'   => 'templates/blocks/physicians.php',
      'category'          => 'compulse',
      'icon'              => 'admin-comments',
      'keywords'          => array( 'post', 'directory', 'archive' ),
      'mode'              => 'edit',
      'supports' => array(
        'mode' => false, // Turns off preview mode permanently
        'multiple' => false, // Does not allow multiple of this block on one page
        'anchor' => true // If true, allows custom ID
      )
  ));

  acf_register_block_type(array(
      'name'              => 'press-releases',
      'title'             => __('Press Releases'),
      'description'       => __('Displays blog posts.'),
      'render_template'   => 'templates/blocks/press.php',
      'category'          => 'compulse',
      'icon'              => 'admin-comments',
      'keywords'          => array( 'post', 'directory', 'archive' ),
      'mode'              => 'edit',
      'supports' => array(
        'mode' => false, // Turns off preview mode permanently
        'multiple' => false, // Does not allow multiple of this block on one page
        'anchor' => true // If true, allows custom ID
      )
  ));
}

// Check if function exists and hook into setup.
//if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
//}
