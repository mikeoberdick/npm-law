<?php get_header(); ?>

<div id="singleAttorney">
	<main class="site-main" id="main">
		
		<section class="container">
			<div class="row mb-5">
				<div class="col-sm-3">
					<?php $image = get_field('image'); ?>
					<div id = "imageWrapper" style = "background:url('<?php echo $image['url']; ?>');">
					</div>
				</div><!-- .col-sm-3 -->
				<div class="col-sm-9">
					<div id = "attorneyTitle" class="row mb-3 no-gutters">
						<div class="col-sm-6">
							<h1 class="h4"><?php the_field('name'); ?></h1>
						</div><!-- .col-sm-6 -->
						<div class="col-sm-6 d-flex align-items-center justify-content-end">
							<h2 class="h5 gray d-inline-flex mr-4 mb-0"><?php the_field('title'); ?></h2><!-- .h5 gray -->
							<div class="d-inline-flex links">
								<a href="mailto:<?php the_field('email'); ?>"><i class="mr-2 fa fa-envelope-o" aria-hidden="true"></i></a>
								<?php $vcard = get_field('vcard'); ?>
								<?php if ($vcard) { ?>
								<a href="<?php echo $vcard['url']; ?>"><i class="mr-2 fa fa-address-card-o" aria-hidden="true"></i></a>
								<?php } ?>
								<a href="#" onclick="window.print()"><i class="mr-2 fa fa-print" aria-hidden="true"></i></a>
								<?php 
								//links
								$linkedin = get_field('linked_in');
								$twitter = get_field('twitter');
								$instagram = get_field('instagram');
								?>
							<?php if ($linkedin) { ?>
								<a target = "_blank" href="<?php echo $linkedin; ?>"><i class="mr-2 fa fa-linkedin-square" aria-hidden="true"></i></a>
							<?php } ?>
							<?php if ($twitter) { ?>
								<a target = "_blank" href="<?php echo $twitter; ?>"><i class="mr-2 fa fa-twitter-square" aria-hidden="true"></i></a>
							<?php } ?>
							<?php if ($instagram) { ?>
								<a target = "_blank" href="<?php echo $instagram; ?>"><i class="mr-2 fa fa-instagram" aria-hidden="true"></i></a>
							<?php } ?>
							</div><!-- .links -->
						</div><!-- .col-sm-6 -->
					</div><!-- .row -->
					<div id = "attorneyAddress" class="address mb-3">
						<?php $office = get_field('location')['value'];
						$addy1 = get_field($office . '_address_line_1', 'option');
						$addy2 = get_field($office . '_address_line_2', 'option');
						$phone = get_field($office . '_phone_number', 'option');
						$fax = get_field($office . '_fax_number', 'option'); ?>
						<p class = "mb-0"><?php echo $addy1 . ', ' . $addy2  ?></p>
						<p><?php echo 'Phone: ' . $phone . ' | ' . 'Fax: ' . $fax  ?></p>
					</div><!-- .address -->
					<div id = "attorneyDetails">
						<div class="row">
							<div class="col-md-6">
								<h3 class="h5 gray">Practice Areas</h3><!-- .h5 -->
								<?php $links = get_field('practice_areas'); ?>
								<?php 
								$posts = get_field('practice_areas');
								if( $posts ): ?>
								    <ul id = "practiceAreas" class = "pl-3">
								    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
								        <?php setup_postdata($post); ?>
								        <li>
								            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								        </li>
								    <?php endforeach; ?>
								    </ul>
								    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
								<?php endif; ?>
							</div><!-- .col-md-6 -->
							<div class="col-md-6">
								<h3 class="h5 gray">Education</h3><!-- .h5 -->
								<ul class = "pl-3">
								<?php
								$education = get_field('education');
								$items = explode(PHP_EOL, $education);
				                foreach($items as $item) {
				                echo '<li>' . $item . '</li>'; } ?>
								</ul>
							</div><!-- .col-md-5 -->	
						</div><!-- .row -->
					</div><!-- #attorneyDetails -->
				</div><!-- .col-md-9 -->
			</div><!-- .row -->

			<?php 
			//vars
			$bio = get_field('biography');
			$memberships = get_field('professional_memberships');
			$honors = get_field('honors_and_awards');
			$community = get_field('community');
			$publications = get_field('publications');
			$speaking = get_field('speaking_engagements');
			$classes = get_field('classes_and_seminars');
			$cases = get_field('representative_cases');
			$bar = get_field('bar_admissions');

			?>

			<nav class="row d-print-none">
			  <div id="contentSelector" class="col-md-12 py-3 mb-3 nav nav-tabs d-flex align-items-center" role="tablist">
			  	<?php if( $bio ) { ?>
			    <div class="text-center nav-item active" id="nav-bio-tab" data-toggle="tab" href="#nav-bio" role="tab" aria-controls="nav-bio" aria-selected="true">Biography</div>
			    <?php } ?>
			    <?php if( $memberships ) { ?>
			    <div class="text-center nav-item" id="nav-memberships-tab" data-toggle="tab" href="#nav-memberships" role="tab" aria-controls="nav-memberships" aria-selected="false">Professional<br>Memberships</div>
			    <?php } ?>
			    <?php if( $honors ) { ?>
			    <div class="text-center nav-item" id="nav-honors-tab" data-toggle="tab" href="#nav-honors" role="tab" aria-controls="nav-honors" aria-selected="false">Honors<br>& Awards</div>
			    <?php } ?>
			    <?php if( $community ) { ?>
			    <div class="text-center nav-item" id="nav-community-tab" data-toggle="tab" href="#nav-community" role="tab" aria-controls="nav-community" aria-selected="false">Community</div>
			    <?php } ?>
			    <?php if( $publications ) { ?>
			    <div class="text-center nav-item" id="nav-publications-tab" data-toggle="tab" href="#nav-publications" role="tab" aria-controls="nav-publications" aria-selected="false">Publications</div>
			    <?php } ?>
			    <?php if( $speaking ) { ?>
			    <div class="text-center nav-item" id="nav-speaking-tab" data-toggle="tab" href="#nav-speaking" role="tab" aria-controls="nav-speaking" aria-selected="false">Speaking<br>Engagements</div>
			    <?php } ?>
			    <?php if( $classes ) { ?>
			    <div class="text-center nav-item" id="nav-classes-tab" data-toggle="tab" href="#nav-classes" role="tab" aria-controls="nav-classes" aria-selected="false">Classes<br>& Seminars</div>
			    <?php } ?>
			    <?php if( $cases ) { ?>
			    <div class="text-center nav-item" id="nav-cases-tab" data-toggle="tab" href="#nav-cases" role="tab" aria-controls="nav-cases" aria-selected="false">Representative<br>Cases</div>
			    <?php } ?>
			    <?php if( $bar ) { ?>
			    <div class="text-center nav-item" id="nav-bar-tab" data-toggle="tab" href="#nav-bar" role="tab" aria-controls="nav-bar" aria-selected="false">Bar<br>Admissions</div>
			    <?php } ?>
			  </div>
			</nav><!-- .row -->

			<div class="row d-print-none">
				<div class="col-sm-12 tab-content" id="nav-tabContent">
					<?php if( $bio ) { ?>
					<div class="tab-pane fade show active" id="nav-bio" role="tabpanel" aria-labelledby="nav-bio-tab"><p><?php the_field('biography'); ?></p></div>
					<?php } ?>
					<?php if( $memberships ) { ?>
					<div class="tab-pane fade" id="nav-memberships" role="tabpanel" aria-labelledby="nav-memberships-tab">
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $memberships);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

				  	<?php if( $honors ) { ?>
					<div class="tab-pane fade" id="nav-honors" role="tabpanel" aria-labelledby="nav-honors-tab">
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $honors);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

					<?php if( $community ) { ?>
					<div class="tab-pane fade" id="nav-community" role="tabpanel" aria-labelledby="nav-community-tab">
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $community);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

					<?php if( $publications ) { ?>
					<div class="tab-pane fade" id="nav-publications" role="tabpanel" aria-labelledby="nav-publications-tab">
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $publications);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

					<?php if( $speaking ) { ?>
					<div class="tab-pane fade" id="nav-speaking" role="tabpanel" aria-labelledby="nav-speaking-tab">
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $speaking);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

					<?php if( $classes ) { ?>
					<div class="tab-pane fade" id="nav-classes" role="tabpanel" aria-labelledby="nav-classes-tab">
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $classes);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

					<?php if( $cases ) { ?>
					<div class="tab-pane fade" id="nav-cases" role="tabpanel" aria-labelledby="nav-cases-tab">
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $cases);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

					<?php if( $bar ) { ?>
					<div class="tab-pane fade" id="nav-bar" role="tabpanel" aria-labelledby="nav-bar-tab">
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $bar);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->

			<div class="row d-none d-print-block">
				<div class="col-sm-12">
					<?php if( $bio ) { ?>
					<div class = "mb-5">
						<h5 class = "border-bottom pb-3 mb-3">Biography</h5>
						<p><?php echo $bio; ?></p>
					</div>
					<?php } ?>

					<?php if( $memberships ) { ?>
					<div class = "mb-5">
						<h5 class = "border-bottom pb-3 mb-3">Profesional Memberships</h5>
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $memberships);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

				  	<?php if( $honors ) { ?>
					<div class = "mb-5">
						<h5 class = "border-bottom pb-3 mb-3">Honors & Awards</h5>
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $honors);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

					<?php if( $community ) { ?>
					<div class = "mb-5">
						<h5 class = "border-bottom pb-3 mb-3">Community</h5>
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $community);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

					<?php if( $publications ) { ?>
					<div class = "mb-5">
						<h5 class = "border-bottom pb-3 mb-3">Publications</h5>
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $publications);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

					<?php if( $speaking ) { ?>
					<div class = "mb-5">
						<h5 class = "border-bottom pb-3 mb-3">Speaking Engagements</h5>
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $speaking);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

					<?php if( $classes ) { ?>
					<div class = "mb-5">
						<h5 class = "border-bottom pb-3 mb-3">Classes & Seminars</h5>
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $classes);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

					<?php if( $cases ) { ?>
					<div class = "mb-5">
						<h5 class = "border-bottom pb-3 mb-3">Representative Cases</h5>
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $cases);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>

					<?php if( $bar ) { ?>
					<div class = "mb-5">
						<h5 class = "border-bottom pb-3 mb-3">Bar Admissions</h5>
						<ul class = "mb-3">
							<?php
							$items = explode(PHP_EOL, $bar);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					</div>
					<?php } ?>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->

		</section><!-- .container -->

	</main><!-- #main -->
</div><!-- #singleAttorney -->
<?php get_footer(); ?>