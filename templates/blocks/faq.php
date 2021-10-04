     <?php
/**
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

 // Load values and assigning defaults.
$title = get_field('title');
$list = get_field('list');

// Create class attribute allowing for custom "className" and "align" values.
$className = 'container-fluid block block-faq accordion';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Create id attribute allowing for custom "anchor" value.
$anchor = get_field('section_anchor');
if ($anchor) {
  $id = make_id($anchor);
} else {
  if( !empty($block['anchor']) ) {
      $id = $block['anchor'];
  } else {
    $id = $block['id'];
  }
}

if ($list) :
?>

<div class="<?= $className; ?>" id="<?= $id;?>">
  <?= ($title ? '<h2>'.$title.'</h2>' : ''); ?>

  <div class="flex-blurb-<?= $row['acf_fc_layout']; ?> faq-list" id="faq-<?= $id; ?>">
    <?php for ($i = 0; $i < count($list); $i++) : ?>
      <div class="faq">
        <h3 class="faq-question collapsed"
            id="heading-<?= $i; ?>" data-toggle="collapse" data-target="#collapse-<?= $i; ?>"
            aria-expanded="false" aria-controls="collapse-<?= $i; ?>"
            ><?= $list[$i]['question']; ?> </h3>
        <div id="collapse-<?= $i; ?>" class="faq-answer collapse" aria-labelledby="heading-<?= $i; ?>" data-parent="#faq-<?= $id; ?>">
          <div><?= $list[$i]['answer']; ?></div>
        </div>
      </div>
    <?php endfor; ?>
  </div>

</div>

<?php endif; ?>
