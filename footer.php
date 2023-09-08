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

<div id="privacy-policy" class="modal" style="display: none;">
    <div class="modal-content">
        <i class="fa-regular fa-xmark fa-xl close"></i>
        <div class="modal-body">
            <div class="entry-content p-8">
				<?php get_template_part( 'template-parts/privacy-policy' ); ?>
            </div>
        </div>
    </div>
</div>

<div id="disclaimer" class="modal" style="display: none;">
    <div class="modal-content">
        <i class="fa-solid fa-xmark close"></i>
        <div class="modal-body">
            <div class="entry-content p-8">
				<?php get_template_part( 'template-parts/disclaimer' ); ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
