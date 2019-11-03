<?php /* Template Name: Service Detail */ ?>

<?php get_header(); ?>
<div id="serviceDetail">
	<main class="site-main" id="main">	
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class = "h4 mb-3"><?php the_title(); ?></h1>
					</div><!-- .col-sm-12 -->
					<div class="col-md-8">
						<h2 class="h5 mb-3 gray">Services</h2>
						<!-- .h5 mb-3 -->
						<ul id = "services" class = "mb-3">
							<?php
							$services = get_field('services');
							$items = explode(PHP_EOL, $services);
			                foreach($items as $item) {
			                echo '<li>' . $item . '</li>'; } ?>
						</ul><!-- #services -->
						<hr>
						<?php
						if( have_rows('service_description') ):
    					while ( have_rows('service_description') ) : the_row(); ?>
    					<h3 class="h5 my-3 gray">About <?php the_sub_field('title'); ?></h3>
						<p><?php the_sub_field('copy'); ?></p>
						<?php endwhile; endif; ?>
					</div><!-- .col-md-8 -->
					
					<div id = "serviceSidebar" class="col-md-4">
						<div class="contact-box mb-3 w-100">
							<h5 class = "gray mb-3">Contact</h5>
							<?php $post_objects = get_field('contact'); ?>
							<?php if( $post_objects ): ?>
    						<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        					<?php setup_postdata($post); ?>
        					<div class = "d-flex mb-3">
        						<?php
									$image = get_field('image');
									$url = $image['url'];
									$size = 'badge';
									$thumb = $image['sizes'][ $size ];
									?>
								<div class = "badge-image mr-3" style = "background: url(<?php echo esc_url($thumb); ?>);">
								</div>
        						
        						<div>
        						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
        							<span><?php the_field('title'); ?></span>
        						</div>
        					</div>
    						<?php endforeach; ?>
    						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							<?php endif; ?>
							<hr>
							<h5 class = "gray mb-3">Attorneys</h5>
							<?php $post_objects = get_field('attorneys'); ?>
							<?php if( $post_objects ): ?>
    						<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        					<?php setup_postdata($post); ?>
        					<p class = "mb-2">
        						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        					</p>
    						<?php endforeach; ?>
    						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							<?php endif; ?>
					</div><!-- .col-md-4 -->
				
				</div><!-- .row -->
			</div><!-- .container -->
		</section>
	</main><!-- #main -->
</div><!-- #serviceDetail -->
<?php get_footer(); ?>