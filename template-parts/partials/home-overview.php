<?php if ( have_rows( 'overview' ) ) : ?>
	<?php while ( have_rows( 'overview' ) ): the_row(); ?>
        <section class="section lg:min-h-screen flex items-center bg-[#faf3e8]">
            <div class="container relative pt-8 pb-0 lg:py-16 lg:!w-10/12 grid grid-cols-1 lg:grid-cols-2 lg:gap-20 lg:items-center">
                <div class="observer">
					<?= wp_get_attachment_image( get_sub_field( "image" ), "full", false, ["class" => "mb-8 lg:mb-0"] ); ?>
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