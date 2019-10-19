<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

<div id="homepage">
	<main class="site-main" id="main">
		<section>
			<?php $img = get_field('hero_image'); ?>
			<img class = "w-100" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
		</section>

		<section id="homepageCopy" class = "mt-3">
			<div class="container">
				<div class="row">
					<div class = "col-sm-12">
						<h1 class = "mb-3 h3"><?php the_field('header'); ?></h1>
						<p><?php the_field('copy'); ?></p>
					</div><!-- .col-md-3 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</section><!-- #homepageCopy -->
	</main><!-- #main -->
</div><!-- #homepage -->

<?php get_footer(); ?>