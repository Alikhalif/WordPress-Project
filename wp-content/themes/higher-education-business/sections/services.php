<?php 

add_action( 'bizberg_before_homepage_blog', 'higher_education_business_homepage_services' );
function higher_education_business_homepage_services(){ 

    $services_status   = bizberg_get_theme_mod( 'services_status' );

    if( $services_status == false ){
        return;
    }

    $services_subtitle = bizberg_get_theme_mod( 'services_subtitle' );
    $services_title    = bizberg_get_theme_mod( 'services_title' );
    $services          = bizberg_get_theme_mod( 'higher_education_business_services' );
    $services          = json_decode( $services, true ); ?>

	<div class="services_wrapper">

		<div class="container">
			
			<div class="title_wrapper">
				<h4><?php echo esc_html( $services_subtitle ); ?></h4>
				<h3><?php echo esc_html( $services_title ); ?></h3>
			</div>

            <?php 

            if( !empty( $services ) ){ ?>

    			<div class="items_wrapper">

                    <?php 

                    foreach( $services as $key => $value ){

                        $icon    = !empty( $value['icon'] ) ? $value['icon'] : '';
                        $page_id = !empty( $value['page_id'] ) ? $value['page_id'] : ''; 

                        $page_obj = get_post( $page_id ); ?>
    				
        				<div class="services-item">
                            <div class="services-icon">
                                <i class="<?php echo esc_attr( $icon ); ?>"></i>
                            </div>
                            <div class="services-content">
                                <h3 class="title">
                                    <a href="<?php echo esc_url( get_permalink( $page_obj->ID ) ); ?>">
                                        <?php echo esc_html( $page_obj->post_title ); ?>        
                                    </a>
                                </h3>
                                <p class="margin-0">
                                    <?php echo esc_html( wp_trim_words( sanitize_text_field( $page_obj->post_content ), 15, ' [...]' ) ); ?>        
                                </p>
                            </div>
                        </div>

                        <?php 

                    } ?>

    			</div>

                <?php 

            } ?>

		</div>
		
	</div>

	<?php
}