<?php
/**
 * Header Six
 *
 * @package Blossom_Spa_Pro
 */
?>

<header id="masthead" class="site-header header-six" itemscope itemtype="http://schema.org/WPHeader">
	<?php if( blossom_spa_pro_header_contact( false ) || blossom_spa_pro_social_links( false ) || blossom_spa_pro_header_search( false ) ) : ?>
		<div class="header-t">
			<div class="container">
				<?php blossom_spa_pro_header_contact( true, false ); ?>
				<?php if( blossom_spa_pro_social_links( false ) || blossom_spa_pro_header_search( false ) ) : ?>
					<div class="nav-right">
						<?php blossom_spa_pro_social_links(); ?>
						<?php blossom_spa_pro_header_search(); ?>
					</div><!-- .nav-right -->
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="header-main">
		<div class="container">
			<?php blossom_spa_pro_site_branding(); ?>
			<div class="nav-wrap">
				<?php blossom_spa_pro_primary_nagivation(); ?>
			</div><!-- .nav-wrap -->
		</div>
	</div> <!-- .header-main -->
	<?php blossom_spa_pro_sticky_header(); ?>
</header>