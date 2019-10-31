<?php /* Template Name: Service Detail */ ?>

<?php get_header(); ?>
<div id="serviceDetail">
	<main class="site-main" id="main">	
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class = "h4 mb-3"><?php the_title(); ?></h1>
					</div><!-- .col-sm-12 -->
					<div class="col-md-7">
						<h2 class="h5 mb-3 gray">Services</h2>
						<!-- .h5 mb-3 -->
						<ul id = "services" class = "mb-3">
							<?php
							$services = get_field('services');
							$items = explode(PHP_EOL, $services);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul><!-- #services -->
						<hr>
						<?php
						if( have_rows('service_description') ):
    					while ( have_rows('service_description') ) : the_row(); ?>
    					<h3 class="h5 my-3 gray"><?php the_sub_field('title'); ?></h3>
						<p><?php the_sub_field('copy'); ?></p>
						<?php endwhile; endif; ?>
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
							<p class = ""><?php echo 'Neubert, Pepe & Monteith, P.C.<br>' . $addy1 . '<br>' . $addy2 . '<br>Phone <a href ="tel:' . $phone . '">' . $phone . '</a>' . ' | Fax ' . $fax ?></p>
							<a href = ''><button role = 'button' class = 'mt-3 btn btn-primary light-blue-button'>Get Directions</button></a>
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
							<p class = ""><?php echo 'Neubert, Pepe & Monteith, P.C.<br>' . $addy1 . '<br>' . $addy2 . '<br>Phone <a href ="tel:' . $phone . '">' . $phone . '</a>' . ' | Fax ' . $fax ?></p>
							<a href = ''><button role = 'button' class = 'mt-3 btn btn-primary light-blue-button'>Get Directions</button></a>
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
							<p class = ""><?php echo 'Neubert, Pepe & Monteith, P.C.<br>' . $addy1 . '<br>' . $addy2 . '<br>Phone <a href ="tel:' . $phone . '">' . $phone . '</a>' . ' | Fax ' . $fax ?></p>
							<a href = ''><button role = 'button' class = 'mt-3 btn btn-primary light-blue-button'>Get Directions</button></a>
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
							<p class = ""><?php echo 'Neubert, Pepe & Monteith, P.C.<br>' . $addy1 . '<br>' . $addy2 . '<br>Phone <a href ="tel:' . $phone . '">' . $phone . '</a>' . ' | Fax ' . $fax ?></p>
							<a href = ''><button role = 'button' class = 'mt-3 btn btn-primary light-blue-button'>Get Directions</button></a>
						</div><!-- .location -->
							
					</div><!-- .col-md-5 -->
				
				</div><!-- .row -->
			</div><!-- .container -->
		</section>
	</main><!-- #main -->
</div><!-- #serviceDetail -->
<?php get_footer(); ?>