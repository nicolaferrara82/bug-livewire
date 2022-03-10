<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostIndex extends Component
{
    public $filters= [
        'search' => '',
        'category' => ''
    ];

    protected $queryString = ['filters'];

    public function resetAllFilters()
    {
        $this->reset('filters');
    }

    public function render()
    {
        $posts = Post::query()
            ->when($this->filters['search'], fn($query, $value) => $query->where('title', 'LIKE', '%' . $value . '%'))
            ->when($this->filters['category'], fn($query, $value) => $query->where('category', $value))
            ->get();
    
        return view('livewire.post-index', [
            'posts' => $posts,
            'categories' => ['one', 'two']
        ]);
    }
}
