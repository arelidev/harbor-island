<section class="section flex py-8 relative overflow-hidden h-screen">
	<video poster="<?= get_template_directory_uri(); ?>/images/background.jpg" autoplay playsinline muted loop>
		<source src="<?= get_template_directory_uri(); ?>/videos/teaser.mp4" type="video/mp4">
	</video>

	<div class="absolute h-full w-full top-0 left-0 bg-black opacity-40"></div>

	<div class="container text-center text-white relative flex justify-between flex-col">
		<img src="<?= get_template_directory_uri(); ?>/images/HIBC-Mark-White.svg" alt="Harbor Island Beach Club logo" class="mx-auto mb-12 block observer" />

		<div>
			<p class="text-lg md:text-xxxl font-marcellus observer !mb-12">Oceanview Residences at</p>
			<img src="<?= get_template_directory_uri(); ?>/images/HIBC-Logo-White.svg" alt="Harbor Island Beach Club logo" class="mx-auto mb-16 block observer max-w-100 w-[650px]" />
			<img src="<?= get_template_directory_uri(); ?>/images/tagline.png" alt="" class="mx-auto mb-16 block observer max-w-[300px]" />
		</div>

		<a href="#contact-us" class="lg:absolute transition top-0 right-0 bg-white hover:bg-gray-200 text-black text-xl uppercase tracking-wide px-10 py-4 rounded-full observer">Inquire</a>

		<div>
			<p class="md:text-lg uppercase font-light tracking-[8px] observer">Melbourne Beach, Florida USA</p>
			<i class="fa-light fa-chevron-down text-6xl observer"></i>
		</div>
	</div>
</section>