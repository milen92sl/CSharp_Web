<?php
/**
 * Header Four
 *
 * @package Blossom_Spa_Pro
 */
?>

<header id="masthead" class="site-header header-four" itemscope itemtype="http://schema.org/WPHeader">
	<?php if( blossom_spa_pro_header_contact( false ) || blossom_spa_pro_social_links( false ) ) : ?>
		<div class="header-t">
			<div class="container">
				<?php blossom_spa_pro_header_contact( true, false ); ?>
				<?php blossom_spa_pro_social_links(); ?>
			</div>
		</div>
	<?php endif; ?>
    <div class="header-main">
		<div class="container">
			<?php blossom_spa_pro_site_branding(); ?>
			<div class="nav-wrap">
				<?php blossom_spa_pro_primary_nagivation(); ?>
				<?php if( blossom_spa_pro_header_search( false ) ) : ?>
					<div class="nav-right">
						<?php blossom_spa_pro_header_search(); ?>
					</div><!-- .nav-right -->	
				<?php endif; ?>
			</div><!-- .nav-wrap -->
		</div>
	</div>
	<?php blossom_spa_pro_sticky_header(); ?>
</header>