<?php if ( have_rows( 'static_image' ) ) : ?>
	<?php while ( have_rows( 'static_image' ) ): the_row(); ?>
        <section class="section relative">
			<?php // wp_get_attachment_image( get_sub_field( "image" ), "full", false, array( "class" => "md:h-screen object-cover observer" ) );  ?>
			<?php $uploads = wp_get_upload_dir(); ?>
            <video poster="<?= get_template_directory_uri(); ?>/images/background.jpg" class="!h-auto !lg:h-screen !relative" autoplay playsinline muted loop>
                <source src="<?= cdn("cinemagraph.mp4"); ?>" type="video/mp4">
            </video>
        </section>
	<?php endwhile; ?>
<?php endif; ?>