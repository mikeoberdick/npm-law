<?php /* Template Name: Recognition */ ?>

<?php get_header(); ?>

<div id="recognition">
	<main class="site-main" id="main">
		<section class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="h4 mb-3"><?php the_title(); ?></h1><!-- .h3 -->
					<p class = "mb-3"><?php the_field('blurb'); ?></p>
					<h2 class = "h5 mb-3 gray">Recognition for Neubert, Pepe & Monteith, P.C.</h2>
					<p class = "mb-3"><?php the_field('firm_recognition'); ?></p>
					<h3 class = "h5 mb-3 gray">Attorney Recognition</h3>
					<?php
					while ( have_rows('attorney_recognition') ) : the_row(); ?>
						<h4 class = "h6 mb-3 dark-blue"><?php the_sub_field('recognition_source'); ?></h4>
						<ul class = "award-recipients">
						<?php while ( have_rows('recipients') ): the_row(); ?>
							<?php $info = get_sub_field('additional_info'); ?>
						<li>
							<?php $post_object = get_sub_field('recipient');
    						$post = $post_object;
							setup_postdata( $post ); ?>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?><?php if($info) { echo ','; } ?></a>
    						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?><span><?php the_sub_field('additional_info'); ?></span>
    					</li>
						<?php endwhile; ?>
						</ul>	        
					<?php endwhile; ?>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</section><!-- .container -->
	</main><!-- #main -->
</div><!-- #recognition -->
<?php get_footer(); ?>