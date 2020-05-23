<?php

namespace App\Http\Livewire;

use App\Models\BlogPost;
use Livewire\Component;

class Search extends Component
{
    public $query = '';
    public $posts = [];

    public function updatedQuery()
    {
        if (strlen($this->query) > 2) {
            $this->posts = BlogPost::where('title', 'like', '%' . $this->query . '%')->limit(5)->get();
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
