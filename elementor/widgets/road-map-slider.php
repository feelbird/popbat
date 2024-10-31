<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Cryptlight_Elementor_Road_Map_Slider extends Widget_Base {

	public function get_name() {
		return 'cryptlight_elementor_road_map_slider';
	}

	public function get_title() {
		return esc_html__( 'Road Map Slider', 'cryptlux' );
	}

	public function get_icon() {
		return 'eicon-time-line';
	}

	public function get_categories() {
		return [ 'cryptlux' ];
	}

	public function get_script_depends() {
		wp_enqueue_style( 'owl-carousel', get_theme_file_uri('/assets/libs/carousel/assets/owl.carousel.min.css') );
		wp_enqueue_script( 'owl-carousel', get_theme_file_uri('/assets/libs/carousel/owl.carousel.min.js'), array('jquery'), false, true );
		return [ 'cryptlight-elementor-road-map-slider' ];
	}
	
	// Add Your Controll In This Function
	protected function _register_controls() {

		$this->start_controls_section(
			'section_road_map_slider',
			[
				'label' => esc_html__( 'Road Map Slider', 'cryptlux' ),
			]
		);

			$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'date',
					[
						'label' 		=> esc_html__( 'Date', 'cryptlux' ),
						'type' 			=> Controls_Manager::DATE_TIME,
						'default'		=> date( 'Y-m-d h:i', current_time('timestamp')),
						'description' 	=> sprintf( esc_html__( 'Date set according to your timezone: %s.', 'cryptlux' ), Utils::get_timezone_string() ),
					]
				);

				$repeater->add_control(
					'description',
					[
						'label' 		=> esc_html__( 'Description', 'cryptlux' ),
						'type' 			=> Controls_Manager::TEXTAREA,
						'default' 		=> esc_html__('Add Your Description Text Here', 'cryptlux' ),
					]
				);

				$repeater->add_control(
					'timeline',
					[
						'label' 	=> esc_html__( 'Timeline', 'cryptlux' ),
						'type' 		=> Controls_Manager::SWITCHER,
						'label_on' 	=> esc_html__( 'Done', 'cryptlux' ),
						'label_off' => esc_html__( 'No', 'cryptlux' ),
						'default' 	=> 'no',
					]
				);

			$this->add_control(
				'road_map_items',
				[
					'label' 	=> esc_html__( 'Items', 'cryptlux' ),
					'type' 		=> Controls_Manager::REPEATER,
					'fields' 	=> $repeater->get_controls(),
					'default' 	=> [
						[
							'date' 			=> esc_html__( '2021-03-01', 'cryptlux' ),
							'description' 	=> esc_html__('Lorem Ipsum is simply dummy text of the', 'cryptlux' ),
							'timeline' 		=> 'yes',
						],
						[
							'date' 			=> esc_html__( '2021-05-01', 'cryptlux' ),
							'description' 	=> esc_html__('Lorem Ipsum is simply dummy text of the', 'cryptlux' ),
							'timeline' 		=> 'yes',
						],
						[
							'date' 			=> esc_html__( '2021-07-01', 'cryptlux' ),
							'description' 	=> esc_html__('Lorem Ipsum is simply dummy text of the', 'cryptlux' ),
							'timeline' 		=> 'yes',
						],
						[
							'date' 			=> esc_html__( '2021-09-01', 'cryptlux' ),
							'description' 	=> esc_html__('Lorem Ipsum is simply dummy text of the', 'cryptlux' ),
							'timeline' 		=> 'no',
						],
						[
							'date' 			=> esc_html__( '2021-11-01', 'cryptlux' ),
							'description' 	=> esc_html__('Lorem Ipsum is simply dummy text of the', 'cryptlux' ),
							'timeline' 		=> 'no',
						],
						[
							'date' 			=> esc_html__( '2022-01-01', 'cryptlux' ),
							'description' 	=> esc_html__('Lorem Ipsum is simply dummy text of the', 'cryptlux' ),
							'timeline' 		=> 'no',
						],
						[
							'date' 			=> esc_html__( '2022-03-01', 'cryptlux' ),
							'description' 	=> esc_html__('Lorem Ipsum is simply dummy text of the', 'cryptlux' ),
							'timeline' 		=> 'no',
						],
						[
							'date' 			=> esc_html__( '2022-05-01', 'cryptlux' ),
							'description' 	=> esc_html__('Lorem Ipsum is simply dummy text of the', 'cryptlux' ),
							'timeline' 		=> 'no',
						],
						[
							'date' 			=> esc_html__( '2022-07-01', 'cryptlux' ),
							'description' 	=> esc_html__('Lorem Ipsum is simply dummy text of the', 'cryptlux' ),
							'timeline' 		=> 'no',
						],
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => esc_html__( 'Additional Options', 'cryptlux' ),
			]
		);

			$this->add_control(
				'item_number',
				[
					'label'       => esc_html__( 'Item Number', 'cryptlux' ),
					'type'        => Controls_Manager::NUMBER,
					'default'     => 5,
				]
			);

			$this->add_control(
				'slides_to_scroll',
				[
					'label'       => esc_html__( 'Slides to Scroll', 'cryptlux' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Set how many slides are scrolled per swipe.', 'cryptlux' ),
					'default'     => 1,
				]
			);

			$this->add_control(
				'pause_on_hover',
				[
					'label'   => esc_html__( 'Pause on Hover', 'cryptlux' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'cryptlux' ),
						'no'  => esc_html__( 'No', 'cryptlux' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'infinite',
				[
					'label'   => esc_html__( 'Infinite Loop', 'cryptlux' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'no',
					'options' => [
						'yes' => esc_html__( 'Yes', 'cryptlux' ),
						'no'  => esc_html__( 'No', 'cryptlux' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay',
				[
					'label'   => esc_html__( 'Autoplay', 'cryptlux' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'cryptlux' ),
						'no'  => esc_html__( 'No', 'cryptlux' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay_speed',
				[
					'label'     => esc_html__( 'Autoplay Speed', 'cryptlux' ),
					'type'      => Controls_Manager::NUMBER,
					'default'   => 3000,
					'step'      => 500,
					'condition' => [
						'autoplay' => 'yes',
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'smartspeed',
				[
					'label'   => esc_html__( 'Smart Speed', 'cryptlux' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 500,
				]
			);

			$this->add_control(
				'dot_control',
				[
					'label'   => esc_html__( 'Show Dots', 'cryptlux' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'no',
					'options' => [
						'yes' => esc_html__( 'Yes', 'cryptlux' ),
						'no'  => esc_html__( 'No', 'cryptlux' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'nav_control',
				[
					'label'   => esc_html__( 'Show Nav', 'cryptlux' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'cryptlux' ),
						'no'  => esc_html__( 'No', 'cryptlux' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'nav_left',
				[
					'label'       	=> esc_html__( 'Icon Left', 'cryptlux' ),
					'type'        	=> Controls_Manager::TEXT,
					'default'     	=> esc_html__( 'iconly-Arrow-Left-2 icli', 'cryptlux' ),
					'condition' 	=> [
						'nav_control' => 'yes',
					],
				]
			);

			$this->add_control(
				'nav_right',
				[
					'label'       	=> esc_html__( 'Icon Right', 'cryptlux' ),
					'type'        	=> Controls_Manager::TEXT,
					'default'     	=> esc_html__( 'iconly-Arrow-Right-2 icli', 'cryptlux' ),
					'condition' 	=> [
						'nav_control' => 'yes',
					],
				]
			);

		$this->end_controls_section();

		/* Begin Points Style */
		$this->start_controls_section(
            'points_style',
            [
                'label' => esc_html__( 'Points', 'cryptlux' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->start_controls_tabs( 'tabs_points_style' );
				
				$this->start_controls_tab(
		            'tab_points_done',
		            [
		                'label' => esc_html__( 'Done', 'cryptlux' ),
		            ]
		        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'point_bg_gradient',
							'label' 	=> esc_html__( 'Background Gradient', 'cryptlux' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item.done .timeline .points',
						]
					);

			        $this->add_group_control(
			            Group_Control_Border::get_type(), [
			                'name' 		=> 'points_border',
			                'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item.done .timeline .points',
			                'separator' => 'before',
			            ]
			        );

			        $this->add_control(
			            'points_border_radius',
			            [
			                'label' 		=> esc_html__( 'Border Radius', 'cryptlux' ),
			                'type' 			=> Controls_Manager::DIMENSIONS,
			                'size_units' 	=> [ 'px', '%' ],
			                'selectors' 	=> [
			                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item.done .timeline .points' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_points_not_done',
		            [
		                'label' => esc_html__( 'Is not Done', 'cryptlux' ),
		            ]
		        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'points_not_done_bg_gradient',
							'label' 	=> esc_html__( 'Background Gradient', 'cryptlux' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .timeline .points',
						]
					);

			        $this->add_group_control(
			            Group_Control_Border::get_type(), [
			                'name' 		=> 'points_border_not_done',
			                'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .timeline .points',
			                'separator' => 'before',
			            ]
			        );

			        $this->add_control(
			            'points_border_radius_not_done',
			            [
			                'label' 		=> esc_html__( 'Border Radius', 'cryptlux' ),
			                'type' 			=> Controls_Manager::DIMENSIONS,
			                'size_units' 	=> [ 'px', '%' ],
			                'selectors' 	=> [
			                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .timeline .points' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();
			$this->end_controls_tabs();

        $this->end_controls_section();
        /* End Points Style */

        /* Begin Line Style */
		$this->start_controls_section(
            'line_style',
            [
                'label' => esc_html__( 'Line', 'cryptlux' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->start_controls_tabs( 'tabs_line_style' );
				
				$this->start_controls_tab(
		            'tab_line_done',
		            [
		                'label' => esc_html__( 'Done', 'cryptlux' ),
		            ]
		        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'line_done_bg_gradient',
							'label' 	=> esc_html__( 'Background Gradient', 'cryptlux' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item.done:before',
						]
					);

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_line_not_done',
		            [
		                'label' => esc_html__( 'Is not Done', 'cryptlux' ),
		            ]
		        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'line_not_done_bg_gradient',
							'label' 	=> esc_html__( 'Background Gradient', 'cryptlux' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item:before',
						]
					);

		        $this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_responsive_control(
	            'timeline_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .timeline' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
        /* End Line Style */

        /* Begin Content Style */
		$this->start_controls_section(
            'content_style',
            [
                'label' => esc_html__( 'Content', 'cryptlux' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->start_controls_tabs( 'tabs_content_style' );
				
				$this->start_controls_tab(
		            'tab_content_normal',
		            [
		                'label' => esc_html__( 'Normal', 'cryptlux' ),
		            ]
		        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'content_bg_gradient_normal',
							'label' 	=> esc_html__( 'Background Gradient', 'cryptlux' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content',
						]
					);

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_content_hover',
		            [
		                'label' => esc_html__( 'Hover', 'cryptlux' ),
		            ]
		        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'content_bg_gradient_hover',
							'label' 	=> esc_html__( 'Background Gradient', 'cryptlux' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item:hover .content',
						]
					);

		        $this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_group_control(
	            Group_Control_Border::get_type(), [
	                'name' 		=> 'content_border',
	                'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content',
	                'separator' => 'before',
	            ]
	        );

	        $this->add_control(
	            'content_border_color_hover',
	            [
	                'label' 	=> esc_html__( 'Border Color Hover', 'cryptlux' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item:hover .content' => 'border-color: {{VALUE}}',
	                ],
	            ]
	        );

	        $this->add_control(
	            'content_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'content_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'content_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' 		=> 'content_box_shadow',
					'label' 	=> esc_html__( 'Box Shadow', 'cryptlux' ),
					'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content',
				]
			);

        $this->end_controls_section();
        /* End Content Style */

        /* Begin Date Style */
		$this->start_controls_section(
            'date_style',
            [
                'label' => esc_html__( 'Date', 'cryptlux' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'date_typography',
					'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content .date',
				]
			);

			$this->start_controls_tabs( 'tabs_date_style' );

				$this->start_controls_tab(
		            'tab_date_normal',
		            [
		                'label' => esc_html__( 'Normal', 'cryptlux' ),
		            ]
		        );

					$this->add_control(
			            'date_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content .date' => 'color: {{VALUE}}',
			                ],
			            ]
			        );

				$this->end_controls_tab();

				$this->start_controls_tab(
		            'tab_date_hover',
		            [
		                'label' => esc_html__( 'Hover', 'cryptlux' ),
		            ]
		        );

					$this->add_control(
			            'date_color_hover',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item:hover .content .date' => 'color: {{VALUE}}',
			                ],
			            ]
			        );

				$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_responsive_control(
	            'date_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content .date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'date_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content .date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
        /* End Date Style */

        /* Begin Description Style */
		$this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__( 'Description', 'cryptlux' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'description_typography',
					'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content .description',
				]
			);

			$this->start_controls_tabs( 'tabs_description_style' );

				$this->start_controls_tab(
		            'tab_description_normal',
		            [
		                'label' => esc_html__( 'Normal', 'cryptlux' ),
		            ]
		        );

					$this->add_control(
			            'description_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content .description' => 'color: {{VALUE}}',
			                ],
			            ]
			        );

				$this->end_controls_tab();

				$this->start_controls_tab(
		            'tab_description_hover',
		            [
		                'label' => esc_html__( 'Hover', 'cryptlux' ),
		            ]
		        );

					$this->add_control(
			            'description_color_hover',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item:hover .content .description' => 'color: {{VALUE}}',
			                ],
			            ]
			        );

				$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_responsive_control(
	            'description_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'description_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-stage .owl-item .item .content .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
        /* End Title Style */

        /* Begin Nav Style */
		$this->start_controls_section(
            'nav_style',
            [
                'label' => esc_html__( 'Nav', 'cryptlux' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'nav_typography',
					'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-nav button i',
				]
			);

			$this->add_responsive_control(
				'nav_size',
				[
					'label' 	=> esc_html__( 'Size', 'cryptlux' ),
					'type' 		=> Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'tabs_nav_style' );

				$this->start_controls_tab(
		            'tab_nav_normal',
		            [
		                'label' => esc_html__( 'Normal', 'cryptlux' ),
		            ]
		        );

					$this->add_control(
			            'nav_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-nav button i' => 'color: {{VALUE}}',
			                ],
			            ]
			        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'nav_bg_gradient_normal',
							'label' 	=> esc_html__( 'Background Gradient', 'cryptlux' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-nav button',
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
		            'tab_nav_hover',
		            [
		                'label' => esc_html__( 'Hover', 'cryptlux' ),
		            ]
		        );

					$this->add_control(
			            'nav_color_hover',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-nav button:hover i' => 'color: {{VALUE}}',
			                ],
			            ]
			        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'nav_bg_gradient_hover',
							'label' 	=> esc_html__( 'Background Gradient', 'cryptlux' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-nav button:hover',
						]
					);

				$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_group_control(
	            Group_Control_Border::get_type(), [
	                'name' 		=> 'nav_border',
	                'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-nav button',
	                'separator' => 'before',
	            ]
	        );

	        $this->add_control(
	            'nav_border_color_hover',
	            [
	                'label' 	=> esc_html__( 'Border Color Hover', 'cryptlux' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-nav button:hover' => 'border-color: {{VALUE}}',
	                ],
	            ]
	        );

	        $this->add_control(
	            'nav_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
				'nav_top',
				[
					'label' 	=> esc_html__( 'Top', 'cryptlux' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'size_units' 	=> [ 'px', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);

	        $this->add_responsive_control(
	            'nav_margin_prev',
	            [
	                'label' 		=> esc_html__( 'Margin Prev', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'nav_margin_next',
	            [
	                'label' 		=> esc_html__( 'Margin Next', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
        /* End Nav Style */

        /* Begin Dots Style */
		$this->start_controls_section(
            'dots_style',
            [
                'label' => esc_html__( 'Dots', 'cryptlux' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

			$this->start_controls_tabs( 'tabs_dots_style' );
				
				$this->start_controls_tab(
		            'tab_dots_normal',
		            [
		                'label' => esc_html__( 'Normal', 'cryptlux' ),
		            ]
		        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'dots_bg_gradient_normal',
							'label' 	=> esc_html__( 'Background Gradient', 'cryptlux' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-dots .owl-dot span',
						]
					);

					$this->add_responsive_control(
						'dots_size',
						[
							'label' 	=> esc_html__( 'Size', 'cryptlux' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
			            'dots_border_radius',
			            [
			                'label' 		=> esc_html__( 'Border Radius', 'cryptlux' ),
			                'type' 			=> Controls_Manager::DIMENSIONS,
			                'size_units' 	=> [ 'px', '%' ],
			                'selectors' 	=> [
			                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_dots_hover',
		            [
		                'label' => esc_html__( 'Hover', 'cryptlux' ),
		            ]
		        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'dots_bg_gradient_hover',
							'label' 	=> esc_html__( 'Background Gradient', 'cryptlux' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-dots .owl-dot span:hover',
						]
					);

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_dots_active',
		            [
		                'label' => esc_html__( 'Active', 'cryptlux' ),
		            ]
		        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'dots_bg_gradient_active',
							'label' 	=> esc_html__( 'Background Gradient', 'cryptlux' ),
							'types' 	=> [ 'classic', 'gradient' ],
							'exclude' 	=> [ 'image' ],
							'selector' 	=> '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-dots .owl-dot.active span',
						]
					);

					$this->add_responsive_control(
						'dots_width_active',
						[
							'label' 	=> esc_html__( 'Width', 'cryptlux' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-dots .owl-dot.active span' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'dots_height_active',
						[
							'label' 	=> esc_html__( 'Height', 'cryptlux' ),
							'type' 		=> Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'size_units' 	=> [ 'px' ],
							'selectors' 	=> [
								'{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-dots .owl-dot.active span' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
			            'dots_border_radius_active',
			            [
			                'label' 		=> esc_html__( 'Border Radius', 'cryptlux' ),
			                'type' 			=> Controls_Manager::DIMENSIONS,
			                'size_units' 	=> [ 'px', '%' ],
			                'selectors' 	=> [
			                    '{{WRAPPER}} .road-map-slider .road-map-wrapper.owl-carousel .owl-dots .owl-dot.active span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();
			$this->end_controls_tabs();

        $this->end_controls_section();
        /* End Dots Style */
	}

	// Render Template Here
	protected function render() {

		$settings 	= $this->get_settings();

		$items 		= $settings['road_map_items'];

		$data_options['items']              = $settings['item_number'];
		$data_options['slideBy']            = $settings['slides_to_scroll'];
		$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplayTimeout']    = $settings['autoplay_speed'];
		$data_options['smartSpeed']         = $settings['smartspeed'];
		$data_options['dots']               = $settings['dot_control'] === 'yes' ? true : false;
		$data_options['nav']                = $settings['nav_control'] === 'yes' ? true : false;
		$data_options['nav_left']           = $settings['nav_left'];
		$data_options['nav_right']          = $settings['nav_right'];

		?>
		<?php if ( $items && is_array( $items ) ): ?>
		 	<div class="road-map-slider">
		 		<div class="road-map-wrapper owl-carousel owl-theme" data-options="<?php echo esc_attr( json_encode( $data_options ) ); ?>">
		 			<?php foreach ( $items as $item ): 
		 				$time_stamp 	= strtotime( $item['date'] );
						$month 			= date_i18n('F', $time_stamp);
						$year 			= date_i18n('Y', $time_stamp);
						$description 	= $item['description'];
						$timeline 		= $item['timeline'];
						$done 			= '';
						if ( 'yes' == $timeline ) {
							$done = ' done';
						}
		 			?>
		 				<div class="item<?php echo esc_attr( $done ); ?>">
		 					<div class="timeline">
		 						<div class="points"></div>
		 					</div>
		 					<div class="content">
		 						<h2 class="date"><?php echo esc_html( $month ) . ' ' . esc_html( $year ); ?></h2>
		 						<p class="description"><?php echo esc_html( $description ); ?></p>
		 					</div>
		 				</div>
		 			<?php endforeach; ?>
		 		</div>
		 	</div>
		<?php
		endif;
	}

	
}
$widgets_manager->register_widget_type( new Cryptlight_Elementor_Road_Map_Slider() );