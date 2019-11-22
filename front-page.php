<!-- Get Head file -->
<?php get_template_part('template-parts/header/header') ?>

<!-- Get Frontpage Specific Navbar -->
<?php get_template_part('template-parts/navbar/navbarfrontpage') ?>

<!-- Frontpage content -->

<header id="frontpage__header">
    <div id="frontpage__container" class="container containerpadding">
        <div id="frontpage__brandplate" class="text-center text-md-left pl-md-3 pl-lg-0">
            <h1 id="frontpage__brandname">Het Urbanhuis</h1>
            <h2 id="frontpage__tagline">Creëer je eigen Urban Jungle</h2>
            <a href="https://www.heturbanhuis.nl/winkel" class="CTA_button btn-full mt-4 mt-md-0">Ga naar de Shop</a>
        </div>
    </div>
</header>

<div id="frontpage_about">
    <div class="container containerpadding row">
        <div id="frontpage__aboutleft" class="col-12 col-md-6 p-4 pl-md-3 pl-lg-0 text-center text-md-left">
            <h2>Wat we doen</h2>
            <p>
                Hi, welkom bij het Urbanhuis!<br><br>

                Dit is dé webshop voor de echte plantenliefhebbers die klaar zijn voor een nieuwe uitdaging. 
                Wist jij dat je kamerplanten zelf kan kweken? Ja dat kan! 
                Het Urbanhuis verkoopt de meest populaire kamerplant zaden, hiermee kan jij je eigen urban jungle creëren.<br><br> 
                
                Daarnaast is het Urbanhuis meer dan alleen een webshop, regelmatig komen er inspirerende blogs online. 
                Deze worden geschreven door het Urbanhuis of gastbloggers om de laatste trends met jullie als plantenliefhebbers
                te delen.<br><br>

                Kijk eens rond!
            </p> 
        </div>
        <div id="frontpage__aboutright" class="col-12 col-md-6 d-none d-md-inline-block pl-0">
            <img src="<?php echo get_bloginfo( 'template_directory' );?>/assets/images/frontpageabout.jpg" alt="Drie verschillende soorten opgroeiende kamerplanten">
        </div>
    </div>
</div>

<div id="frontpage_featured_products" class="frontpage-background">
    <div class="container containerpadding row px-0 px-md-3 px-lg-0">
        <div class="col-12 col-md-8 p-0 order-2">
            <div class="row d-flex">
                <?php
                    //input arguments
                    $args = array(
                        'limit' => 3,
                        'category' => 'homepage'
                    );
                    $products = wc_get_products( $args );
                    $count = 1;

                        foreach($products as $product){
                            $currentproduct = wc_get_product($product->get_ID());
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id($currentproduct->get_id()), 'single-post-thumbnail' );
                            $price = get_post_meta( $product->get_ID() , '_regular_price', true);
                            ?>

                            <div class="col-12 col-md-4 pr-3 pl-md-0 pr-md-3 mb-4 mb-md-0 mx-auto">
                                <a href="<?php echo $currentproduct->get_permalink(); ?>">
                                    <img class="frontpage__productimage mb-1 mb-md-0" src="<?php echo $image[0] ?>">
                                    <div class="pt-2 pt-lg-3 frontpage__producttext<?php echo $count ?>">
                                        <p class="shopcontent__name"><?php echo $currentproduct->get_name(); ?></p>
                                        <p class="shopcontent__tag">Zaden</p>
                                        <p class="shopcontent__price"><?php echo wc_price($price); ?></p>
                                    </div>
                                </a>
                            </div>
                            
                            <?php
                            $count++;
                        }
                    ?>
            </div>
        </div>
        <div class="col-12 col-md-4 my-3 my-md-0 pl-3 pr-md-0 order-1 order-md-2">
            <div class="frontpagefeatured__description position-relative text-center text-md-left">
                <h2>Onze Bestsellers</h2>
                <p>
                    Wij stellen je graag voor aan de populairste 
                    planten van dit seizoen!
                </p>
                <a href="https://www.heturbanhuis.nl/winkel" class="CTA_button btn-outline d-none d-md-inline-block">Bekijk Meer</a>
            </div>
        </div>
        <div class="col-12 col-md-4 order-3">
            <div class="frontpagefeatured__button position-relative text-center text-md-left d-md-none mb-3">
                <a href="https://www.heturbanhuis.nl/winkel" class="CTA_button btn-outline">Bekijk Meer</a>
            </div>
        </div>
    </div>
