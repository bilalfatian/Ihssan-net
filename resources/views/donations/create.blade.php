@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Donate to {{ $campaign->title }}</h2>
    <form action="{{ route('donations.store', $campaign) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">Donation Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" min="1" max="{{ Auth::user()->balance }}" required>
        </div>

        <div class="form-group">
        <label for="comment">Comment</label>
        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>

        <div class="mt-3">
        <button type="submit" class="btn btn-primary">Donate</button>
        </div>

    </form>
</div>
@endsection