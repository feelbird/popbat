<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Cryptlight_Elementor_Ico_Crypto extends Widget_Base {

	
	public function get_name() {
		return 'cryptlight_elementor_ico-crypto';
	}

	
	public function get_title() {
		return esc_html__( 'Ico Crypto', 'cryptlux' );
	}

	
	public function get_icon() {
		return ' eicon-kit-details';
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
			
			// Add Class control
			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'icon',
				[
					'label' 	=> esc_html__( 'Class Icon', 'cryptlux' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'fas fa-check', 'cryptlux' ),
				]
			);

			$repeater->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'cryptlux' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__('ICO CRYPTO', 'cryptlux' ),
				]
			);

            $repeater->add_control(
				'desc',
				[
					'label' 		=> esc_html__( 'desc', 'cryptlux' ),
					'type' 			=> Controls_Manager::TEXTAREA,
					'default' 		=> esc_html__('In this time period', 'cryptlux' ),
				]
			);

			$this->add_control(
				'ico_items',
				[
					'label' 	=> esc_html__( 'Items', 'cryptlux' ),
					'type' 		=> Controls_Manager::REPEATER,
					'fields' 	=> $repeater->get_controls(),
					'default' 	=> [
						[
							'title' 	=> esc_html__( 'Decentralized Platform', 'cryptlux' ),
							'icon' 		=> esc_html__( 'ovaicon-user-2', 'cryptlux' ),
							'desc' 		=> esc_html__('The platform helps investors to make easy to purchase and sell their tokens', 'cryptlux' ),
						],
						[
							'title' 	=> esc_html__( 'Crowd Wisdom', 'cryptlux' ),
							'icon' 		=> esc_html__( 'eicon-globe', 'cryptlux' ),
							'desc' 		=> esc_html__('The process of taking into account the collective opinion of a group', 'cryptlux' ),
						],
						[
							'title' 	=> esc_html__( 'Rewards MeAchanism', 'cryptlux' ),
							'icon' 		=> esc_html__( 'eicon-star', 'cryptlux' ),
							'desc' 		=> esc_html__('The system pay a bonus for excellent individuals', 'cryptlux' ),
						],
					
					],
					'title_field' => '{{{ title }}}',
				]
			);

			$this->add_control(
				'show_line_before',
				[
					'label' 	=> esc_html__( 'Line Before', 'cryptlux' ),
					'type' 		=> Controls_Manager::SWITCHER,
					'label_on' 	=> esc_html__( 'Show', 'cryptlux' ),
					'label_off' => esc_html__( 'Hide', 'cryptlux' ),
					'default' 	=> 'no',
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'cryptlux' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'color_icon',
				[
					'label' => esc_html__( 'Color', 'cryptlux' ),
					'type' 	=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-ico-crypto .item i' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'bg_color_icon',
				[
					'label' 	=> esc_html__( 'Background Color', 'cryptlux' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-ico-crypto .item i' => 'background-color : {{VALUE}};',
						'{{WRAPPER}} .ova-ico-crypto .item:before' => 'border-left-color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'icon_typography',
					'selector' 	=> '{{WRAPPER}} .ova-ico-crypto .item i',
				]
			);

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
							'max' => 100,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-ico-crypto .item i' => 'width: {{SIZE}}{{UNIT}};',
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
							'max' => 100,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'size_units' 	=> [ '%', 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-ico-crypto .item i' => 'height: {{SIZE}}{{UNIT}};',
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

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-ico-crypto .item .title',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' 	=> esc_html__( 'Color', 'cryptlux' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-ico-crypto .item .title' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'padding_title',
				[
					'label' 		=> esc_html__( 'Padding', 'cryptlux' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-ico-crypto .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_title',
				[
					'label' 		=> esc_html__( 'Margin', 'cryptlux' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-ico-crypto .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'desc_typography',
					'selector' 	=> '{{WRAPPER}} .ova-ico-crypto .item .desc',
				]
			);

			$this->add_control(
				'color_desc',
				[
					'label' 	=> esc_html__( 'Color', 'cryptlux' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-ico-crypto .item .desc' => 'color : {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
		
	}

	// Render Template Here
	protected function render() {

		$settings 			= $this->get_settings();
        $items 				= $settings['ico_items'];
		$show_line_before 	= $settings['show_line_before'];

		?>
        <div class="ova-ico-crypto">
			<?php if( !empty( $items ) ) : ?>
				<?php foreach( $items as $item ): ?>
					<div class="item <?php if ('yes'== $show_line_before) echo 'item-line'; ?>">
						<i class="<?php echo esc_html( $item['icon'] ); ?>"></i>
						<div class="title">
							<?php echo esc_html( $item['title'] );?>
						</div>
						<div class="desc">
							<?php echo esc_html( $item['desc'] );?>
						</div>
					</div>
			<?php endforeach; endif; ?>
		</div>
		 	
		<?php
	}

	
}
$widgets_manager->register_widget_type( new Cryptlight_Elementor_Ico_Crypto() );