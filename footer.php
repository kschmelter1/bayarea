<?php get_template_part('templates/global/part','logoslider'); ?>
<footer class="bg-primary container-fluid text-white position-relative">
    <div class="row align-items-center mb-4">
      <div class="col-md-4">
        <?php get_template_part('templates/global/part','logo'); ?>
        <?php get_template_part('templates/global/part','seo'); ?>
        <?php
        $address = get_field('address','compulse_options');
				$phone = get_field('phone_number','compulse_options');
        echo ($address ? '<p>'.$address.'</p>' : '');
				if ($phone) {
					echo '<p class="phone-wrap">Ph: '.clean_phone($phone, true);
					echo '</p>';
				}
        if ($address) {
          $gmap = 'http://maps.google.com/maps?q='.urlencode($address);
          ?><a href="<?= $gmap;?>" target="_blank" class="btn btn-lg btn-secondary">Get Map Directions</a><?php
        }
         ?>
      </div>
      <div class="col-md">
        <div class="row">
        <?php for ($i = 1; $i < 4; $i++) : ?>
          <ul class="col-6 col-md offset-md-1 footer-sidebar list-unstyled">
              <?php dynamic_sidebar( 'footer-'.$i ); ?>
          </ul>
        <?php endfor; ?>
        </div>
      </div>

    </div>
    <div class="text-lg-center">
      &copy; <?= date('Y'); ?> <?= get_bloginfo('sitename');?>. All Rights Reserved.</div>

    <div class="row bottom-bar align-items-center">
      <div class="order-md-2 col-md-5 text-lg-center small">
        <?= get_field('footer_disclaimer_text','compulse_options'); ?>
      </div>
      <div class="order-md-1 col-md small">
        <?php get_template_part('templates/global/part','copyright'); ?>
      </div>

      <div class="order-md-3 col-md">
        <?php get_template_part('templates/global/part','social'); ?>
      </div>
    </div>
</footer>
<?php wp_footer(); ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
