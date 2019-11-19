<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- Get Head file -->
<?php get_template_part('template-parts/header/header') ?>

<!-- Get main Navbar -->
<?php get_template_part('template-parts/navbar/navbarmain') ?>

<!-- Pagina content -->
<div class="banner__green"> 
    <div class="container">
        <div class="flex-container banner__green__content">
            <div class="banner__green__text"><br></div>
        </div>
    </div>
</div>

<div class="container containerpadding">
	<h1 class="text-center text-lg-left">Productcategorie: <?php woocommerce_page_title(); ?></h1>
	<div class="row d-flex">
		<?php
		if ( woocommerce_product_loop() ) {

			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			?>
			<div class="text-center text-lg-left mb-4 mb-lg-0"> 
				<?php do_action( 'woocommerce_before_shop_loop' ); ?>
			</div>
			<?php
			woocommerce_product_loop_start();

			if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action( 'woocommerce_shop_loop' );
					
					$price = get_post_meta( get_the_ID(), '_price', true );

					?>
						<div class="shopcontent__container col-12 col-md-6 col-lg-4 pl-lg-0 px-3 pt-lg-5">                   
							<a href="<?php the_post_thumbnail_url(); ?>">
								<img class="shopcontent__image" src="<?php the_post_thumbnail_url(); ?>">
								<div class="shopcontent__information shopcontent__information<?php echo $count ?>">
									<p class="shopcontent__name"><?php the_title_attribute();?></p>
									<p class="shopcontent__tag">Zaden</p>
									<p class="shopcontent__price"><?php echo wc_price($price); ?></p>
								</div>
							</a>
						</div> 
					<?php
				}
			}

			woocommerce_product_loop_end();

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action( 'woocommerce_no_products_found' );
		}
		?>
	</div>
</div>

<!-- Get Footer file -->
<?php get_template_part('template-parts/footer/footer') ?>
