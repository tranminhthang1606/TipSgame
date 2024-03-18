<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
class PostList extends Component
{
    use WithPagination;
    #[Url()]
    public $sort = 'desc';
    #[Url()]
    public $search = '';

    #[Url()]
    public $category = '';

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    #[On('search')]
    public function updatedSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }
    #[Computed()]
    public function posts()
    {
        return Post::published()->orderBy('published_at', $this->sort)->when($this->activeCategory,function($query){
            $query->withCategory($this->category);
        })->where('title', 'like', "%{$this->search}%")->paginate(5);
    }

    #[Computed()]
    public function activeCategory()
    {
        if ($this->category === null || $this->category === '') {
            return null;
        }
// dd(Category::where('slug', Str::slug($this->category))->first());

         return Category::where('slug', Str::slug($this->category))->first();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->category = '';
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.post-list');
    }
}