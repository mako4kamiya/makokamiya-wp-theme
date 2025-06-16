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
			<section>
				<img src="images/portfolioPages.png" alt="ImgPages">
				<div class="text_field">
					<h2>目的</h2>
					<ul>
						<li>Web制作の学習のアウトプット</li>
						<li>就職や副業への活用</li>
					</ul>
				</div>
				<div class="text_field">
					<h2>ターゲット</h2>
					<ul>
						<li>採用をご検討いただいている方</li>
						<li>Web制作に関心のある方</li>
						<li>私の作品に興味を持ってくださった方</li>
					</ul>
				</div>
			</section>
			<section>
				<img src="images/portfolioImg1.png" alt="portfolioImg1">
				<div class="text_field">
					<h2>全体的なポイント</h2>
					<p>
						「優しさ」「親しみやすさ」「誠実さ」を意識し、シンプルなデザインにしました。<br>
						色はモノクロを基調とし、作品が主役となるよう工夫しています。<br>
						フォントは、英語部分に軽やかで視認性の高い「Work Sans」、日本語部分に安心感のある「Noto Sans JP」を使用しています。
					</p>
				</div>
			</section>
			<section>
				<img src="images/portfolioImg1.png" alt="portfolioImg1">
				<div class="text_field">
					<h2>トップページについて</h2>
					<p>
						ファーストビューに作品のスクリーンショットを大きく配置し、作品を主役として見せる構成にしています。<br>
						画面の周囲に幅16pxの薄いグレーの帯を設けることで、サイト全体に額縁のような印象を加え、ポートフォリオ全体を一つの展示物として見せることを意識しました。
					</p>
				</div>
			</section>
			<section>
				<img src="images/portfolioImg2.png" alt="portfolioImg2">
				<div class="text_field">
					<h2>このページの構成について</h2>
					<p>
						左側に要点、右側に詳細を配置することで、読みやすく、情報情報を拾いやすいように工夫しました。
					</p>
				</div>
				<div class="text_field">
					<h2>今後の展望</h2>
					<ul>
						<li>作品の追加</li>
						<li>タグによるソート機能の実装</li>
						<li>ブログ機能の追加</li>
					</ul>
				</div>
			</section>
		</div>
	</div>
	<div class="pankuzu sp-only">
		<a href="/">HOME</a>
		<span class="arrow">></span>
		<p>私のポートフォリオサイト</p>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->