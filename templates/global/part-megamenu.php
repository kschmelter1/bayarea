<?php
$mega = get_field('mega_menu', 'compulse_options');
$address = get_field('address','compulse_options');
$gmap = 'http://maps.google.com/maps?q='.urlencode($address);
$phone = get_field('phone_number','compulse_options');
$phoneInfo = get_field('phone_info','compulse_options');
?>
<div id="mega-panel-wrapper">
  <?php foreach ($mega as $key => $item) : ?>
    <div class="mega-panel container-fluid bg-white text-primary" id="mega-panel-<?= $key; ?>">
      <div class="row">
        <div class="col-md">
          <div class="h3"><?= $item['title']; ?></div>
          <p><?= $item['description']; ?></p>
        </div>
        <div class="col-md">
            <?php
            echo $item['menu'];
            //cim_nav_menu_list_items($item['menu']->slug);
            //var_dump($item['menu']); //showing an int, returning the wrong menu though ?>
        </div>
        <div class="col-md">
          <?= ($item['image'] ? echo_image($item['image'], 'medium_large') : ''); ?>
          <?= ($address ? '<a class="d-block address" href="'.$gmap.'" target="_blank">'.$address.'</a>' : ''); ?>
          <?php if ($phone) {
  					echo '<div class="phone-wrap">'.clean_phone($phone, true);
  					echo ($phoneInfo ? '<span>'.$phoneInfo.'</span>' : '');
  					echo '</div>';
  				} ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
