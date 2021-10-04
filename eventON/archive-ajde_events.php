<?php
get_header();

if (!is_front_page()) {
  get_template_part('templates/global/interior','title');
}

?>
<div class="main-content">
<div class="container-fluid guten-block double-pad">
    <div class="row justify-content-center"><div class="col-md-9">
      <?= do_shortcode('[add_eventon_list number_of_months="5" hide_empty_months="yes" ]'); ?>
    </div></div>
  </div>
</div>
<?php

get_footer();

?>
