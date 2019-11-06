<?php /* Template Name: News */ ?>

<?php get_header(); ?>

<div id="news">
	<main class="site-main" id="main">
	
		<section class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="h4 mb-3">
						Articles & Advisories
					</h1>
					<?php
					$args = array(
    					'post_type' => array('news'),
    					'posts_per_page' => -1,
    				);

    				$years = array();
					$qry_yrs = new WP_Query( $args );

					if ( $qry_yrs->have_posts() ) : while ( $qry_yrs->have_posts() ) : $qry_yrs->the_post();
					$year = get_the_date('Y');
        			
        			if( !in_array( $year, $years ) ) {
            			$years[] = $year;
        			}
    				endwhile; wp_reset_postdata(); endif; ?>
					
					<div id = "ajaxFilter" class = "mb-5">
						<ul class = "list-unstyled d-flex justify-content-between">
							<?php 
							$i = 0;
							foreach ( $years as $year ) : ?>
								<?php if($i==6) break; ?>
								<li class = "year-choice <?php if ($i == 0) {echo 'active-year';} ?>" data-year = "<?php echo $year; ?>"><?php echo $year; ?></li>
	        				<?php $i++; endforeach; ?>
						</ul>
					</div><!-- #ajaxFilter -->
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</section>

		<section class = "container">
			<div id = "postContainer" class="row">
				<div class = "col-sm-12">
					<?php //Setup the query args for wp query
					$getdate = getdate();
						$args = [
						    'post_type'      => 'news',
						    'post_status'    => 'publish',
						    'posts_per_page' => -1,
						        'date_query' => array(
							        array(
							            'year'  => $getdate["year"]
							        ),
							    ),
						];
					?>
					<?php $qry = new WP_Query($args); ?>

					<?php if ($qry->have_posts()) : while ($qry->have_posts()) : $qry->the_post(); ?>

						<div class="post row border-bottom pb-3 mb-3">
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
								<p class = "mb-0"><?php the_excerpt(); ?></p>
							</div><!-- .col -->
						</div><!-- .post -->

				<?php endwhile; endif; ?>
				</div><!-- .col-sm-12 -->	
			</div><!-- .row -->
		</section><!-- .container -->

	</main><!-- #main -->
</div><!-- #news -->
<?php get_footer(); ?>