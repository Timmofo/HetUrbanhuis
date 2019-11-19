<!-- Tells wordpress the page template name -->
<?php /* Template Name: About */ ?>

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

<div class="container containerpadding">
    <div class="row">
        
        <div class="col-lg-6 col-sm-12 mb-3 order-2 order-lg-1 px-3 px-lg-0">
            <img src="<?php echo get_bloginfo( 'template_directory' );?>/assets/images/about_davide.jpg" alt="Davide Brouwer" height="auto" width="100%">
        </div>

        <div class="col-lg-6 col-sm-12 mt-3 mt-md-0 px-3 order-1 order-lg-2">
            <h1>Even voorstellen!</h1>
            <p>
                Het Urbanhuis is ontstaan uit passie en plezier voor kamerplanten. Het Urbanhuis wil dit dan ook graag delen met mensen die hier ook zo veel plezier uit halen. Echter maakt het Urbanhuis het een stapje uitdagender, een eigen urbanjungle creëren met de zaden van het Urbanhuis! Kweek de kamerplanten die je wilt en maak de ontwikkeling mee van zaadje naar prachtige kamerplant. Deel jouw ervaring met het Urbanhuis en laat ons jouw urbanjungle zien via Instagram of Facebook!  Samen maken we deze wereld wat groener met onze zelf gekweekte kamerplanten.
            </p>
            <p>
                Het Urbanhuis is voor mij een hobby geworden die mij in het dagelijks leven in balans houdt, het bezig zijn met mijn handen en een nieuwe plant zien opbloeien geeft mij voldoening waardoor ik er met veel plezier mee bezig blijf.
            </p>
        </div>
    </div>
</div>

<!-- Get Footer file -->
<?php get_template_part('template-parts/footer/footer') ?>