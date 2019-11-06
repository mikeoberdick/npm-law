<?php /* Template Name: Diversity */ ?>

<?php get_header(); ?>

<div id="diversity">
	<main class="site-main" id="main">
		<section class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="h4 mb-3"><?php the_title(); ?></h1><!-- .h3 -->
					<?php if( have_rows('content_sections') ): while ( have_rows('content_sections') ) : the_row(); ?>
						<div class = "mt-3">
							<h2 class="h5 mb-3 gray">
								<?php the_sub_field('title'); ?>
							</h2><!-- .h5 -->
							<?php the_sub_field('copy'); ?>
						</div><!-- .mt-3 -->
					<?php endwhile; endif; ?>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</section><!-- .container -->
	</main><!-- #main -->
</div><!-- #diversity -->
<?php get_footer(); ?>