<?php
/**
 * Split Content Block shortcode widget
 *
 * @param $atts
 * @param $content
 *
 * @return false|string
 */
function content_block_split_shortcode( $atts, $content = null ): false|string {
	$atts = shortcode_atts( [
		"image"       => null,
		"title"       => null,
		"link"        => null,
		"link_text"   => null,
		"link_target" => "_self",
		"reverse"     => false,
		"el_class"    => ""
	], $atts );

	ob_start();
	?>
    <section class="section mt-16 lg:mt-0 <?= $atts["el_class"]; ?>">
        <div>
            <div class="md:flex items-center <?= $atts["reverse"] ? "flex-row-reverse" : ""; ?>">
                <div class="w-full lg:w-1/2">
					<?php if ( $atts["image"] ) : ?>
						<?= wp_get_attachment_image( $atts["image"], "full", false, array( "class" => "h-screen w-full observer object-cover" ) ); ?>
					<?php endif; ?>
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="mt-8 md:mt-0 lg:w-8/12 mx-auto px-6">
						<?php if ( $atts["title"] ) : ?>
                            <p class="text-3xl leading-tight font-marcellus observer">
								<?= $atts["title"]; ?>
                            </p>
						<?php endif; ?>

						<?php if ( $content ) : ?>
                            <div class="observer">
								<?= apply_filters( "the_content", $content ); ?>
                            </div>
						<?php endif; ?>

						<?php if ( $atts["link"] ) : ?>
                            <p class="observer mt-8">
                                <a class="button" href="<?= $atts["link"]; ?>" target="<?= $atts["link_target"]; ?>">
									<?= $atts["link_text"]; ?>
                                    <i class="fa-sharp fa-light fa-arrow-right-long text-lg"></i>
                                </a>
                            </p>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php
	return ob_get_clean();
}

add_shortcode( "content_block_split", "content_block_split_shortcode" );