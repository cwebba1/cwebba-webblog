<?php
/**
 * The Page template
 *
 * @package cwebba
 * @since 1.0
 */
get_header(); ?>
<!-- /* page.php 091716 */ -->
<!-- /* page.php 103016 */ -->

<div class="wide-content" role="main">
<?php get_template_part( 'partials/mastblock' ); ?>


<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<?php the_content(__('Continue Reading','cwebba'));?>

	<?php wp_link_pages('before=<p class="link-pages">Page: ') ?>
	<div class="clear"></div>
	        <?php endwhile; ?>                
                <?php else: ?>
</div><!-- END post-class -->

<?php get_template_part( 'partials/portfolioblock' ); ?>
</div><!-- /end wide-content -->

<?php get_sidebar(); ?>
<div class="clear"></div>

<?php get_footer(); ?>