</div>

<div id="frontpage_recommendations">
    <div class="container containerpadding row px-0 px-md-3 px-lg-0">
        <div class="col m-4 m-md-0">
            <i class="fas fa-quote-left fa-5x frontpage__reviewquote"></i>
            <h2 class="text-center my-3">Zij gingen je voor!</h2>

            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <p class="text-center">

                        Ik besloot ook een aantal soorten zaden te bestellen nadat mijn interesse gewekt werd door de vele leuke plantzaden op Instagram.<br>
                        Al snel werden ze bezorgd en konden de voorbereidingen die handig op de website stonden beginnen.<br>
                        Daarna begint even het minst leuke gedeelte, het wachten.<br>
                        Maar dat ben je al snel vergeten zodra je de eerste puntjes boven de grond ziet komen. Er is niets leukers dan je eigen kamerplanten opkweken.
                        
                        <p class="text-center">
                            <i class="fas fa-star frontpage__reviewstar"></i>
                            <i class="fas fa-star frontpage__reviewstar"></i>
                            <i class="fas fa-star frontpage__reviewstar"></i>
                            <i class="fas fa-star frontpage__reviewstar"></i>
                            <i class="fas fa-star frontpage__reviewstar"></i>               
                            - Stekjesgeluk
                        </p>

                    </p>
                </div>
                <div class="carousel-item">
                    <p class="text-center">
                    
                    Helemaal blij met mijn plantenzaadjes! Snelle levering en persoonlijke service.<br> 
                    Heel leuk en bijzonder om te zien hoe de zaadjes zijn uitgekomen en langzaam groeien tot een echte plant!<br> 
                    Ik hoef nooit meer planten te kopen😊
                        
                        <p class="text-center">
                            <i class="fas fa-star frontpage__reviewstar"></i>
                            <i class="fas fa-star frontpage__reviewstar"></i>
                            <i class="fas fa-star frontpage__reviewstar"></i>
                            <i class="fas fa-star frontpage__reviewstar"></i>
                            <i class="fas fa-star frontpage__reviewstar"></i>               
                            - Amber
                        </p>

                    </p>
                </div>
                <div class="carousel-item">
                    <p class="text-center">
                        
                        Super service bij Het Urbanhuis!<br> 
                        De zaadjes worden snel en netjes bezorgd. Erg fijn ook dat er zaai instructies zijn!<br> 
                        Bijna alle zaadjes ontkiemen, waardoor je (vrij snel) leuke baby plantjes hebt.
                            
                            <p class="text-center">
                                <i class="fas fa-star frontpage__reviewstar"></i>
                                <i class="fas fa-star frontpage__reviewstar"></i>
                                <i class="fas fa-star frontpage__reviewstar"></i>
                                <i class="fas fa-star frontpage__reviewstar"></i>
                                <i class="fas fa-star frontpage__reviewstar"></i>               
                                - greenylab
                            </p>

                        </p>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div id="frontpage_featured_blogs" class="frontpage-background">
    <div class="container containerpadding">
        <div class="row d-block my-3 mb-md-0">
            <h2 class="text-center text-lg-left my-3">Onze meest gelezen Blogs!</h2>
        </div>
        <div class="row d-flex justify-content-between">
            <?php

                //input arguments
                $args = array(
                    'category_name' => 'homepage',
                    'posts_per_page' => 3
                );

                //Customer query
                $query = new WP_QUERY( $args );
                $count = 1;

                if($query->have_posts()) {

                    while($query->have_posts()){

                        $query->the_post();

                        ?>
                            <div class="col-12 col-lg-4 d-flex mb-3 px-3 pl-lg-0">
                                <div class="card featured__card featured__card<?php echo $count;?>">

                                    <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="...">

                                    <div class="card-body">
                                        <a href="<?php the_permalink(); ?>"><h3><?php the_title_attribute();?></h3></a>
                                        <p class="card-text flex-fill"><?php echo strip_tags(get_the_excerpt()); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="CTA_button btn-text">Lees meer</a>
                                    </div>
                                </div>
                            </div>        
                            
                        <?php 
                        $count++;
                    }
                }

                wp_reset_postdata();
            ?>
                       
        </div>
    </div>
</div>

<!-- Get Footer file -->
<?php get_template_part('template-parts/footer/footer') ?>