<?php /* $row from flex-blurb.php
         $row['links']
*/ ?>
<div class="flex-blurb-<?= $row['acf_fc_layout']; ?>">
  <?= ($row['text'] ? '<p class="text-center small font-weight-bold">'.$row['text'].'</p>' : ''); ?>
  <div class="btn-wrapper row justify-content-center">
  <?php foreach ($row['links'] as $btn) : ?>
    <div class="<?= ($image ? 'col-lg-12' : 'col-md-6'); ?>">
      <a class="d-flex align-items-center hero-btn bg-white h-100 <?= $row['size']; ?>" href="<?= $btn['link']['url']; ?>" <?= a_target($btn['link']); ?>>
        <?php if ($btn['image']) :
              echo '<div class="icon icon-image position-relative h-100">'.echo_image($btn['image'], 'medium_large').'</div>';
          else :
              echo ($btn['icon'] ? '<div class="icon position-relative h-100">'.$btn['icon'].'</div>' : '');
          endif; ?>
        <div class="hero-btn-text">
          <?= ($btn['link'] ? '<div class="hero-btn-title">'.$btn['link']['title'].'</div>' : ''); ?>
        </div>
        <i class="fas fa-angle-right"></i>
      </a>
    </div>
  <?php endforeach; ?>
  </div>
</div>
