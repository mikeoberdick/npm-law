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
		
		<?php $hero = get_field('hero'); ?>
		<section class="hero container-fluid position-relative" style = "background: url('<?php echo $hero['image']['url']; ?>');">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class = "text-white"><?php echo $hero['header']; ?></h1>
					</div><!-- .col-sm-12 -->
				</div><!-- .row -->	
			</div>
		</section><!-- .container-fluid -->

		<?php
			//Setup the query args
			$args = [
			    'post_type'      => 'team member',
			    'post_status'    => 'publish',
			    'order' => 'ASC',
			    'orderby' => 'menu_order',
			    'posts_per_page' => -1
			];
			
			$qry = new WP_Query($args);
		?>

		<section id="team" class = "mb-5">
			<div class="container d-flex flex-wrap">
				<?php $i = 0; ?>
				<?php while ($qry->have_posts()) : $qry->the_post(); ?>
					<div class = "team-member-wrapper text-center mb-5">
						<a href="#" data-toggle="modal" data-target="#<?php echo 'team-modal-' . $i; ?>">
							<div class="team-member">
								<?php $img = get_field('image'); ?>
								<img class = "rounded-circle mb-3" src="<?php echo $img['url']; ?>" alt="echo $img['alt']">
								<div class = "team-member-info text-center">
									<h2 class = "h5"><?php echo the_title(); ?></h2>
									<p class = "mb-0"><?php the_field('title'); ?></p>	
								</div><!-- .team-member-info -->
							</div><!-- .team-member -->
						</a>

						<div class="modal fade" id="<?php echo 'team-modal-' . $i; ?>" tabindex="-1" role="dialog" aria-labelledby="Team Member Bio">
						  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-body">
						      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						      	<div class="container py-5">
						      		<div class="row align-items-center">
						      			<div class="col-lg-5">
						      				<img class = "rounded-circle mb-3" src="<?php echo $img['url']; ?>" alt="echo $img['alt']">
						      			</div><!-- .col-lg-5 -->
						      			<div class="col-lg-7">
						      				<h3 class = "mb-0"><?php echo the_title(); ?></h3>
						      				<span class = "modal-title d-block mb-3"><?php the_field('title'); ?></span>
						      				<p class = "mb-0 text-left"><?php the_field('bio'); ?></p>
						      			</div><!-- .col-lg-7 -->
						      		</div><!-- .row -->
						      	</div><!-- .container -->
						      </div>
						    </div>
						  </div>
						</div><!-- .modal -->
						
					</div><!-- .team-member-wrapper -->
					<?php $i++; ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
			</div><!-- .container -->
		</section><!-- #callouts -->

		<?php $values = get_field('our_values'); ?>
		<section id = "valuesHero" class="hero container-fluid position-relative py-5 mb-5" style = "background: url('<?php echo $values['image']['url']; ?>');">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h3 id = "valuesHeader" class = "h1 text-white mb-5"><?php echo $values['header']; ?></h3>
						<div class="container d-flex flex-column">
							<?php
								//while( have_rows('design_section') ): the_row(); 
				    				$values_text = $values['values'];;
				    				$items = explode(PHP_EOL, $values_text);
				                    foreach($items as $item) {
				                        echo '<h5 class = "value text-white">' . $item . '</h5>';
				                    }
		                    ?>
						</div><!-- .container -->
					</div><!-- .col-sm-12 -->
				</div><!-- .row -->	
			</div><!-- .container -->
		</section><!-- #valuesHero -->

		<section id="community" class = "mb-5">
			<div class="container">
				<div class="row pb-3">
					<div class="col-sm-12 text-center">
						<?php $community = get_field('community_involvement'); ?>
						<h3 class = "mb-3"><?php echo $community['header']; ?></h3>
						<p><?php echo $community['text']; ?></p>
					</div><!-- .col-sm-12 -->
				</div><!-- .row -->

				<div class="row">
					<?php while ( have_rows('community_involvement') ) : the_row(); 
	    					while ( have_rows('organizations') ) : the_row();       
						//vars
						$logo = get_sub_field('logo');
						$name = get_sub_field('name');
						$link = get_sub_field('link');
						?>

	    				<div class="col-sm-6 col-lg-3 mb-5">
							<a target = "_blank" href="<?php echo $link; ?>">
								<div class = "community-card p-3 text-center">
									<img class ="mb-3" src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
									<h5><?php echo $name ?></h5>	
								</div><!-- .community-card -->
							</a>
						</div><!-- .col-sm-6 col-md-4 col-lg-3 -->
	    				<?php endwhile; endwhile; ?>
				</div><!-- .row -->
			</div>
		</section><!-- #community -->
	</main><!-- #main -->
</div><!-- #community -->
<?php get_footer(); ?>