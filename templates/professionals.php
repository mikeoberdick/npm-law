<?php /* Template Name: Professionals */ ?>

<?php get_header(); ?>

<div id="professionals">
	<main class="site-main" id="main">
	
		<section class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="h4 mb-3">
						<?php if ( is_page('attorneys') ) { echo 'Attorneys'; } else { echo 'Paralegals'; } ?>
					</h1>
					<div id = "quickLinks"></div>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->

			<div class="row">
				<div class = "professionals-left col">
					<?php if ( is_page('attorneys') ) {
					//Setup the query args for wp query
						$args = [
						    'post_type'      => 'attorney',
						    'post_status'    => 'publish',
						    'posts_per_page' => -1,
						];
						} else {
							$args = [
						    'post_type'      => 'paralegal',
						    'post_status'    => 'publish',
						    'posts_per_page' => -1
						];
					} ?>
					<?php add_filter( 'posts_orderby' , 'posts_orderby_lastname' ); ?>
<?php $qry = new WP_Query($args); $totalPosts = $qry->found_posts; $count = 0; ?>

					<?php if ($qry->have_posts()) : while ($qry->have_posts()) : $qry->the_post(); ?>

					<div class="pb-3 mb-3 border-bottom professional">
						<?php
							$image = get_field('image');
							$url = $image['url'];
							$size = 'badge';
							$thumb = $image['sizes'][ $size ];
							?>
						<div class = "badge-image mr-3" style = "background: url(<?php echo esc_url($thumb); ?>);">
						</div>
						
						<div>
							<a id = "professional-<?php echo $count ?>" class = "name" href = "<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
							<?php $location = get_field('location'); ?>
							<p><?php echo get_field('title') . ', <span class = "location">' . $location['label'] . '</span>'; ?></p>
						</div>
						
						<div class="links">
							<a href="mailto:<?php the_field('email'); ?>"><i class="mr-2 fa fa-envelope-o" aria-hidden="true"></i></a>
							
							<?php $vcard = get_field('vcard'); ?>
							<?php if ($vcard) { ?>
							<a href="<?php echo $vcard['url']; ?>"><i class="mr-2 fa fa-address-card-o" aria-hidden="true"></i></a>
							<?php } ?>

							<?php 
							//links
							$linkedin = get_field('linked_in');
							$twitter = get_field('twitter');
							$instagram = get_field('instagram');
							?>
							
							<?php if ($linkedin) { ?>
								<a target = "_blank" href="<?php echo $linkedin; ?>"><i class="mr-2 fa fa-linkedin-square" aria-hidden="true"></i></a>
							<?php } ?>
							
							<?php if ($twitter) { ?>
								<a target = "_blank" href="<?php echo $twitter; ?>"><i class="mr-2 fa fa-twitter-square" aria-hidden="true"></i></a>
							<?php } ?>
							
							<?php if ($instagram) { ?>
								<a target = "_blank" href="<?php echo $instagram; ?>"><i class="mr-2 fa fa-instagram" aria-hidden="true"></i></a>
							<?php } ?>
						</div><!-- .links -->
					</div><!-- .professional -->
					<?php if ( is_page('attorneys') && $count == (int) ( $totalPosts / 2 ) ) {
						echo '</div><div class = "professionals-right col">';
					} ?>
					<?php $count++; ?>
				<?php endwhile; endif; ?>
				<?php remove_filter( 'posts_orderby' , 'posts_orderby_lastname' ); ?>
				</div><!-- *column end* -->	
			</div>
		</section><!-- .container -->

	</main><!-- #main -->
</div><!-- #paralegals -->
<?php get_footer(); ?>