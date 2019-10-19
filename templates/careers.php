<?php /* Template Name: Careers */ ?>

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

<div id="careers">
	<main class="site-main" id="main">
		
		<section class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class = "h3 my-3 gray"><?php the_field('page_title'); ?></h1>
				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
			<div class="row">
				<div class="col-sm-12">
					<?php $contact = get_field('contact_box'); ?>
					<div class="contact-box float-right">
						<h5 class = "gray">Contact</h5>
						<p><a href = "<?php echo 'mailto:' . $contact['email']; ?>"><?php echo $contact['name']; ?></a><br><?php echo $contact['title']; ?></p>
						<p><?php echo $contact['address']; ?></p>
					</div><!-- .contact-box -->
					<?php the_field('page_copy'); ?>
				</div><!-- .col-sm-12 -->
					
				<div class="col-md-6">
					<?php $image = get_field('image'); ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					<p class = "image-caption"><?php the_field('image_caption'); ?></p>
				</div>
			</div><!-- .row -->
		</section><!-- .container-fluid -->
		
		<?php if( have_rows('open_positions') ): ?>
		<section id = "openPositions" class = "container">
			<div class="row">
				<div class="col-sm-12">
					<hr>
					<h3 class = "mb-3">Open Positions</h3>
				<?php while( have_rows('open_positions') ): the_row(); 
					// vars
					$title = get_sub_field('position_title');
					$details = get_sub_field('position_details');
					?>

				<div class="position mb-5">
					<h5 class = "gray mb-3"><?php echo $title; ?></h5>
					<div><?php echo $details; ?></div>
				</div>

				<?php endwhile; ?>

				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</section>
		<?php endif; ?>

		<?php if( have_rows('callouts') ): ?>
		<section id = "callouts" class = "container">
			<div class="row">
				<?php while( have_rows('callouts') ): the_row(); 
					// vars
					$icon = get_sub_field('icon');
					$title = get_sub_field('title');
					$copy = get_sub_field('copy');
					?>

				<div class="callout col-md-6 text-center mb-3">
					<img class = "mb-3" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
					<h6 class = "gray"><?php echo $title; ?></h6>
					<hr>
					<p class = "text-left"><?php echo $copy; ?></p>
				</div>

				<?php endwhile; ?>
			</div><!-- .row -->
		</section>
		<?php endif; ?>
		
	</main><!-- #main -->
</div><!-- #careers -->
<?php get_footer(); ?>