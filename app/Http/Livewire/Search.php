<?php

namespace App\Http\Livewire;

use App\Models\BlogPost;
use App\Repositories\BlogPostRepository;
use Livewire\Component;

class Search extends Component
{
    public $query = '';
    public $posts = [];

    public function updatedQuery()
    {
        $this->posts = BlogPost::where('title', 'like', '%'. $this->query . '%')->limit(5)->get();
        $res = BlogPostRepository::class;
    }

    public function render()
    {
        return view('livewire.search');
    }
}
