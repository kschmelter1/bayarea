<?php /* $row from flex-blurb.php
         $row['links']
*/ ?>
<ul class="flex-blurb-<?= $row['acf_fc_layout']; ?>">
  <?php foreach ($row['timeline'] as $year) : ?>
    <li class="d-flex">
      <div class="h3 text-center"><?= $year['year']; ?><?= ($year['year_end'] ? ' - <span>'.$year['year_end'].'</span>' : ''); ?></div>
      <div><?= $year['content']; ?></div>
    </li>
  <?php endforeach; ?>
</ul>
