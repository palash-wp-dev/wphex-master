<?php
/**
 *  wphex about us widget
 * @package wphex
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit(); //exit if access directly
}

class WPHex_Contact_Info_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'wphex_contact_info',
			esc_html__( 'wphex: Contact Info', 'wphex-master' ),
			array( 'description' => esc_html__( 'Display contact info widget', 'wphex-master' ) )
		);
	}

	public function form( $instance ) {
		$title        = isset( $instance['title'] ) ? $instance['title'] : '';
		$contact_info = array(
			'location',
			'phone',
			'email'
		);
		foreach ( $contact_info as $ci ) {
			if ( ! isset( $instance[ $ci ] ) ) {
				$instance[ $ci ] = "";
			}
		}
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'wphex-master' ); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                   value="<?php echo esc_attr( $title ) ?>">
        </p>
		<?php foreach ( $contact_info as $ci ) : ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( $ci ) ); ?>"><?php echo esc_html( ucfirst( $ci ) . " " . esc_html__( 'Info', 'wphex-master' ) ); ?>
                    : </label>
                <br/>
                <input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( $ci ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( $ci ) ); ?>"
                       value="<?php echo esc_attr( $instance[ $ci ] ); ?>"/>
                <small><?php echo esc_html__( 'Leave it blank if you don\'t want to show this info', 'wphex-master' ) ?></small>
            </p>

		<?php endforeach;

	}

	public function widget( $args, $instance ) {
		$title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		echo wp_kses_post( $args['before_widget'] );
		//widget title
		if ( ! empty( $title ) ) {
			echo wp_kses_post( $args['before_title'] ) . esc_html( $title ) . wp_kses_post( $args['after_title'] );
		}
		?>

		<?php
		if ( ! empty( $instance['email'] ) || ! empty( $instance['location'] ) || ! empty( $instance['phone'] ) ):
			echo wp_kses_post( ' <div class="footer-widget-contact">' );
            if ( ! empty( $instance['phone'] ) ) {
                printf( '   <span class="footer-widget-contact-item"> <span> <i class="fas fa-phone"></i> </span> <a href="tel:'.esc_html( $instance['phone'] ).'"> %s </a> </span>', esc_html( $instance['phone'] ) );
            }
			if ( ! empty( $instance['email'] ) ) {
				printf( '   <span class="footer-widget-contact-item"> <span> <i class="fas fa-envelope"></i> </span> <a href="mailto:'.esc_html( $instance['email'] ).'"> %s </a> </span>', esc_html( $instance['email'] ) );
			}
			if ( ! empty( $instance['location'] ) ) {
				printf( '   <span class="footer-widget-contact-item"> <span> <i class="fas fa-map-marker-alt"></i> </span> %s </span>', esc_html( $instance['location'] ) );

			}
			echo wp_kses_post( '</div>' );
		endif;


		echo wp_kses_post( $args['after_widget'] );

	}

	public function update( $new_instance, $old_instance ) {
		$instance             = array();
		$instance['location'] = sanitize_text_field( $new_instance['location'] );
		$instance['title']    = sanitize_text_field( $new_instance['title'] );
		$instance['phone']    = sanitize_text_field( $new_instance['phone'] );
		$instance['email']    = sanitize_text_field( $new_instance['email'] );

		return $instance;
	}
}

if ( ! function_exists( 'WPHex_Contact_Info_Widget' ) ) {
	function WPHex_Contact_Info_Widget() {
		register_widget( 'WPHex_Contact_Info_Widget' );
	}

	add_action( 'widgets_init', 'WPHex_Contact_Info_Widget' );
}
