<?php
/**
 * Help Panel.
 *
 * @package Blossom_Recipe_Pro
 */
?>
<!-- Help file panel -->
<div id="help-panel" class="panel-left">
    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Documentation Link', 'blossom-recipe-pro' ); ?></h4>
        <p><?php esc_html_e( 'New to the WordPress world? Our documentation has step by step procedure to create a beautiful website.', 'blossom-recipe-pro' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/blossom-recipe-pro-theme-documentation/' ); ?>" title="<?php esc_attr_e( 'Visit the Documentation', 'blossom-recipe-pro' ); ?>" target="_blank">
            <?php esc_html_e( 'View Documentation', 'blossom-recipe-pro' ); ?>
        </a>
    </div><!-- .panel-aside -->
    
    <div class="panel-aside">
        <h4><?php esc_html_e( 'Support Ticket', 'blossom-recipe-pro' ); ?></h4>
        <p><?php printf( __( 'It\'s always a good idea to visit our %1$sKnowledge Base%2$s before you send us a support ticket.', 'blossom-recipe-pro' ), '<a href="'. esc_url( 'https://blossomthemes.com/blossom-recipe-pro-theme-documentation/' ) .'" target="_blank">', '</a>' ); ?></p>
        <p><?php esc_html_e( 'If the Knowledge Base didn\'t answer your queries, submit us a support ticket here. Our response time usually is less than a business day, except on the weekends.', 'blossom-recipe-pro' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/support-ticket/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'blossom-recipe-pro' ); ?>" target="_blank">
            <?php esc_html_e( 'View Contact Support', 'blossom-recipe-pro' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Blossom Recipe Pro Demo', 'blossom-recipe-pro' ); ?></h4>
        <p><?php esc_html_e( 'Visit the demo to get more ideas about our theme design.', 'blossom-recipe-pro' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://demo.blossomthemes.com/blossom-recipe-pro/' ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'blossom-recipe-pro' ); ?>" target="_blank">
            <?php esc_html_e( 'View Demo', 'blossom-recipe-pro' ); ?>
        </a>
    </div><!-- .panel-aside -->
</div>