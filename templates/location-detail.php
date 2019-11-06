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

					<?php
					global $post;
					$post_slug = $post->post_name;

					$slug = substr($post_slug, 0, -3);
					$office = str_replace("-", "_", $slug);

					//vars
						$addy1 = get_field($office . '_address_line_1', 'option');
						$addy2 = get_field($office . '_address_line_2', 'option');
						$phone = get_field($office . '_phone_number', 'option');
						$fax = get_field($office . '_fax_number', 'option'); ?>

					<div id = "map" class="col-md-5">
						<p class = "mb-3"><?php echo 'Neubert, Pepe & Monteith, P.C.<br>' . $addy1 . '<br>' . $addy2 . '<br>Phone <a href ="tel:' . $phone . '">' . $phone . '</a>' . ' | Fax ' . $fax ?></p>
						<?php $map = get_field('map'); ?>
						<a target = "_blank" title = "Click to open a larger map" href="<?php the_field('google_map'); ?>">
						<img src="<?php echo $map['url']; ?>" alt="<?php echo $map['alt']; ?>"></a>
					</div><!-- .#map -->
				
				</div><!-- .row -->
			</div><!-- .container -->
		</section>
	</main><!-- #main -->
</div><!-- #locationDetail -->
<?php get_footer(); ?>