<nav class="navbar navbar-expand-lg navbar-footer">
  <div class="collapse navbar-collapse" id="footer-navbar">
  <?php

    wp_nav_menu([
      'theme_location'    => 'footer',
      'depth'             => 2,
      'container'         => '',
      'container_class'   => '',
      'container_id'      => '',
      'menu_class'        => 'footer-menu',
      'echo'				=> true//,
    //  'walker'            => new bs4Navwalker()
    ]);

  ?>
  </div>
</nav>
