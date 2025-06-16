<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="left">
		<div class="left-fixed">
			<div class="left-contents">
				<div class="overview">
					<div class="titlelist">
						<div class="tags">
							<span class="tag">#website</span>
							<span class="tag">#original</span>
						</div>
						<?php if ( get_the_title() ) : ?>
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php else : ?>
							<h1 class="entry-title">(タイトルなし)</h1>
						<?php endif; ?>
						<div>
							<?php $url = get_post_meta( get_the_ID(), 'url', true ); ?>
							<?php if ( $url ) : ?>
								<a class="url" href="<?php echo esc_url( $url ); ?>" target="_blank"><?php echo esc_url( $url ); ?></a>
							<?php else : ?>
								<a class="url">https://example.com</a>
							<?php endif; ?>
							<img class="icon" src="<?php echo esc_url( get_template_directory_uri() . '/images/new_window.png' ); ?>" alt="new_window">
						</div>
					</div>
					<section class="thumbnail sp-only">
						<img src="images/Thumbnail.png" alt="Thumbnail">
					</section>
					<dl>
						<dt>担当範囲</dt>
						<dd class="pc-only">
							<?php $roles = get_the_terms( get_the_ID(), 'works_role' ); ?>
							<?php if ( $roles && ! is_wp_error( $roles ) ) : ?>
								<p class="role">
									<?php
										$role_names = wp_list_pluck( $roles, 'name' );
										echo implode('<br>', array_map('esc_html', $role_names));
									?>
								</p>
							<?php endif; ?>
						</dd>
						<dd class="sp-only">
							企画・構成、デザイン、コーディング、WordPress実装
						</dd>
					</dl>
					<dl>
						<dt>使用ツール</dt>
						<dd class="pc-only">
							<?php $tools = get_the_terms( get_the_ID(), 'works_tools' ); ?>
							<?php if ( $tools && ! is_wp_error( $tools ) ) : ?>
								<?php
									$tool_names = wp_list_pluck( $tools, 'name' );
									echo esc_html( implode(', ', $tool_names) );
								?>
							<?php endif; ?>
						</dd>
						<dd class="sp-only">
							Figma, HTML, CSS, JavaScript, WordPress
						</dd>
					</dl>
					<dl>
						<dt>制作時間</dt>
						<?php $production_time = get_post_meta( get_the_ID(), 'production_time', true ); ?>
						<?php if( $production_time ): ?>
							<dd><?php echo esc_html( $production_time ); ?></dd>
						<?php else : ?>
							<dd>○時間</dd>
						<?php endif ?>
					</dl>
					<?php $summary = get_post_meta( get_the_ID(), 'summary', true ); ?>
					<?php if ( $summary ) : ?>
						<p><?php echo esc_html( $summary ); ?></p>
					<?php else : ?>
						<p>作品の簡単な説明を入力してください。</p>
					<?php endif; ?>
				</div>
				<div class="pankuzu pc-only">
					<a href="/">HOME</a>
					<span class="arrow">></span>
					<p>私のポートフォリオサイト</p>
				</div>
			</div>
		</div>
	</div>
	<div class="right">
		<div class="right-contents">
			<section class="thumbnail pc-only">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail('large'); ?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() . '/images/default-thumbnail.png' ); ?>" alt="<?php the_title_attribute(); ?>" class="wp-post-image"/>
			<?php endif; ?>
			</section>
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
	<div class="pankuzu sp-only">
		<a href="/">HOME</a>
		<span class="arrow">></span>
		<p>私のポートフォリオサイト</p>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->