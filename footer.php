	<?php if( is_front_page() || is_singular('works') || is_post_type_archive('works') || is_page('about') ) : ?>
	<footer id="colophon" class="portfolio-footer site-footer">
	<?php else : ?>
	<footer id="colophon" class="site-footer">
	<?php endif; ?>
		<p class="copyright">&copy; 2025 Mako Kamiya. All rights reserved.</p>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
