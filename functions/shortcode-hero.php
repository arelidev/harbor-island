<?php
/**
 * Hero shortcode widget
 *
 * @param $atts
 * @param $content
 *
 * @return false|string
 */
function hero_shortcode( $atts, $content = null ): false|string {
	$atts = shortcode_atts( [
		"image"    => null,
        "video"    => "welcome.mp4",
		"el_class" => ""
	], $atts );

	$menu_left = get_menu_left();

	$menu_right = get_menu_right();

    $uploads = wp_get_upload_dir();

	ob_start();
	?>
    <section class="section flex py-8 relative overflow-hidden lg:h-screen">
		<?php if ( $atts["image"] ) : ?>
			<?= wp_get_attachment_image( $atts["image"], "full", false, array( "class" => "absolute w-full h-full top-0 left-0 -z-1 object-cover" ) ); ?>
		<?php else : ?>
            <video poster="<?= get_template_directory_uri(); ?>/images/background.jpg" autoplay playsinline muted loop>
                <source src="<?= cdn($atts["video"]); ?>" type="video/mp4">
            </video>
		<?php endif; ?>

        <div class="absolute h-full w-full top-0 left-0 bg-black opacity-40"></div>

        <div class="container text-center text-white relative flex justify-between flex-col">
            <div class="flex items-center w-full space-x-24 mb-12 observer">
                <div class="flex-1">
                    <ul class="hidden lg:flex justify-between !list-none !mb-0">
						<?php foreach ( $menu_left as $item ) : ?>
                            <li class="text-center !list-none">
                                <a href="<?= $item["href"]; ?>" class="uppercase font-semibold !text-white !no-underline">
                                    <?= $item["title"]; ?>
                                </a>
                            </li>
						<?php endforeach; ?>
                    </ul>
                </div>
                <div class="flex-0">
                    <a href="<?= home_url(); ?>">
                        <img src="<?= get_template_directory_uri(); ?>/images/HIBC-Mark-White.svg" alt="Harbor Island Beach Club logo" class="mx-auto block"/>
                    </a>
                </div>
                <div class="flex-1">
                    <ul class="hidden lg:flex justify-between !list-none !mb-0">
		                <?php foreach ( $menu_right as $item ) : ?>
                            <li class="text-center !list-none">
                                <a href="<?= $item["href"]; ?>" class="uppercase font-semibold !text-white !no-underline">
					                <?= $item["title"]; ?>
                                </a>
                            </li>
		                <?php endforeach; ?>
                    </ul>

                    <div class="lg:hidden block">
                        <a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
                            <svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                                    <g id="icon-shape">
                                        <path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z" id="Combined-Shape"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div>
                <p class="text-lg md:text-xxxl font-marcellus observer !mb-12">
                    <?= __( "Oceanview Residences at", "hibc" ); ?>
                </p>
                <img src="<?= get_template_directory_uri(); ?>/images/HIBC-Logo-White.svg" alt="Harbor Island Beach Club logo" class="mx-auto mb-16 block observer max-w-100 w-[650px]"/>
                <img src="<?= get_template_directory_uri(); ?>/images/tagline.png" alt="" class="mx-auto mb-16 block observer max-w-[300px]"/>
            </div>

            <div>
                <p class="md:text-lg uppercase font-light tracking-[8px] observer">
                    <?= __( "Melbourne Beach, Florida USA", "hibc" ); ?>
                </p>
                <i class="fa-light fa-chevron-down text-6xl observer"></i>
            </div>
        </div>
    </section>
	<?php
	return ob_get_clean();
}

add_shortcode( "hero", "hero_shortcode" );