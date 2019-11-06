<?php get_header(); ?>

<div id="singleNews">
	<main class="site-main" id="main">
		<?php while ( have_posts() ) : the_post(); ?>
		<section class="container">
			<div class="row mb-3">
				<div class="col-sm-12">
					<h1 class = "h4"><?php the_title(); ?></h1>
					<h2 class="gray h6"><?php the_field('by-line') ?></h2>
					<span class = "gray mb-3 d-block"><?php the_date(); ?></span>
					<?php the_content(); ?>
					<hr>
					<?php
					$authors = get_field('author');
					$count = count($authors);

					if($count == 2 || $count == 3) {echo '<div class = "row">';}
					
						if( $authors ) {
					
						foreach( $authors as $post):
        					setup_postdata($post);
        			
		        			//vars
		        			$name = get_field('name');
		        			$pic = get_field('image');
		        			$url = $pic['url'];
		        			$alt = $pic['alt'];
		        			$size = 'medium';
		    				$thumb = $pic['sizes'][ $size ];
		        			$linked = get_field('linked_in');
		        			$twitter = get_field('twitter');
		        			$instagram = get_field('instagram');
		        			$vcard = get_field('vcard');
		        			$bio = get_field('short_bio');
		        			?>

		        		
		        			<div class="author <?php if ($count == 1) {echo 'd-flex single-author';} elseif ($count == 2) {echo 'two-authors d-flex col-md-6';} else {echo 'three-authors col-md-4';} ?>">

			        			<div class = "author-details d-flex flex-column <?php if ($count == 3) {echo 'float-left';} ?> ">
			        				<img class = "mb-2" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
			            			<h6 class = "gray"><?php echo $name; ?></h6>
			            			<div class="links">
				            			<?php if ($linked) { ?>
											<a target = "_blank" href="<?php echo $linkedin; ?>"><i class="mr-2 fa fa-linkedin-square" aria-hidden="true"></i></a>
										<?php } ?>
										<?php if ($twitter) { ?>
											<a target = "_blank" href="<?php echo $twitter; ?>"><i class="mr-2 fa fa-twitter-square" aria-hidden="true"></i></a>
										<?php } ?>
										<?php if ($instagram) { ?>
											<a target = "_blank" href="<?php echo $instagram; ?>"><i class="mr-2 fa fa-instagram" aria-hidden="true"></i></a>
										<?php } ?>
										<?php if ($vcard) { ?>
											<a href="<?php echo $vcard['url']; ?>"><i class="mr-2 fa fa-address-card-o" aria-hidden="true"></i></a>
										<?php } ?>	
			            			</div><!-- .links -->
			            		</div>
			            		<div class="short-bio <?php if($count == 1) {echo 'ml-3';} ?>">
			            			<p><?php echo $bio; ?></p>
			            		</div><!-- .short-bio -->
		        			</div><!-- .author -->
        				<?php endforeach; ?>
        				<?php if($count == 2 || $count == 3) {echo '</div>';} ?>
    				<?php wp_reset_postdata(); ?>
					<?php } 

					else { ?>
					<div class = "boilerplate">
						<p><?php the_field('company_boilerplate', 'option') ?></p>
					</div>
					<?php } ?>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</section><!-- .container -->
	<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #singleNews -->
<?php get_footer(); ?>