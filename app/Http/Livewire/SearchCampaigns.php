<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campaign;

class SearchCampaigns extends Component
{
    public $searchTerm = '';

    public function render()
    {
        $searchResults = [];
    
        if (!empty($this->searchTerm)) {
            $searchResults = Campaign::where('title', 'like', '%' . $this->searchTerm . '%')
                ->get();
        }
    
        return view('livewire.search-campaigns', [
            'searchResults' => $searchResults,
        ]);
    }
    
}

