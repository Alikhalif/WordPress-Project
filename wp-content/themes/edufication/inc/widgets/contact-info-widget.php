<?php
/**
 * Contact Info Widget
 *
 * @package Theme Palace
 * @subpackage Edufication
 * @since Edufication 1.0.0
 */

if ( ! class_exists( 'Edufication_Contact_Info' ) ) :
	/**
	 * Contact Info class.
	 *
	 */
	class Edufication_Contact_Info extends WP_Widget {
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'widget_contact_info edufication_contact_info',
			);
			parent::__construct( 'edufication_contact_info', esc_html__('TP : Contact Info','edufication'), $widget_ops );
		}

		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {
			// outputs the content of the widget
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}

			$title 	= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
			$title  = apply_filters( 'widget_title', $title, $instance, $this->id_base );

			$address  = ! empty( $instance['address'] ) ? $instance['address'] : '';
			$phone    = ! empty( $instance['phone'] ) ? explode( ',', $instance['phone'] ) : array();
			$email    = ! empty( $instance['email'] ) ? explode( ',', $instance['email'] ) : array();


			echo $args['before_widget'];
				if ( ! empty( $title ) ) {
					echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
				} ?>

			
		   	<ul>
		   		<?php if ( ! empty( $address ) ) : ?>
	                <li class="address"><?php echo esc_html( $address ); ?></li>
	            <?php endif; 

	            if ( ! empty( $phone ) ) : ?>
	            	<li class="phone">
		            	<?php foreach ( $phone as $ph_number ) : ?>
		                	<a href="tel:<?php echo esc_attr( $ph_number ); ?>"><?php echo esc_html( $ph_number ); ?></a> 
		            	<?php endforeach; ?>
	            	</li>
            	<?php endif;

                if ( ! empty( $email ) ) : ?>
                	<li class="email">
		            	<?php foreach ( $email as $email_id ) : ?>
		                	<a href="mailto:<?php echo esc_attr( $email_id ); ?>"><?php echo esc_html( $email_id ); ?></a>
		            	<?php endforeach; ?>
	            	</li>
            	<?php endif; ?>
            </ul><!-- .menu -->

			<?php
			echo $args['after_widget'];
		}

		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ) {
			$title     	= isset( $instance['title'] ) ? ( $instance['title'] ) : esc_html__( 'Stay Connected', 'edufication' );
			$address    = isset( $instance['address'] ) ? $instance['address'] : '';
			$phone      = isset( $instance['phone'] ) ? $instance['phone'] : '';
			$email      = isset( $instance['email'] ) ? $instance['email'] : '';
		   ?>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'edufication' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_html_e( 'Address:', 'edufication' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" type="text" value="<?php echo esc_html( $address ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_html_e( 'Phone:', 'edufication' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" type="text" value="<?php echo esc_html( $phone ); ?>" />
				<small><?php esc_html_e( 'Note: To input multiple phone no. please seperate phone numbers by comma ",".', 'edufication' ) ?></small>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_html_e( 'Email:', 'edufication' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="email" value="<?php echo esc_html( $email ); ?>" />
				<small><?php esc_html_e( 'Note: To input multiple email id. please seperate email ids by comma ",".', 'edufication' ) ?></small>
			</p>


		   <?php
		}

		/**
		* Processing widget options on save
		*
		* @param array $new_instance The new options
		* @param array $old_instance The previous options
		*/
		public function update( $new_instance, $old_instance ) {
			// processes widget options to be saved
			$instance           			= $old_instance;
			$instance['title']  			= sanitize_text_field( $new_instance['title'] );
			$instance['address'] 			= sanitize_text_field( $new_instance['address'] );
			$instance['phone'] 				= sanitize_text_field( $new_instance['phone'] );
			$instance['email'] 				= sanitize_text_field( $new_instance['email'] );
			return $instance;
		}
	}
endif;