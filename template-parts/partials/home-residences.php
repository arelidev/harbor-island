<?php if ( have_rows( 'residences' ) ) : ?>
	<?php while ( have_rows( 'residences' ) ): the_row(); ?>
		<?php
		$link   = get_sub_field( 'link' );
		$images = get_sub_field( "gallery" );
		$images = implode( ",", $images );
		?>
        <section class="section">
            <?= do_shortcode( "[swift_gallery images='$images' image_height='medium'][/swift_gallery]" ); ?>
            <div class="container">
                <p class="text-center text-3xl font-marcellus relative z-10 -mt-[35px] !mb-0 observer">
                    <span class="bg-white rounded-tr-md rounded-tl-md px-8 pt-2"><?php the_sub_field( "title" ); ?></span>
                </p>
                <div class="text-center mx-auto pt-16 mb-8 observer">
					<?= apply_filters( "the_content", get_sub_field( "content" ) ); ?>
                </div>
				<?php
				if ( $link ) :
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ?: '_self';
					?>
                    <p class="observer text-center">
                        <a class="button" href="<?= esc_url( $link_url ); ?>"
                           target="<?= esc_attr( $link_target ); ?>">
							<?= esc_html( $link_title ); ?>
                            <i class="fa-sharp fa-light fa-arrow-right-long text-lg"></i>
                        </a>
                    </p>
				<?php endif; ?>
            </div>
        </section>
	<?php endwhile; ?>
<?php endif; ?>