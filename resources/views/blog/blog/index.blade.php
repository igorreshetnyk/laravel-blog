@extends('layouts.blog')

@section('content')

<div class="row justify-content-md-center">
    <div class="col-md-8">
        @foreach ($posts as $post)
        <div class="flex">
            <div class="card-body card-body-shadow">
                <h4 class="card-title text-bold"><a class="card-text-link"
                        href="{{ route('post.show', $post->slug)}}">{{ $post->title }}</a></h4>
                <p class="card-text card-text-margin"><a class="card-text-link"
                        href="{{ route('post.show', $post->slug)}}">
                        {{ \Str::words($post->excerpt, 18) }}</a></p>
                <a href="#"><img class="img-circle img-size" src="images/user1-128x128.jpg" alt="photo"></a>
                <a class="card-text-link" href="#"><small class="text-muted">Vasya Pupkin</small></a>
                <small class="pull-right text-muted">{{ $post->published_at ? Carbon\Carbon::parse($post->published_at)
                            ->format('d.M. H:i') : ''  }}</small>
            </div>
        </div>
        @endforeach

        <div class="row justify-content-center link-center pagination">
            {{-- <a class="link-center" href="">CHECK MORE ARTICLES</a> --}}
            {{ $posts->links() }}
        </div>
    </div>
</div>

@endsection
