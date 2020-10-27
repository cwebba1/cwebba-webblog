<?php
/**
 * Template Name: Single Template
 *
 * @package cwebba
 * @since 1.0
*/
get_header()?>
<!-- /* single.php 103016 */ -->

<div class="wide-content" role="main">
<?php get_template_part( 'partials/mastblock' ); ?>

<!--  CONTENT BEGINS HERE -->
<?php 
if ( have_posts() ) : ?>

<?php
// The Loop
while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('single-thumbnail'); ?>>
		

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<p class="post-info"><?php the_time('F j, Y g:i a'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in
			<?php
			$categories = get_the_category();
			$separator = ", ";
			$output = '';
			if ($categories) {
				foreach ($categories as $category) {
					$output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $separator;
				}
				echo trim($output, $separator);
			}
			?>
			</p>

		<!-- post-thumbnail -->
		<div class="banner-post-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</div><!-- /post-thumbnail -->

<?php the_content(); ?>



	<?php wp_link_pages('before=<p class="link-pages">Page: ') ?>
	<br />

<div class="tagbox">
<!-- <h6>Tagged:&nbsp; </h6> --><?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
</div>
	<div class="clear"></div>

	<div><?php comments_template('', true); ?></div>
	<?php endwhile;
		endif; ?>
	</article>


<?php get_template_part( 'partials/portfolioblock' ); ?>
</div><!-- /end wide-content -->

<?php get_sidebar(); ?>
<div class="clear"></div>

<?php get_footer(); ?>
