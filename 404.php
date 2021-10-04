<?php
get_header();
//get_template_part('templates/global/part','title');
?>

<div class="main-title text-center container-fluid double-pad">
  <?php if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
  } ?>
  <h1>404 Page Not Found</h1>
</div>


<?php

get_footer();

?>
