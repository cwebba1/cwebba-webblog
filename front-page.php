<?php 
/**
* Template Name: front-page
 *
 * @package cwebba
 * @since 1.0
*/
get_header(); ?>
<!-- /* front-page.php 091716 */ -->

<!-- CONTENT HERE -->
<!--  CONTENT BEGINS HERE -->
<div class="wide-content" role="main">
<?php get_template_part( 'partials/mastblock' ); ?>

	<?php if (is_front_page()): ?><?php endif; ?>

	<?php query_posts('category_name=land-here&showposts=1'); ?>

<?php while (have_posts()) : the_post(); ?>
	<h1><?php the_title() ;?></h1>		


	<?php the_content(); ?>

<?php endwhile; ?>
<br>
	<div class="clear"></div>


	<hr class="thin-lt-rule" />
	<br>

<?php rewind_posts(); ?>
	<?php query_posts('category_name=frontfoot&showposts=1'); ?>
<?php while (have_posts()) : the_post(); ?>
	<h1><?php the_title() ;?></h1>		

	<?php the_content(); ?>
<?php endwhile; ?>

<?php get_template_part( 'partials/portfolioblock' ); ?>
</div><!-- /end wide-content -->

<?php get_sidebar(); ?>
<div class="clear"></div>

<?php get_footer(); ?>



