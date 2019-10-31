<?php /* Template Name: Memoriam */ ?>

<?php get_header(); ?>

<div id="memoriam">
	<main class="site-main" id="main">
		<section class="container">
			<div class="row">
				<div class="col-sm-12">
				<h1 class="h4 mb-3"><?php the_title(); ?></h1><!-- .h3 -->
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
			<div id = "memorials" class="row">
				<?php
				if( have_rows('memoriam') ): while ( have_rows('memoriam') ) : the_row(); ?>
					<div class="memorial col-sm-12">
						<h2 class="h5 mb-3">
							<?php the_sub_field('name'); ?>, <?php the_sub_field('dates'); ?>
						</h2><!-- .h5 -->
						<div class = "bio">
							<?php
							$image = get_sub_field('image');
							$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
							if( $image ) {
							    echo wp_get_attachment_image( $image, $size, "", array( "class" => "float-left mr-2 mb-2" ) );
							} ?>
							<p><?php the_sub_field('blurb'); ?></p>
						</div><!-- .bio -->
					</div><!-- .col-sm-12 -->
				<?php endwhile; endif; ?>
			</div><!-- .row -->
		</section><!-- .container-fluid -->
	</main><!-- #main -->
</div><!-- #memoriam -->
<?php get_footer(); ?>