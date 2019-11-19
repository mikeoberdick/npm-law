<?php /* Template Name: Community */ ?>

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

<div id="community">
	<main class="site-main" id="main">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php the_field('page_copy'); ?>
				</div><!-- .col-sm-12 -->
				<?php $images = get_field('organizations'); ?>
				<?php if( $images ): ?>
        			<?php foreach( $images as $image ): ?>
            			<div class="col-md-3 text-center mb-2">
            				<a target = "_blank" href="<?php echo $image['description']; ?>">
            				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></a>
            			</div><!-- .col-md-3 -->
        			<?php endforeach; ?>
					<?php endif; ?>
			</div><!-- .row -->
		</div><!-- .container -->		
	</main><!-- #main -->
</div><!-- #community -->
<?php get_footer(); ?>