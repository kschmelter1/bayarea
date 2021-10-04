<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php get_template_part('templates/global/nav','mobile'); ?>
	<div class="d-xl-none main-header-mobile-top main-header-top container-fluid d-flex justify-content-between align-items-center">
		<div class="d-flex phone-wrap-wrap">
			<?php
			$address = get_field('address','compulse_options');
			$phone = get_field('phone_number','compulse_options');
			$phoneInfo = get_field('phone_info','compulse_options');
			echo ($address ? '<div class="d-none d-xl-block">'.$address.'</div>' : '');
			if ($phone) {
				echo '<div class="phone-wrap"><i class="far fa-phone-alt"></i>'.clean_phone($phone, true);
				echo ($phoneInfo ? '<span>'.$phoneInfo.'</span>' : '');
				echo '</div>';
			}
			?>
		</div>
	</div>
	<div class="main-header bg-white" id="main-header">
		<div class="d-none d-xl-flex main-header-top container-fluid justify-content-between align-items-center">
			<div class="d-flex phone-wrap-wrap">
				<?php
				$address = get_field('address','compulse_options');
				$phone = get_field('phone_number','compulse_options');
				$phoneInfo = get_field('phone_info','compulse_options');
				echo ($address ? '<div class="d-none d-xl-block">'.$address.'</div>' : '');
				if ($phone) {
					echo '<div class="phone-wrap"><i class="far fa-phone-alt"></i>'.clean_phone($phone, true);
					echo ($phoneInfo ? '<span>'.$phoneInfo.'</span>' : '');
					echo '</div>';
				}
				?>
			</div>
			<?php get_template_part('templates/global/nav','header'); ?>
		</div>
		<div class="main-header-nav container-fluid bg-primary text-white">
			<div class="row">
				<div class="col-xl-3">
					<?php get_template_part('templates/global/part','logo'); ?>
				</div>
				<div class="d-none d-xl-block col-md main-header-nav-right">
					<?php get_template_part('templates/global/nav','main'); ?>
				</div>
			</div>

			<?php get_template_part('templates/global/part','megamenu'); ?>
		  </div>
		</div>
		<?php get_template_part('templates/global/part','alert'); ?>
		<?php get_template_part('templates/global/nav','floating'); ?>
	</div>

<?php get_template_part('templates/global/part','mychart'); ?>
<?php get_template_part('templates/global/part','onmyway'); ?>
