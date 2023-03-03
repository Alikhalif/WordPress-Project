<?php

function dark_edufication_customize_register( $wp_customize ) {

	class Dark_Edufication_Switch_Control extends WP_Customize_Control{

		public $type = 'switch';

		public $on_off_label = array();

		public function __construct( $manager, $id, $args = array() ){
	        $this->on_off_label = $args['on_off_label'];
	        parent::__construct( $manager, $id, $args );
	    }

		public function render_content(){
	    ?>
		    <span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
			</span>

			<?php if( $this->description ){ ?>
				<span class="description customize-control-description">
				<?php echo wp_kses_post( $this->description ); ?>
				</span>
			<?php } ?>

			<?php
				$switch_class = ( $this->value() == 'true' ) ? 'switch-on' : '';
				$on_off_label = $this->on_off_label;
			?>
			<div class="onoffswitch <?php echo esc_attr( $switch_class ); ?>">
				<div class="onoffswitch-inner">
					<div class="onoffswitch-active">
						<div class="onoffswitch-switch"><?php echo esc_html( $on_off_label['on'] ) ?></div>
					</div>

					<div class="onoffswitch-inactive">
						<div class="onoffswitch-switch"><?php echo esc_html( $on_off_label['off'] ) ?></div>
					</div>
				</div>	
			</div>
			<input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr( $this->value() ); ?>"/>
			<?php
	    }
	}

	class Dark_Edufication_Dropdown_Chooser extends WP_Customize_Control{

		public $type = 'dropdown_chooser';

		public function render_content(){
			if ( empty( $this->choices ) )
	                return;
			?>
	            <label>
	                <span class="customize-control-title">
	                	<?php echo esc_html( $this->label ); ?>
	                </span>

	                <?php if($this->description){ ?>
		            <span class="description customize-control-description">
		            	<?php echo wp_kses_post($this->description); ?>
		            </span>
		            <?php } ?>

	                <select class="dark-edufication-chosen-select" <?php $this->link(); ?>>
	                    <?php
	                    foreach ( $this->choices as $value => $label )
	                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
	                    ?>
	                </select>
	            </label>
			<?php
		}
	}


	class Dark_Edufication_Icon_Picker extends WP_Customize_Control{
		public $type = 'icon-picker';


		public function render_content(){
			$id = uniqid();
			?>
	            <label>
	                <span class="customize-control-title">
	                	<?php echo esc_html( $this->label ); ?>
	                </span>

	                <?php if($this->description){ ?>
		            <span class="description customize-control-description">
		            	<?php echo wp_kses_post($this->description); ?>
		            </span>
		            <?php } ?>

	                <input id="dark-edufication-<?php echo esc_attr( $id ); ?>" placeholder="<?php esc_attr_e( 'Click here to select icon', 'dark-edufication' ); ?>" class="dark-edufication-icon-picker input" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
	            </label>
			<?php
		}
	}


	$wp_customize->remove_section( 'colors' );

	// service description setting and control
	$wp_customize->add_setting( 'dark_edufication_service_description', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'dark_edufication_service_description', array(
		'label'           	=> esc_html__( 'Description', 'dark-edufication' ),
		'section'        	=> 'edufication_service_section',
		'active_callback' 	=> 'edufication_is_service_section_enable',
		'type'				=> 'textarea',
		 'priority' => 30,
	) );


	// service btn label setting and control
	$wp_customize->add_setting( 'dark_edufication_service_btn_label', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'dark_edufication_service_btn_label', array(
		'label'           	=> esc_html__( 'Button Label', 'dark-edufication' ),
		'section'        	=> 'edufication_service_section',
		'active_callback' 	=> 'edufication_is_service_section_enable',
		'type'				=> 'text',
		 'priority' => 40,
	) );


	// service btn url setting and control
	$wp_customize->add_setting( 'dark_edufication_service_btn_link', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'			=> '#',
	) );

	$wp_customize->add_control( 'dark_edufication_service_btn_link', array(
		'label'           	=> esc_html__( 'Button Link', 'dark-edufication' ),
		'section'        	=> 'edufication_service_section',
		'active_callback' 	=> 'edufication_is_service_section_enable',
		'type'				=> 'url',
		 'priority' => 50,
	) );


	// Add Counter section
	$wp_customize->add_section( 'edufication_counter_section', array(
		'title'             => esc_html__( 'Counter','dark-edufication' ),
		'description'       => esc_html__( 'Counter Section options.', 'dark-edufication' ),
		'panel'             => 'edufication_front_page_panel',
		'priority' => 200,
	) );

	// Counter content enable control and setting
	$wp_customize->add_setting( 'dark_edufication_counter_section_enable', array(
		'sanitize_callback' => 'edufication_sanitize_switch_control',
	) );

	$wp_customize->add_control( new Dark_Edufication_Switch_Control( $wp_customize, 'dark_edufication_counter_section_enable', array(
		'label'             => esc_html__( 'Counter Section Enable', 'dark-edufication' ),
		'section'           => 'edufication_counter_section',
		'on_off_label' 		=> edufication_switch_options(),
	) ) );

	if ( isset( $wp_customize->selective_refresh ) ) {
    	$wp_customize->selective_refresh->add_partial( 'dark_edufication_counter_section_enable', array(
			'selector'            => '#counter-section .tooltiptext',
			'settings'            => 'dark_edufication_counter_section_enable',
	    ) );
	}

	$wp_customize->add_setting( 'dark_edufication_counter_image',
		array(
			'sanitize_callback' => 'edufication_sanitize_image',
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		'dark_edufication_counter_image',
			array(
				'label'       		=> esc_html__( 'Background Image', 'dark-edufication' ),
				'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'dark-edufication' ), 1350, 385 ),
				'section'     		=> 'edufication_counter_section',
				'active_callback'	=> 'dark_edufication_is_counter_section_enable',
			)
		)
	);

	for ( $i = 1; $i <= 4; $i++ ) :

		// counter note control and setting
		$wp_customize->add_setting( 'dark_edufication_counter_icon_' . $i,
			array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new Dark_Edufication_Icon_Picker( $wp_customize,
			'dark_edufication_counter_icon_' . $i,
				array(
					'label'             => sprintf( esc_html__( 'Select Icon %d', 'dark-edufication' ), $i ),
					'section'           => 'edufication_counter_section',
					'active_callback'	=> 'dark_edufication_is_counter_section_enable',
				)
			)
		);

		// counter custom date
		$wp_customize->add_setting( 'dark_edufication_counter_text_' . $i, array(
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'dark_edufication_counter_text_' . $i, array(
			'label'             => sprintf( esc_html__( 'Title %d', 'dark-edufication' ), $i ),
			'section'           => 'edufication_counter_section',
			'active_callback'	=> 'dark_edufication_is_counter_section_enable',
		) );

		// counter custom button
		$wp_customize->add_setting( 'dark_edufication_counter_value_' . $i, array(
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'dark_edufication_counter_value_' . $i, array(
			'label'             => sprintf( esc_html__( 'Value %d', 'dark-edufication' ), $i ),
			'section'           => 'edufication_counter_section',
			'active_callback'	=> 'dark_edufication_is_counter_section_enable',
		) );

	endfor;


	// Add Subscribe section
	$wp_customize->add_section( 'edufication_subscribe_section', array(
		'title'             => esc_html__( 'Subscribe & Count Down','edufication' ),
		'description'       => esc_html__( 'Subscribe Section options.', 'edufication' ),
		'panel'             => 'edufication_front_page_panel',
		'priority' => 210,
	) );

	// Subscribe content enable control and setting
	$wp_customize->add_setting( 'dark_edufication_subscribe_section_enable', array(
		'sanitize_callback' => 'edufication_sanitize_switch_control',
	) );

	$wp_customize->add_control( new Dark_Edufication_Switch_Control( $wp_customize, 'dark_edufication_subscribe_section_enable', array(
		'label'             => esc_html__( 'Subscribe & Count Down Enable', 'edufication' ),
		'section'           => 'edufication_subscribe_section',
		'on_off_label' 		=> edufication_switch_options(),
	) ) );

	
	if ( isset( $wp_customize->selective_refresh ) ) {
    	$wp_customize->selective_refresh->add_partial( 'dark_edufication_subscribe_section_enable', array(
			'selector'            => '#subscribe-newsletter .tooltiptext',
			'settings'            => 'dark_edufication_subscribe_section_enable',
	    ) );
	}

	// subscribe sub_title setting and control
	$wp_customize->add_setting( 'dark_edufication_subscribe_section_sub_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'dark_edufication_subscribe_section_sub_title', array(
		'label'           	=> esc_html__( 'Section Sub Title ', 'edufication' ),
		'section'        	=> 'edufication_subscribe_section',
		'active_callback' 	=> 'dark_edufication_is_subscribe_section_enable',
		'type'				=> 'text',
	) );

	// subscribe title setting and control
	$wp_customize->add_setting( 'dark_edufication_subscribe_section_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'dark_edufication_subscribe_section_title', array(
		'label'           	=> esc_html__( 'Section Title', 'edufication' ),
		'section'        	=> 'edufication_subscribe_section',
		'active_callback' 	=> 'dark_edufication_is_subscribe_section_enable',
		'type'				=> 'text',
	) );

	// subscribe image setting and control.
	$wp_customize->add_setting( 'dark_edufication_subscribe_image', array(
		'sanitize_callback' => 'edufication_sanitize_image'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dark_edufication_subscribe_image',
			array(
			'label'       		=> esc_html__( 'Background Image', 'edufication' ),
			'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'edufication' ), 1950, 550 ),
			'section'     		=> 'edufication_subscribe_section',
			'active_callback' 	=> 'dark_edufication_is_subscribe_section_enable',
	) ) );

	// Subscribe content enable control and setting
	$wp_customize->add_setting( 'dark_edufication_subscribe_enable', array(
		'sanitize_callback' => 'edufication_sanitize_switch_control',
	) );

	$wp_customize->add_control( new Dark_Edufication_Switch_Control( $wp_customize, 'dark_edufication_subscribe_enable', array(
		'label'             => esc_html__( 'Subscribe Enable', 'edufication' ),
		'description'       => esc_html__( 'Install Jetpack and Enable Subscription Module to activate Subsription form.', 'edufication' ),
		'section'           => 'edufication_subscribe_section',
		'active_callback' 	=> 'dark_edufication_is_subscribe_section_enable',
		'on_off_label' 		=> edufication_switch_options(),
	) ) );

	// subscribe title setting and control
	$wp_customize->add_setting( 'dark_edufication_subscription_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'dark_edufication_subscription_title', array(
		'label'           	=> esc_html__( 'Subscription Title', 'edufication' ),
		'section'        	=> 'edufication_subscribe_section',
		'active_callback' 	=> 'dark_edufication_is_subscribe_section_content_subscribe_enable',
		'type'				=> 'text',
	) );

	// Subscribe content enable control and setting
	$wp_customize->add_setting( 'dark_edufication_count_down_enable', array(
		'sanitize_callback' => 'edufication_sanitize_switch_control',
	) );

	$wp_customize->add_control( new Dark_Edufication_Switch_Control( $wp_customize, 'dark_edufication_count_down_enable', array(
		'label'             => esc_html__( 'Count Down Enable', 'edufication' ),
		'section'           => 'edufication_subscribe_section',
		'active_callback' 	=> 'dark_edufication_is_subscribe_section_enable',
		'on_off_label' 		=> edufication_switch_options(),
	) ) );

	// subscribe title setting and control
	$wp_customize->add_setting( 'dark_edufication_count_down_date', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'dark_edufication_count_down_date', array(
		'label'           	=> esc_html__( 'Select Release Date', 'edufication' ),
		'section'        	=> 'edufication_subscribe_section',
		'active_callback' 	=> 'dark_edufication_is_subscribe_section_content_count_down_enable',
		'type'				=> 'date',
	) );


}
add_action( 'customize_register', 'dark_edufication_customize_register' );


function dark_edufication_is_counter_section_enable( $control ) {
	return ( $control->manager->get_setting( 'dark_edufication_counter_section_enable' )->value() );
}


function dark_edufication_is_subscribe_section_enable( $control ) {
	return ( $control->manager->get_setting( 'dark_edufication_subscribe_section_enable' )->value() );
}

function dark_edufication_is_subscribe_section_content_subscribe_enable( $control ) {
	return dark_edufication_is_subscribe_section_enable( $control ) && $control->manager->get_setting( 'dark_edufication_subscribe_enable' )->value();
}

function dark_edufication_is_subscribe_section_content_count_down_enable( $control ) {
	return dark_edufication_is_subscribe_section_enable( $control ) && $control->manager->get_setting( 'dark_edufication_count_down_enable' )->value();
}
