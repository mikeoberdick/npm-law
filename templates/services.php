<?php /* Template Name: Services */ ?>

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

<div id="services">
	<main class="site-main" id="main">
	
		<section id = "practiceAreas" class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class = "h4 mb-3 gray">Our practice areas include:</h1>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
			<div id = "serviceLinks" class="row">
			<?php $services = get_pages( array( 'child_of' => 145) );
				$count = count( $services );
				$half = count( $services ) / 2;
				$i = 1; ?>
				<div class="col-md-6">
				<?php foreach( $services as $service ) { ?>
					<div class = "service-link">
						<i class="fa fa-square" aria-hidden="true"></i>
						<a class = "service-<?php echo $i; ?>"href="<?php echo get_page_link( $service->ID ); ?>">
							<?php echo $service->post_title; ?>
						</a>
					</div>	
					<?php if ($i == $half) { echo '</div><div class = "col-md-6">';} ?>	
					<?php  $i++; } ?>	
				</div><!-- .col-md-6 -->
			</div><!-- .row -->
		</section><!-- #practiceAreas -->

	</main><!-- #main -->
</div><!-- #services -->
<?php get_footer(); ?>