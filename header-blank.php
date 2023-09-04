<?php
$menu_left  = get_menu_left();
$menu_right = get_menu_right();
$menu_items = array_merge( $menu_left, $menu_right )
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&family=Marcellus&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/d61e9414a0.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

    <header>
        <div id="primary-menu" class="hidden bg-black p-4">
            <ul class="space-y-4 observer">
                <?php foreach ( $menu_items as $item ) : ?>
                    <li class="">
                        <a href="<?= $item["href"]; ?>" class="uppercase font-semibold !text-white !no-underline">
                            <?= $item["title"]; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
		</div>
	</header>

	<div id="content" class="site-content flex-grow">

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
