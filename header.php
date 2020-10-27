<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php wp_title( '|', true, 'right' ); ?></title>

<!-- This: header.php 091416
From: header.php 091116
From: header.php 090416
From: header.php 080116
From: header.php 073116
From: webblog 01 052614
From: links.htm 031814 
-->

<meta name="description" content="Craig Webb Art cultural, technical and artistic comentary" />
<meta name="keywords" content="Communications Design">
<meta name="subject" content="Communications design and social interaction">
<meta name="robots" content="index,follow,noydir,noodp,">
<meta name="robots" content="noimageindex">
<meta name="google" content="nositelinkssearchbox">
<meta name="google-site-verification" content="verification_token">
<meta name="author" content="Craig Webb Art" />

<!--<link rel="image_src" href="http://craigwebbart.com/img/cwebba_fb_400.jpg" />-->
<meta property="og:title" content="Craig Webb Art / Content Design & Development" />
<meta property="og:url" content="http://craigwebbart.com" />
<!--<meta property="og:image" content="http://craigwebbart.com/img/cwebba_fb_400.jpg" />-->
<meta property="og:description" content="Craig Webb Art is an independent New York based design firm. We work with leading brands to create outstanding interactive experiences." />
<meta property="og:type" content="website" />



<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() );?>/style.css">


<?php wp_head()?>
<style>
html { margin-top: 0px!important;}
.menu-item:last-of-type { margin-right:1em;}
#wpadminbar { display:none;}

</style>
</head>
<body <?php body_class(); ?>>
<div class="basal">
<a name="top"></a>
<div id="modal_fader">&nbsp;</div>
<div class="container2">
<header class="rice">
<figure class="logo">
<a href="http://www.craigwebbart.com"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/cwebba_logo4_288x72.png" />
</a>
</figure>

<section class="rightrail">
<figure id="cswnavpic">
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="917&middot;797&middot;0983" />

</figure>
</section>


<?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'topnav', 'menu_class' => 'top', 'theme_location' => 'page-menu' ) ); ?>
</header>
	<div id="delimiter"></div>


<!--<h1><a href="<?php echo home_url('/')?>"><?php bloginfo('name')?></a></h1>-->

</div><!-- END contain2 -->
<!-- *     *     *     *     *     *     * -->
