<?php
    $theme = wp_get_theme(get_template());
    //$author = $theme->get('Author');
    $author = "Compulse";
    $uri = $theme->get('AuthorURI');
?>
<div class="copyright">
Design by <a href="<?= $uri; ?>" target="_blank"><?= $author; ?></a>
</div>
