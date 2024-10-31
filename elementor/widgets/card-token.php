<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Cryptlight_Elementor_Card_Token extends Widget_Base {

	
	public function get_name() {
		return 'cryptlight_elementor_card-token';
	}

	public function get_title() {
		return esc_html__( 'Card Token', 'cryptlux' );
	}

	public function get_icon() {
		return 'eicon-image-box';
	}

	public function get_categories() {
		return [ 'cryptlux' ];
	}

	public function get_script_depends() {
		return [ '' ];
	}
	
	// Add Your Controll In This Function
    protected function _register_controls() {

       
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'cryptlux' ),
			]
		);	
            
			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'image',
				[
					'label' 	=> esc_html__( 'Image', 'cryptlux' ),
					'type' 		=> Controls_Manager::MEDIA,
					'dynamic' 	=> [
						'active' 	=> true,
					],
					'default' 	=> [
						'url' 	=> Elementor\Utils::get_placeholder_image_src(),
					],
					'separator' => 'before'
				]
			);
			$repeater->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'cryptlux' ),
					'type' 		=> Controls_Manager::TEXT,
					'row' 		=> 5,
					'default' 	=> esc_html__('Mobile payment make easy','cryptlux'),
				]
			);

			$repeater->add_control(
				'desc',
				[
					'label' 	=> esc_html__( 'Description', 'cryptlux' ),
					'type' 		=> Controls_Manager::TEXTAREA,
					'row' 		=> 5,
					'default' 	=> esc_html__("There's no need to sign up, you can use a mobile device to pay with the most simple steps",'cryptlux'),
				]
			);

		$this->add_control(
            'items',
            [
                'type' 		=> Controls_Manager::REPEATER,
                'fields' 	=> $repeater->get_controls(),
                'default' 	=> [
                    [	
                    	'image' => [ 'url' => Elementor\Utils::get_placeholder_image_src(), ],
                        'title' => esc_html__( 'Mobile payment make easy','cryptlux' ),
                        'desc' 	=> esc_html__( "There's no need to sign up, you can use a mobile device to pay with the most simple steps",'cryptlux' ),
                    ],
                    [	
                    	'image' => [ 'url' => Elementor\Utils::get_placeholder_image_src(), ],
                        'title' => esc_html__( 'No transaction fee','cryptlux' ),
                        'desc' 	=> esc_html__( 'You can buy tokens how much you want without paying any transaction fee for our system','cryptlux' ),
                    ],
                    [	
                    	'image' => [ 'url' => Elementor\Utils::get_placeholder_image_src(), ],
                        'title' => esc_html__( 'Protect the identity','cryptlux' ),
                        'desc' 	=> esc_html__( 'If we detect a potential threat to your identity, we will alert you by text, email, phone or app','cryptlux' ),
                    ],
                    [	
                    	'image' => [ 'url' => Elementor\Utils::get_placeholder_image_src(), ],
                        'title' => esc_html__( 'Security and control over money','cryptlux' ),
                        'desc' 	=> esc_html__( 'We can provide high levels of security that allows the user to keep control over their money','cryptlux' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->add_control(
            'column',
            [
                'label' 	=> esc_html__( 'Column', 'cryptlux' ),
                'type' 		=> Controls_Manager::SELECT,
                'options' 	=> [
                    'column1' => esc_html__( '1', 'cryptlux' ),
                    'column2' => esc_html__( '2', 'cryptlux' ),
                    'column3' => esc_html__( '3', 'cryptlux' ),
                ],
                'default' 	=> 'column2',
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_card_style',
			[
				'label' => esc_html__( 'Background Card', 'cryptlux' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);	

			$this->start_controls_tabs( 'tabs_card_style' );
				
				$this->start_controls_tab(
		            'tab_card_normal',
		            [
		                'label' => esc_html__( 'Normal', 'cryptlux' ),
		            ]
		        );

		        	$this->add_control(
			            'card_background_normal',
			            [
			                'label' 	=> esc_html__( 'Background', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-card-token .card-content' => 'background-color: {{VALUE}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_card_hover',
		            [
		                'label' => esc_html__( 'Hover', 'cryptlux' ),
		            ]
		        );

		        	$this->add_control(
			            'card_background_hover',
			            [
			                'label' 	=> esc_html__( 'Background', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-card-token .card-content:hover' => 'background-color: {{VALUE}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_responsive_control(
				'card_space_between',
				[
					'label' 	=> esc_html__( 'Space Between', 'cryptlux' ),
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
							'min' => 0,
							'max' => 500,
						],
					],
					'size_units' 	=> [ 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-card-token' => 'grid-gap: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
	            Group_Control_Border::get_type(), [
	                'name' 		=> 'card_border',
	                'selector' 	=> '{{WRAPPER}} .ova-card-token .card-content',
	                'separator' => 'before',
	            ]
	        );

	        $this->add_control(
	            'card_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-card-token .card-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

			$this->add_responsive_control(
				'card_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'cryptlux' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-card-token .card-content' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image_style',
			[
				'label' => esc_html__( 'Image', 'cryptlux' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'image_width',
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
							'max' => 500,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-card-token .card-content .image' 	=> 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
	            Group_Control_Border::get_type(), [
	                'name' 		=> 'image_border',
	                'selector' 	=> '{{WRAPPER}} .ova-card-token .card-content .image',
	                'separator' => 'before',
	            ]
	        );

	        $this->add_control(
	            'image_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'cryptlux' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-card-token .card-content .image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

			$this->add_responsive_control(
				'image_margin',
				[
					'label' 		=> esc_html__( 'Margin', 'cryptlux' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-card-token .card-content .image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'cryptlux' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->start_controls_tabs( 'tabs_title_style' );
				
				$this->start_controls_tab(
		            'tab_title_normal',
		            [
		                'label' => esc_html__( 'Normal', 'cryptlux' ),
		            ]
		        );

		        	$this->add_control(
			            'title_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-card-token .card-content .info .title' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_title_hover',
		            [
		                'label' => esc_html__( 'Hover', 'cryptlux' ),
		            ]
		        );

		        	$this->add_control(
			            'title_color_hover',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-card-token .card-content:hover .info .title' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-card-token .card-content .info .title',
				]
			);

			$this->add_responsive_control(
				'title_margin',
				[
					'label' 		=> esc_html__( 'Margin', 'cryptlux' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-card-token .card-content .info .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->end_controls_section();


		$this->start_controls_section(
			'section_desc_style',
			[
				'label' => esc_html__( 'Description', 'cryptlux' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->start_controls_tabs( 'tabs_desc_style' );
				
				$this->start_controls_tab(
		            'tab_desc_normal',
		            [
		                'label' => esc_html__( 'Normal', 'cryptlux' ),
		            ]
		        );

		        	$this->add_control(
			            'desc_color_normal',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-card-token .card-content .info .desc' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();

		        $this->start_controls_tab(
		            'tab_desc_hover',
		            [
		                'label' => esc_html__( 'Hover', 'cryptlux' ),
		            ]
		        );

		        	$this->add_control(
			            'desc_color_hover',
			            [
			                'label' 	=> esc_html__( 'Color', 'cryptlux' ),
			                'type' 		=> Controls_Manager::COLOR,
			                'selectors' => [
			                    '{{WRAPPER}} .ova-card-token .card-content:hover .info .desc' => 'color: {{VALUE}};',
			                ],
			            ]
			        );

		        $this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'desc_typography',
					'selector' 	=> '{{WRAPPER}} .ova-card-token .info .desc',
				]
			);

			$this->add_responsive_control(
				'desc_margin',
				[
					'label' 		=> esc_html__( 'Margin', 'cryptlux' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-card-token .card-content .info .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	// Render Template Here
	protected function render() {

		$settings 	= $this->get_settings();
        $items		= $settings['items'];
        $column 	= $settings['column'];

		?>
		<?php if ( $items ): ?>
			<div class="ova-card-token <?php echo esc_html( $column ); ?>">
				<?php foreach( $items as $item ):
					$url 	= $item['image']['url'];
					$title 	= $item['title'];
					$desc 	= $item['desc'];

					?>
	                <div class="card-content">
	                	<div class="image">
							<img src="<?php echo esc_url( $url ); ?>" class="card-token">
						</div>
						<div class="info">
		                    <?php if ( ! empty( $title ) ) : ?>
								<div class="title">
									<?php echo esc_html( $title ); ?>
						   		</div>
						   	<?php endif ?>

						   	<?php if ( ! empty( $desc ) ) : ?>
								<div class="desc">
									<?php echo esc_html( $desc ); ?>
								</div>
						  	<?php endif; ?>
						</div>
	                </div>
               <?php endforeach; ?>
		    </div>
		<?php
		endif;
	}

	
}
$widgets_manager->register_widget_type( new Cryptlight_Elementor_Card_Token() );