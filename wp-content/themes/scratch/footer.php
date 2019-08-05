<?php
/**
 * The template for displaying the footer.
 *
 * @package scratch
 */
?>
	<footer class="footer bg-dark text-white pt-5 pb-3">
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
			<p class="copy"><a href="<?php bloginfo('url') ?>/">&copy; <?php bloginfo('name') ?> <?= date('Y') ?></a></p>
		</div>
	</footer>

</div><!-- .page-wrapper -->
<?php wp_footer(); ?>
</body>
</html>