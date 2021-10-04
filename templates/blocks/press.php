<?php
/**
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/


// Create class attribute allowing for custom "className" and "align" values.
$className = 'container-fluid block-'.substr($block['name'], 4);
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
    'post_type' => 'post',
    'posts_per_page' => -1
);

$docs = get_posts($args);
if ($docs) :

?>
<div class="<?= $className; ?>" id="<?= $id;?>">
  <?php /******* SEARCH + ALPHABET *******/ ?>
  <div class="row justify-content-center text-center filters-search">
    <div class="col-md-6">
      <label class="d-block search-label text-left">
        <span>Search by Keyword</span>
        <input id="sortSearch" type="search" class="form-control" placeholder="Search for an article" aria-controls="press-list">
      </label>
    </div>
  </div>

  <div class="row">
    <?php /******* TABLE ********/ ?>
    <div class="col-md-12">
      <h2 class="h3 column-heading"><span id="doc-count"><?= count($docs); ?></span> Results</h2>
      <table id="press-list" cellspacing="0" width="100%">
        <thead><tr><th></th></tr></thead>
        <tbody>
        <?
          $order = 0;
          foreach ($docs as $doc) :
            $name = $doc->post_title;
          ?>
            <tr>
              <td data-order="<?= $order; ?>" data-sort="<?= $order; ?>">
              <a href="<?= get_the_permalink($doc->ID); ?>" class="d-flex single-press align-items-center">
                <div class="date d-none d-lg-flex flex-column justify-content-center align-items-center">
                  <span><?= get_the_date('M', $doc); ?></span>
                  <span><?= get_the_date('j', $doc); ?></span>
                </div>
                <div class="content">
                  <div class="meta"><?= get_the_date('F j, Y', $doc); ?> | <?= do_shortcode('[rt_reading_time post_id="'.$doc->ID.'"]'); ?> Min Read</div>
                  <h3><?= $name; ?></h3>
                </div>
                <i class="far fa-chevron-right"></i>
              </a>
            </td></tr>
        <? $order++; endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php endif; ?>
