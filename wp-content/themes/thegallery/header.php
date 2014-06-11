<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8" />
	<title><?php bloginfo('name'); ?>  <?php wp_title(); ?></title>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	
	<?php global $gdl_is_responsive ?>
	<?php if( $gdl_is_responsive ){ ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/skeleton-responsive.css">
		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/layout-responsive.css">	
	<?php }else{ ?>
		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/skeleton.css">
		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/layout.css">	
	<?php } ?>
	
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/ie-style.php?path=<?php echo GOODLAYERS_PATH; ?>" type="text/css" media="screen, projection" /> 
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/ie7-style.css" /> 
	<![endif]-->	
	
	<!-- Favicon
   ================================================== -->
	<?php 
		if(get_option( THEME_SHORT_NAME.'_enable_favicon','disable') == "enable"){
			$gdl_favicon = get_option(THEME_SHORT_NAME.'_favicon_image');
			if( $gdl_favicon ){
				$gdl_favicon = wp_get_attachment_image_src($gdl_favicon, 'full');
				echo '<link rel="shortcut icon" href="' . $gdl_favicon[0] . '" type="image/x-icon" />';
			}
		} 
	?>

	<!-- Start WP_HEAD
   ================================================== -->
		
	<?php wp_head(); ?>
	
	<!-- FB Thumbnail
   ================================================== -->
	<?php
	if( is_single() ){
		$thumbnail_id = get_post_meta($post->ID,'post-option-inside-thumbnial-image', true);
		$thumbnail = wp_get_attachment_image_src( $thumbnail_id , '150x150' );
		echo '<link rel="image_src" href="' . $thumbnail[0] . '" />';
	}
	?>	
</head>
<body>
<div class="body-wrapper">
	<div class="top-navigation-wrapper">
		<div class="top-navigation">
			<div class="top-navigation-left">
				<div class="logo-wrapper">
					<?php
						echo '<a href="' . home_url( '/' ) . '">';
						$logo_attachment = wp_get_attachment_image_src(get_option(THEME_SHORT_NAME.'_logo'), 'full');
						if( !empty($logo_attachment) ){
							$logo_attachment = $logo_attachment[0];
						}else{
							$logo_attachment = GOODLAYERS_PATH . '/images/default-logo.png';
						}
						echo '<img src="' . $logo_attachment . '" alt="logo"/>';
						echo '</a>';
					?>
				</div>
			</div>
			<div class="top-navigation-right">
				<!-- Get Navigation -->
				<div class="navigation-wrapper">
				<?php wp_nav_menu( array('container' => 'div', 'container_class' => 'menu-wrapper', 'container_id' => 'main-superfish-wrapper', 'menu_class'=> 'sf-menu',  'theme_location' => 'main_menu' ) ); ?>			
				</div>
				<div class="clear"></div>		
			</div>
			<div class="clear"></div>
		</div>
		<div class="top-navigation-wrapper-gimmick"></div>
	</div>
	<div class="gdl-container-overlay"></div>
		