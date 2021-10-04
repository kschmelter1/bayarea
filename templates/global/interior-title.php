<div class="main-title text-center container-fluid double-pad">
  <?php
  if (is_singular('post')) { ?>

  <?php } else {
    if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
    }
  }
  global $wp;
  $current_slug = add_query_arg( array(), $wp->request );
  ?>
  <?php if (get_field('alternate_title')) {
    $title = get_field('alternate_title');
  } elseif ($current_slug === 'events') {
    $title = 'Community Events';
  } else {
    $title = get_the_title();
  } ?>
  <h1><?= $title; ?></h1>
  <?php if (is_singular('post')) : ?>
    <p id="breadcrumbs"><?= get_the_date('F j, Y'); ?> | <?= do_shortcode('[rt_reading_time]'); ?> Min Read</p>
  <?php endif; ?>
  <?php get_template_part('templates/global/part','pagenav'); ?>
</div>
<?php // scroll spy
$blocks = parse_blocks(get_the_content());
if ($blocks) {
  $links = array();
  foreach ($blocks as $block) {
    if ($block['attrs']['data']['section_anchor']) {
      array_push($links, $block['attrs']['data']['section_anchor']);
    }
  }
}

if ($links) : ?>
  <div id="interior-nav" class="list-group d-none d-lg-flex flex-column">
    <?php foreach ($links as $link) : ?>
      <a class="list-group-item list-group-item-action" href="#<?= make_id($link); ?>"><?php
      if (strlen($link) > 40) {
        echo substr($link, 0, 40) . '...';
      } else {echo $link;}
   ?></a>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
