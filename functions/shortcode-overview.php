<?php
/**
 * Overview shortcode widget
 *
 * @param $atts
 * @param $content
 *
 * @return false|string
 */
function overview_shortcode( $atts, $content = null ): false|string {
	$atts = shortcode_atts( [
		"title"     => null,
		"link"      => null,
		"link_text" => null,
		"scheme"    => "default" // dark, secondary
	], $atts );

	switch ( $atts["scheme"] ) {
		case( "dark" ):
			$scheme = "bg-navy text-white";
			break;
		case( "secondary" ):
			$scheme = "bg-secondary";
			break;
		default:
			$scheme = "bg-[#faf3e8]";
	}

	ob_start();
	?>
    <section class="section overflow-hidden <?= $scheme; ?>">
        <div class="container relative py-16 md:!w-10/12 text-center">
			<?php if ( $atts["title"] ): ?>
                <p class="text-xl md:text-3xl font-marcellus leading-relaxed !mb-0 observer">
					<?= $atts["title"] ?>
                </p>
			<?php endif; ?>
			<?php if ( $content ) : ?>
                <div class="md:text-lg font-marcellus leading-relaxed mt-8 observer">
					<?= apply_filters( "the_content", $content ); ?>
                </div>
			<?php endif; ?>
			<?php if ( $atts["link"] ) : ?>
                <p class="observer mt-8 !mb-0">
                    <a class="button" href="<?= $atts["link"]; ?>">
						<?= $atts["link_text"]; ?>
                        <i class="fa-sharp fa-light fa-arrow-right-long text-lg"></i>
                    </a>
                </p>
			<?php endif; ?>
        </div>
    </section>
	<?php
	return ob_get_clean();
}

add_shortcode( "overview", "overview_shortcode" );