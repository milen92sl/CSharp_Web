<?php
/**
 * Template part for displaying coming soon page
 *
 * @package Blossom_Spa_Pro
 */

$event_time         = get_theme_mod( 'coming_soon_event_timer', '2020-08-20' );
$event_datetime_obj = new DateTime( $event_time );
$today_datetime_obj = new DateTime( date('Y-m-d') );
$coming_soon_title  = get_theme_mod( 'coming_soon_title', __( 'Our Website Is Almost Ready', 'blossom-spa-pro' ) );
$coming_soon_subtitle  = get_theme_mod( 'coming_soon_subtitle', __( 'Time left Until Launching', 'blossom-spa-pro' ) );
$coming_soon_background_image  = get_theme_mod( 'coming_soon_background_image', get_template_directory_uri() . '/coming-soon/coming-soon-bg.jpg' );
$coming_soon_logo  = get_theme_mod( 'coming_soon_logo', get_template_directory_uri() . '/coming-soon/coming-soon-logo.png' );

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
    <style type="text/css">
        .coming-soon-template .site-content {
            background-size: cover;
            position: relative;
            z-index: 1;
            padding-top: 60px;
            min-height: 100vh;
            display: flex;
            flex: 1;
            flex-direction: column;
        }
        .coming-soon-template .site-content:before {
            content: "";
            background-image: url('<?php echo get_template_directory_uri() . '/coming-soon/overlay.png'; ?>');
            background-color: rgba(0,0,0,0.5);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: block;
            table-layout: auto;
            z-index: -1;
        }
        .coming-soon-template .container {
            display: flex;
            flex: 1;
            flex-direction: column;
            text-align: center;
            align-items: center;
            justify-content: center;
        }
        .coming-soon-logo {
            margin-bottom: 40px;
        }
        .coming-soon-text {
            color: #fff;
            font-family: 'Marcellus';
            font-weight: 400;
            font-size: 2.6665em;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .coming-soon-desc {
            font-size: 1.1112em;
            color: #fff;
            margin-bottom: 75px;
        }
        .coming-soon-desc p {
            margin-top: 0;
            margin-bottom: 15px;
        }
        .coming-soon-template .banner-countdown {
            display: flex;
            flex: 1;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            color: #fff;
        }
        .coming-soon-template .banner-countdown .countdown-wrap {
            width: 250px;
            border-right: 1px dotted rgba(255,255,255,0.5);
            padding: 5px 20px;
        }
        .coming-soon-template .banner-countdown .countdown-wrap:last-child {
            border-right: 0;
        }
        .coming-soon-template .banner-countdown span {
            font-size: 3.3335em;
            font-weight: 700;
        }
        .coming-soon-template .banner-countdown .smalltext {
            font-size: 0.8888em;
            text-transform: uppercase;
            font-weight: 400;
            letter-spacing: 1px;
        }
        .coming-soon-template .newsletter-section {
            margin-bottom: 40px;
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper {
            padding: 0;
            background: none !important;
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper h3 {
            font-size: 1.1112em;
            color: #fff;
            font-weight: 400;
            font-family: 'Marcellus';
            margin-top: 0;
            margin-bottom: 10px;
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper span {
            color: #fff;
            font-size: 0.8888em;
            margin-bottom: 10px;
            display: inline-block;
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper form {
            margin-top: 30px;
            display: flex;
            flex: 1;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper form {
            margin-top: 20px;
            display: flex;
            flex: 1;
            flex-direction: row;
            flex-wrap: wrap;
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper form input[name="subscribe-fname"], 
        .coming-soon-template .blossomthemes-email-newsletter-wrapper form input[name="subscribe-fname"] + input[name="subscribe-email"] {
            width: 33.33%;
            margin-right: 2%;
            height: 50px;
            border-color: rgba(0,0,0,0.1);
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper form input[name="subscribe-email"] {
            width: 60%;
            margin-right: 3%;
            height: 50px;
            border-color: rgba(0,0,0,0.1);
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper form label {
            order: 5;
            margin-top: 10px;
            position: relative;
            padding-left: 25px;
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper form label input[type="checkbox"] {
            position: absolute;
            top: 10px;
            left: 0;
            display: none;
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper form label span.check-mark {
            background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="%23fff" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>');
            background-repeat: no-repeat;
            background-size: 0;
            background-position: center;
            width: 16px;
            height: 16px;
            border: 1px solid rgba(255,255,255,0.5);
            border-radius: 2px;
            position: absolute;
            top: 10px;
            left: 0;
            -webkit-transition: all ease 0.25s;
            -moz-transition: all ease 0.25s;
            transition: all ease 0.25s;
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper form label input[type="checkbox"]:checked + span.check-mark {
            background-size: 12px;
            background-color: #9cbe9c;
            border-color: #9cbe9c;
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper label span {
            margin-bottom: 0;
            vertical-align: middle;
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper form input[type="submit"] {
            min-width: 150px;
            width: auto;
        }
        .coming-soon-template .blossomthemes-email-newsletter-wrapper form input[type="submit"]:hover {
            border-color: #fff;
            background: #fff;
        }
        .coming-soon-template .footer-social {
            margin-bottom: 20px;
        }
        .coming-soon-template .site-footer, .coming-soon-template .site-footer .footer-b {
            background: none;
            text-align: center;
        }
        .coming-soon-template .site-footer .footer-b {
            border-top: none;
            padding-top: 0;
            padding-bottom: 40px;
        }
        .coming-soon-template .footer-b .copyright {
            width: 100%;
        }
        @media screen and (max-width: 1024px) {
            .coming-soon-template .banner-countdown .countdown-wrap {
                width: 50%;
                border: 1px dotted rgba(255,255,255,0.5);
                padding-bottom: 20px;
                margin-left: -1px;
                margin-top: -1px;
            }
            .coming-soon-template .banner-countdown .countdown-wrap:last-child {
                border-right: 1px dotted rgba(255,255,255,0.5);
            }
        }
        @media screen and (max-width: 767px) {
            .coming-soon-template .site-content {
                padding-top: 40px;
            }
            .coming-soon-template #primary {
                margin-bottom: 60px;
            }
            .coming-soon-logo {
                margin-bottom: 30px;
            }
            .coming-soon-text {
                font-size: 1.72223em;
            }
            .coming-soon-desc {
                font-size: 1em;
                margin-bottom: 50px;
            }
            .coming-soon-template .banner-countdown span {
                font-size: 2.2223em;
            }
            .coming-soon-template .blossomthemes-email-newsletter-wrapper form {
                flex-direction: column;
            }
            .coming-soon-template .blossomthemes-email-newsletter-wrapper form input[name="subscribe-fname"], 
            .coming-soon-template .blossomthemes-email-newsletter-wrapper form input[name="subscribe-fname"] + input[name="subscribe-email"] {
                width: 100%;
                margin-right: 0;
            }
            .coming-soon-template .blossomthemes-email-newsletter-wrapper form label {
                text-align: left;
            }
        }
    </style>
</head>

<body class="coming-soon-template" itemscope itemtype="http://schema.org/WebPage">
    <div id="content" class="site-content" style="background-image:url( '<?php echo esc_url( $coming_soon_background_image ); ?>' );">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section class="coming-soon under-maintainence">
                        <div class="coming-soon-logo"><img src="<?php echo esc_url( $coming_soon_logo ); ?>"/></div>
                        <h1 class="coming-soon-text"><?php echo esc_html( $coming_soon_title ); ?></h1>
                        <div class="coming-soon-desc"><?php echo wpautop( wp_kses_post( $coming_soon_subtitle ) ); ?></div>
                        <?php if( $event_datetime_obj > $today_datetime_obj ){ ?>
                            <div id="bannerClock" class="banner-countdown wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                <div class="countdown-wrap">
                                    <span class="days"></span>
                                    <div class="smalltext"><?php esc_html_e( 'Days','blossom-spa-pro' ); ?></div>
                                </div>
                                <div class="countdown-wrap">
                                    <span class="hours"></span>
                                    <div class="smalltext"><?php esc_html_e( 'Hours','blossom-spa-pro' ); ?></div>
                                </div>
                                <div class="countdown-wrap">
                                    <span class="minutes"></span>
                                    <div class="smalltext"><?php esc_html_e( 'Minutes','blossom-spa-pro' ); ?></div>
                                </div>
                                <div class="countdown-wrap">
                                    <span class="seconds"></span>
                                    <div class="smalltext"><?php esc_html_e( 'Seconds','blossom-spa-pro' ); ?></div>
                                </div>
                            </div>
                            <?php
                        } else {
                            echo '<div class="banner-countdown"><p>'. esc_html__( 'Event Expired', 'blossom-spa-pro' ) .'</p></div>';
                        } ?>
                    </section><!-- .coming-soon -->
                </main><!-- #main -->
            </div><!-- #primary -->
            <?php do_action( 'blossom_spa_pro_coming_soon' ); ?>
            <footer class="site-footer">
                <div class="footer-b">
                    <div class="copyright">           
                        <?php blossom_spa_pro_get_footer_copyright(); ?>
                    </div>               
                </div>
            </footer>
        </div>
    </div>
    <?php     
    $ed_coming_soon     = get_theme_mod( 'ed_coming_soon', false );
    $ed_coming_soon_customizer     = get_theme_mod( 'ed_coming_soon_customizer', false );
    $coming_soon_timer  = new DateTime( get_theme_mod( 'coming_soon_event_timer', '2020-08-20' ) );
    $today              = new DateTime( date('Y-m-d') );
    $coming_soon        = '';
    if( $ed_coming_soon || $ed_coming_soon_customizer ){
        if( $coming_soon_timer > $today ){
            $coming_soon = get_theme_mod( 'coming_soon_event_timer', '2020-08-20' );
        }
    }
    ?>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() .'/js/all.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() .'/js/v4-shims.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() .'/js/jquery.countdown.min.js'; ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var coming_soon = <?php echo '["' . $coming_soon . '"]'; ?>;
            $('#bannerClock .days').countdown( coming_soon, function(event) {
                $(this).html(event.strftime('%D'));
            });
            $('#bannerClock .hours').countdown( coming_soon, function(event) {
                $(this).html(event.strftime('%H'));
            });
            $('#bannerClock .minutes').countdown( coming_soon, function(event) {
                $(this).html(event.strftime('%M'));
            });
            $('#bannerClock .seconds').countdown( coming_soon, function(event) {
                $(this).html(event.strftime('%S'));
            });
        });
    </script>
    <?php wp_footer(); ?>
</body>
</html>