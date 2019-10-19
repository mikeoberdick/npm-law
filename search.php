<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<div id="search-wrapper" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<?php $hero_image = get_field('hero_image', 'option'); ?>
		<div class="hero-banner container-fluid p-0 d-none d-sm-block" style = "background: url('<?php echo $hero_image['url'] ?>');">
		</div><!-- .container-fluid -->
			<main class="site-main" id="main">
				<div class="container">
					<?php if ( have_posts() ) : ?>
						<div class="title-wrapper">
							<div id = "pageHeader" class = "search-header">
								<header class="entry-header boxed">
									<h1 class="page-title h3">
										<?php printf(
										/* translators: %s: query term */
										esc_html__( 'Search Results for: %s', 'understrap' ),
										'<span>' . get_search_query() . '</span>' ); ?>
									</h1>
								</header><!-- .page-header -->
							</div><!-- #pageHeader -->	
						</div><!-- .title-wrapper -->
					<div class="row">
						<div id = "postStream" class="col-md-8">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'search' ); ?>
					<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'loop-templates/content', 'none' ); ?>
					<?php endif; ?>
						<?php understrap_pagination(); ?>
						</div><!-- .col-md-8-->
					
					<div id = "singleSidebar" class="col-md-4 sidebar">
						<?php get_template_part( 'partials/sidebar', 'follow' ); ?>
						<?php get_template_part( 'partials/sidebar', 'popular-posts' ); ?>
					</div><!-- #singleSidebar -->
				</div><!-- .row -->
				</div><!-- .container -->
			</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #search-wrapper -->

<?php get_footer(); ?>