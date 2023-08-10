<!-- Test -->
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <input type="search" class="search-field"
            placeholder="<?php esc_html_e( 'Skriv inn det du leter etter og trykk enter...', 'kodeks' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php esc_html_e( 'Søk etter...', 'kodeks' ) ?>" />
    </label>
    <input type="submit" class="search-submit" value=".." />
</form>