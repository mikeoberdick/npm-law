<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>
<div id="contact">
	<main class="site-main" id="main">	
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<h1 class="h4 mb-3"><?php the_field('page_title'); ?></h1>
						<!-- .h3 mb-3 -->
						<p class = "mb-3"><?php the_field('page_copy') ?></p>
						<?php echo do_shortcode('[ninja_form id=1]'); ?>
						<p><?php the_field('disclaimer'); ?></p>
					</div><!-- .col-md-7 -->
					
					<div id = "locations" class="col-md-5">
						<div class="location contact-box mb-3 w-100">
							<h5>New Haven, CT</h5>
						<?php
						//vars
						$addy1 = get_field('new_haven_address_line_1', 'option');
						$addy2 = get_field('new_haven_address_line_2', 'option');
						$phone = get_field('new_haven_phone_number', 'option');
						$fax = get_field('new_haven_fax_number', 'option');
						?>
							<p><?php echo 'Neubert, Pepe & Monteith, P.C.<br>' . $addy1 . '<br>' . $addy2 . '<br>Phone <a href ="tel:' . $phone . '">' . $phone . '</a>' . ' | Fax ' . $fax ?></p>
							<a href = '<?php echo get_site_url(); ?>/new-haven-ct'><button role = 'button' class = 'mt-3 btn btn-primary light-blue-button'>Get Directions</button></a>
						</div><!-- .location -->

						<div class="location contact-box mb-3 w-100">
							<h5>Hartford, CT</h5>
						<?php
						//vars
						$addy1 = get_field('hartford_address_line_1', 'option');
						$addy2 = get_field('hartford_address_line_2', 'option');
						$phone = get_field('hartford_phone_number', 'option');
						$fax = get_field('hartford_fax_number', 'option');
						?>
							<p><?php echo 'Neubert, Pepe & Monteith, P.C.<br>' . $addy1 . '<br>' . $addy2 . '<br>Phone <a href ="tel:' . $phone . '">' . $phone . '</a>' . ' | Fax ' . $fax ?></p>
							<a href = '<?php echo get_site_url(); ?>/hartford-ct'><button role = 'button' class = 'mt-3 btn btn-primary light-blue-button'>Get Directions</button></a>
						</div><!-- .location -->

						<div class="location contact-box mb-3 w-100">
							<h5>Fairfield, CT</h5>
						<?php
						//vars
						$addy1 = get_field('fairfield_address_line_1', 'option');
						$addy2 = get_field('fairfield_address_line_2', 'option');
						$phone = get_field('fairfield_phone_number', 'option');
						$fax = get_field('fairfield_fax_number', 'option');
						?>
							<p><?php echo 'Neubert, Pepe & Monteith, P.C.<br>' . $addy1 . '<br>' . $addy2 . '<br>Phone <a href ="tel:' . $phone . '">' . $phone . '</a>' . ' | Fax ' . $fax ?></p>
							<a href = '<?php echo get_site_url(); ?>/fairfield-ct'><button role = 'button' class = 'mt-3 btn btn-primary light-blue-button'>Get Directions</button></a>
						</div><!-- .location -->

						<div class="location contact-box mb-3 w-100">
							<h5>White Plains, NY</h5>
						<?php
						//vars
						$addy1 = get_field('white_plains_address_line_1', 'option');
						$addy2 = get_field('white_plains_address_line_2', 'option');
						$phone = get_field('white_plains_phone_number', 'option');
						$fax = get_field('white_plains_fax_number', 'option');
						?>
							<p<?php echo get_site_url(); ?>/new-haven-ct><?php echo 'Neubert, Pepe & Monteith, P.C.<br>' . $addy1 . '<br>' . $addy2 . '<br>Phone <a href ="tel:' . $phone . '">' . $phone . '</a>' . ' | Fax ' . $fax ?></p>
							<a href = '<?php echo get_site_url(); ?>/white-plains-ny'><button role = 'button' class = 'mt-3 btn btn-primary light-blue-button'>Get Directions</button></a>
						</div><!-- .location -->
							
					</div><!-- .col-md-5 -->
				
				</div><!-- .row -->
			</div><!-- .container -->
		</section>
	</main><!-- #main -->
</div><!-- #contact -->
<?php get_footer(); ?>