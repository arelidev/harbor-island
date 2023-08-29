<?php
/**
 * Location Categories shortcode widget
 *
 * @param $atts
 * @param $content
 *
 * @return false|string
 */
function location_categories_shortcode( $atts, $content = null ): false|string {
	$atts = shortcode_atts( [
		"el_class"  => ""
	], $atts );

	ob_start();
	?>
	<section class="section bg-gray-100 <?= $atts["el_class"]; ?>"><!-- Ocean background -->
		<div class="container pt-16 pb-16">
			<div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
				<div class="bg-white">
					<img src="<?= get_template_directory_uri(); ?>/images/rocket.jpg" alt="" class="aspect-square observer" />
					<div class="p-8">
						<p class="uppercase font-medium font-marcellus text-lg pb-4 !mb-4 border-b-2 border-b-black observer">
							CULTURE & ENTERTAINMENT
						</p>
                        <ul class="!mb-0 observer">
                            <li>Cocoa Beach Pier</li>
                            <li>Port Canaveral</li>
                            <li>Kennedy Space Center</li>
                            <li>Disney World</li>
                            <li>Universal Orlando Resort</li>
                            <li>King Center for Performing Arts</li>
                            <li>McLarty Treasure Museum</li>
                            <li>Eau Gallie Arts District</li>
						</ul>
					</div>
				</div>
				<div class="bg-white">
					<img src="<?= get_template_directory_uri(); ?>/images/beach.jpg" alt="" class="aspect-square observer"/>
					<div class="p-8">
						<p class="uppercase font-medium font-marcellus text-lg pb-4 !mb-4 border-b-2 border-b-black observer">
							NATURE & OUTDOORS
						</p>
						<ul class="!mb-0 observer">
                            <li>Melbourne Beach</li>
                            <li>Cocoa Beach</li>
                            <li>Sebastian Inlet State Park</li>
                            <li>Maritime Hammock Sanctuary</li>
                            <li>Coconut Point Sanctuary</li>
                        </ul>
					</div>
				</div>
				<div class="bg-white">
					<img src="<?= get_template_directory_uri(); ?>/images/dining.jpg" alt="" class="aspect-square observer"/>
					<div class="p-8">
						<p class="uppercase font-medium font-marcellus text-lg pb-4 !mb-4 border-b-2 border-b-black observer">
							LOCAL DINING
						</p>
						<ul class="!mb-0 observer">
							<li>Cafe Coconut Cove</li>
							<li>Djon’s Chop House</li>
							<li>Ocean 302</li>
							<li>Oceanside Pizza</li>
							<li>Melbourne Square Mall</li>
							<li>Vero Beach Shops & Restaurants</li>
							<li>Chart House</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	return ob_get_clean();
}

add_shortcode( "location_categories", "location_categories_shortcode" );