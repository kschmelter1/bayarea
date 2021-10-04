     <?php
/**
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

 // Load values and assigning defaults.
$image = get_field('image');
$layout = get_field('layout');
$content = get_field('content');
$accent = get_field('add_accent');

// Create class attribute allowing for custom "className" and "align" values.
$className = 'container-fluid double-pad block-margin block-'.substr($block['name'], 4);
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if (!$image && !$accent) {$className .= ' single-column';}

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

if ($content) :
?>

<div class="<?= $className; ?>" id="<?= $id;?>">
  <div class="row <?= $layout; ?> <?php if ($layout === 'left' && $accent) {echo 'pt-5';}?>">
    <div class="col-md position-relative">
      <?= ($accent ? '<div class="accent '.$layout.'"></div>' : ''); ?>
      <?php
        foreach($content as $row) {
          include 'flex-blurb/'.$row['acf_fc_layout'].'.php';
        }
       ?>
    </div>
    <?php if ($image) : ?>
      <div class="col-md-6">
        <div class="img-wrap position-relative <?= $layout; ?> <?= (get_field('no_cropping') ? 'no-crop' : ''); ?>">
          <div class="inner">
            <?= echo_image($image,'medium_large'); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php endif; ?>
