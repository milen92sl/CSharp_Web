<?php
/**
 * Template Name: Contact Page
 * 
 * @package Blossom_Spa_Pro
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php 
				if( is_active_sidebar( 'template-map' ) ) {
			        echo '<div class="map-block">';
			            dynamic_sidebar( 'template-map' );
			        echo '</div>';
			    }

			    if( is_active_sidebar( 'contact-template' ) || is_active_sidebar( 'contact-form-template' ) ){ ?>
			        <div class="contact-info-wrap">
			    		<?php if( is_active_sidebar( 'contact-template' ) ) {
			                echo '<div class="contact-details-wrap">';
			                dynamic_sidebar( 'contact-template' );
			                echo '</div>';
			            } ?>
			            <div class="form-block">
			                <?php if( is_active_sidebar( 'contact-form-template' ) ) {
			                    dynamic_sidebar( 'contact-form-template' );
			                } ?>
			            </div>
			    	</div>
			    <?php
			    }
			?>
		</main>
	</div>	
<?php     
get_footer();