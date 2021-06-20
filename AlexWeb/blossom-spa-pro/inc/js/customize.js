jQuery(document).ready(function($){
    /* Move Front page widgets to front-page panel */
    wp.customize.section( 'sidebar-widgets-service' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-service' ).priority( '20' );
    wp.customize.section( 'sidebar-widgets-about' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-about' ).priority( '25' );
    wp.customize.section( 'sidebar-widgets-cta' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-cta' ).priority( '35' );
    wp.customize.section( 'sidebar-widgets-service-two' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-service-two' ).priority( '40' );
    wp.customize.section( 'sidebar-widgets-service-three' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-service-three' ).priority( '60' );
    wp.customize.section( 'sidebar-widgets-pricing' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-pricing' ).priority( '70' );
    wp.customize.section( 'sidebar-widgets-cta-two' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-cta-two' ).priority( '80' );
    wp.customize.section( 'sidebar-widgets-team' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-team' ).priority( '90' );
    wp.customize.section( 'sidebar-widgets-gallery' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-gallery' ).priority( '110' );
    wp.customize.section( 'sidebar-widgets-testimonial' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-testimonial' ).priority( '120' );
    wp.customize.section( 'sidebar-widgets-map' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-map' ).priority( '135' );
    wp.customize.section( 'sidebar-widgets-contact' ).panel( 'frontpage_settings' );
    wp.customize.section( 'sidebar-widgets-contact' ).priority( '140' );    
    
    /* Move Contact page widgets to Contact page panel */
    wp.customize.section( 'sidebar-widgets-template-map' ).panel( 'contact_page_setting' );
    wp.customize.section( 'sidebar-widgets-template-map' ).priority( '15' );
    wp.customize.section( 'sidebar-widgets-contact-template' ).panel( 'contact_page_setting' );
    wp.customize.section( 'sidebar-widgets-contact-template' ).priority( '20' );
    wp.customize.section( 'sidebar-widgets-contact-form-template' ).panel( 'contact_page_setting' );
    wp.customize.section( 'sidebar-widgets-contact-form-template' ).priority( '30' );

    /* Move Service page widgets to Service page panel */
    wp.customize.section( 'sidebar-widgets-service-template' ).panel( 'service_page_settings' );
	wp.customize.section( 'sidebar-widgets-service-template' ).priority( '20' );
    
    /* Move Team page widgets to Team page Panel */
    wp.customize.section( 'sidebar-widgets-team-template' ).panel( 'team_page_settings' );
    wp.customize.section( 'sidebar-widgets-team-template' ).priority( '20' );

    /* Move Pricing page widgets to Pricing page Panel */
    wp.customize.section( 'sidebar-widgets-pricing-template' ).panel( 'pricing_page_settings' );
    wp.customize.section( 'sidebar-widgets-pricing-template' ).priority( '20' );
    wp.customize.section( 'sidebar-widgets-pricing-faq-template' ).panel( 'pricing_page_settings' );
    wp.customize.section( 'sidebar-widgets-pricing-faq-template' ).priority( '30' );

    /* Move Gallery page widgets to Gallery page panel */
    wp.customize.section( 'sidebar-widgets-gallery-template' ).panel( 'gallery_page_settings' );
    wp.customize.section( 'sidebar-widgets-gallery-template' ).priority( '20' );

    //Scroll to front page section
    $('body').on('click', '#sub-accordion-panel-frontpage_settings .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection( section_id );
    });  
    
    /* Home page preview url */
    wp.customize.panel( 'frontpage_settings', function( section ){
        section.expanded.bind( function( isExpanded ) {
            if( isExpanded ){
                wp.customize.previewer.previewUrl.set( blossom_spa_pro_cdata.home );
            }
        });
    });
    
    /* Service page preview url */
    wp.customize.panel( 'service_page_settings', function( section ){
        section.expanded.bind( function( isExpanded ){
            if( isExpanded ){
                wp.customize.previewer.previewUrl.set( blossom_spa_pro_cdata.service );
            }
        });
    });
    
    /* Contact Page preview url */
    wp.customize.panel( 'contact_page_setting', function( section ){
        section.expanded.bind( function( isExpanded ) {
            if( isExpanded ){
                wp.customize.previewer.previewUrl.set( blossom_spa_pro_cdata.contact );
            }
        });
    });
    
    /* Pricing Page preview url */
    wp.customize.panel( 'pricing_page_settings', function( section ){
        section.expanded.bind( function( isExpanded ) {
            if( isExpanded ){
                wp.customize.previewer.previewUrl.set( blossom_spa_pro_cdata.pricing );
            }
        });
    });

    /* Team Page preview url */
    wp.customize.panel( 'team_page_settings', function( section ){
        section.expanded.bind( function( isExpanded ) {
            if( isExpanded ){
                wp.customize.previewer.previewUrl.set( blossom_spa_pro_cdata.team );
            }
        });
    });

    /* Gallery Page preview url */
    wp.customize.panel( 'gallery_page_settings', function( section ){
        section.expanded.bind( function( isExpanded ) {
            if( isExpanded ){
                wp.customize.previewer.previewUrl.set( blossom_spa_pro_cdata.gallery );
            }
        });
    });
});

function scrollToSection( section_id ){
    var preview_section_id = "banner_section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {
        
        case 'accordion-section-sidebar-widgets-service':
        preview_section_id = "service_section";
        break;

        case 'accordion-section-sidebar-widgets-about':
        preview_section_id = "about_section";
        break;
        
        case 'accordion-section-popular_product_section':
        preview_section_id = "popular_product_section";
        break;

        case 'accordion-section-sidebar-widgets-cta':
        preview_section_id = "cta_section";
        break;
        
        case 'accordion-section-sidebar-widgets-service-two':
        preview_section_id = "service_two_section";
        break;

        case 'accordion-section-special_pricing_section':
        preview_section_id = "special_pricing_section";
        break;

        case 'accordion-section-sidebar-widgets-service-three':
        preview_section_id = "service_three_section";
        break;

        case 'accordion-section-sidebar-widgets-pricing':
        preview_section_id = "pricing_section";
        break;

        case 'accordion-section-sidebar-widgets-cta-two':
        preview_section_id = "cta_two_section";
        break;

        case 'accordion-section-sidebar-widgets-testimonial':
        preview_section_id = "testimonial_section";
        break;

        case 'accordion-section-sidebar-widgets-team':
        preview_section_id = "team_section";
        break;

        case 'accordion-section-blog_section':
        preview_section_id = "blog_section";
        break;

        case 'accordion-section-sidebar-widgets-gallery':
        preview_section_id = "gallery_section";
        break;

        case 'accordion-section-product_section':
        preview_section_id = "products_section";
        break;

        case 'accordion-section-sidebar-widgets-map':
        preview_section_id = "contact_section";
        break;

        case 'accordion-section-sidebar-widgets-contact':
        preview_section_id = "contact_section";
        break;        
        
        case 'accordion-section-front_sort':
        preview_section_id = "banner_section";
        break;
    }

    if( $contents.find('#'+preview_section_id).length > 0 && $contents.find('.home').length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + preview_section_id ).offset().top
        }, 1000);
    }
}
