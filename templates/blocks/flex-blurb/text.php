<?php /* $row from flex-blurb.php
         $row['title']
         $row['text']
*/ ?>
<div class="flex-blurb-<?= $row['acf_fc_layout']; ?>">
  <?= ($row['title'] ? '<h2 id="'.make_id($row['title']).'">'.$row['title'].'</h2>' : ''); ?>
  <?= ($row['text'] ? '<div>'.$row['text'].'</div>' : ''); ?>
</div>
