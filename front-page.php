<?php get_header(); ?>

<main id="primary" class="front-main portfolio-main site-main">
	<?php
	$works_query = new WP_Query( array(
        'post_type'      => 'works',
    ) );
	if ( $works_query->have_posts() ) : ?>
	<div class="swiper">
		<div class="swiper-wrapper">
			<?php while ( $works_query->have_posts() ) : $works_query->the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'works' ); ?>
			<?php endwhile; ?>
		</div>
		<div class="swiper-pagination"></div>
	</div>
    <?php else : ?>
        <p style="margin: 0 auto">表示する作品がありません。</p>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</main>

<?php get_footer();