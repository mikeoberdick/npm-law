<?php /* Template Name: News */ ?>

<?php get_header(); ?>

<div id="news">
	<main class="site-main" id="main">
	
		<section class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="h4 mb-3">
						In The News
					</h1>
					<div id = "yearSelector">YEARS HERE</div>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</section>

		<section id = "newsContent" class = "container">
			<div class="row">
				<div class = "col">
					<?php //Setup the query args for wp query
						$args = [
						    'post_type'      => 'news',
						    'post_status'    => 'publish',
						    'posts_per_page' => -1,
						];
					?>
					<?php $qry = new WP_Query($args); ?>

					<?php if ($qry->have_posts()) : while ($qry->have_posts()) : $qry->the_post(); ?>

						<div class="row post border-bottom pb-3 mb-3">
							<div class="col date-wrapper">
								<div class = "date-box">
									<span class="date dark-blue">
										<?php
										$month = get_the_date('M');
										$day = get_the_date('j');
										echo $month . '. ' . $day; ?>
									</span>
								</div>
							</div><!-- .col -->
							<div class="col d-flex flex-column title-wrapper">
								<h2 class="h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p>excerpt</p>
							</div><!-- .col -->
						</div><!-- .post -->

				<?php endwhile; endif; ?>
				</div><!-- .col -->	
			</div><!-- .row -->
		</section><!-- .container -->

	</main><!-- #main -->
</div><!-- #news -->
<?php get_footer(); ?>