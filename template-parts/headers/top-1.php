<?php if (! defined('ABSPATH')) die('Direct access forbidden.');
$reg_link = '';
$reg_text = '';
$log_link = '';
$log_text = '';
$social_profiles = '';
if (function_exists('cs_get_option')):
    $reg_link = cs_get_option('registration_link');
    $reg_text = cs_get_option('registration_text');
    $log_link = cs_get_option('login_link');
    $log_text = cs_get_option('login_text');
    $social_profiles = cs_get_option('header_social_icons');
endif;
?>
    
    <!-- Top Mini Area -->
    <div class="top-area">
        <div class="container">
            <div class="date-weather pull-left">

                <div class="today-date">
                    <i class="fa fa-clock-o"></i>
                    <strong><?php echo date_i18n('h:i: A'); ?></strong>
                    <span><?php echo date_i18n("l F j, Y")?></span>
                </div><!-- /.today-date -->
                <?php                    
                $ip = top_news_get_client_ip();                    
                $ipv = top_news_ip_version($ip);
                if ($ipv == 'ipv6'):
                    $ip = '103.3.225.148';
                endif;                    

                $query = maybe_unserialize(wp_remote_fopen('http://ip-api.com/php/'.$ip));
                $weather = wp_remote_fopen('http://api.openweathermap.org/data/2.5/weather?q='.$query['city'].'&APPID=cbb2caf112a0720fe8f2e2035c1a082a'); 
                $weatherdata = json_decode($weather,true);
                $weatherinfo = @$weatherdata['weather'][0]['description'];
                switch ($weatherinfo) {
                    case "clear sky":
                        echo "<img src=".get_template_directory_uri() . '/images/weather/01.png'." alt=''>";
                        break;

                    case "few clouds":
                        echo "<img src=".get_template_directory_uri() . '/images/weather/02.png'." alt=''>";
                        break;

                    case "scattered clouds":
                        echo "<img src=".get_template_directory_uri() . '/images/weather/03.png'." alt=''>";
                        break;

                    case "broken clouds":
                        echo "<img src=".get_template_directory_uri() . '/images/weather/04.png'." alt=''>";
                        break;

                    case "shower rain":
                        echo "<img src=".get_template_directory_uri() . '/images/weather/05.png'." alt=''>";
                        break;

                    case "moderate rain":
                        echo "<img src=".get_template_directory_uri() . '/images/weather/05.png'." alt=''>";
                        break;

                    case "rain":
                        echo "<img src=".get_template_directory_uri() . '/images/weather/06.png'." alt=''>";
                        break;

                    case "thunderstorm":
                        echo "<img src=".get_template_directory_uri() . '/images/weather/07.png'." alt=''>";
                        break;

                    case "snow":
                        echo "<img src=".get_template_directory_uri() . '/images/weather/08.png'." alt=''>";
                        break;

                    case "mist":
                        echo "<img src=".get_template_directory_uri() . '/images/weather/09.png'." alt=''>";
                        break;

                }
                $temp = @$weatherdata['main']['temp'];
                $celcius = top_news_k_to_c($temp); 
                if (!empty($celcius)):
                ?>
                <div class="today-wether">           
                    <?php echo '<span><strong>'.$celcius.' &#8451;</strong> '.$query['city'].', '.$query['country'].'</span>'; ?>
                </div>
                <?php endif; ?>
                <!-- using resource to generate weather and location 
                    *** http://ip-api.com/docs/api:serialized_php 
                    *** http://openweathermap.org/current 
                -->
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