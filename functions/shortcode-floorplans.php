<?php
/**
 * Floorplans shortcode
 *
 * @param $atts
 * @param $content
 *
 * @return false|string
 */
function floorplans_shortcode( $atts, $content = null ): false|string {
	$atts = shortcode_atts( [
		"title" => "",
	], $atts );

	ob_start();
	?>
    <section class="section">
        <div class="container px-6 py-24">
			<?php if ( $atts["title"] ) : ?>
                <p class="text-3xl leading-tight font-marcellus observer">
					<?= $atts["title"]; ?>
                </p>
			<?php endif; ?>

			<?php if ( $content ) : ?>
                <div class="observer mb-8">
					<?= apply_filters( "the_content", $content ); ?>
                </div>
			<?php endif; ?>

            <div class="hotspot-wrapper observer">
                <div class="hotspot-container relative">
                    <img src="<?= get_template_directory_uri(); ?>/images/floorplans.jpg" aria-hidden="true" alt="" class="w-full hotspot-image"/>

                    <button class="hotspot-item pulse" style="left: 15%; top: 35%;" id="modal-button" data-target-modal="floorplan" data-floorplan="123">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="hotspot-icon" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
	<?php
	return ob_get_clean();
}

add_shortcode( "floorplans", "floorplans_shortcode" );