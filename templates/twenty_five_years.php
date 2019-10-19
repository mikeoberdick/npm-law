<?php /* Template Name: 25 Years */ ?>

<?php get_header(); ?>

<div id="twentyFiveYears" class = "my-5">
	<main class="site-main" id="main">
		<section class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class = "h3 mb-3"><?php the_field('page_title'); ?></h1>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
			<div class="row">
				<div class="col-md-6">
					<?php the_field('copy'); ?>
				</div>
				<div class="col-md-6">
					<?php $image = get_field('image'); ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					<p class = "image-caption"><?php the_field('image_caption'); ?></p>
				</div>
			</div><!-- .row -->
		</section><!-- .container-fluid -->
	</main><!-- #main -->
</div><!-- #twentyFiveYears -->
<?php get_footer(); ?>