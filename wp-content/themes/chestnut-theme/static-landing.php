<?php
/**
 * Template Name: Static Landing Page
 * The template for displaying the Chestnut Landing Page
 *
 * @package chestnut_theme
 */

get_header(); ?>

    <section id="main-slider" class="full-screen-yes">
        <div class="bx-slider">
            <div class="slides">
                <div class="overlay"></div>
                <div class="slider-caption">
                    <div class="mid-content">
                        <h1 class="caption-title">Welcome to Chestnut!</h1>
                        <h2 class="caption-description">
                            <p>The best way to learn management skills!</p>
                            <p><a href="#">Get Started</a></p>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="parallax-section clearfix service_template" id="features">
        <div class="mid-content">
            <h1><span>Features</span></h1>
            <div class="parallax-content">
                <div class="page-content">
                    <p style="text-align: center;"><?php _e( 'Chestnut makes training your managers efficient and affordable.' ); ?></p>
                </div>
            </div> 
            <div class="service-listing clearfix">
                <div class="clearfix service-list odd">
                    <div class="service-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/landing/icon1.png" alt="GREAT TEACHERS">
                    </div>
                    <div class="service-detail">
                        <h3>GREAT TEACHERS</h3>
                        <div class="service-content"><p><?php _e( 'Courses from MBA professors and expert trainers.' ); ?></p>
                        </div>
                    </div>
                </div>
                <div class="clearfix service-list even">
                    <div class="service-image">
                        <img src="<?php
                        echo get_template_directory_uri();
                        ?>/images/landing/icon2.png" alt="COST EFFECTIVE">
                    </div>
                    <div class="service-detail">
                        <h3>COST EFFECTIVE</h3>
                        <div class="service-content"><p><?php _e( 'Give your team an MBA education at a fraction of the price.' ); ?></p>
                        </div>
                    </div>
                </div>
                <div class="clearfix service-list odd">
                    <div class="service-image">
                        <img src="<?php
                        echo get_template_directory_uri();
                        ?>/images/landing/icon3.png" alt="CONVENIENT">
                    </div>
                    <div class="service-detail">
                        <h3>CONVENIENT</h3>
                        <div class="service-content"><p><?php _e( 'Learn at your own pace. Anywhere, anytime.' ); ?></p>
                        </div>
                    </div>
                </div>
                <div class="clearfix service-list even">
                    <div class="service-image">
                        <img src="<?php
                        echo get_template_directory_uri();
                        ?>/images/landing/icon4.png" alt="GROWING WITH YOU">
                    </div>
                    <div class="service-detail">
                        <h3>GROWING WITH YOU</h3>
                        <div class="service-content"><p><?php _e( 'New content added all the time, so our library grows as you do.' ); ?></p>
                        </div>
                    </div>
                </div>
            </div><!-- #primary -->
        </div>
    </section>
    <section class="parallax-section clearfix portfolio_template" id="portfolio">
        <div class="overlay"></div>
        <div class="mid-content">
            <h1><span>Course Library</span></h1>
            <div class="parallax-content">
                <div class="page-content">
                    <p style="text-align: center;"><?php _e( 'Sample our most popular courses.' ); ?></p>
                </div>
            </div>
            <div class="portfolio-listing clearfix">
              <?php create_portfolio() ?><!-- loads sample courses -->
            </div><!-- #primary -->
        </div>
    </section>
    <section class="parallax-section clearfix action_template" id="for-news-and-updates-subscribe-us">
        <div class="overlay"></div>
        <div class="mid-content">
            <div class="call-to-action">
                <h1><?php _e( 'Subscribe for news and updates' ); ?></h1>
                <div class="parallax-content">
                    <div class="page-content">
                        <p><a class="btn" id="btn-subscribe" href="#"><?php _e( 'Subscribe' ); ?></a></p>
                    </div>
            <div id="form-holder" style="display:none;">
                <iframe height="406px" allowTransparency="true" frameborder="0" scrolling="no" style="width:80%;border:none;margin-bottom:5px;"  src="https://hindawi.wufoo.com/embed/z17hsgya1q3fhnx/">
                    <a href="https://hindawi.wufoo.com/forms/z17hsgya1q3fhnx/"></a>
                </iframe>
                <div id="wuf-adv" style="font-family:inherit;font-size: small;color:#a7a7a7;text-align:center;display:block;">
                </div>
            </div>
                </div>
            </div><!-- #primary -->
        </div>
    </section>
</div>

<style type='text/css' media='all'>
#features{ background:url() no-repeat scroll top left #f6f6f6; background-size:cover; color:#333333}
#features .overlay { background:url(<?php echo get_template_directory_uri(); ?>/images/overlay0.png);}
#portfolio{ background:url(<?php echo get_template_directory_uri(); ?>/images/landing/bg1.jpg) no-repeat fixed bottom center #CB826F; background-size:auto; color:#ffffff}
#portfolio .overlay { background:url(<?php echo get_template_directory_uri(); ?>/images/overlay3.png);}
#for-news-and-updates-subscribe-us{ background:url() no-repeat fixed top left #F6F6F6; background-size:cover; color:#333}
#contact{ background:url(<?php echo get_template_directory_uri(); ?>/images/landing/bg4.jpg) no-repeat scroll top left ; background-size:cover; color:#FFF}
#contact .overlay { background:url(<?php echo get_template_directory_uri(); ?>/images/overlay3.png);}
#content{margin:0 !important}
</style>
<?php get_footer(); ?>