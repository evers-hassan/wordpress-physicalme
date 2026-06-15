<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Books_Carousel_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'books_carousel';
	}

	public function get_title() {
		return __( 'Books Carousel', 'hello-elementor' );
	}

	public function get_icon() {
		return 'eicon-carousel';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		// Content Tab
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'hello-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'chapter_filter',
			[
				'label'   => __( 'Chapter', 'hello-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => $this->get_chapters_options(),
				'default' => '',
			]
		);

		$this->add_control(
			'limit',
			[
				'label'   => __( 'Number of Books', 'hello-elementor' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 6,
				'min'     => 1,
				'max'     => 50,
			]
		);

		$this->end_controls_section();

		// Style Tab
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style', 'hello-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'card_height',
			[
				'label'      => __( 'Card Height', 'hello-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min' => 100,
						'max' => 600,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 280,
				],
				'selectors'  => [
					'{{WRAPPER}} .pm-book-card' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'overlay_opacity',
			[
				'label'      => __( 'Image Overlay Opacity', 'hello-elementor' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 5,
					],
				],
				'default'    => [
					'size' => 30,
				],
				'selectors'  => [
					'{{WRAPPER}} .pm-book-card::before' => 'background: rgba(0, 0, 0, calc({{VALUE}} / 100));',
				],
			]
		);

		$this->end_controls_section();
	}

	private function get_chapters_options() {
		$chapters = get_terms( [
			'taxonomy'   => 'chapter',
			'hide_empty' => false,
		] );

		$options = [ '' => __( 'All Chapters', 'hello-elementor' ) ];

		if ( is_array( $chapters ) && ! empty( $chapters ) ) {
			foreach ( $chapters as $chapter ) {
				$options[ $chapter->term_id ] = $chapter->name;
			}
		}

		return $options;
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$args = [
			'post_type'      => 'article',
			'posts_per_page' => $settings['limit'],
			'orderby'        => 'date',
			'order'          => 'DESC',
		];

		if ( ! empty( $settings['chapter_filter'] ) ) {
			$args['tax_query'] = [
				[
					'taxonomy' => 'chapter',
					'field'    => 'term_id',
					'terms'    => $settings['chapter_filter'],
				],
			];
		}

		$books_query = new \WP_Query( $args );
		?>
		<div class="pm-books-carousel-wrapper">
			<button class="pm-books-scroll-btn prev" aria-label="Scroll left">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<polyline points="15 18 9 12 15 6"></polyline>
				</svg>
			</button>

			<div class="pm-books-grid">
				<?php
				if ( $books_query->have_posts() ) {
					while ( $books_query->have_posts() ) {
						$books_query->the_post();
						$post_id = get_the_ID();

						// Get featured image URL
						$image_url = '';
						if ( has_post_thumbnail( $post_id ) ) {
							$image_url = get_the_post_thumbnail_url( $post_id, 'full' );
						}

						// Get chapter terms
						$chapters = get_the_terms( $post_id, 'chapter' );
						$chapter_name = '';
						if ( $chapters && ! is_wp_error( $chapters ) ) {
							$chapter_name = $chapters[0]->name;
						}

						// Generate color class based on chapter
						$color_class = $this->get_color_class( $chapters );

						// Build style attribute
						$style = '';
						if ( $image_url ) {
							$style = 'style="background-image: url(\'' . esc_url( $image_url ) . '\');"';
						}
						?>
						<a href="<?php the_permalink(); ?>" class="pm-book-card <?php echo esc_attr( $color_class ); ?>" <?php echo $style; ?> data-post-id="<?php echo esc_attr( $post_id ); ?>">
							<div class="icon">📖</div>
							<h3><?php the_title(); ?></h3>
							<?php if ( $chapter_name ) : ?>
								<div class="meta"><?php echo esc_html( $chapter_name ); ?></div>
							<?php endif; ?>
							<div class="cta"><?php _e( 'Read', 'hello-elementor' ); ?></div>
						</a>
						<?php
					}
					wp_reset_postdata();
				}
				?>
			</div>

			<button class="pm-books-scroll-btn next" aria-label="Scroll right">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<polyline points="9 18 15 12 9 6"></polyline>
				</svg>
			</button>
		</div>
		<?php
	}

	private function get_color_class( $chapters ) {
		$colors = [ 'c-orange', 'c-teal', 'c-green', 'c-maroon', 'c-purple', 'c-blue' ];

		if ( $chapters && ! is_wp_error( $chapters ) ) {
			$chapter_id = $chapters[0]->term_id;
			return $colors[ ( $chapter_id - 1 ) % count( $colors ) ];
		}

		return 'c-orange';
	}
}
