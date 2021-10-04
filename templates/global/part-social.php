<?php
$social = get_field('social_media_links','compulse_options');
if ($social) : ?>
<ul class="list-inline social-media">
  <?php foreach ($social as $link) : ?>
    <li class="list-inline-item">
      <a href="<?= $link['link']['url']; ?>" target="_blank"><?= $link['icon']; ?></a>
    </li>
  <?php endforeach; ?>
</ul>
<?php endif; ?>
