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
		<main class="site-main" id="main">
			<div class="container">
				<?php if ( have_posts() ) : ?>
					<div class="title-wrapper">
						<div class = "search-header">
							<h1 class="page-title h4 mb-3">
								<?php printf(
								/* translators: %s: query term */
								esc_html__( 'Search Results for: %s', 'understrap' ),
									'<span>' . get_search_query() . '</span>' );?>
							</h1>
						</div><!-- #pageHeader -->	
					</div><!-- .title-wrapper -->
				<div class="row">
					<div class="col-sm-12">
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
					</div><!-- .col-sm-12-->
				</div><!-- .row -->
				</div><!-- .container -->
			</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #search-wrapper -->

<?php get_footer(); ?>