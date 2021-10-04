<?php
if (get_field('display_alert_bar', 'compulse_options') && get_field('alert_bar','compulse_options')) :
?>
<div id="alert-bar" class="container-fluid bg-info text-center"><?= get_field('alert_bar','compulse_options'); ?></div>
<?php endif; ?>
