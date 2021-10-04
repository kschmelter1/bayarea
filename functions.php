<?php

require_once 'includes/enqueue.php';
require_once 'includes/helper.php';
require_once 'includes/blocks.php';
require_once 'bs4Navwalker.php';

/**
 * Allow HTML in term (category, tag) descriptions
 */
foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
	if ( ! current_user_can( 'unfiltered_html' ) ) {
		add_filter( $filter, 'wp_filter_post_kses' );
	}
}
foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
}

function get_board_function( $atts = array() ) {
	extract(shortcode_atts(array(
     'type' => ''
    ), $atts));
		$boards = get_field('leadership_board','compulse_options');
		$output_string = '';

		if ($boards)  {
			ob_start();
			foreach ($boards as $b)  {
				if ($b['type'] == $atts['type']) {
					 ?>
					<ul class="d-flex board-members <?= $b['type']; ?>">
						<?php foreach  ($b['people'] as $person) : ?>
								<?php if ($person['bio']) : ?>
									<li class="has-bio">
										<div>
											<?= ($person['image'] ? echo_image($person['image'], 'large') : ''); ?>
											<p><strong><?= $person['name'];?></strong><br><?= $person['title']; ?></p>
										</div>
										<div class="bio"><?= $person['bio']; ?></div>
										<hr>
								<?php else : ?>
									<li>
										<strong><?= $person['title']; ?></strong>
										<?= ($person['image'] ? '<div class="wp-caption aligncenter">'.echo_image($person['image'], 'large').'<p class="wp-caption-text">'.$person['name'].'</p></div>' : '<br><p>'.$person['name'].'</p>'); ?>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php

			}
				}
				$output_string = ob_get_contents();
				ob_end_clean();
		}
     return $output_string;
}
add_shortcode('show_board', 'get_board_function');



/*
<img class="wp-image-2052 size-full alignnone" src="https://kval38186site.wpengine.com/wp-content/uploads/2021/06/Brian-Moore-Pres-CEO.jpg" alt="Brian Moore Pres Ceo" width="100" />
<p style="text-align: left;"><strong>Brian Moore</strong>
President and CEO</p>
Brian Moore was selected by the Bay Area Hospital Board of Directors after a nationwide search and assumed leadership of the hospital on January 2, 2019. He comes to the South Coast with more than 18 years of hospital leadership experience, most recently serving as CEO at St. Mary-Corwin Medical Center in Pueblo, Colorado.

Since moving to the area, Moore has been hard at work getting acquainted with community leaders and working with the hospital board to determine goals for the organization.

“In these first 2 years, I’m really doing a lot of listening and developing relationships within the community,” Moore says. “There are so many great things going on here at Bay Area Hospital. It’s an exciting time to be leading the organization.”

Throughout Moore’s dynamic career, he has successfully positioned hospitals for growth and expansion, led organizations to improved hospital operations, and delivered strong, sustainable gains in performance and productivity. Revered as his proudest accomplishment, Moore played a leading role in starting several new hospital campuses in an underserved area of Colorado early in his career.

Moore believes building community partnerships is an important part of running a successful organization, and he looks forward to establishing those relationships on the Oregon Coast.

“Being involved with fellow business leaders and the broader civic community for me has been something that I’ve always enjoyed and been very active and visible in,” Moore says.

Moore succeeds former CEO, Paul Janke, who retired January 4 after a decade of leadership at Bay Area Hospital.

<hr />

<ul class="d-flex board-members">
 	<li><strong>Chief Financial Officer</strong>

[caption id="attachment_2058" align="aligncenter" width="55"]<img class="wp-image-2058 size-full" src="https://bay-area.local/wp-content/uploads/2021/06/Sam-Patterson-Chief-Financial-Officer.jpg" alt="Sam Patterson Chief Financial Officer" width="55" height="78" /> Sam Patterson[/caption]</li>
 	<li><strong>Chief Nursing Officer</strong>

[caption id="attachment_2057" align="aligncenter" width="57"]<img class="wp-image-2057 size-full" src="https://bay-area.local/wp-content/uploads/2021/06/Regina-Rose-Chief-Nursing-Officer.jpg" alt="Regina Rose Chief Nursing Officer" width="57" height="80" /> Regina Rose[/caption]</li>
 	<li><strong>Chief Medical Officer</strong>

[caption id="attachment_2055" align="aligncenter" width="59"]<img class="wp-image-2055 size-full" src="https://bay-area.local/wp-content/uploads/2021/06/Lee-Saltzgaber-MD-Chief-Medical-Officer.png" alt="Lee Saltzgaber, Md Chief Medical Officer" width="59" height="77" /> Lee Saltzgaber[/caption]</li>
 	<li><strong>Chief Quality Officer</strong>

[caption id="attachment_2054" align="aligncenter" width="59"]<img class="wp-image-2054 size-full" src="https://bay-area.local/wp-content/uploads/2021/06/Kelli-Dion-Chief-Quality-Officer.jpg" alt="Kelli Dion Chief Quality Officer" width="59" height="85" /> Kelli Dion[/caption]</li>
 	<li><strong>Chief Human Resources Officer</strong>
<div class="mceTemp"></div>

[caption id="attachment_2053" align="aligncenter" width="59"]<img class="wp-image-2053 size-full" src="https://bay-area.local/wp-content/uploads/2021/06/Clay-England-Chief-Human-Resources-Officer.jpg" alt="Clay England Chief Human Resources Officer" width="59" height="82" /> Clay England[/caption]</li>
 	<li><strong>Chief Information Officer</strong>
<div class="mceTemp"></div>

[caption id="attachment_2056" align="aligncenter" width="60"]<img class="wp-image-2056 size-full" src="https://bay-area.local/wp-content/uploads/2021/06/Patrick-Varga-Chief-Information-Officer.jpg" alt="Patrick Varga Chief Information Officer" width="60" height="85" /> Patrick Varga[/caption]<p>Patrick has over 25 years of progressive healthcare experience, and is an executive who is enthusiastic about delivery of quality healthcare, particularly regarding patient safety, outcomes, and satisfaction. He strives to build strong relationships while fostering life-long learning opportunities and improving systems to make a lasting difference. His career experience includes positions in pharmacy, compliance, healthcare, patient safety, information technology, and leadership. He has served as Bay Area Hospital’s Chief Information Officer since 2017.</p></li>
</ul> */
