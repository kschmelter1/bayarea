<nav class="navbar navbar-expand-xl navbar-primary">
  <div class="collapse navbar-collapse" id="header-navbar">
  <?php

    wp_nav_menu([
      'theme_location'    => 'header',
      'depth'             => 2,
      'container'         => '',
      'container_class'   => '',
      'container_id'      => '',
      'menu_class'        => 'navbar-nav align-items-center',
      'echo'				=> true,
      'walker'            => new bs4Navwalker()
    ]);

  ?>
  </div>
</nav>
