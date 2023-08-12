<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content" id="fullpage">
		<?= do_shortcode( "[hero][/hero]" ); ?>
		<?php get_template_part( "template-parts/partials/home", "overview" ); ?>
		<?php get_template_part( "template-parts/partials/home", "intro" ); ?>
		<?php get_template_part( "template-parts/partials/home", "residences" ); ?>
		<?php get_template_part( "template-parts/partials/home", "static-img" ); ?>
		<?php get_template_part( "template-parts/partials/home", "views" ); ?>
		<?php get_template_part( "template-parts/partials/home", "amenities" ); ?>
		<?php get_template_part( "template-parts/partials/home", "location" ); ?>
		<?php get_template_part( "template-parts/partials/home", "cta" ); ?>
		<?php get_template_part( "template-parts/partials/home", "contact" ); ?>
        <section class="section fp-auto-height">
            <?= get_template_part( "template-parts/site-footer" ); ?>
        </section>
    </div>
</article>
