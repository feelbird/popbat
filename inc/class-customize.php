<?php if (!defined( 'ABSPATH' )) exit;

if (!class_exists( 'Cryptlight_Customize' )){

	class Cryptlight_Customize {
		
		public function __construct() {
	        add_action( 'customize_register', array( $this, 'cryptlight_customize_register' ) );
	    }

	    public function cryptlight_customize_register($wp_customize) {
	        
	        $this->cryptlight_init_remove_setting( $wp_customize );
	        $this->cryptlight_init_ova_typography( $wp_customize );
	        $this->cryptlight_init_ova_color( $wp_customize );
	        $this->cryptlight_init_ova_layout( $wp_customize );
	        $this->cryptlight_init_ova_header( $wp_customize );
	        $this->cryptlight_init_ova_footer( $wp_customize );
	        $this->cryptlight_init_ova_blog( $wp_customize );
	        

	        
	   
	        do_action( 'cryptlight_customize_register', $wp_customize );
	    }

	    public function cryptlight_init_remove_setting( $wp_customize ){
	    	/* Remove Colors &  Header Image Customize */
			$wp_customize->remove_section('colors');
			$wp_customize->remove_section('header_image');

			$wp_customize->add_setting( 'logo', array(
		      'type' => 'theme_mod', // or 'option'
		      'capability' => 'edit_theme_options',
		      'theme_supports' => '', // Rarely needed.
		      'default' => '',
		      'transport' => 'refresh', // or postMessage
		      'sanitize_callback' => 'sanitize_text_field' // Get function name 
		      
		    ) );

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
		        'label'    => esc_html__( 'Logo Default', 'cryptlux' ),
		        'section'  => 'title_tagline',
		        'settings' => 'logo'
		    )));
	    }

	   
	    
	    /* Typo */
	    public function cryptlight_init_ova_typography($wp_customize){


	    		/* Body Pane ******************************/
				$wp_customize->add_section( 'typo_general' , array(
				    'title'      => esc_html__( 'Typography', 'cryptlux' ),
				    'priority'   => 1,
				    
				) );


					/* General Typo */
					$wp_customize->add_setting( 'general_heading', array(
					  'default' => '',
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );


					/* Message */
					$wp_customize->add_setting( 'text_typo_message', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => '',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control(
						new Cryptlight_Customize_Control_Heading( 
						$wp_customize, 
						'text_typo_message', 
						array(
							'label'          => esc_html__('Text Font','cryptlux'),
				            'section'        => 'typo_general',
				            'settings'       => 'text_typo_message',
						) )
					);

						/* Font Size */
						$wp_customize->add_setting( 'general_font_size', array(
						  'type' => 'theme_mod', // or 'option'
						  'capability' => 'edit_theme_options',
						  'theme_supports' => '', // Rarely needed.
						  'default' => '16px',
						  'transport' => 'refresh', // or postMessage
						  'sanitize_callback' => 'sanitize_text_field' // Get function name 
						  
						) );
						
						$wp_customize->add_control('general_font_size', array(
							'label' => esc_html__('Font Size','cryptlux'),
							'description' => esc_html__('Example: 16px, 1.2em','cryptlux'),
							'section' => 'typo_general',
							'settings' => 'general_font_size',
							'type' 		=>'text'
						));

						/* Line Height */
						$wp_customize->add_setting( 'general_line_height', array(
						  'type' => 'theme_mod', // or 'option'
						  'capability' => 'edit_theme_options',
						  'theme_supports' => '', // Rarely needed.
						  'default' => '23px',
						  'transport' => 'refresh', // or postMessage
						  'sanitize_callback' => 'sanitize_text_field' // Get function name 
						  
						) );
						
						$wp_customize->add_control('general_line_height', array(
							'label' => esc_html__('Line height','cryptlux'),
							'description' => esc_html__('Example: 23px, 1.6em','cryptlux'),
							'section' => 'typo_general',
							'settings' => 'general_line_height',
							'type' 		=>'text'
						));


						/* Letter Space */
						$wp_customize->add_setting( 'general_letter_space', array(
						  'type' => 'theme_mod', // or 'option'
						  'capability' => 'edit_theme_options',
						  'theme_supports' => '', // Rarely needed.
						  'default' => '0px',
						  'transport' => 'refresh', // or postMessage
						  'sanitize_callback' => 'sanitize_text_field' // Get function name 
						  
						) );
						
						$wp_customize->add_control('general_letter_space', array(
							'label' => esc_html__('Letter Spacing','cryptlux'),
							'description' => esc_html__('Example: 0px, 0.5em','cryptlux'),
							'section' => 'typo_general',
							'settings' => 'general_letter_space',
							'type' 		=>'text'
						));




				$wp_customize->add_control(
					new Cryptlight_Customize_Control_Heading( 
					$wp_customize, 
					'general_heading', 
					array(
						'label'          => esc_html__('Primary Font','cryptlux'),
			            'section'        => 'typo_general',
			            'settings'       => 'general_heading',
					) )
				);


				/* General Font */
				$wp_customize->add_setting( 'primary_font',
					array(
						'default' => cryptlight_default_primary_font(),
						'sanitize_callback' => 'cryptlight_google_font_sanitization'
					)
				);
					$wp_customize->add_control( new Cryptlight_Google_Font_Select_Custom_Control( $wp_customize, 'primary_font',
						array(
							'label' => esc_html__( 'Primary Font', 'cryptlux' ),
							'section' => 'typo_general',
							'input_attrs' => array(
								'font_count' => 'all',
								'orderby' => 'popular',
							),
						)
					) );
							



				/* Custom Font */
				/* Message */
				$wp_customize->add_setting( 'custom_font_message', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new Cryptlight_Customize_Control_Heading( 
					$wp_customize, 
					'custom_font_message', 
					array(
						'label'          => esc_html__('Custom Font','cryptlux'),
			            'section'        => 'typo_general',
			            'settings'       => 'custom_font_message',
					) )
				);


					$wp_customize->add_control(
						new Cryptlight_Customize_Control_Heading( 
						$wp_customize, 
						'custom_font_message', 
						array(
							'label'          => esc_html__('Custom Font','cryptlux'),
				            'section'        => 'typo_general',
				            'settings'       => 'custom_font_message',
						) )
					);

					$wp_customize->add_setting( 'ova_custom_font', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => '',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );

					$wp_customize->add_control('ova_custom_font', array(
						'label' => esc_html__('Custom Font','cryptlux'),
						'description' => esc_html__('Step 1: Insert font-face in style.css file: Refer https://www.w3schools.com/cssref/css3_pr_font-face_rule.asp. Step 2: Insert font-family and font-weight like format: 
							["Perpetua", "Regular:Bold:Italic:Light"] | ["Name-Font", "Regular:Bold:Italic:Light"]. Step 3: Refresh customize page to display new font in dropdown font field.','cryptlux'),
						'section' => 'typo_general',
						'settings' => 'ova_custom_font',
						'type' =>'textarea'
					));
				

	    }


	     /* Color */
	    public function cryptlight_init_ova_color( $wp_customize ){

	    	/* Body Pane ******************************/
			$wp_customize->add_section( 'color_section' , array(
			    'title'      => esc_html__( 'Color', 'cryptlux' ),
			    'priority'   => 2,
			    // 'panel' => 'typo_panel',
			) );

				$wp_customize->add_setting( 'primary_color', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'transport' => 'refresh', // or postMessage
				  'default'		=> '#3772FF',
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'primary_color', 
					array(
						'label'          => esc_html__("Primary",'cryptlux'),
			            'section'        => 'color_section',
			            'settings'       => 'primary_color',

					) ) 
				);

				

				$wp_customize->add_setting( 'text_color', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default'		=> '#6D747C',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'text_color', 
					array(
						'label'          => esc_html__("Text",'cryptlux'),
			            'section'        => 'color_section',
			            'settings'       => 'text_color',
					) ) 
				);

				

	    }


	    /* Layout */
	    public function cryptlight_init_ova_layout( $wp_customize ){

	    	$wp_customize->add_section( 'layout_section' , array(
			    'title'      => esc_html__( 'Layout', 'cryptlux' ),
			    'priority'   => 2,
			) );


	    		$wp_customize->add_setting( 'global_preload', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'yes',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_preload', array(
					'label' => esc_html__('Preload','cryptlux'),
					'section' => 'layout_section',
					'settings' => 'global_preload',
					'type' =>'select',
					'choices' => array(
						'yes' => esc_html__('Yes', 'cryptlux'),
						'no' => esc_html__('No', 'cryptlux')
					)
				));

				$wp_customize->add_setting( 'global_boxed_container_width', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '1290',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_boxed_container_width', array(
					'label' => esc_html__('Container (px)','cryptlux'),
					'section' => 'layout_section',
					'settings' => 'global_boxed_container_width',
					'type' =>'number',
					'default' => '1170'
				));

				$wp_customize->add_setting( 'global_layout', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'layout_2r',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_layout', array(
					'label' => esc_html__('Layout','cryptlux'),
					'section' => 'layout_section',
					'settings' => 'global_layout',
					'type' =>'select',
					'choices' => apply_filters( 'cryptlight_define_layout', '' )
				));

				$wp_customize->add_setting( 'global_sidebar_width', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '320',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_sidebar_width', array(
					'label' => esc_html__('Sidebar Width (px)','cryptlux'),
					'section' => 'layout_section',
					'settings' => 'global_sidebar_width',
					'type' =>'number'
				));
				

				

				$wp_customize->add_setting( 'global_wide_site', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'wide',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_wide_site', array(
					'label' => esc_html__('Wide Site','cryptlux'),
					'section' => 'layout_section',
					'settings' => 'global_wide_site',
					'type' =>'select',
					'choices' => apply_filters('cryptlight_define_wide_boxed', '')
				));

				
				$wp_customize->add_setting( 'global_boxed_offset', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '20',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_boxed_offset', array(
					'label' => esc_html__('Boxed Offset (px)','cryptlux'),
					'section' => 'layout_section',
					'settings' => 'global_boxed_offset',
					'type' =>'number',
					'default' => '20'
				));

	    }

	    /* Header */
	    public function cryptlight_init_ova_header( $wp_customize ){

	    	$wp_customize->add_section( 'header_section' , array(
			    'title'      => esc_html__( 'Header', 'cryptlux' ),
			    'priority'   => 3,
			) );

				$wp_customize->add_setting( 'global_header', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_header', array(
					'label' => esc_html__('Header Default','cryptlux'),
					'description' => esc_html__('This isn\'t effect in Blog' ,'cryptlux'),
					'section' => 'header_section',
					'settings' => 'global_header',
					'type' =>'select',
					'choices' => apply_filters('cryptlight_list_header', '')
				));

	    }

	    /* Footer */
	    public function cryptlight_init_ova_footer( $wp_customize ){

	    	$wp_customize->add_section( 'footer_section' , array(
			    'title'      => esc_html__( 'Footer', 'cryptlux' ),
			    'priority'   => 4,
			) );

				$wp_customize->add_setting( 'global_footer', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_footer', array(
					'label' => esc_html__('Footer Default','cryptlux'),
					'description' => esc_html__('This isn\'t effect in Blog' ,'cryptlux'),
					'section' => 'footer_section',
					'settings' => 'global_footer',
					'type' =>'select',
					'choices' => apply_filters('cryptlight_list_footer', '')
				));

	    }


	    /* Blog */
	    public function cryptlight_init_ova_blog( $wp_customize ){

	    	$wp_customize->add_panel( 'blog_panel', array(
			    'title'      => esc_html__( 'Blog', 'cryptlux' ),
			    'priority' => 5,
			) );

				$wp_customize->add_section( 'blog_section' , array(
				    'title'      => esc_html__( 'Archive', 'cryptlux' ),
				    'priority'   => 30,
				    'panel' => 'blog_panel',
				) );

					$wp_customize->add_setting( 'blog_template', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control('blog_template', array(
						'label' => esc_html__('Type','cryptlux'),
						'section' => 'blog_section',
						'settings' => 'blog_template',
						'type' =>'select',
						'choices' => array(
							'default' => esc_html__('Default', 'cryptlux')
						)
					));

					$wp_customize->add_setting( 'blog_layout', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'layout_2r',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control('blog_layout', array(
						'label' => esc_html__('Layout','cryptlux'),
						'section' => 'blog_section',
						'settings' => 'blog_layout',
						'type' =>'select',
						'choices' => apply_filters( 'cryptlight_define_layout', '' )
					));
					

					$wp_customize->add_setting( 'blog_header', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control('blog_header', array(
						'label' => esc_html__('Header','cryptlux'),
						'section' => 'blog_section',
						'settings' => 'blog_header',
						'type' =>'select',
						'choices' => apply_filters('cryptlight_list_header', '')
					));

					$wp_customize->add_setting( 'blog_footer', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control('blog_footer', array(
						'label' => esc_html__('Footer','cryptlux'),
						'section' => 'blog_section',
						'settings' => 'blog_footer',
						'type' =>'select',
						'choices' => apply_filters('cryptlight_list_footer', '')
					));


				$wp_customize->add_section( 'single_section' , array(
				    'title'      => esc_html__( 'Single', 'cryptlux' ),
				    'priority'   => 30,
				    'panel' => 'blog_panel',
				) );	

					$wp_customize->add_setting( 'single_layout', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'layout_2r',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control('single_layout', array(
						'label' => esc_html__('Layout','cryptlux'),
						'section' => 'single_section',
						'settings' => 'single_layout',
						'type' =>'select',
						'choices' => apply_filters( 'cryptlight_define_layout', '' )
					));
					

					$wp_customize->add_setting( 'single_header', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control('single_header', array(
						'label' => esc_html__('Header','cryptlux'),
						'section' => 'single_section',
						'settings' => 'single_header',
						'type' =>'select',
						'choices' => apply_filters('cryptlight_list_header', '')
					));

					$wp_customize->add_setting( 'single_footer', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control('single_footer', array(
						'label' => esc_html__('Footer','cryptlux'),
						'section' => 'single_section',
						'settings' => 'single_footer',
						'type' =>'select',
						'choices' => apply_filters('cryptlight_list_footer', '')
					));

	    }

	    

	 


		
	}

}

new Cryptlight_Customize();






