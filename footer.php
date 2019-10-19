<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
?>

<div id="js-heightControl" style="height: 0;">&nbsp;</div>

<div id = "footer" class = "pt-5">
	<div class="container">
		<div id = "locations" class="row">
			<div class="col-6 col-md-3">
				<h6 class = "location text-center">New Haven</h6>
				<?php
				//vars
				$addy1 = get_field('new_haven_address_line_1', 'option');
				$addy2 = get_field('new_haven_address_line_2', 'option');
				$phone = get_field('new_haven_phone_number', 'option');
				?>
				<p class = "text-center small"><?php echo $addy1 . '<br>' . $addy2 . '<br>Phone: ' . $phone ?></p>
			</div><!--col-sm-3 -->
			<div class="col-6 col-md-3">
				<h6 class = "location text-center">Fairfield</h6>
				<?php
				//vars
				$addy1 = get_field('fairfield_address_line_1', 'option');
				$addy2 = get_field('fairfield_address_line_2', 'option');
				$phone = get_field('fairfield_phone_number', 'option');
				?>
				<p class = "text-center small"><?php echo $addy1 . '<br>' . $addy2 . '<br>Phone: ' . $phone ?></p>
			</div><!--col-sm-3 -->
			<div class="col-6 col-md-3">
				<h6 class = "location text-center">White Plains</h6>
				<?php
				//vars
				$addy1 = get_field('white_plains_address_line_1', 'option');
				$addy2 = get_field('white_plains_address_line_2', 'option');
				$phone = get_field('white_plains_phone_number', 'option');
				?>
				<p class = "text-center small"><?php echo $addy1 . '<br>' . $addy2 . '<br>Phone: ' . $phone ?></p>
			</div><!--col-sm-3 -->
			<div class="col-6 col-md-3">
				<h6 class = "location text-center">Hartford</h6>
				<?php
				//vars
				$addy1 = get_field('harford_address_line_1', 'option');
				$addy2 = get_field('harford_address_line_2', 'option');
				$phone = get_field('harford_phone_number', 'option');
				?>
				<p class = "text-center small"><?php echo $addy1 . '<br>' . $addy2 . '<br>Phone: ' . $phone ?></p>
			</div><!--col-sm-3 -->
		</div><!-- .row -->
	</div><!-- .container -->

	<div id = "copyright" class="text-center mt-3 pb-3">
		<span class = "small">&copy; <?php bloginfo( 'name' ); ?>. All rights reserved. <a href="#">Disclaimer</a><br />Website by <a class = "attribution" href = "http://www.designs4theweb.com">Designs 4 The Web</a></span>
	</div><!-- #copyright -->
</div><!-- #footer -->

</div><!-- #page-wrapper -->

<?php wp_footer(); ?>

</body>

</html>
