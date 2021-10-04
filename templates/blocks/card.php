     <?php
/**
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

 // Load values and assigning defaults.
$anchor = get_field('section_anchor'); // Using as title
$rows = get_field('rows');


// Create class attribute allowing for custom "className" and "align" values.
$className = 'container-fluid double-pad block-margin block-'.substr($block['name'], 4);
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

if ($rows) :
?>

<div class="<?= $className; ?>" id="<?= $id;?>">
  <?php /* if ($anchor) : ?><h2 class="text-center"><?= $anchor; ?></h2><?php endif; */ ?>
  <div class="inner">
    <?php foreach ($rows as $row) : ?>
      <div class="row">
        <?php foreach ($row['columns'] as $col) : ?>
          <div class="col-md">
            <?php foreach ($col['groups'] as $group) : ?>
              <div class="group">
                <?= ($group['title'] ? '<h3>'.$group['title'].'</h3>' : ''); ?>
                <?= $group['content']; ?>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php endif; ?>
