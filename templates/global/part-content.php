<div class="main-content">
<?php
$blocks = parse_blocks(get_the_content());
if ($blocks) {
  for ($i = 0; $i < count($blocks); $i++) {
    //var_dump($blocks[$i]['blockName']);
    if (substr($blocks[$i]['blockName'], 0, 3) === 'acf') {
        echo render_block( $blocks[$i] );
    } elseif (preg_replace('|/|', '-', $blocks[$i]['blockName']) === 'core-html') {
        echo '<div class="container-fluid double-pad guten-block '.preg_replace('|/|', '-', $blocks[$i]['blockName']).'">'.render_block( $blocks[$i] ).'</div>';
    } else {
      if ($blocks[$i]['blockName'] && $blocks[$i]['innerHTML']) { //Stops null blocks from outputting
        // Depending on the website you may want to set the column size for the default columns block different
        // from other gutn blocks. Feel free to change column classes. Also if you use one container wrapped
        // around all the blocks, you would take out the container class here.
        if ($blocks[$i]['blockName'] == 'core/columns') {$col = 'col-md-12';} else {$col = 'col-md-10 col-lg-8';}
      echo '<div class="container-fluid guten-block '.preg_replace('|/|', '-', $blocks[$i]['blockName']).'">';
      echo '<div class="row justify-content-center"><div class="'.$col.'">';
      echo apply_filters( 'the_content', render_block( $blocks[$i] ) );
      echo '</div></div></div>';
      }
    }
  }
} else {
  the_content();
}
?>
</div>
