<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package cwebba
 * @since cwebba 1.0
 */
get_header(); ?>
<!-- /*404.php*/ -->


<div class="wide-content" role="main">
<?php get_template_part( 'partials/mastblock' ); ?>

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'cwebba' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'cwebba' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->

<?php get_template_part( 'partials/portfolioblock' ); ?>
</div><!-- /end wide-content -->

<?php
get_sidebar( 'content' );
get_sidebar();
<div class="clear"></div>
get_footer();
