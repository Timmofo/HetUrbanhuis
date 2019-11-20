<!-- Searchform template, overrides default WP searchform -->

<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( ' Zoeken', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <button type="submit" role="button" class="blogpage__searchbutton">
        <span>
            <i class="fas fa-search blogpage__searchicon"></i>
        </span>
    </button>
</form>