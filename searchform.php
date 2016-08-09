<form role="search" method="get" id="searchform"
    class="searchform" action="<?php esc_url( home_url( '/' ) ) ?>">
    <div>
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="Buscar" />
    </div>
</form>
