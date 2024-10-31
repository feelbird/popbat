<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Cryptlight_Elementor_Icon extends Widget_Base {

	
	public function get_name() {
		return 'cryptlight_elementor_icon';
	}

	public function get_title() {
		return esc_html__( 'Icon', 'cryptlux' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'cryptlux' ];
	}

	public function get_script_depends() {
		return [ 'cryptlight-elementor-icon' ];
	}
	
	// Add Your Controll In This Function
	protected function _register_controls() {

		/* Begin section icon */
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon', 'cryptlux' ),
			]
		);	
			
			$this->add_control(
	            'icon_type',
	            [
	                'label' 	=> esc_html__( 'Type', 'cryptlux' ),
	                'type' 		=> Controls_Manager::SELECT,
	                'options' 	=> [
	                    'v1' => esc_html__( 'Type 1', 'cryptlux' ),
	                    'v2' => esc_html__( 'Type 2', 'cryptlux' ),
	                    'v3' => esc_html__( 'Type 3', 'cryptlux' ),
	                ],
	                'default' 	=> 'v1',
	            ]
	        );

			$this->add_control(
				'icon_class',
				[
					'label' 	=> esc_html__( 'Icon Class', 'cryptlux' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> 'fa fa-play',
				]
			);


			$this->add_control(
				'icon_url_video',
				[
					'label' 	=> esc_html__( 'URL Video', 'cryptlux' ),
					'type' 		=> Controls_Manager::TEXT,
					'condition' => [
						'icon_type' => 'v1',
					],
				]
			);

			$this->add_control(
				'icon_text',
				[
					'label' 	=> esc_html__( 'Text', 'cryptlux' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'Video intro', 'cryptlux' ),
				]
			);

			$this->add_control(
	            'link',
	            [
	                'label' 	=> esc_html__( 'Link', 'cryptlux' ),
	                'type' 		=> Controls_Manager::URL,
	                'dynamic' 	=> [
	                    'active' => true,
	                ],
	                'condition' => [
	                	'icon_url_video' => '',
	                ],
	            ]
	        );

	        $this->add_control(
	            'type',
	            [
	                'label' 	=> esc_html__( 'Type', 'cryptlux' ),
	                'type' 		=> Controls_Manager::SELECT,
	                'options' 	=> [
	                    'normal' => esc_html__( 'Normal', 'cryptlux' ),
	                    'email' => esc_html__( 'Email', 'cryptlux' ),
	                    'phone' => esc_html__( 'Phone', 'cryptlux' ),
	                ],
	                'default' 	=> 'normal',
	                'condition' => [
	                	'link[url]!' => '',
	                ],
	            ]
	        );

	        $this->add_control(
				'video_options',
				[
					'label' 	=> esc_html__( 'Video Options', 'cryptlux' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'autoplay_video',
				[
					'label' 	=> esc_html__( 'Autoplay', 'cryptlux' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'cryptlux' ),
					'label_off' => esc_html__( 'No', 'cryptlux' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'mute_video',
				[
					'label' 	=> esc_html__( 'Mute', 'cryptlux' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'cryptlux' ),
					'label_off' => esc_html__( 'No', 'cryptlux' ),
					'default' 	=> 'no',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'loop_video',
				[
					'label' 	=> esc_html__( 'Loop', 'cryptlux' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'cryptlux' ),
					'label_off' => esc_html__( 'No', 'cryptlux' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'player_controls_video',
				[
					'label' 	=> esc_html__( 'Player Controls', 'cryptlux' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'cryptlux' ),
					'label_off' => esc_html__( 'No', 'cryptlux' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'modest_branding_video',
				[
					'label' 	=> esc_html__( 'Modest Branding', 'cryptlux' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'cryptlux' ),
					'label_off' => esc_html__( 'No', 'cryptlux' ),
					'default' 	=> 'yes',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

			$this->add_control(
				'show_info_video',
				[
					'label' 	=> esc_html__( 'Show Info', 'cryptlux' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Yes', 'cryptlux' ),
					'label_off' => esc_html__( 'No', 'cryptlux' ),
					'default' 	=> 'no',
					'condition' => [
						'icon_url_video!' => '',
					],
				]
			);

		$this->end_controls_section();
		/* End section icon */

		/* Begin section content style */
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content', 'cryptlux' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon_type' => 'v3',
				],
			]
		);

			$this->start_controls_tabs( 'tabs_content_style' );
				$this->start_controls_tab(
		            'tab_content_normal',
		            [
		                'label' => esc_html__( 'Normal', 'cryptlux' ),
		            ]
		        );

			        $this->add_control(
			            'content_background_normal',
			            [
			                'label' 	=> esc_html__( 'Background', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text' => 'background-color: {{VALUE}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_content_hover',
		            [
		                'label' => esc_html__( 'Hover', 'cryptlux' ),
		            ]
		        );

		        	$this->add_control(
			            'content_background_hover',
			            [
			                'label' 	=> esc_html__( 'Background', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text:hover' => 'background-color: {{VALUE}};',
			                ],
			            ]
			        );

			        $this->add_control(
			            'content_border_color_hover',
			            [
			                'label' 	=> esc_html__( 'Border Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text:hover' => 'border-color: {{VALUE}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_group_control(
	            Group_Control_Border::get_type(), [
	                'name' 		=> 'content_border',
	                'selector' 	=> '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text',
	                'separator' => 'before',
	            ]
	        );

	        $this->add_control(
	            'content_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' 		=> 'content_box_shadow',
					'label' 	=> esc_html__( 'Box Shadow', 'cryptlux' ),
					'selector' 	=> '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text',
				]
			);

		$this->end_controls_section();
		/* End section content style */

		/* Begin section icon style */
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'cryptlux' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);	

			$this->start_controls_tabs( 'tabs_icon_style' );
				$this->start_controls_tab(
		            'tab_icon_normal',
		            [
		                'label' => esc_html__( 'Normal', 'cryptlux' ),
		            ]
		        );

		        	$this->add_control(
			            'icon_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-icon .icon-content-view .content i' => 'color: {{VALUE}};',
			                    '{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text i' => 'color: {{VALUE}};',
			                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text i' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

			        $this->add_control(
			            'icon_background_normal',
			            [
			                'label' 	=> esc_html__( 'Background', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-icon .icon-content-view .content' => 'background-color: {{VALUE}};',
			                ],
			                'condition' => [
								'icon_type' => 'v1',
							],
			            ]
			        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'icon_bg_gradient_normal',
							'label' 	=> esc_html__( 'Background Gradient', 'cryptlux' ),
							'types' 	=> [ 'gradient' ],
							'selector' 	=> '{{WRAPPER}} .ova-icon .icon-content-view .content',
							'condition' => [
								'icon_type' => 'v1',
							],
						]
					);

			        $this->add_control(
			            'icon_border_color_normal',
			            [
			                'label' 	=> esc_html__( 'Border Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-icon .icon-content-view .content' => 'border-color: {{VALUE}};',
			                ],
			                'condition' => [
								'icon_type' => 'v1',
							],
			            ]
			        );

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_icon_hover',
		            [
		                'label' => esc_html__( 'Hover', 'cryptlux' ),
		            ]
		        );

		        	$this->add_control(
			            'icon_color_hover',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-icon .icon-content-view .content:hover i' => 'color: {{VALUE}};',
			                    '{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text:hover i' => 'color: {{VALUE}};',
			                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text:hover i' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

		        	$this->add_control(
			            'icon_background_hover',
			            [
			                'label' 	=> esc_html__( 'Background', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-icon .icon-content-view .content:hover' => 'background-color: {{VALUE}};',
			                ],
			                'condition' => [
								'icon_type' => 'v1',
							],
			            ]
			        );

			        $this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' 		=> 'icon_bg_gradient_hover',
							'label' 	=> esc_html__( 'Background Gradient', 'cryptlux' ),
							'types' 	=> [ 'gradient' ],
							'selector' 	=> '{{WRAPPER}} .ova-icon .icon-content-view .content:hover',
							'condition' => [
								'icon_type' => 'v1',
							],
						]
					);

			        $this->add_control(
			            'icon_border_color_hover',
			            [
			                'label' 	=> esc_html__( 'Border Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-icon .icon-content-view .content:hover' => 'border-color: {{VALUE}};',
			                ],
			                'condition' => [
								'icon_type' => 'v1',
							],
			            ]
			        );

		        $this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_responsive_control(
				'icon_width',
				[
					'label' 	=> esc_html__( 'Width', 'cryptlux' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-icon .icon-content-view .content' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'icon_type' => 'v1',
					],
				]
			);

			$this->add_responsive_control(
				'icon_height',
				[
					'label' 	=> esc_html__( 'Height', 'cryptlux' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-icon .icon-content-view .content' => 'height: {{SIZE}}{{UNIT}}; min-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'icon_type' => 'v1',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'icon_typography',
					'selector' 	=> '{{WRAPPER}} .ova-icon .icon-content-view .content i',
					'condition' => [
						'icon_type' => 'v1',
					],
				]
			);

			$this->add_group_control(
	            Group_Control_Border::get_type(), [
	                'name' 		=> 'icon_border',
	                'selector' 	=> '{{WRAPPER}} .ova-icon .icon-content-view .content',
	                'separator' => 'before',
	                'condition' => [
						'icon_type' => 'v1',
					],
	            ]
	        );

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' 		=> 'icon_box_shadow',
					'label' 	=> esc_html__( 'Box Shadow', 'cryptlux' ),
					'selector' 	=> '{{WRAPPER}} .ova-icon .icon-content-view .content',
					'condition' => [
						'icon_type' => 'v1',
					],
				]
			);

	        $this->add_control(
	            'icon_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-icon .icon-content-view .content'	=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	                'condition' => [
						'icon_type' => 'v1',
					],
	            ]
	        );

	        $this->add_responsive_control(
	            'content_v1_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-icon .icon-content-view .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	                'condition' => [
						'icon_type' => 'v1',
					],
	            ]
	        );

	        // Version 2

	        $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'icon_v2_typography',
					'selector' 	=> '{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text i',
					'condition' => [
						'icon_type' => 'v2',
					],
				]
			);

			$this->add_responsive_control(
	            'content_v2_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-icon .icon-view-v2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	                'condition' => [
						'icon_type' => 'v2',
					],
	            ]
	        );

	        $this->add_responsive_control(
	            'content_v2_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-icon .icon-view-v2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	                'condition' => [
						'icon_type' => 'v2',
					],
	            ]
	        );

	        // Version 3
	        $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'icon_v3_typography',
					'selector' 	=> '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text i',
					'condition' => [
						'icon_type' => 'v3',
					],
				]
			);

	        $this->add_responsive_control(
	            'content_v3_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	                'condition' => [
						'icon_type' => 'v3',
					],
	            ]
	        );

		$this->end_controls_section();
		/* End section icon style */

		/* Begin section text style */
		$this->start_controls_section(
			'section_text_style',
			[
				'label' 	=> esc_html__( 'Text', 'cryptlux' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon_type' => ['v1','v2'],
				],
			]
		);

			$this->add_control(
	            'text_color',
	            [
	                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-icon .icon-content-view .ova-text' 	=> 'color: {{VALUE}};',
	                    '{{WRAPPER}} .ova-icon .icon-content-view .ova-text a' 	=> 'color: {{VALUE}};',
	                    '{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text' 	=> 'color: {{VALUE}};',
	                    '{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text a' 	=> 'color: {{VALUE}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'text_typography',
					'selector' 	=> '{{WRAPPER}} .ova-icon .icon-content-view .ova-text',
					'condition' => [
						'link[url]' => '',
						'icon_type' => 'v1',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'link_typography',
					'selector' 	=> '{{WRAPPER}} .ova-icon .icon-content-view .ova-text a',
					'condition' => [
						'link[url]!' => '',
						'icon_type' => 'v1',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'text_v2_typography',
					'selector' 	=> '{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text',
					'condition' => [
						'link[url]' => '',
						'icon_type' => 'v2',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'link_v2_typography',
					'selector' 	=> '{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text a',
					'condition' => [
						'link[url]!' => '',
						'icon_type' => 'v2',
					],
				]
			);

			$this->add_responsive_control(
	            'text_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-icon .icon-content-view .ova-text' 	=> 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                    '{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text' 	=> 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'text_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-icon .icon-content-view .ova-text' 	=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                    '{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text' 	=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_control(
				'link_style',
				[
					'label' 	=> esc_html__( 'Link Style', 'cryptlux' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'link[url]!' => '',
					],
				]
			);

			$this->add_control(
	            'link_color_hover',
	            [
	                'label' 	=> esc_html__( 'Color Hover', 'cryptlux' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-icon .icon-content-view .ova-text a:hover' 	=> 'color: {{VALUE}};',
	                    '{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text a:hover' 	=> 'color: {{VALUE}};',
	                ],
	                'condition' => [
						'link[url]!' => '',
					],
	            ]
	        );

		$this->end_controls_section();
		/* End section text style */

		/* Begin section text version 3 style */
		$this->start_controls_section(
			'section_text_v3_style',
			[
				'label' 	=> esc_html__( 'Text', 'cryptlux' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon_type' => 'v3',
				],
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'text_v3_typography',
					'selector' 	=> '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text a, {{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text .text',
				]
			);

			$this->start_controls_tabs( 'tabs_text_v3_style' );

				$this->start_controls_tab(
		            'tab_text_v3_normal',
		            [
		                'label' => esc_html__( 'Normal', 'cryptlux' ),
		            ]
		        );

					$this->add_control(
			            'text_v3_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text a' 		=> 'color: {{VALUE}}',
			                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text .text' 	=> 'color: {{VALUE}}',
			                ],
			            ]
			        );

				$this->end_controls_tab();

				$this->start_controls_tab(
		            'tab_text_v3_hover',
		            [
		                'label' => esc_html__( 'Hover', 'cryptlux' ),
		            ]
		        );

					$this->add_control(
			            'text_v3_color_hover',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text:hover a' 		=> 'color: {{VALUE}}',
			                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text:hover .text' 	=> 'color: {{VALUE}}',
			                ],
			            ]
			        );

				$this->end_controls_tab();
			$this->end_controls_tabs();

	        $this->add_responsive_control(
	            'text_v3_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text a' 		=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                    '{{WRAPPER}} .ova-icon .icon-view-v3 .icon-v3-text .text' 	=> 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

		$this->end_controls_section();
		/* End section text style */

		/* Begin section text style */
		$this->start_controls_section(
			'section_line_style',
			[
				'label' 	=> esc_html__( 'Line', 'cryptlux' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon_type' => ['v1', 'v2'],
				],
			]
		);

			$this->add_control(
	            'line_bg',
	            [
	                'label' 	=> esc_html__( 'Background', 'cryptlux' ),
	                'type' 		=> Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .ova-icon .icon-content-view .ova-text:before' => 'background-color: {{VALUE}};',
	                    '{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text:before' 	=> 'background-color: {{VALUE}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
				'line_width',
				[
					'label' 	=> esc_html__( 'Width', 'cryptlux' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-icon .icon-content-view .ova-text:before' => 'width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text:before' 	=> 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'line_height',
				[
					'label' 	=> esc_html__( 'Height', 'cryptlux' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-icon .icon-content-view .ova-text:before' => 'height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text:before' 	=> 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'line_top',
				[
					'label' 	=> esc_html__( 'Top', 'cryptlux' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-icon .icon-content-view .ova-text:before' => 'top: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text:before' 	=> 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'line_right',
				[
					'label' 	=> esc_html__( 'Right', 'cryptlux' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-icon .icon-content-view .ova-text:before' => 'right: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text:before' 	=> 'right: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'line_bottom',
				[
					'label' 	=> esc_html__( 'Bottom', 'cryptlux' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-icon .icon-content-view .ova-text:before' => 'bottom: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text:before' 	=> 'bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'line_left',
				[
					'label' 	=> esc_html__( 'Left', 'cryptlux' ),
					'type' 		=> Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> '%',
					],
					'tablet_default' => [
						'unit' => '%',
					],
					'mobile_default' => [
						'unit' => '%',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-icon .icon-content-view .ova-text:before' => 'left: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-text:before' 	=> 'left: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'line_left_options',
				[
					'label' 	=> esc_html__( 'Left Border', 'cryptlux' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'icon_type' => 'v2',
					],
				]
			);

				$this->add_group_control(
		            Group_Control_Border::get_type(), [
		                'name' 		=> 'icon_bottom_border',
		                'selector' 	=> '{{WRAPPER}} .ova-icon .icon-view-v2:before',
		                'separator' => 'before',
		                'condition' => [
							'icon_type' => 'v2',
						],
		            ]
		        );

		        $this->add_responsive_control(
					'line_left_top',
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
								'min' => -100,
								'max' => 100,
							],
						],
						'size_units' 	=> [ 'px' ],
						'selectors' 	=> [
							'{{WRAPPER}} .ova-icon .icon-view-v2:before' => 'top: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'icon_type' => 'v2',
						],
					]
				);

				$this->add_responsive_control(
					'line_left_height',
					[
						'label' 	=> esc_html__( 'Height', 'cryptlux' ),
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
								'min' => -100,
								'max' => 100,
							],
						],
						'size_units' 	=> [ 'px' ],
						'selectors' 	=> [
							'{{WRAPPER}} .ova-icon .icon-view-v2:before' => 'height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'icon_type' => 'v2',
						],
					]
				);

		    $this->add_control(
				'line_bottom_options',
				[
					'label' 	=> esc_html__( 'Bottom Border', 'cryptlux' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'icon_type' => 'v2',
					],
				]
			);

				$this->add_group_control(
		            Group_Control_Border::get_type(), [
		                'name' 		=> 'icon_left_border',
		                'selector' 	=> '{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-left:before',
		                'separator' => 'before',
		                'condition' => [
							'icon_type' => 'v2',
						],
		            ]
		        );

		        $this->add_responsive_control(
					'line_bottom_top',
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
								'min' => -100,
								'max' => 100,
							],
						],
						'size_units' 	=> [ 'px' ],
						'selectors' 	=> [
							'{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-left:before' => 'top: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'icon_type' => 'v2',
						],
					]
				);

				$this->add_responsive_control(
					'line_bottom_height',
					[
						'label' 	=> esc_html__( 'Height', 'cryptlux' ),
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
								'min' => -100,
								'max' => 100,
							],
						],
						'size_units' 	=> [ 'px' ],
						'selectors' 	=> [
							'{{WRAPPER}} .ova-icon .icon-view-v2 .icon-v2-left:before' => 'height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'icon_type' => 'v2',
						],
					]
				);

		$this->end_controls_section();
		/* End section line style */
	}

	// Render Template Here
	protected function render() {

		$settings 	= $this->get_settings();

		$icon_type 	= $settings['icon_type'];
		$icon_class = $settings['icon_class'];
		$url_video 	= $settings['icon_url_video'];
		$icon_text 	= $settings['icon_text'];
		$link 		= $settings['link']['url'];
		$tg_blank 	= '';
		if ( $settings['link']['is_external'] == 'on' ) {
			$tg_blank = 'target="_blank"';
		}

		$type 		= $settings['type'];

		if ( ! $link ) {
			$url = $link;
		} else {
			if ( 'email' == $type ) {
				$url = 'mailto:' . trim( $link );
			} elseif ( 'phone' == $type ) {
				$url = 'tel:' . preg_replace( '/[^\d]/','', $link );
			} else {
				$url = $link;
			}
		}

		$autoplay 	= $settings['autoplay_video'];
		$mute 		= $settings['mute_video'];
		$loop 		= $settings['loop_video'];
		$controls 	= $settings['player_controls_video'];
		$modest 	= $settings['modest_branding_video'];
		$show_info 	= $settings['show_info_video'];

		?>

		<div class="ova-icon" >
			<?php if ( 'v1' == $icon_type ): ?>
				<div class="icon-content-view video_active">
					<?php if ( ! empty( $url_video ) ) : ?>
						<div class="content video-btn" id="ova-video" 
								data-src="<?php echo esc_url( $url_video ); ?>" 
								data-autoplay="<?php echo esc_html( $autoplay ); ?>" 
								data-mute="<?php echo esc_html( $mute ); ?>" 
								data-loop="<?php echo esc_html( $loop ); ?>" 
								data-controls="<?php echo esc_html( $controls ); ?>" 
								data-modest="<?php echo esc_html( $modest ); ?>" 
								data-show_info="<?php echo esc_html( $show_info ); ?>">
							<i class="<?php echo esc_html( $icon_class ); ?>"></i>
						</div>
					<?php else: ?>
						<div class="content">
							<i class="<?php echo esc_attr( $icon_class ); ?>"></i>
						</div>
					<?php endif; ?>
					<?php if ( $icon_text ): ?>
						<p class="ova-text">
							<?php if ( $url ): ?>
								<a href="<?php echo esc_url( $url ); ?>" <?php echo esc_html( $tg_blank ); ?>>
									<?php echo esc_html( $icon_text ); ?>
								</a>
							<?php else: ?>
								<?php echo esc_html( $icon_text ); ?>
							<?php endif; ?>
						</p>
					<?php endif; ?>
				</div>
				<div class="modal-container">
					<div class="modal">
						<i class="ovaicon-cancel"></i>
						<iframe class="modal-video" allow="autoplay"></iframe>
					</div>
				</div>
			<?php elseif ( 'v2' == $icon_type ): ?>
				<?php if ( $icon_text ): ?>
					<div class="icon-view-v2">
						<div class="icon-v2-left">
							<i class="fas fa-caret-right"></i>
						</div>
						<div class="icon-v2-text">
							<i class="<?php echo esc_html( $icon_class ); ?>"></i>
							<?php if ( $url ): ?>
								<a href="<?php echo esc_url( $url ); ?>" <?php echo esc_html( $tg_blank ); ?>>
									<?php echo esc_html( $icon_text ); ?>
								</a>
							<?php else: ?>
								<?php echo esc_html( $icon_text ); ?>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			<?php elseif ( 'v3' == $icon_type ): ?>
				<?php if ( $icon_text ): ?>
					<div class="icon-view-v3">
						<div class="icon-v3-text">
							<i class="<?php echo esc_html( $icon_class ); ?>"></i>
							<?php if ( $url ): ?>
								<a href="<?php echo esc_url( $url ); ?>" <?php echo esc_html( $tg_blank ); ?>>
									<?php echo esc_html( $icon_text ); ?>
								</a>
							<?php else: ?>
								<span class="text"><?php echo esc_html( $icon_text ); ?></span>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		 	
		<?php
	}

	
}
$widgets_manager->register_widget_type( new Cryptlight_Elementor_Icon() );