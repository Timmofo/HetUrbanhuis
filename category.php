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
    <h1 class="text-center">Blog Categorie: <?php single_cat_title(); ?></h1>
    <?php
        if (have_posts()):
            while (have_posts()) : the_post();
                ?>

                    <div class="row blog__post">
                        <div class="blog__contentcontainer col-12 col-md-6 py-3 order-2 order-md-1">
                            <h3 class="blog__title"><?php the_title_attribute();?></h1>
                            <p>
                            <?php echo strip_tags(get_the_excerpt()); ?>
                            </p>
                            <p><a href="<?php the_permalink();?>" class="CTA_button btn-text">Lees verder</a></p>
                            <p class="blog__publication d-inline text-left">door <span><?php the_author(); ?></span> - <span><?php echo get_the_date(); ?></span></p>                    
                            <p class="blogpost__category col-12 col-sm-6 text-right pl-1 pl-sm-3">Categorie: </p> <?php the_category(); ?>
                        </div>
                        <div class="blog__picturecontainer col-12 col-md-6 mt-3 order-1 order-md-2">
                            <img class="blog__picture" src="<?php the_post_thumbnail_url(); ?>">        
                        </div>
                    </div>

                <?php
            endwhile;
        else:
            echo '<p>Er is helaas iets mis gegaan. Neem alsjeblieft contact op via info@heturbanhuis.nl</p>';
        endif;
    ?>
</div>


<!-- Get Footer file -->
<?php get_template_part('template-parts/footer/footer') ?>