<?php
get_header();
//get_template_part('templates/global/part','title');
?>

<div class="main-title text-center container-fluid double-pad">
  <?php if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
  } ?>
  <h1>Search Results</h1>
</div>

<?php if ( have_posts() ) : ?>
                <div class="container-fluid double-pad block-margin">
                        <h2 class="h4"><?php printf( __( 'Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

                        <div class="text">
                          <ul class="results-list">
                          <?php while ( have_posts() ) : the_post(); ?>
                              <li><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a>
                                <?php // interior sections
                                $blocks = parse_blocks(get_the_content());
                                $links = array();
                                if ($blocks) {
                                  foreach ($blocks as $block) {
                                    if ($block['attrs']['data']['section_anchor']) {
                                      array_push($links, $block['attrs']['data']['section_anchor']);
                                    }
                                  }
                                }

                                if ($links) : ?>
                                  <ul class="list-group d-none d-lg-flex flex-column">
                                    <?php foreach ($links as $link) : ?>
                                      <a class="list-group-item list-group-item-action" href="<?php the_permalink(); ?>/#<?= make_id($link); ?>"><?php
                                      echo $link;
                                   ?></a>
                                    <?php endforeach; ?>
                                  </ul>
                                <?php endif; ?>
                              </li>
                          <?php endwhile; ?>
                          </ul>
                          <?php wp_reset_postdata(); ?>
                        </div>
                </div>

            <?php else : ?>

                <div class="container-fluid double-pad block-margin">
                        <h2 class="block-title"><?php printf( __( 'No results found for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                </div>

            <?php endif; ?>

<?php

get_footer();

?>
