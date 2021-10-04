<?php /* $row from flex-blurb.php
         $row['faq'] - repeater
*/ ?>
<?php if ($row['faq']) : $list = $row['faq']; ?>
<div class="flex-blurb-<?= $row['acf_fc_layout']; ?> faq-list" id="faq-<?= $id; ?>">
  <?= ($row['title'] ? '<h2 class="h3 text-left">'.$row['title'].'</h2>' : ''); ?>
  <?php for ($i = 0; $i < count($list); $i++) : ?>
    <div class="faq">
      <h3 class="faq-question collapsed"
          id="<?= $id; ?>-heading-<?= $i; ?>" data-toggle="collapse" data-target="#<?= $id; ?>-collapse-<?= $i; ?>"
          aria-expanded="false" aria-controls="<?= $id; ?>-collapse-<?= $i; ?>"
          ><?= $list[$i]['question']; ?> </h3>
      <div id="<?= $id; ?>-collapse-<?= $i; ?>" class="faq-answer collapse" aria-labelledby="<?= $id; ?>-heading-<?= $i; ?>" <?/*data-parent="#faq-<?= $id; ?>"*/?>>
        <div><?= $list[$i]['answer']; ?></div>
      </div>
    </div>
  <?php endfor; ?>
</div>
<?php endif; ?>
