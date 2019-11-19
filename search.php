<!-- Tells wordpress the page template name -->
<?php /* Template Name: Pagina */ ?>

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
    $s=get_search_query();

    $args = array(
                    's' =>$s
                );
    // The Query
    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) {
            _e("<h2>Zoekresultaten voor: ".get_query_var('s')."</h2>");
            while ( $the_query->have_posts() ) {
            $the_query->the_post();
                    ?>
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                    <?php
            }
        }else{
    ?>
            <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
            <div class="alert alert-info">
            <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
            </div>
    <?php } ?>

</div>


<!-- Get Footer file -->
<?php get_template_part('template-parts/footer/footer') ?>