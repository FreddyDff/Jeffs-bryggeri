<?php

/**
 * The front page template
 *
 * @package Jeffs_Bryggeri
 */

get_header();

$hero_tagline = get_bloginfo( 'description', 'display' );
if ( ! is_string( $hero_tagline ) || '' === trim( wp_strip_all_tags( $hero_tagline ) ) ) {
	$hero_tagline = __( 'Microbryggeri med känsla för det lilla extra', 'jeffs-bryggeri' );
}

/*
 * Om hero.png redan har rubrik/tagline i själva bilden (vanlig designexport) ska samma text
 * inte skrivas ut synligt här — då blir det "text på text". Sätt då false.
 * Byt till true om ni använder en ren fotobakgrund utan text i bilden (då stylas overlay i CSS).
 */
$hero_show_visible_text_overlay = false;
?>

<main id="primary" class="site-main front-page">

    <!-- Hero: vid inbränd text i bilden används screen-reader-text (SEO/a11y utan dubbel visuell text) -->
    <section class="hero">
        <div class="hero__inner">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/hero.png' ); ?>" alt="" class="hero__image" loading="eager">
            <div class="hero__overlay">
				<?php
				$hero_title_class = 'hero__title' . ( $hero_show_visible_text_overlay ? '' : ' screen-reader-text' );
				$hero_tagline_class = 'hero__tagline' . ( $hero_show_visible_text_overlay ? '' : ' screen-reader-text' );
				?>
                <h1 class="<?php echo esc_attr( $hero_title_class ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
                <p class="<?php echo esc_attr( $hero_tagline_class ); ?>"><?php echo esc_html( $hero_tagline ); ?></p>
            </div>
        </div>
    </section>

    <!-- Info om oss -->
    <section class="info-om-oss">
        <div class="container">
            <h2 class="section-title">Info om oss</h2>
            <div class="info-om-oss__content">
                <p>Jeffs Bryggeri startade som ett garageprojekt med ett enkelt löfte: öl som smakar mer än etiketten lovar. I dag brygger vi i små satser med fokus på rena råvaror, tydlig beska och balanserad sötma – alltid med respekt för hantverket och grannarna som får stå ut med lite extra humleluft på fredagar.</p>
                <p>Hos oss möts klassiska stilar och egna experiment. Kom förbi taproom när vi har öppet så passa på, eller handla hemma i webbshoppen. Vi ses i glaset.</p>
            </div>
        </div>
    </section>

    <!-- Image gallery / feature section (circular images) -->
    <section class="image-gallery">
        <div class="container">
        <div class="image-gallery__grid">
    <div class="image-gallery__item">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/circle-1.png' ); ?>" alt="Bild 1">
    </div>
    <div class="image-gallery__item">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/circle-2.png' ); ?>" alt="Bild 2">
    </div>
    <div class="image-gallery__item">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/circle-3.png' ); ?>" alt="Bild 3">
    </div>
</div>
        </div>
    </section>

    <!-- Webshop product grid -->
    <section class="product-grid-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e( 'Handla i vår webshop', 'jeffs-bryggeri' ); ?></h2>
            <p class="product-grid-section__intro"><?php esc_html_e( 'Här hittar du våra senaste batcher – från lättdruckna lager till humliga favoriter. Allt bryggt i små volymer med samma omsorg som i provläget. Klicka in på en produkt för mer smaknoter och ingredienser.', 'jeffs-bryggeri' ); ?></p>
            <ul class="product-grid">
                <?php
                if (class_exists('WooCommerce')) {
                    $products = wc_get_products(array(
                        'status'  => 'publish',
                        'limit'   => 6,
                        'orderby' => 'date',
                    ));
                    foreach ($products as $product) {
                        $GLOBALS['product'] = $product;
                ?>
                        <li class="product-card">
                            <div class="product-card__image">
                                <a href="<?php echo esc_url($product->get_permalink()); ?>">
                                    <?php echo $product->get_image(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                    ?>
                                </a>
                            </div>
                            <h3 class="product-card__title">
                                <a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a>
                            </h3>
                            <p class="product-card__price"><?php echo $product->get_price_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                            ?></p>
                            <a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="product-card__read-more"><?php esc_html_e( 'Läs mer', 'jeffs-bryggeri' ); ?></a>
                            <?php woocommerce_template_loop_add_to_cart(); ?>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </section>

    <!-- Extra image section (beer glasses etc.) -->
    <section class="image-section">
        <div class="container">
        <div class="image-section__content">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/bottom-image.png' ); ?>" alt="Ölbild">
</div>
        </div>
    </section>

</main><!-- #primary -->

<?php
get_footer();
