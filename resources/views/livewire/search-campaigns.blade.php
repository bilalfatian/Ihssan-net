<div class="mb-4">
    <input class="form-control" type="search" placeholder="Search campaigns..."  wire:model="searchTerm">
</div>

<div>
    @if(count($searchResults) > 0)
        @foreach($searchResults as $result)
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $result->title }}</h5>
                    <p class="card-text">{{ $result->description }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>No campaigns found.</p>
    @endif
</div>
