<?php get_header( "blank" ); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) :the_post(); ?>

		<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php
get_footer();
