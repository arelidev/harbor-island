<?php if ( have_rows( 'location' ) ) : ?>
	<?php while ( have_rows( 'location' ) ): the_row(); ?>
		<?php $link = get_sub_field( 'link' ); ?>
        <section class="section mt-16 lg:mt-0">
            <div>
                <div class="md:flex items-center">
                    <div class="w-full lg:w-1/2">
                        <img src="<?= get_template_directory_uri(); ?>/images/harbor.jpg" alt="Harbor Island Beach" class="aspect-square observer object-cover"/>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="mt-8 md:mt-0 lg:w-8/12 mx-auto px-6">
                            <p class="text-3xl leading-tight font-marcellus observer">
								<?php the_sub_field( "title" ); ?>
                            </p>
                            
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
            </div>
        </section>
	<?php endwhile; ?>
<?php endif; ?>