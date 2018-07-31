<?php if (! defined('ABSPATH')) die('Direct access forbidden.'); 
$top_news_header_top_bar = '';
$tn_temperature_enable = '';
$tn_date_time = '';

if (function_exists('cs_get_option')):
    $top_news_header_top_bar = cs_get_option('header_top_bar');
    $reg_link = cs_get_option('registration_link');
    $reg_text = cs_get_option('registration_text');
    $log_link = cs_get_option('login_link');
    $log_text = cs_get_option('login_text');
    $social_profiles = cs_get_option('header_social_icons');
    
    $tn_temperature_enable = cs_get_option('tn_temperature_enable');
    $tn_date_time = cs_get_option('tn_date_time');
endif;
?>
<!-- Top Mini Area -->
    <div class="top-area top-area3">
        <div class="container">
            <div class="pull-left">
                <?php 
                    $ip = top_news_get_client_ip();                    
                    $ipv = top_news_ip_version($ip);
                    if ($ipv == 'ipv6'):
                        $ip = '103.3.225.148';
                    endif;                    
                    
                    $query = maybe_unserialize(wp_remote_fopen('http://ip-api.com/php/'.$ip));
                    $weather = wp_remote_fopen('http://api.openweathermap.org/data/2.5/weather?q='.$query['city'].'&APPID=cbb2caf112a0720fe8f2e2035c1a082a'); 
                    $weatherdata = json_decode($weather,true);
                    $temp = $weatherdata['main']['temp'];
                    $celcius = top_news_k_to_c($temp);
                ?>
                <ul class="top-bar-menu list-inline date-time">
                    <?php if ($tn_temperature_enable == 1): ?>
                    <li><i class="fa fa-cloud" aria-hidden="true"></i> <?php echo '<span>'.$celcius.' &#8451; '.$query['city'].', '.$query['country'].'</span>' ?></li>
                    <?php endif; if ($tn_date_time == 1): ?>
                    <li class="dt"><span><?php echo date_i18n("l F j, Y")?></span></li>
                    <?php endif; ?>
                </ul>
                <?php
                if ( has_nav_menu('top_bar') ):
                wp_nav_menu(
                    array(
                        'theme_location' => 'top_bar',
                        'menu_id' => 'top-bar-menu',
                        'menu_class' => 'top-bar-menu list-inline',
                        'container' => false
                   )
                );
                endif;
                if (!is_user_logged_in() && has_nav_menu('vp_guest_menu_items')):
                wp_nav_menu(
                    array(
                        'theme_location' => 'vp_guest_menu_items',
                        'menu_id' => 'top-bar-menu2',
                        'menu_class' => 'top-bar-menu list-inline',
                        'container' => false
                   )
                );
                endif;
                if (is_user_logged_in() && has_nav_menu('vp_subscriber_menu_items')):
                wp_nav_menu(
                    array(
                        'theme_location' => 'vp_subscriber_menu_items',
                        'menu_id' => 'top-bar-menu3',
                        'menu_class' => 'top-bar-menu list-inline',
                        'container' => false
                   )
                );
                endif;
                ?>
            </div><!-- /.date-weather -->

            <div class="account-social pull-right">
                <div class="account-links">
                    <?php if (is_user_logged_in()):
                        $current_user = wp_get_current_user();
                        echo __('Hello, ', 'top-news').$current_user->display_name;
                    else : ?>
                    <?php if (!empty($log_text)): ?>
                    <a href="<?php echo esc_url($log_link); ?>"><?php echo esc_attr($log_text); ?></a>
                    <?php endif; ?>
                    <?php if (!empty($reg_text)): ?>
                    <span>or</span>
                    <a href="<?php echo esc_url($reg_link); ?>"><?php echo esc_attr($reg_text); ?></a>
                    <span class="top-bar-sep">|</span>
                    <?php endif; ?>
                    <?php endif; ?>                    
                </div><!-- /.account-links -->
                
                <?php                    
                    if (! empty($social_profiles[0])) :
                ?>                

                <div class="social-profiles">
                    <ul class="social-icons">
                        <?php foreach($social_profiles as $profile) : ?>
                        <li><a href="<?php echo esc_url($profile['link']); ?>" title="<?php echo esc_attr($profile['name']); ?>"><i class="<?php echo esc_attr($profile['icon']); ?>"></i></a></li>
                        <?php endforeach; ?>
                    </ul><!-- /.social-icons -->
                </div><!-- /.social-profiles -->
                <?php endif; ?>
            </div><!-- /.account-social -->
        </div><!-- /.container -->
    </div><!-- /.top-area -->