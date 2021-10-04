<?php /* <nav class="navbar navbar-expand-lg navbar-primary">
  <div class="collapse navbar-collapse" id="primary-navbar">
  <?php

    wp_nav_menu([
      'theme_location'    => 'primary',
      'depth'             => 2,
      'container'         => '',
      'container_class'   => '',
      'container_id'      => '',
      'menu_class'        => 'navbar-nav',
      'echo'				=> true,
      'walker'            => new bs4Navwalker()
    ]);

  ?>
  </div>
</nav> */ ?>
<?php
  $mega = get_field('mega_menu', 'compulse_options');
  if ($mega) : ?>
  <nav class="navbar navbar-expand-xl" id="mega-nav">
    <ul class="collapse navbar-collapse navbar-nav">
      <?php foreach ($mega as $key => $item) : ?>
        <li class="menu-item" data-target="mega-panel-<?= $key; ?>">
          <?php
            // Breaks string to pieces
            $pieces = explode(" ", $item['title']);
            // Modifies the last word
            $pieces[count($pieces)-1] = '</span><span>' . $pieces[count($pieces)-1] . '</span>';
            $itemTitle = '<span>'.implode(" ", $pieces); ?>
          <div><?= $itemTitle; ?></div>
        </li>
      <?php endforeach; ?>
    </ul>
    <div id="search-toggle" class="d-none d-xl-block"><i class="far fa-search open"></i><i class="far fa-times close-search"></i></div>
    <div id="search-bar"><?= do_shortcode('[ivory-search id="248" title="Default Search Form"]'); ?></div>
  </nav>
<?php endif; ?>
