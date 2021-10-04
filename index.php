<?php

get_header();

if (!is_front_page()) {
  get_template_part('templates/global/interior','title');
}

get_template_part('templates/global/part','content');

get_footer();

?>
