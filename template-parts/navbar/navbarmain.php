    <!-- NAVBAR -->

    <!-- Keep this part in to create dynamic space for the navbar -->
    <nav id="navbarmain">
        <div class="container">
            <br>
        </div>
    </nav>

    <nav id="navbarmain" class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars navbarmain__icon"></i>
                </span>
            </button>
            <a class="navbar-brand pb-3 pb-lg-0 m-0" id="navbarmain__brand" href="http://testomgeving.heturbanhuis.nl">
                <img src="<?php echo get_bloginfo( 'template_directory' );?>/assets/images/logo_heturbanhuis.png" width="auto" height="30rem" alt="logo het urbanhuis">
            </a>
            <a class="navbarmain__shoppingcart1 px-3" href="http://testomgeving.heturbanhuis.nl/cart"> 
                <i class="fas fa-shopping-cart" id="shoppingcarticon1"></i>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item text-center">
                        <a id="navmain__shoplink" class="nav-link navbarmain__link" href="http://testomgeving.heturbanhuis.nl/winkel">Shop<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item text-center">
                        <a id="navmain__bloglink" class="nav-link navbarmain__link" href="http://testomgeving.heturbanhuis.nl/blog">Blog</a>
                    </li>
                    <li class="nav-item text-center">
                        <a id="navmain__aboutlink" class="nav-link navbarmain__link" href="http://testomgeving.heturbanhuis.nl/about">About</a>
                    </li>
                    <li class="nav-item text-center">
                        <a id="navmain__contactlink" class="nav-link navbarmain__link" href="http://testomgeving.heturbanhuis.nl/contact">Contact</a>
                    </li>       
                    <li class="nav-item text-center"> 
                        <a class="navbarmain__shoppingcart2 navbarmain__link" href="http://testomgeving.heturbanhuis.nl/cart"> 
                            <i class="fas fa-shopping-cart" id="shoppingcarticon2"></i>
                        </a>
                    </li>         
                </ul>
            </div>
        </div>    
    </nav>