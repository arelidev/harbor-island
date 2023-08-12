</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<?php
if ( ! is_page_template( "template-landing.php" ) ) :
	echo get_template_part( "template-parts/site-footer" );
endif;
?>

</div>

<?php wp_footer(); ?>

</body>
</html>
