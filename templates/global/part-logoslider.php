<?php $logoslider = get_field('logo_slider','compulse_options');
if ($logoslider) : ?>
<div class="logo-slider container-fluid position-relative">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($logoslider as $logo) : ?>
                    <div class="swiper-slide">
                        <div class="logo"><?= echo_image($logo, 'medium_large'); ?></div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
</div>
<?php endif; ?>
