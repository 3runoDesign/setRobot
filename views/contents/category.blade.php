<section id="primary">
    <div id="content" class="site-content" role="main">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title">{{ the_archive_title() }}</h1>
                {{ the_archive_description( '<div class="taxonomy-description">', '</div>' ) }}

            </header>

            @include('partials.content')

            {!! setrobot_pagination([]) !!}
        <?php endif; ?>
    </div>
</section>
