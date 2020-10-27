<?php
/**
* tag.php Template
 *
 * @package cwebba
 * @since 1.0
 * 
 * https://codex.wordpress.org/Tag_Templates
*/
get_header(); ?>
	<!-- tag.php 091716 -->

<!-- CONTENT HERE -->
<div class="wide-content" role="main">
<?php get_template_part( 'partials/mastblock' ); ?>

<!--  CONTENT BEGINS HERE -->
<?php if ( $paged < 2 ) { 
<h3>Tag: <?php single_tag_title(); ?></h3>
<?php } else { 
<p>More <?php single_tag_title(); ?></p>
<?php } ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>

<?php
// Display optional category description
 if ( tag_description() ) : ?>
<div class="archive-meta"><?php echo tag_description(); ?></div>
<?php endif; ?>
</header>

<?php

// The Loop
while ( have_posts() ) : the_post(); ?>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

 <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
<div class="entry">
<?php the_content(); ?>
	<div class="clear"></div>

</div>

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
