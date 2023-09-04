<?php if ( have_rows( 'views' ) ) : ?>
	<?php while ( have_rows( 'views' ) ): the_row(); ?>
		<?php $link = get_sub_field( 'link' ); ?>
        <section class="section lg:min-h-screen flex items-center">
            <div class="container pt-8 pb-0 lg:py-16 md:pb-0">
                <div class="md:flex gap-x-6">
                    <div class="w-full md:w-1/2">
                        <p class="text-3xl sm:text-5xl leading-tight font-light observer">
							<?php the_sub_field( "title" ); ?>
                        </p>
                    </div>
                    <div class="w-full md:w-1/2 observer">
						<?= apply_filters( "the_content", get_sub_field( "content" ) ); ?>

						<?php
						if ( $link ) :
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ?: '_self';
							?>
                            <p class="observer">
                                <a class="button" href="<?= esc_url( $link_url ); ?>"
                                   target="<?= esc_attr( $link_target ); ?>">
									<?= esc_html( $link_title ); ?>
                                    <i class="fa-sharp fa-light fa-arrow-right-long text-lg"></i>
                                </a>
                            </p>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
	<?php endwhile; ?>
<?php endif; ?>