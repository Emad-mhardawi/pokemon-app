<div class="header">
    <a href="/pokemons" ><h1 class="header-title">Pokemon</h1></a>
    <form class="search-form" method="GET"  action={{route('search') }} > 
        <input class="search-form_input" type="search" name="search" placeholder="search pokemon name or type">
        <button class="search-form_button" type="submit">Search</button>
    </form>
</div>