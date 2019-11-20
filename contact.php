<!-- Tells wordpress the page template name -->
<?php /* Template Name: Contact */ ?>

<!-- Get Head file -->
<?php get_template_part('template-parts/header/header') ?>

<!-- Get main Navbar -->
<?php get_template_part('template-parts/navbar/navbarmain') ?>

<!-- Contact content -->

<div class="banner__green"> 
    <div class="container">
        <div class="flex-container banner__green__content">
            <div class="banner__green__text"><br></div>
        </div>
    </div>
</div>

<div class="container containerpadding">
    <div class="row">

        <div class="col-12 col-lg-6 text-center text-lg-left pl-lg-0 my-3 order-2 order-lg-1">
            <h1 class="mb-2">Contactgegevens</h1>
            <p>
                Het UrbanHuis
                <br>
                E-mail: info@heturbanhuis.nl
            </p>
            <p>
                KvK nummer: 737 387 00
                <br>
                BTW nummer:  NL210575050B01
            </p>
            
            <img class="contact__foto px-0" src="<?php echo get_bloginfo( 'template_directory' );?>/assets/images/contact_davide.jpg" alt="Davide verzorgt een zelf gezaaide kamerplant">
        
        </div>

        <div class="col-12 col-lg-6 my-3 order-1 order-lg-2">
            <div class="contact__contactform">
                <h2>Stel hier je vraag!</h2>
                <p>
                    Heb je vragen of wil je contact met ons opnemen? Vul dan ons contactformulier in. We kijken er zo spoedig mogelijk naar!
                </p>
                <?php
                    if (have_posts()):
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    else:
                        echo '<p>Er is helaas iets mis gegaan. Neem alsjeblieft contact op via info@heturbanhuis.nl</p>';
                    endif;
                ?>
            </div>
        </div>

    </div>
</div> 

<!-- Get Footer file -->
<?php get_template_part('template-parts/footer/footer') ?>