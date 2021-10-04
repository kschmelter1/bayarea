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
$title = get_field('title');
$text = get_field('text');
$btns = get_field('buttons');
$form = get_field('form');

// Create class attribute allowing for custom "className" and "align" values.
$className = 'container-fluid double-pad block-'.substr($block['name'], 4);
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

?>

<div class="<?= $className; ?>" id="<?= $id;?>">
  <div class="row">
    <div class="col-md-5 position-relative d-flex align-items-center">
      <div class="content text-white bg-primary">
        <?= ($title ? '<h2>'.$title.'</h2>' : ''); ?>
        <?= ($text ? '<div class="text">'.$text.'</div>' : ''); ?>
        <?php if ($btns) : ?>
          <div class="btn-wrapper">
            <?php foreach ($btns as $btn) {
              echo echo_link($btn['link'], 'btn btn-secondary');
            } ?>
          </div>
        <?php endif; ?>
        <?= ($form ? do_shortcode($form) : ''); ?>
      </div>
    </div>
    <?php if ($image) : ?>
      <div class="col-md-6 offset-md-1">
        <div class="img-wrap position-relative">
          <div class="inner">
            <?= echo_image($image,'medium_large'); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
