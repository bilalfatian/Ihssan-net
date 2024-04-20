@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All User Balances</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Balance</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>${{ $user->balance }}</td>
                <td>
                    <a href="{{ route('balance.edit', $user) }}" class="btn btn-primary">Manage Balance</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
