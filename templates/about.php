<?php /* Template Name: About NPM */ ?>

<?php get_header(); ?>
<section id="pageHeader">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1><?php the_title(); ?></h1>
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #pageHeader -->

<div id="about">
	<main class="site-main" id="main">
		
		<section class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class = "h4 mb-3 gray">Who We Are</h1>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
			<div class="row">
				<div class="col-sm-12">
					<p><?php the_field('who_we_are'); ?></p>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</section><!-- .container -->

		<?php if (have_rows('founding_principals') ) : ?>
		<section class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2 class = "h4 mt-3 mb-3 gray">Founding Principals</h2>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
			<div id = "principals" class = "d-flex">
				<?php while ( have_rows('founding_principals') ) : the_row(); ?>
				<div class = "principal">
					<?php $image = get_sub_field('image'); ?>
					<img class = "mb-3" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					<h5 class = "pb-3 text-center"><?php the_sub_field('name'); ?></h5>
				</div><!-- .col-md-4 -->
			<?php endwhile; endif; ?>
			</div><!-- #principals -->
		</section><!-- .container -->

		<section id = "serveAndRepresent" class="container">
			<div class="row">
				<div class="col-sm-12">
					<h3 class = "h4 mt-3 mb-3 gray">Who We Serve & Represent</h3>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
			<div class="row">
				<div class="col-sm-12">
					<p class = "mb-4"><?php the_field('serve_&_represent'); ?></p>
					<p class = "mb-4">Our clients include:</p>
						<ul id = "clientsList" class = "mb-3">
						<?php
						$clients = get_field('clients');
						$items = explode(PHP_EOL, $clients);
		                foreach($items as $item) {
		                echo '<li>' . $item . '</li>'; } ?>
						</ul>
					<a href = '/services'><button role = 'button' class = 'btn btn-primary light-blue-button text-uppercase mb-4'>Learn More About Our Services</button></a>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</section><!-- .container -->

		<section id = "recognition" class="container">
			<div class="row">
				<div class="col-sm-12">
					<h4 class = "h4 mt-3 mb-3 gray">Recognition & Community Investment</h3>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
			<div class="row">
				<div class="col-sm-12">
					<p class = "mb-4"><?php the_field('recognition'); ?></p>
					<a href = '/community'><button role = 'button' class = 'btn btn-primary light-blue-button text-uppercase'>Learn More About Our Community Efforts</button></a>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</section><!-- .container -->

	</main><!-- #main -->
</div><!-- #about -->
<?php get_footer(); ?>