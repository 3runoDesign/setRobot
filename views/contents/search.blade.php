{{ get_search_form() }}
<div>
   <h1>Resultados Busca</h1>

   <ul>
   @wpquery(have_posts())
        <li>
            <a href=" {{ the_permalink() }} ">
                <h2>{{ the_title() }}</h2>
                <p>{{ the_excerpt() }}</p>
            </a>
            <hr>
        </li>
   @wpempty
        <li>Sem Resultado!</li>
   @wpend
   </ul>
</div>
