<div>
    <input type="text" class="dropdown-item" wire:model="query" placeholder="Search post...""></input>
    @if(!empty($query))
    <ul>
        @foreach($posts as $post)
            <hr>
            <li>
                <a class=" search-link" href=" {{ route('post.show', $post->slug)}}"> {{ $post->title }} </a>
            </li>
        @endforeach
    </ul>
    @endif
</div>
