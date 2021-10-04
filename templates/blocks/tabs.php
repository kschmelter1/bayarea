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
$tabs = get_field('tabs');


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

if ($tabs) :
?>

<div class="<?= $className; ?>" id="<?= $id;?>">
  <?php if ($anchor) : ?><h2 class="text-center"><?= $anchor; ?></h2><?php endif; ?>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <?php foreach ($tabs as $key => $tab) : ?>
  <li class="nav-item">
    <button class="nav-link <?= ($key === 0 ? 'active' : ''); ?>" id="<?= make_id($tab['title']); ?>-tab" data-toggle="tab" data-target="#<?= make_id($tab['title']); ?>" role="tab" aria-controls="<?= make_id($tab['title']); ?>" aria-selected="<?= ($key === 0 ? 'true' : ''); ?>"><?= $tab['title']; ?></button>
  </li>
    <?php endforeach; ?>
    <li class="nav-item dropdown d-none">
          <div class="nav-link dropdown-toggle btn btn-light" id="navbarDropdownMenu" role="button" data-toggle="dropdown">
            More
          </div>
          <ul class="dropdown-menu dropdown-menu-right">
          </ul>
      </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <?php foreach ($tabs as $key => $tab) : ?>
      <div class="tab-pane fade <?= ($key === 0 ? 'show active' : ''); ?>" id="<?= make_id($tab['title']); ?>" role="tabpanel" aria-labelledby="<?= make_id($tab['title']); ?>-tab">
        <div class="row">
          <div class="col-md"><?= $tab['content']; ?></div>
          <?php if ($tab['image']) : ?><div class="col-md-4 offset-md-1">
            <figure class="text-center">
              <div class="img-wrap"><?= echo_image($tab['image'], 'medium_large'); ?></div>
              <figcaption>
                <span class="h3"><?= $tab['image']['title']; ?></span>
                <span><?= $tab['image']['description']; ?></span>
              </figcaption>
            </figure>
          </div><?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php endif; ?>
