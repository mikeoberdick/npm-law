<?php /* Template Name: Location Detail */ ?>

<?php get_header(); ?>
<div id="locationDetail">
	<main class="site-main" id="main">	
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class = "h4 mb-3">Neubert, Pepe & Monteith, P.C., <?php the_title(); ?></h1>
					</div><!-- .col-sm-12 -->
					<div class="col-md-7">
						<p><?php the_field('welcome'); ?></p>
						<?php
						if( have_rows('information') ):
    					while ( have_rows('information') ) : the_row(); ?>
    					<h3 class="h5 my-3 gray"><?php the_sub_field('title'); ?></h3>
						<p><?php the_sub_field('copy'); ?></p>
						<?php endwhile; endif; ?>
					</div><!-- .col-md-7 -->
					
					<div id = "map" class="col-md-5">
						<?php $map = get_field('map'); ?>
						<img src="<?php echo $map['url']; ?>" alt="<?php echo $map['alt']; ?>">
					</div><!-- .#map -->
				
				</div><!-- .row -->
			</div><!-- .container -->
		</section>
	</main><!-- #main -->
</div><!-- #locationDetail -->
<?php get_footer(); ?>