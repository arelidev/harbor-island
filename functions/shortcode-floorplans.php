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

	$args = [
		"post_type"      => "unit",
		"posts_per_page" => - 1
	];

	$units = new WP_Query( $args );

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
                    <img src="<?= get_template_directory_uri(); ?>/images/floorplans.jpeg" aria-hidden="true" alt="" class="w-full hotspot-image"/>

	                <?php if ( $units->have_posts() ) : ?>
		                <?php while ( $units->have_posts() ) : $units->the_post(); ?>
                            <button class="hotspot-item hotspot-icon modal-button <?php the_field( "status" ); ?>"
                                    style="left: <?= get_field( "left" ); ?>%; top: <?= get_field( "top" ); ?>%;"
                                    data-floorplan="<?php the_field( "building" ); ?>-<?php the_field( "unit" ); ?>"
                            >
                                <i class="fa-solid fa-building" aria-hidden="false"></i>
                            </button>
		                <?php endwhile; ?>
	                <?php endif; ?>
                </div>

                <div class="hotspot-legend flex space-x-8 mt-4">
                        <div class="hotspot-icon !px-3 flex space-x-2 Available">
                            <i class="fa-solid fa-building" aria-hidden="false"></i>
                            <span class="uppercase font-semibold text-xs"><?= __( "Available", "hibc" ); ?></span>
                        </div>
                        <div class="hotspot-icon !px-3 flex space-x-2 Unavailable">
                            <i class="fa-solid fa-building" aria-hidden="false"></i>
                            <span class="uppercase font-semibold text-xs"><?= __( "Unavailable", "hibc" ); ?></span>
                        </div>
                        <div class="hotspot-icon !px-3 flex space-x-2 Pending">
                            <i class="fa-solid fa-building" aria-hidden="false"></i>
                            <span class="uppercase font-semibold text-xs"><?= __( "Pending", "hibc" ); ?></span>
                        </div>
                    </div>
            </div>
        </div>

		<?php if ( $units->have_posts() ) : ?>
			<?php while ( $units->have_posts() ) : $units->the_post(); ?>
                <div id="floorplan-modal-<?php the_field( "building" ); ?>-<?php the_field( "unit" ); ?>" class="modal" style="display: none;">
                    <div class="modal-content">
                        <i class="fa-regular fa-xmark fa-xl close cursor-pointer relative z-10"></i>

                        <div class="modal-body">
                            <div class="entry-content p-8 observer">
                                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-24">
                                    <div>
                                        <p class="text-xl font-semibold uppercase !mb-4">
		                                    <?= __( "Building", "tailwind" ); ?> <?php the_field( "building" ); ?>
                                        </p>

                                        <p class="text-3xl leading-tight font-marcellus">
											<?= __( "Unit", "tailwind" ); ?> <?php the_field( "unit" ); ?>
                                        </p>

                                        <dl class="uppercase font-semibold mb-8 space-y-2">
	                                        <?php if ( ! empty( get_field( "living_sq_ft" ) ) ) : ?>
                                                <div class="grid grid-cols-1 md:grid-cols-2">
                                                    <dt class=""><?= __( "Living SQ. FT:", "hibc" ); ?></dt>
                                                    <dd class="text-right"><?php the_field( "living_sq_ft" ); ?></dd>
                                                </div>
	                                        <?php endif; ?>

	                                        <?php if ( ! empty( get_field( "balcony_sq_ft" ) ) ) : ?>
                                                <div class="grid grid-cols-1 md:grid-cols-2">
                                                    <dt class=""><?= __( "Balcony SQ. FT:", "hibc" ); ?></dt>
                                                    <dd class="text-right"><?php the_field( "balcony_sq_ft" ); ?></dd>
                                                </div>
	                                        <?php endif; ?>

                                            <?php if ( ! empty( get_field( "total_sq_ft" ) ) ) : ?>
                                                <div class="grid grid-cols-1 md:grid-cols-2">
                                                    <dt class=""><?= __( "TOTAL ARCHITECTURAL SQ. FT.:", "hibc" ); ?></dt>
                                                    <dd class="text-right"><?php the_field( "total_sq_ft" ); ?></dd>
                                                </div>
	                                        <?php endif; ?>

                                            <?php if ( ! empty( get_field( "bedrooms" ) ) ) : ?>
                                                <div class="grid grid-cols-1 md:grid-cols-2">
                                                    <dt class=""><?= __( "Bedrooms:", "hibc" ); ?></dt>
                                                    <dd class="text-right"><?php the_field( "bedrooms" ); ?></dd>
                                                </div>
	                                        <?php endif; ?>

	                                        <?php if ( ! empty( get_field( "bathrooms" ) ) ) : ?>
                                                <div class="grid grid-cols-1 md:grid-cols-2">
                                                    <dt class=""><?= __( "Bathrooms:", "hibc" ); ?></dt>
                                                    <dd class="text-right"><?php the_field( "bathrooms" ); ?></dd>
                                                </div>
	                                        <?php endif; ?>

	                                        <?php if ( ! empty( get_field( "marketing_view" ) ) ) : ?>
                                                <div class="grid grid-cols-1 md:grid-cols-2">
                                                    <dt class=""><?= __( "View:", "hibc" ); ?></dt>
                                                    <dd class="text-right"><?php the_field( "marketing_view" ); ?></dd>
                                                </div>
	                                        <?php endif; ?>

	                                        <?php if ( ! empty( get_field( "furniture_finish" ) ) ) : ?>
                                                <div class="grid grid-cols-1 md:grid-cols-2">
                                                    <dt class=""><?= __( "FURNITURE & FINISH:", "hibc" ); ?></dt>
                                                    <dd class="text-right"><?php the_field( "furniture_finish" ); ?></dd>
                                                </div>
	                                        <?php endif; ?>

	                                        <?php if ( ! empty( get_field( "status" ) ) ) : ?>
                                                <div class="grid grid-cols-1 md:grid-cols-2">
                                                    <dt class=""><?= __( "Status:", "hibc" ); ?></dt>
                                                    <dd class="text-right"><?php the_field( "status" ); ?></dd>
                                                </div>
	                                        <?php endif; ?>

	                                        <?php if ( ! empty( get_field( "price" ) ) ) : ?>
                                                <div class="grid grid-cols-1 md:grid-cols-2">
                                                    <dt class=""><?= __( "Price:", "hibc" ); ?></dt>
                                                    <dd class="text-right"><?php the_field( "price" ); ?></dd>
                                                </div>
	                                        <?php endif; ?>
                                        </dl>

                                        <button class="button black js-btn-download-all mb-8" data-ct_event_id="<?= get_the_ID(); ?>">
                                            <?= __( "Download", "hibc" ); ?>
                                            <i class="fa-sharp fa-light fa-arrow-down-to-line text-lg"></i>
                                        </button>

                                        <?php if ( ! empty( get_field( "virtual_tour_link" ) ) ) : ?>
                                            <p class="text-2xl leading-tight font-marcellus !mb-0">
                                                <?= __( "Tour the Residence", "hibc" ); ?>
                                            </p>

                                            <div class="responsive-container relative">
                                                <a href="" data-fancybox data-type="iframe" data-src="<?php the_field( "virtual_tour_link" ); ?>" class="absolute top-3 right-3 z-10 cursor-pointer">
                                                    <i class="fa-solid fa-up-right-and-down-left-from-center fa-x2"></i>
                                                </a>
                                                <iframe class="responsive-iframe" src="<?php the_field( "virtual_tour_link" ); ?>"></iframe>
                                            </div>
                                        <?php endif; ?>

	                                    <?php if ( ! empty( get_field( "view_image" ) ) ) : ?>
		                                    <a href="<?= wp_get_attachment_image_url( get_field( "view_image" ), "full" ); ?>" data-fancybox>
                                                <?= wp_get_attachment_image( get_field( "view_image" ), "full", false, ["class" => "mt-8"] ); ?>
                                            </a>
	                                    <?php endif; ?>

                                        <a class="button mt-8" href="<?= home_url("join-the-club"); ?>">
											<?= __( "Join The Club", "hibc" ); ?>
                                            <i class="fa-sharp fa-light fa-arrow-right-long text-lg"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="sticky top-0">
	                                        <?php if ( ! empty( get_field( "3d_floorplan_image" ) ) ) : ?>
                                                <a data-fancybox href="<?= wp_get_attachment_image_url( get_field( "3d_floorplan_image" ), "full" ); ?>" class="mx-auto w-full">

	                                                <?= wp_get_attachment_image( get_field( "3d_floorplan_image" ), "full", false, [ "class" => "mx-auto w-auto max-h-[70vh]" ] ); ?>

                                                    <span class="text-primary uppercase text-center text-sm font-semibold mt-4">
				                                        <?= __( "Click image to enlarge", "hibc" ); ?>
                                                    </span>
                                                </a>
	                                        <?php endif; ?>

                                            <p class="text-xs text-gray-500 mt-4">
                                                The square footage stated are approximate because there are various recognized methods for calculating square footage of a unit. The square footage stated here is calculated from the exterior boundaries of the exterior walls, to the centerline of interior demising walls without deductions for cutouts, curves or architectural features. This method results in quoted dimensions greater than the dimensions that would be determined by using other accepted methods. The definition of “unit” and the calculated method to be relied upon is set forth in the Developer’s prospectus and the method set forth in the Developer’s prospectus may result in a square footage calculation less than the method used here. Consult the Developer’s prospectus to understand the calculation of the Unit square footage and dimensions. Dimensions and Unit configuration may change during construction.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			<?php endwhile; ?>
		<?php endif; ?>
    </section>
	<?php
	wp_reset_postdata();

	return ob_get_clean();
}

add_shortcode( "floorplans", "floorplans_shortcode" );