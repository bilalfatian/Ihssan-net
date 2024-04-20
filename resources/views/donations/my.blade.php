@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Donations</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Campaign id</th>
                <th scope="col">Campaign title</th>
                <th scope="col">Donation Amount</th>
                <th scope="col">Donated at</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($donations as $donation)
            <tr>
                <th scope="row">{{ $donation->id }}</th>
                <td>{{ $donation->campaign_id }}</td>
                <td>{{ $donation->campaign->title }}</td>
                <td>{{ $donation->amount }}</td>
                <td>{{ $donation->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
