<?php
/**
 * The main index template for displaying the cwebba theme
 *
 * @package cwebba
 * @since 1.0
 */
get_header(); ?>
<!-- /* index.php 103016 */ -->
<!-- /* index.php 100916 */ -->
<!-- /* index.php 100216 */ -->
<!-- /* index.php 091716 */ -->

<div class="wide-content" role="main">
<?php get_template_part( 'partials/mastblock' ); ?>


<?php if (have_posts()) :
	while (have_posts()) : the_post(); ?>
	
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
		
		
		
		<?php if ($post->post_excerpt) { ?>
			
			<p>
			<?php echo get_the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>">Read more&raquo;</a>
			</p>
			
		<?php } else {
			
			the_content();
			
		} ?>
		
		
	</article>
	
	<?php endwhile;
	
	else :
		echo '<p>No content found</p>';
	
	endif; ?>
	<?php get_template_part( 'partials/portfolioblock' ); ?>
</div><!-- /end wide-content -->

<?php get_sidebar(); ?>
<div class="clear"></div>

<?php get_footer(); ?>
