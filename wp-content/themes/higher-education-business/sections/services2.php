<?php 

add_action( 'bizberg_before_homepage_blog', 'higher_education_business_homepage_services2' );
function higher_education_business_homepage_services2(){ 

    $services_status   = bizberg_get_theme_mod( 'services_status2' );

    if( $services_status == false ){
        return;
    } 

    $services_subtitle = bizberg_get_theme_mod( 'services_subtitle2' );
    $services_title    = bizberg_get_theme_mod( 'services_title2' );
    $services          = bizberg_get_theme_mod( 'higher_education_business_services2' );
    $services          = json_decode( $services, true ); ?>

	<div class="services_2_wrapper">
		
		<div class="container">
			
			<div class="title_wrapper">
				<h4><?php echo esc_html( $services_subtitle ); ?></h4>
				<h3><?php echo esc_html( $services_title ); ?></h3>
			</div>

            <?php 

            if( !empty( $services ) ){ ?>

    			<div class="item_wrapper">

                    <?php 

                    foreach( $services as $key => $value ){

                        $icon    = !empty( $value['icon'] ) ? $value['icon'] : '';
                        $page_id = !empty( $value['page_id'] ) ? $value['page_id'] : ''; 

                        $page_obj = get_post( $page_id ); ?>

                        <div class="item">
                           <div class="flip-box-inner">
                                <div class="flip-box-wrap">
                                    <div class="front-part">
                                       <div class="front-content-part">
                                            <div class="front-icon-part">
                                                <div class="icon-part">
                                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                                </div>
                                            </div>
                                            <div class="front-title-part">
                                                <h3 class="title">
                                                    <a href="<?php echo esc_url( get_permalink( $page_obj->ID ) ); ?>">
                                                        <?php echo esc_html( $page_obj->post_title ); ?>        
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="front-desc-part">
                                                <p>
                                                    <?php echo esc_html( wp_trim_words( sanitize_text_field( $page_obj->post_content ), 15, ' [...]' ) ); ?>  
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="back-part">
                                        <div class="back-front-content">
                                            <div class="back-title-part">
                                                <h3 class="back-title">
                                                    <a href="<?php echo esc_url( get_permalink( $page_obj->ID ) ); ?>">
                                                        <?php echo esc_html( $page_obj->post_title ); ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="back-desc-part">
                                                <p class="back-desc"><?php echo esc_html( wp_trim_words( sanitize_text_field( $page_obj->post_content ), 15, ' [...]' ) ); ?> </p>
                                            </div>
                                            <div class="back-btn-part">
                                                <a class="readon view-more" href="<?php echo esc_url( get_permalink( $page_obj->ID ) ); ?>">
                                                    <?php esc_html_e( 'View More' , 'higher-education-business' ) ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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