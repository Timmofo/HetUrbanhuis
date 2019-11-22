<!-- Tells wordpress the page template name -->
<?php /* Template Name: Blog */ ?>

<!-- Get Head file -->
<?php get_template_part('template-parts/header/header') ?>

<!-- Get main Navbar -->
<?php get_template_part('template-parts/navbar/navbarmain') ?>

<!-- Frontpage content -->

<div class="banner__green"> 
    <div class="container">
        <div class="flex-container banner__green__content">
            <div class="banner__green__text"><br></div>
        </div>
    </div>
</div>

<div id="frontpage_featured_blogs" class="">
    <div class="container containerpadding">      
        <h1 class="ml-3 ml-lg-0">Welkom op de blog van het Urbanhuis!</h1>
        <div class="row d-flex justify-content-between">
            <?php

                //input arguments
                $args = array(
                    'category_name' => 'featured',
                    'posts_per_page' => 3
                );

                //Customer query
                $query = new WP_QUERY( $args );
                $count = 1;

                if($query->have_posts()) {

                    while($query->have_posts()){

                        $query->the_post();

                        ?>
                            <div class="col-12 col-md-6 col-lg-4 d-flex py-3 pl-lg-0">
                                <div class="card featured__card<?php echo $count;?>">

                                    <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="...">

                                    <div class="card-body">
                                        <a href="<?php the_permalink();?>"><h2><?php the_title_attribute();?></h2></a>
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

<div class="banner__green"> 
    <div class="container">
        <div class="flex-container banner__green__content">
            <div class="banner__green__text"><br></div>
        </div>
    </div>
</div>

<div class="blog__content container containerpadding">
    <div>
        <ul class="blog__categories text-center">
            <li class="blog__categoryitem my-2 p-0 pr-sm-5"><a class="activenav" href="https://www.heturbanhuis.nl/blog">Alle Onderwerpen</a></li>
            <?php
            //filter homepage & featured category
            $featured_id = get_cat_ID('featured');
            $homepage_id = get_cat_ID('homepage');

            $all_categories = get_categories( array(
                'taxonomy' => 'category',
                'exclude' => array($featured_id, $homepage_id),
                'hide_empty' => 1
            ));
            foreach($all_categories as $category){
                $cat_id = $category->term_id;
                $category_name = $category->name;
                ?>
                <li class="blog__categoryitem mb-2 p-0 pr-sm-5"><a href=<?php echo get_category_link($cat_id); ?>><?php echo $category_name; ?></a></li>
                <?php
            }
            ?>
            <li class="blog__categorysearch p-0 mb-3">               
                <?php get_search_form(); ?>
            </li>
        </ul>
    </div>

    <?php

//input arguments
$args = array(
    'posts_per_page' => 20,
    'category_not_in' => array($featured_id, $homepage_id)
);

//Customer query
$query = new WP_QUERY( $args );

if($query->have_posts()) {

    while($query->have_posts()){

        $query->the_post();

        ?>
            <div class="row blog__post">
                <div class="blog__contentcontainer col-12 col-md-6 py-3 pl-md-0 order-2 order-md-1">
                    <a href="<?php the_permalink();?>"><h3 class="blog__title"><?php the_title_attribute();?></h3></a>
                    <p>
                    <?php echo strip_tags(get_the_excerpt()); ?>
                    </p>
                    <p><a href="<?php the_permalink();?>" class="CTA_button btn-text">Lees verder</a></p>
                    <p class="blog__publication d-inline text-left"><span><?php echo get_the_date(); ?></span></p>                    
                    <p class="blogpost__category col-12 col-sm-6 text-right pl-1 pl-sm-3">Categorie: </p> <?php add_filter('the_category','the_category_filter',$featured_id,$homepage_id); ?>
                </div>
                <div class="blog__picturecontainer col-12 col-md-6 p-2 p-md-0 pr-lg-3 mt-3 order-1 order-md-2">
                    <img class="blog__picture" src="<?php the_post_thumbnail_url(); ?>">        
                </div>
            </div>
        <?php 
    }
}
 
wp_reset_postdata();
?>  
</div>    


<!-- Get Footer file -->
<?php get_template_part('template-parts/footer/footer') ?>