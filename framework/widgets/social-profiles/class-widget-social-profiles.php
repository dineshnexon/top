<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );

class Widget_Social_Profiles extends Top_News_Widget
{
    public function __construct()
    {
        parent::__construct(
            'tn_social_counters',
            esc_html__('TopNews :: Social Counters', 'top-news'),
            array('description' => 'Display your social profiles with followers count.' )
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }
        ?>
        <?php if( ! empty($instance['social_counters']) ) : ?>
            <ul class="social-followers">
                <?php foreach( $instance['social_counters'] as $counter ) : ?>
                <li>
                    <a href="<?php echo esc_url($counter['link']); ?>" title="<?php echo esc_attr($counter['name']); ?>">
                        <i class="<?php echo esc_attr($counter['icon']); ?>"></i>
                        <span class="name"><?php echo esc_attr($counter['count']); ?></span>
                        <span class="title"><?php echo esc_attr($counter['info']); ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <?php
        echo $args['after_widget'];
    }

    function get_options()
    {
        return array(
            array(
                'id'      => 'title',
                'type'    => 'text',
                'title'   => 'Title:',
            ),
            array(
                'id'              => 'social_counters',
                'type'            => 'group',
                'title'           => esc_html__('Social Counters', 'top-news'),
                'button_title'    => esc_html__('Add New', 'top-news'),
                'accordion_title' => esc_html__('Add New Counter', 'top-news'),
                'fields'          => array(
                    array(
                        'id'          => 'name',
                        'type'        => 'text',
                        'title'       => esc_html__('Name', 'top-news'),
                    ),
                    array(
                        'id'          => 'info',
                        'type'        => 'text',
                        'title'       => esc_html__('Info', 'top-news'),
                    ),
                    array(
                        'id'          => 'count',
                        'type'        => 'text',
                        'title'       => esc_html__('Counter', 'top-news'),
                    ),
                    array(
                        'id'          => 'link',
                        'type'        => 'text',
                        'title'       => esc_html__('Link', 'top-news'),
                    ),
                    array(
                        'id'          => 'icon',
                        'type'        => 'icon',
                        'title'       => esc_html__('Icon', 'top-news'),
                    ),
                ),
                'default'   => array(
                    array(
                        'name'  => esc_html__('Facebook', 'top-news'),
                        'info'  => esc_html__('Fans', 'top-news'),
                        'count' => '16,000+',
                        'link'  => '#facebook',
                        'icon'  => 'fa fa-facebook',
                    ),
                    array(
                        'name'  => esc_html__('Twitter', 'top-news'),
                        'info'  => esc_html__('Followers', 'top-news'),
                        'count' => '12,000+',
                        'link'  => '#twiiter',
                        'icon'  => 'fa fa-twitter',
                    ),
                    array(
                        'name'  => esc_html__('Linkedin', 'top-news'),
                        'info'  => esc_html__('Connection', 'top-news'),
                        'count' => '8,000+',
                        'link'  => '#linkedin',
                        'icon'  => 'fa fa-linkedin',
                    ),
                    array(
                        'name'  => esc_html__('Dribbble', 'top-news'),
                        'info'  => esc_html__('Followers', 'top-news'),
                        'count' => '600+',
                        'link'  => '#dribbble',
                        'icon'  => 'fa fa-dribbble',
                    )
                )
            ),
        );
    }
}