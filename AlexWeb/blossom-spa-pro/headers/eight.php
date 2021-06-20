<?php
/**
 * Header Eight
 *
 * @package Blossom_Spa_Pro
 */
?>

<header id="masthead" class="site-header header-eight" itemscope itemtype="http://schema.org/WPHeader">
	<div class="header-t">
		<div class="container">
			<?php if( blossom_spa_pro_social_links( false ) ) blossom_spa_pro_social_links();
			if( get_theme_mod( 'ed_header_search', true ) ) get_search_form(); ?>
		</div>
	</div>
	<div class="container">
		<div class="header-main">
			<?php blossom_spa_pro_site_branding(); ?>
			<?php blossom_spa_pro_header_contact(); ?>
		</div> <!-- .header-main -->
		<div class="nav-wrap">
			<?php blossom_spa_pro_primary_nagivation(); ?>
			<?php if( blossom_spa_pro_header_search( false ) ) : ?>
				<div class="nav-right">
					<?php blossom_spa_pro_header_search(); ?>
				</div><!-- .nav-right -->
			<?php endif; ?>
		</div><!-- .nav-wrap -->
	</div>
	<?php blossom_spa_pro_sticky_header(); ?>
</header>