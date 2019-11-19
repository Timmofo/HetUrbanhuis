<!-- Tells wordpress the page template name -->
<?php /* Template Name: Shop */ ?>

<!-- Get Head file -->
<?php get_template_part('template-parts/header/header') ?>

<!-- Get main Navbar -->
<?php get_template_part('template-parts/navbar/navbarmain') ?>

<!-- Pagina content -->
<div class="banner__green"> 
    <div class="container">
        <div class="flex-container banner__green__content">
            <div class="banner__green__text d-none d-lg-inline">Snelle Levering</div>
            <div class="banner__green__text">Gratis Verzending</div>
            <div class="banner__green__text d-none d-lg-inline">Gemakkelijke Betaling</div>
        </div>
    </div>
</div>

<div class="container containerpadding row px-3 px-md-0 my-3">
    <div class="col-12 col-lg-3 p-0">
        <h1 class="col-12 p-0 p-lg-0 px-md-3 my-3">Shop</h1>
        <?php
            //parent category inputs
            $prodcat_featured = get_term_by('name', 'featured', 'product_cat');
            $prodcat_homepage = get_term_by('name', 'homepage', 'product_cat');

            $args = array(
                'taxonomy'=>'product_cat',
                'hide_empty'=>false,
                'parent'=>0,
                'exclude'=> array($prodcat_featured->term_id, $prodcat_homepage->term_id)
            );
            
            //spacing flag
            $first_item = 1;

            $all_categories = get_terms( $args );
            foreach($all_categories as $parent_category){
                $category_id = $parent_category->term_id;
                ?>
                <div class="shopnavigation__category">
                    <h2 class="shopnavigation__header text-lg-left d-none d-lg-block"><?php echo $parent_category->name; ?></h2><?php

                    //child category inputs
                    $child_args = array(
                        'taxonomy'=>'product_cat',
                        'hide_empty'=>false,
                        'parent'=>$category_id
                    );

                    $sub_cats = get_terms($child_args);

                    ?>
                    <ul class="shopnavigation__items">
                    <?php

                    foreach($sub_cats as $child_category){
                        ?><li class="shopnavigation__items text-lg-left d-none d-lg-block"><a href="<?php echo get_category_link($child_category->term_id); ?>"><?php echo $child_category->name; ?></a></li><?php
                    }

                    $first_item=0;
                    ?>
                    </ul>
                </div>
                <?php
            }
        ?>
    </div>
    <div class="col-12 col-lg-9 p-0">
        <div class="row">
            <?php
                //input arguments
                $args = array(
                    'limit' => 30
                );
                $products = wc_get_products( $args );
                $count = 1;

                foreach($products as $product){
                    $currentproduct = wc_get_product($product->get_ID());
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id($currentproduct->get_id()), 'single-post-thumbnail' );
                    $price = get_post_meta( $product->get_ID() , '_regular_price', true);
                    ?>

                    <div class="shopcontent__container col-6 col-lg-4 pr-1 pr-md-3 pr-lg-0 pl-1 pl-md-3">                   
                        <a href="<?php echo $currentproduct->get_permalink(); ?>">
                            <img class="shopcontent__image" src="<?php echo $image[0] ?>">
                            <div class="shopcontent__information shopcontent__information<?php echo $count ?>">
                                <p class="shopcontent__name"><?php echo $currentproduct->get_name(); ?></p>
                                <p class="shopcontent__tag">Zaden</p>
                                <p class="shopcontent__price"><?php echo wc_price($price); ?></p>
                            </div>
                        </a>
                    </div>
                    
                    <?php
                    if($count==3){
                        $count=1;
                    }
                    else $count++;
                }
            ?>
        </div>
    </div>
</div>


<!-- Get Footer file -->
<?php get_template_part('template-parts/footer/footer') ?>