@extends('layouts.app')

@section('content')
    @mainquery
        <article @php post_class() @endphp role="article">
            <header>
                <h1 class="entry__title">{{ get_the_title() }}</h1>
                @include('partials/entry-meta')
            </header>
            <div class="entry__content">
                @php the_content() @endphp
                single
            </div>
        </article>
    @endmainquery
@endsection
