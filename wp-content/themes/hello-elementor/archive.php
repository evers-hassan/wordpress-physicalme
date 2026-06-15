<?php
/**
 * Archive Template
 * Handles archives for article post type
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

// Check if this is an article archive
if ( is_post_type_archive( 'article' ) || is_tax( 'chapter' ) ) {
	// For article archive, try to load Elementor template if one is set
	// Otherwise show articles in a loop

	if ( class_exists( '\Elementor\Plugin' ) ) {
		// Check if there's a custom Elementor template set for article archives
		$archive_template = get_option( 'article_archive_template_id' );

		if ( $archive_template && ! empty( $archive_template ) ) {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content( $archive_template );
		} else {
			// Default article archive display
			?>
			<main id="content" class="site-main">
				<header class="page-header">
					<h1 class="page-title"><?php the_archive_title(); ?></h1>
				</header>

				<div class="article-grid">
					<?php
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							?>
							<article class="article-card">
								<h2 class="entry-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<?php if ( has_excerpt() ) : ?>
									<p class="entry-excerpt"><?php the_excerpt(); ?></p>
								<?php endif; ?>
							</article>
							<?php
						}
						the_posts_pagination();
					} else {
						echo '<p>' . esc_html__( 'No articles found.', 'hello-elementor' ) . '</p>';
					}
					?>
				</div>
			</main>
			<?php
		}
	} else {
		// Fallback if Elementor is not active
		?>
		<main id="content" class="site-main">
			<header class="page-header">
				<h1 class="page-title"><?php the_archive_title(); ?></h1>
			</header>

			<div class="article-grid">
				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						?>
						<article class="article-card">
							<h2 class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<?php if ( has_excerpt() ) : ?>
								<p class="entry-excerpt"><?php the_excerpt(); ?></p>
							<?php endif; ?>
						</article>
						<?php
					}
					the_posts_pagination();
				} else {
					echo '<p>' . esc_html__( 'No articles found.', 'hello-elementor' ) . '</p>';
				}
				?>
			</div>
		</main>
		<?php
	}
} else {
	// For other archives, use standard archive behavior
	?>
	<main id="content" class="site-main">
		<?php
		if ( have_posts() ) {
			get_template_part( 'template-parts/archive' );
		} else {
			get_template_part( 'template-parts/content-none' );
		}
		?>
	</main>
	<?php
}

get_footer();
