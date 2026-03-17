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
			</div>
		</section>

		<!-- Info om oss -->
		<section class="info-om-oss">
			<div class="container">
				<h2 class="section-title">Info om oss</h2>
				<div class="info-om-oss__content">
					<p>Placeholder text. Replace with real content or output from a page/ACF.</p>
				</div>
			</div>
		</section>

		<!-- Image gallery / feature section (circular images) -->
		<section class="image-gallery">
			<div class="container">
				<div class="image-gallery__grid">
					<div class="image-gallery__item">Image 1</div>
					<div class="image-gallery__item">Image 2</div>
					<div class="image-gallery__item">Image 3</div>
				</div>
			</div>
		</section>

		<!-- Webshop product grid -->
		<section class="product-grid-section">
			<div class="container">
				<h2 class="section-title">Webshop</h2>
				<ul class="product-grid">
					<li class="product-card">
						<div class="product-card__image">Product image</div>
						<h3 class="product-card__title">Product name</h3>
						<p class="product-card__price">69 Kr</p>
						<button type="button" class="btn btn-add-to-cart">Lägg i varukorg</button>
					</li>
					<li class="product-card">
						<div class="product-card__image">Product image</div>
						<h3 class="product-card__title">Product name</h3>
						<p class="product-card__price">69 Kr</p>
						<button type="button" class="btn btn-add-to-cart">Lägg i varukorg</button>
					</li>
					<li class="product-card">
						<div class="product-card__image">Product image</div>
						<h3 class="product-card__title">Product name</h3>
						<p class="product-card__price">69 Kr</p>
						<button type="button" class="btn btn-add-to-cart">Lägg i varukorg</button>
					</li>
				</ul>
			</div>
		</section>

		<!-- Extra image section (beer glasses etc.) -->
		<section class="image-section">
			<div class="container">
				<div class="image-section__content">
					<p>Placeholder for image section.</p>
				</div>
			</div>
		</section>

	</main><!-- #primary -->

<?php
get_footer();
