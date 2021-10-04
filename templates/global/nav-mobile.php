<div class="mobile-overlay"></div>
<div class="nav-panel-wrapper">

  <ul class="nav-panel">
    <li><?php get_template_part('templates/global/part','logo'); ?></li>
    <?php /*<div class="nav-toggle"><i class="fal fa-times"></i></div>*/ ?>
    <?php /*<ul class="nav flex-column">
      <?php //cim_nav_menu_list_items('mobile'); ?>
    </ul>*/ ?>
    <?php dynamic_sidebar( 'mobile-menu' ); ?>
  </ul>
</div>
<div class="d-xl-none nav-toggle-wrapper"><a class="nav-toggle"><i class="fal fa-bars"></i></a></div>
