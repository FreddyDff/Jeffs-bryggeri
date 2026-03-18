<?php

/**
 * The front page template
 *
 * @package Jeffs_Bryggeri
 */

get_header();
?>

<main id="primary" class="site-main front-page">

    <!-- Hero -->
    <section class="hero">
        <div class="hero__inner">
            <h1 class="hero__title">Jeffs Bryggeri</h1>
            <!-- Hero background image can be added via CSS or here -->
            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/hero.png' ); ?>" alt="Jeffs Bryggeri" class="hero__image">

        </div>
    </section>

    <!-- Info om oss -->
    <section class="info-om-oss">
        <div class="container">
            <h2 class="section-title">Info om oss</h2>
            <div class="info-om-oss__content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam turpis orci, semper non consectetur id, placerat sit amet tellus. Integer efficitur cursus condimentum. Integer in porta justo. Praesent consequat posuere tristique. Integer non lectus sem</p>
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
            <h2 class="section-title">Webshop</h2>
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
