<?php
/**
 * Header Two
 *
 * @package Blossom_Pin_Pro
 */
 
$bg = get_theme_mod( 'header_bg_image' );
$style ='style="background-image:url('. esc_url( $bg ) .'); no-repeat;"'; 
?>

<header class="site-header header-layout-two" itemscope itemtype="http://schema.org/WPHeader">
	<div class="header-t" <?php echo $style; ?>>
        <div class="container">
            <?php blossom_pin_pro_site_branding();?>
        </div>
    </div> <!-- header-t -->
	
	<div class="header-b">
		<div class="container clearfix">
			<?php 
			blossom_pin_pro_primary_nagivation(); 
			blossom_pin_pro_tools();
			?>			
		</div>
	</div> <!-- .header-b -->
</header>