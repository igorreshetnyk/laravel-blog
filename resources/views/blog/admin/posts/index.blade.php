@extends('layouts.app')

@section('content')
<div class="container">
    @include('blog.admin.posts.includes.result_messages')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <a class="btn btn-primary" href="{{ route('blog.admin.posts.create') }}">Create</a>
            </nav>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hower">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Autor</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Data publish</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paginator as $post)
                            <tr @if (!$post->is_published) style="background-color: #ccc;" @endif>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td>
                                    <a href="{{ route('blog.admin.posts.edit', $post->id) }}">{{ $post->title }}</a>
                                </td>
                                <td>
                                    {{ $post->published_at ? Carbon\Carbon::parse($post->published_at)
                                        ->format('d.M. H:i') : '' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if($paginator->total() > $paginator->count())
    <br>
    <div class="container">
        <div class="row justify-content-center">
            {{ $paginator->links() }}
            {{ $paginator->total() }}
            {{ $paginator->count() }}
        </div>
        @endif
    </div>

    @endsection
