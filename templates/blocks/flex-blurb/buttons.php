<?php /* $row from flex-blurb.php
         $row['links']
*/ ?>
<div class="flex-blurb-<?= $row['acf_fc_layout']; ?>">
  <?php foreach ($row['buttons'] as $btn) : ?>
    <?= echo_link($btn['link'], 'btn btn-secondary'); ?>
  <?php endforeach; ?>
</div>
