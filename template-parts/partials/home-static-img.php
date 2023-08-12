<?php if ( have_rows( 'static_image' ) ) : ?>
	<?php while ( have_rows( 'static_image' ) ): the_row(); ?>
        <section class="section">
			<?= wp_get_attachment_image( get_sub_field( "image" ), "full", false, array( "class" => "md:h-screen object-cover observer" ) ); ?>
        </section>
	<?php endwhile; ?>
<?php endif; ?>