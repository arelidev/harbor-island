<?php if ( have_rows( 'into' ) ) : ?>
	<?php while ( have_rows( 'into' ) ): the_row(); ?>
		<?php $link = get_sub_field( 'link' ); ?>
        <section class="section min-h-screen flex items-center">
            <div class="container relative py-16 md:!w-10/12 grid grid-cols-1 md:grid-cols-2 md:items-center md:gap-44">
                <div>
                    <div class="text-lg md:text-xl font-marcellus leading-relaxed observer">
						<?= apply_filters( "the_content", get_sub_field( "content" ) ); ?>
                    </div>
					<?php
					if ( $link ) :
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ?: '_self';
						?>
                        <p class="!mb-0 observer">
                            <a class="button" href="<?= esc_url( $link_url ); ?>"
                               target="<?= esc_attr( $link_target ); ?>">
								<?= esc_html( $link_title ); ?>
                                <i class="fa-sharp fa-light fa-arrow-right-long text-lg"></i>
                            </a>
                        </p>
					<?php endif; ?>
                </div>
                <div>
                    <img src="<?= get_template_directory_uri(); ?>/images/florida-map.jpg" alt="Harbor Island Beach" class="observer "/>
                </div>
            </div>
        </section>
	<?php endwhile; ?>
<?php endif; ?>