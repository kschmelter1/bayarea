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

// Create class attribute allowing for custom "className" and "align" values.
$className = 'container-fluid double-pad block-margin block-'.substr($block['name'], 4);
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Create id attribute allowing for custom "anchor" value.
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
} else {
  $id = $block['id'];
}

$args = array(
'post_type'      => 'post',
'posts_per_page' => 4
);
$news = get_posts($args);
$new = $news[0];
?>

<div class="<?= $className; ?>" id="<?= $id;?>">
  <div class="row right">
    <div class="col-12">
      <div class="accent right"></div>
      <h2 class="block-title"><?= $title; ?></h2>
    </div>
    <div class="col-md">
      <div class="news-post">
        <?php $link = get_the_permalink($new->ID);  ?>
          <p class="meta"><?= get_the_date('F d, Y', $new->ID); ?> | <?= do_shortcode('[rt_reading_time post_id="'.$new->ID.'"]'); ?> Min Read</p>
          <h3 class="news-title"><?= $new->post_title; ?></h3>
          <p class="excerpt"><?= $new->post_excerpt; ?></p>
          <a class="btn btn-secondary" href="<?= $link; ?>">
            Read the Article
          </a>
      </div>
    </div>

      <div class="col-md-6">
        <div class="events">
          <?php foreach ($news as $key=>$doc) : if ($key == 0) {continue;} ?>
            <a class="event d-flex align-items-center card"  href="<?= get_the_permalink($doc->ID); ?>">
              <div class="event-date">
                <div><span><?= get_the_date('M', $doc); ?></span><?= get_the_date('j', $doc); ?></div>
              </div>
              <div class="event-body">
                <p class="meta"><?= get_the_date('F j, Y', $doc); ?> | <?= do_shortcode('[rt_reading_time post_id="'.$doc->ID.'"]'); ?> Min Read</p>
                <h3 class="event-title"><?= $doc->post_title; ?></h3>
              </div>
              <i class="fas fa-chevron-right"></i>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

  </div>
</div>
