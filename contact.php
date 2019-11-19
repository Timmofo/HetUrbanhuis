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

        <div class="col-12 col-md-6 my-3 pl-3 pl-lg-0 order-2 order-md-1">
            <h1 class="text-center text-lg-left">Contactgegevens</h1>
            <p class="text-center text-lg-left">
                Het UrbanHuis
                <br>
                E-mail: info@heturbanhuis.nl
            </p>
            <p class="text-center text-lg-left">
                KvK nummer: 737 387 00
                <br>
                BTW nummer:  NL210575050B01
            </p>
            
            <img class="contact__foto px-0" src="<?php echo get_bloginfo( 'template_directory' );?>/assets/images/contact_davide.jpg" alt="Contact">
        
        </div>

        <div class="col-12 col-lg-6 my-3 order-1 order-md-2">
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