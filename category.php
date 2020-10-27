<?php
/**
* category.php Template
 *
 * @package cwebba
 * @since 1.0
 * From: A Simple Category Template
 * http://www.wpbeginner.com/wp-themes/how-to-create-category-templates-in-wordpress/
*/
get_header(); ?>
	<!-- category.php 103016 -->

<div class="wide-content" role="main">
<?php get_template_part( 'partials/mastblock' ); ?>

<!--  CONTENT BEGINS HERE -->
<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>

<header class="archive-header">
<h1 class="archive-title"><?php single_cat_title( '', true ); ?></h1>


<?php
// Display optional category description
 if ( category_description() ) : ?>
<div class="archive-meta"><?php echo category_description(); ?></div>
<?php endif; ?>
</header>

<?php

// The Loop
while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?> <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
		
		<!-- post-thumbnail -->
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium-thumbnail'); ?></a>
		</div><!-- /post-thumbnail -->

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
<div class="entry">
<?php the_content(); ?>
	<div class="clear"></div>

<!--
<p class="postmetadata"><?php
  comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed');
?></p>
-->
</div>
	</article>

<?php endwhile; 

else: ?>
<p>Sorry, no posts matched your criteria.</p>

<br />
<?php cwebba_numeric_posts_nav(); ?>

<?php endif; ?>
</div><!-- END post-class -->

<?php get_template_part( 'partials/portfolioblock' ); ?>
</div><!-- /end wide-content -->


<?php get_sidebar(); ?>
	<div class="clear"></div>
<?php get_footer(); ?>
