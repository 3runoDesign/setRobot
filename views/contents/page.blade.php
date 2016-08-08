@while (have_posts()) {{ the_post() }}
    <article {{ post_class() }}>
        <header>
          <h1 class="entry-title">
              {{ the_title() }}
          </h1>
        </header>

        <section class="entry-content">
          {{ the_content() }}
        </section>

    </article>
@endwhile
