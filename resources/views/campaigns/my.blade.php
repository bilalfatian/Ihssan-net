@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>My Campaigns</h1>
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            @csrf
            @foreach ($campaigns as $campaign)
            @if (Auth::user()->id == $campaign->publisher_id || Auth::user()->role == 'admin')
                <div class="card shadow border-0 mt-4">
                    <div class="card-header">
                        <h5 class="font-weight-bold">{{ $campaign->title }}</h5>
                    </div>
                    <div class="card-body">
                        <p>Needed money: {{ $campaign->needed_money }}</p>
                        <p>Raised money: {{ $campaign->raised_money }}</p>
                        <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-secondary">Edit</a>
                        <div class="mt-3">
                            <form method="POST" action="{{ route('campaigns.destroy', $campaign->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
