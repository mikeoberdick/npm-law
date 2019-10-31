<?php /* Template Name: Recognition */ ?>

<?php get_header(); ?>

<div id="recognition">
	<main class="site-main" id="main">
		<section class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="h4 mb-3"><?php the_title(); ?></h1><!-- .h3 -->
					<p><?php the_field('blurb'); ?></p>
					<?php if( have_rows('content_sections') ): while ( have_rows('content_sections') ) : the_row(); ?>
						<div class = "mt-3">
							<h2 class="h5 mb-3 gray">
								<?php the_sub_field('title'); ?>
							</h2><!-- .h5 -->
							<p><?php the_sub_field('copy'); ?></p>
						</div><!-- .mt-3 -->
					<?php endwhile; endif; ?>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</section><!-- .container -->
	</main><!-- #main -->
</div><!-- #recognition -->
<?php get_footer(); ?>