@extends('layouts.blog')

@section('content')
<div class="main-content">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h3 class="article-title"> {{ $post->title }} </h3>
                        </header>
                        <div class="entry-content">
                            {!! $post->content_raw !!}
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection
