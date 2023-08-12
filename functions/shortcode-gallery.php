<?php
/**
 * Gallery shortcode widget
 *
 * @param $atts
 *
 * @return false|string
 */
function swift_gallery_shortcode( $atts ): false|string {
	$atts = shortcode_atts( [
		"images"       => "",
		"image_height" => "",
		"el_class"     => ""
	], $atts );

	$height = match ( $atts["image_height"] ) {
		"small" => "h-[300px] md:h-[500px]",
		"medium" => "h-[500px] md:h-[600px]",
		default => "h-[600px] md:h-[800px]"
	};

	ob_start();
	?>
    <!-- Slider main container -->
    <div class="swiper w-full <?= $atts["el_class"]; ?>">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
			<?php foreach ( explode( ",", $atts["images"] ) as $image ) : ?>
                <div class="swiper-slide">
					<?= wp_get_attachment_image( $image, "full", false, array( "class" => "object-cover w-full $height" ) ); ?>
                </div>
			<?php endforeach; ?>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>
	<?php
	return ob_get_clean();
}

add_shortcode( "swift_gallery", "swift_gallery_shortcode" );