<!-- Tells wordpress the page template name -->
<?php /* Template Name: Blog Pagina */ ?>

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
    <?php
        if (have_posts()):
            while (have_posts()) : the_post();
                ?><h1><?php the_title(); ?></h1><?php
                the_content();
            endwhile;
        else:
            echo '<p>Er is helaas iets mis gegaan. Neem alsjeblieft contact op via info@heturbanhuis.nl</p>';
        endif;
    ?>
</div>


<!-- Get Footer file -->
<?php get_template_part('template-parts/footer/footer') ?>