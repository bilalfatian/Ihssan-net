@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-9">
                <div class="text">
                    <h1><strong>Campaigns</strong></h1>
                </div>
            </div>

            <div class="col-3">
                <form method="GET" action="{{ route('campaigns.index') }}">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search campaigns" aria-label="Search campaigns" aria-describedby="button-addon2" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>   

        <div class="mt-3">
        </div>
        <div id="campaigns-container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($campaigns as $campaign)
            <div class="col">
                <div class="card shadow border-0 rounded-4 card-hover-zoom">
                    <a href="{{ route('campaigns.show', $campaign->id) }}">
                        <img class="card-img-top"  src="{{ asset('storage/images/' . $campaign->image) }}" alt="Campaign image" style="width:100%; max-height:300px; object-fit:cover;">
                        <div class="card-img-overlay">
                            <span class="badge rounded-pill bg-light text-dark" style="font-size:0.9rem;">&nbsp;<i class="bi bi-tags-fill"></i>&nbsp;&nbsp;{{  $campaign->category->name }}</span>
                        </div>         
                        </a>
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">{{ $campaign->title }}</h5>
                        <p class="mt-3">&nbsp;&nbsp;<i class="bi bi-person-fill"></i>&nbsp;by <strong>{{  $campaign->publisher->first_name }} {{ $campaign->publisher->last_name }}</strong></p>
                        <div class="mt-3">
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($campaign->raised_money / $campaign->needed_money) * 100 }}%;" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <div class="mt-3">
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <p class="h5">${{ number_format($campaign->raised_money,0) }} raised</p>
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn btn-success">More Details</a>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="bi bi-clock"></i>&nbsp;&nbsp;Created {{ $campaign->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        </div>
    </div>
@include('layouts.footer')


@endsection


