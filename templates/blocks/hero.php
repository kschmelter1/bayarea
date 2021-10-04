     <?php
/**
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

 // Load values and assigning defaults.
$hero = get_field('hero');
$tabs = get_field('tabs');

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-'.substr($block['name'], 4);
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Create id attribute allowing for custom "anchor" value.
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
} else {
  $id = $block['id'];
}

?>

<div class="<?= $className; ?>" id="<?= $id;?>">
  <div class="hero-main container-fluid position-relative">
    <?= ($hero['image'] ? '<div class="bg-cover">'.echo_image($hero['image'], 'full').'</div>' : ''); ?>
    <div class="content position-relative">
      <?= ($hero['title'] ? '<div class="h1">'.$hero['title'].'</div>' : ''); ?>
      <?php if ($hero['buttons']) : ?>
        <div class="btn-wrapper row">
          <?php foreach($hero['buttons'] as $btn) : if ($btn['link']) : ?>
            <div class="col-md-auto">
              <a class="d-flex align-items-center hero-btn bg-white h-100" href="<?= $btn['link']['url']; ?>" <?= a_target($btn['link']); ?>>
                <?= ($btn['icon'] ? '<div class="icon position-relative h-100">'.$btn['icon'].'</div>' : ''); ?>
                <div class="hero-btn-text">
                  <?= ($btn['title'] ? '<div class="hero-btn-title">'.$btn['title'].'</div>' : ''); ?>
                  <?= ($btn['text'] ? '<div class="hero-btn-text">'.$btn['text'].'</div>' : ''); ?>
                </div>
                <i class="fas fa-angle-right"></i>
              </a>
            </div>
          <?php endif; endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <?php if ($tabs) : ?>
    <div class="row hero-tabs g-0">
      <?php foreach ($tabs as $key => $tab) : ?>
        <div class="col-md-4 hero-tab bg-white <?= ($key === 1 ? 'active default-tab' : ''); ?>">
          <div class="hero-tab-inner text-center">
            <?= ($tab['icon'] ? '<div class="icon">'.$tab['icon'].'</div>' : ''); ?>
            <?= ($tab['title'] ? '<div class="h3 hero-tab-title">'.$tab['title'].'</div>' : ''); ?>
            <?= ($tab['text'] ? '<p class="hero-tab-text">'.$tab['text'].'</p>' : ''); ?>
            <?= ($tab['link'] ? echo_link($tab['link'], 'btn btn-secondary') : ''); ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
