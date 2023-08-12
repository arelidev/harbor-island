<?php if ( have_rows( 'overview' ) ) : ?>
	<?php while ( have_rows( 'overview' ) ): the_row(); ?>
        <section class="section min-h-screen flex items-center bg-[#faf3e8]">
            <div class="container relative py-16 md:!w-10/12 grid grid-cols-1 md:grid-cols-2 md:gap-20 md:items-center">
                <div class="observer">
					<?= wp_get_attachment_image( get_sub_field( "image" ), "full" ); ?>
                </div>
                <div>
                    <p class="text-xl md:text-3xl font-marcellus leading-relaxed observer">
						<?php the_sub_field( "title" ); ?>
                    </p>
                    <div class="md:text-lg font-marcellus leading-relaxed observer">
	                    <?= apply_filters("the_content", get_sub_field( "content" )); ?>
                    </div>
                </div>
            </div>
        </section>
	<?php endwhile; ?>
<?php endif; ?>