<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>
<div id="contact">
	<main class="site-main" id="main">	
		<?php $hero = get_field('hero'); ?>
		<section class="hero container-fluid position-relative" style = "background: url('<?php echo $hero['image']['url']; ?>');">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class = "text-white mb-0"><?php echo $hero['header']; ?></h1>
					</div><!-- .col-sm-12 -->
				</div><!-- .row -->	
			</div>
		</section><!-- .container-fluid -->

		<section>
			<div class="container mt-5 pb-5">
				<div class="row">
					<div class="col-md-5">
						<h2 class="h3 mb-3">
							Send us a message</h2>
						<!-- .h3 mb-3 -->
						<?php echo do_shortcode('[ninja_form id=1]'); ?>
					</div><!-- .col-md-5 -->
					<div id = "waysToConnect" class="offset-md-1 col-md-6">
						<?php $contact = get_field('contact_information');
						//variables
							$phone_icon = $contact['phone_icon']['url'];
							$phone = get_field('phone', 'option');
							$email = get_field('email', 'option');
							$hours_icon = $contact['hours_icon']['url'];
							$hours = get_field('hours', 'option');
							$address_icon = $contact['address_icon']['url'];
							$address1 = get_field('address_1', 'option');
							$address2 = get_field('address_2', 'option');
							$map = $contact['map_image']['url'];
						?>
						<div id = "talk" class="row mb-4">
							<div class="col-sm-2">
								<img src = "<?php echo $phone_icon; ?>">
							</div><!-- .col-sm-2 -->
							<div class="col-sm-10">
								<h5>Let's Talk</h5>
								<a href = "tel:<?php echo $phone ?>"><?php echo $phone; ?></a>
								<a href = "mailto:<?php echo $email ?>"><?php echo $email; ?></a>
							</div><!-- .col-sm-10 -->
						</div><!-- .row -->
						<div id = "hours" class="row mb-4">
							<div class="col-sm-2">
								<img src = "<?php echo $hours_icon; ?>">
							</div><!-- .col-sm-2 -->
							<div class="col-sm-10">
								<h5>Hours</h5>
								<p class = "mb-0"><?php echo $hours; ?></p>
							</div><!-- .col-sm-10 -->
						</div><!-- .row -->
						<div id = "address" class="row">
							<div class="col-sm-2">
								<img src = "<?php echo $address_icon; ?>">
							</div><!-- .col-sm-2 -->
							<div class="col-sm-10">
								<h5>Address</h5>
								<p><?php echo $address1; ?><br />
								<?php echo $address2; ?><a class = "ml-2" target = "_blank" href="https://goo.gl/maps/RSKvXdwKdrCBTehD9">Map</a></p>
							</div><!-- .col-sm-10 -->
						</div><!-- .row -->
						<a target = "_blank" href="https://goo.gl/maps/RSKvXdwKdrCBTehD9">
						<img src="<?php echo $map; ?>" alt="Directions to Pixelstrike Creative"></img></a>
					</div><!-- .col-md-6 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</section>
	</main><!-- #main -->
</div><!-- #contact -->
<?php get_footer(); ?>