<?php if (is_front_page()) : ?>
<div id="floating-nav">
  <?php //cim_nav_menu_list_items('floating'); ?>
  <?php

    wp_nav_menu([
      'theme_location'    => 'floating',
      'depth'             => 1,
      'container'         => '',
      'container_class'   => '',
      'container_id'      => '',
      'menu_class'        => 'nav flex-column d-none  d-xl-flex',
      'echo'				=> true,
      'walker'            => new bs4Navwalker()
    ]);

  ?>
</div>
<?php endif; ?>
