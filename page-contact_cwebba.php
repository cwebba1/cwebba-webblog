<?php 
/**
* Template Name: CWebba Contact Page
 * 
 * @package cwebba
 * @since 1.0
 * From: Let’s Build A WordPress Theme From Scratch – Page.php
 * http://www.wpdevsolutions.com/build-a-wordpress-theme-page-template/
 */
get_header(); ?>
<!-- page-contact_cwebba.php 091716 -->

<!-- CONTENT HERE -->
<div class="wide-content" role="main">
<?php get_template_part( 'partials/mastblock' ); ?>

<!--  CONTENT BEGINS HERE -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2 class="page-content-title"><?php the_title(); ?></h2>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?> 
                <?php endwhile; ?>                
                <?php else: ?>
                    <!-- <p>No content has been posted to this page.</p> -->                   
           	<?php endif; ?>
</div><!-- END post-class -->
                             
<?php get_template_part( 'partials/portfolioblock' ); ?>
</div><!-- /end wide-content -->

<?php get_sidebar(); ?>
<div class="clear"></div>

<?php get_footer(); ?>