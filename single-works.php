<?php get_header(); ?>

	<main id="primary" class="works-main works site-main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="left">
			<div class="left-fixed">
				<div class="left-contents">
					<div class="overview">
						<div class="titlelist">
							<div class="tags">
								<?php $tags = get_the_terms( get_the_ID(), 'works_tag' ); ?>
								<?php if ( $tags && ! is_wp_error( $tags ) ) : ?>
									<?php foreach ( $tags as $tag ) : ?>
										<span class="tag">#<?php echo esc_html( $tag->name ); ?></span>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
							<?php if ( get_the_title() ) : ?>
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<?php endif; ?>
							<div>
								<?php $url = get_post_meta( get_the_ID(), 'url', true ); ?>
								<?php if ( $url ) : ?>
									<a class="url" href="<?php echo esc_url( $url ); ?>" target="_blank"><?php echo esc_url( $url ); ?></a>
									<img class="icon" src="<?php echo esc_url( get_template_directory_uri() . '/images/icons/new_window_icon.png' ); ?>" alt="new_window">
								<?php endif; ?>
							</div>
						</div>
						<section class="thumbnail is-mobile">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail('large'); ?>
						<?php endif; ?>
						</section>
						<dl>
							<?php $roles = get_the_terms( get_the_ID(), 'works_role' ); ?>
							<?php if ( $roles && ! is_wp_error( $roles ) ) : ?>
								<?php $role_names = wp_list_pluck( $roles, 'name' ); ?>
								<dt>担当範囲</dt>
								<dd class="is-pc">
									<?php echo implode('<br>', array_map('esc_html', $role_names)); ?>
								</dd>
								<dd class="is-mobile">
									<?php echo esc_html( implode(', ', $role_names) ); ?>
								</dd>
							<?php endif; ?>
						</dl>
						<dl>
							<?php $tools = get_the_terms( get_the_ID(), 'works_tools' ); ?>
							<?php if ( $tools && ! is_wp_error( $tools ) ) : ?>
								<?php $tool_names = wp_list_pluck( $tools, 'name' ); ?>
								<dt>使用ツール</dt>
								<dd class="is-pc">
									<?php echo implode('<br>', array_map('esc_html', $tool_names)); ?>
								</dd>
								<dd class="is-mobile">
									<?php echo esc_html( implode(', ', $tool_names) ); ?>
								</dd>
							<?php endif; ?>
						</dl>
						<dl>
							<?php $production_time = get_post_meta( get_the_ID(), 'production_time', true ); ?>
							<?php if( $production_time ): ?>
								<dt>制作時間</dt>
								<dd><?php echo esc_html( $production_time ); ?></dd>
							<?php endif ?>
						</dl>
						<?php $summary = get_post_meta( get_the_ID(), 'summary', true ); ?>
						<?php if ( $summary ) : ?>
							<p><?php echo esc_html( $summary ); ?></p>
						<?php endif; ?>
					</div>
					<?php makokamiya_wp_theme_breadcrumbs('is-pc'); ?>
				</div>
			</div>
		</div>
		<div class="right">
			<div class="right-contents">
				<?php if ( has_post_thumbnail() ) : ?>
					<section class="thumbnail is-pc">
						<?php the_post_thumbnail('large'); ?>
					</section>
				<?php endif; ?>
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'makokamiya-wp-theme' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
				?>
			</div>
		</div>
		<?php makokamiya_wp_theme_breadcrumbs('is-mobile'); ?>
	</article><!-- #post-<?php the_ID(); ?> -->
	</main>

<?php get_footer();