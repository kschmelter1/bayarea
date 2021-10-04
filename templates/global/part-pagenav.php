<?php

/**
 * Page nav
 *
 * @var array $nav_links Array of assoc arrays with items:
 *                          'url'         => string,
 *                          'text'        => string,
 *                          'attributes'  => []
 */
$menuType = get_field('custom_submenu');
$url = $_SERVER['REQUEST_URI'];
if ($menuType === 'premade') {
$menuID = get_field('choose_menu');
$menu = wp_get_nav_menu_items($menuID);
  if ($menu) : ?>
  <nav role="navigation" id="page-nav" class="okayNav navbar navbar-expand justify-content-center">
        <ul class="navbar-nav" id="page-nav-inner">
          <?php foreach ( $menu as $link ): ?>
              <li class="nav-item">
                <a class="btn btn-light <?= ($link->ID === get_the_ID() ? 'active' : '');?>" href="<?= $link->url ?>" <?= ($link->target ? 'target="_blank"' : ''); ?>>
                    <?= $link->title; ?>
                </a>
              </li>
          <?php endforeach; ?>
          <li class="nav-item dropdown d-none">
                <div class="nav-link dropdown-toggle btn btn-light active" id="navbarDropdownMenu" role="button" data-toggle="dropdown">
                  More
                </div>
                <ul class="dropdown-menu dropdown-menu-right">
                </ul>
            </li>
        </ul>
  </nav>
<?php endif;
} else {
  if ($menuType === 'manual') {
    if (get_field('submenu')) {
      $menu = get_field('submenu');
       ?>
      <nav role="navigation" id="page-nav" class="okayNav navbar navbar-expand justify-content-center">
            <ul class="navbar-nav" id="page-nav-inner">
              <?php foreach ( $menu as $link ): ?>
                  <li class="nav-item">
                      <a class="btn btn-light <?= ($url === $link['link']['url'] ? 'active' : '');?>" href="<?= $link['link']['url']; ?>" <?= a_target($link); ?>>
                          <?= $link['link']['title']; ?>
                      </a>
                  </li>
              <?php endforeach; ?>
              <li class="nav-item dropdown d-none">
                    <div class="nav-link dropdown-toggle btn btn-light active" id="navbarDropdownMenu" role="button" data-toggle="dropdown">
                      More
                    </div>
                    <ul class="dropdown-menu dropdown-menu-right">
                    </ul>
                </li>
            </ul>
      </nav>
  <?php }

} else {

  if ($post->post_parent > 0) {
    $nav_links = get_pages(array(
        'child_of' => $post->post_parent,
        'parent' => $post->post_parent
    ));
  }
  if (!empty( $nav_links )) : ?>
  <nav role="navigation" id="page-nav" class="okayNav navbar navbar-expand justify-content-center">
        <ul class="nav navbar navbar-nav">
          <?php foreach ( $nav_links as $link ): ?>
              <li class="nav-item">
                  <a class="btn btn-light <?= ($link->ID === get_the_ID() ? 'active' : '');?>" href="<?= get_the_permalink($link->ID); ?>" >
                      <?= $link->post_title; ?>
                  </a>
              </li>
          <?php endforeach; ?>
          <li class="nav-item dropdown d-none">
                <div class="nav-link dropdown-toggle btn btn-light active" id="navbarDropdownMenu" role="button" data-toggle="dropdown">
                  More
                </div>
                <ul class="dropdown-menu dropdown-menu-right">
                </ul>
            </li>
        </ul>
  </nav>
<?php endif; ?>
<?php } } ?>
