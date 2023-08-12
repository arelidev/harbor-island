<?php
/**
 * Content Block shortcode
 *
 * @param $atts
 * @param $content
 *
 * @return false|string
 */
function content_block_images_shortcode( $atts, $content = null ): false|string {
	$atts = shortcode_atts( [
		"title"        => "",
		"images"       => null,
		"image_left"   => null,
		"image_right"  => null
	], $atts );

	ob_start();
	?>
    <section class="section">
        <div class="container px-6 pt-24">
			<?php if ( $atts["title"] ) : ?>
                <p class="text-3xl leading-tight font-marcellus observer">
					<?= $atts["title"]; ?>
                </p>
			<?php endif; ?>

            <div class="md:flex md:gap-8">
                <div class="w-full md:w-7/12">
	                <?php if ( $atts["images"] ) : ?>
                        <?= do_shortcode("[swift_gallery images='{$atts['images']}' image_height='small'][/swift_gallery]"); ?>
	                <?php endif; ?>

	                <?php if ( $atts["image_left"] ) : ?>
		                <?= wp_get_attachment_image( $atts["image_left"], "full", false, array( "class" => "h-[300px] md:h-[500px] w-full observer object-cover" ) ); ?>
	                <?php endif; ?>

					<?php if ( $content ) : ?>
                        <div class="observer mt-8">
							<?= apply_filters( "the_content", $content ); ?>
                        </div>
					<?php endif; ?>
                </div>
                <div class="w-full md:w-5/12 md:pt-12">
	                <?php if ( $atts["image_right"] ) : ?>
		                <?= wp_get_attachment_image( $atts["image_right"], "full", false, array( "class" => "h-[300px] md:h-[500px] w-full observer object-cover" ) ); ?>
	                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
	<?php
	return ob_get_clean();
}

add_shortcode( "content_block_images", "content_block_images_shortcode" );