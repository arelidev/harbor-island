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
                <p class="text-xl lg:text-3xl leading-tight font-marcellus observer">
					<?= $atts["title"]; ?>
                </p>
			<?php endif; ?>

			<?php if ( $content ) : ?>
                <div class="observer mb-8">
					<?= apply_filters( "the_content", $content ); ?>
                </div>
			<?php endif; ?>

            <div class="hidden lg:block hotspot-wrapper observer">
                <div class="hotspot-container relative">
                    <img src="<?= get_template_directory_uri(); ?>/images/floorplans.jpeg" aria-hidden="true" alt=""
                         class="w-full hotspot-image"/>

					<?php if ( $units->have_posts() ) : ?>
						<?php while ( $units->have_posts() ) : $units->the_post(); ?>
                            <button class="hotspot-item hotspot-icon modal-button <?php the_field( "status" ); ?>"
                                    style="left: <?= get_field( "left" ); ?>%; top: <?= get_field( "top" ); ?>%;"
                                    data-target-modal="<?php the_field( "building" ); ?>-<?php the_field( "unit" ); ?>"
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

            <div class="block lg:hidden px-4 sm:px-6 lg:px-8">
                <div class="-mx-4 mt-8 sm:-mx-0">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                <?= __( "Building", "tailwind" ); ?>
                            </th>
                            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
                                <?= __( "Building", "tailwind" ); ?>
                            </th>
                            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">
                                <?= __( "Unit", "tailwind" ); ?>
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                <?= __( "Status", "tailwind" ); ?>
                            </th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                <span class="sr-only"><?= __( "View details", "tailwind" ); ?></span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
	                    <?php if ( $units->have_posts() ) : ?>
		                    <?php while ( $units->have_posts() ) : $units->the_post(); ?>
                                <tr>
                                    <td class="lg:w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-0">
					                    <?= __( "Unit", "tailwind" ); ?> <?php the_field( "unit" ); ?>
                                        <dl class="font-normal lg:hidden">
                                            <dd class="mt-1 truncate text-gray-700">
							                    <?= __( "Building", "tailwind" ); ?> <?php the_field( "building" ); ?>
                                            </dd>
                                        </dl>
                                    </td>
                                    <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">
                                        <?= __( "Building", "tailwind" ); ?> <?php the_field( "building" ); ?>
                                    </td>
                                    <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">
                                        <?= __( "Unit", "tailwind" ); ?> <?php the_field( "unit" ); ?>
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">
                                        <span class="sr-only"><?= __( "Status", "tailwind" ); ?></span> <?php the_field( "status" ); ?>
                                    </td>
                                    <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <button class="text-indigo-600 hover:text-indigo-900 modal-button" data-target-modal="<?php the_field( "building" ); ?>-<?php the_field( "unit" ); ?>">
                                            <?= __( "View", "tailwind" ); ?>
                                            <span class="sr-only"> <?= __( "for unit", "tailwind" ); ?> <?php the_field( "unit" ); ?></span>
                                        </button>
                                    </td>
                                </tr>
		                    <?php endwhile; ?>
	                    <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

		<?php if ( $units->have_posts() ) : ?>
			<?php while ( $units->have_posts() ) : $units->the_post(); ?>
				<?php get_template_part( "template-parts/loop-floorplan", "modal" ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
    </section>
	<?php
	wp_reset_postdata();

	return ob_get_clean();
}

add_shortcode( "floorplans", "floorplans_shortcode" );