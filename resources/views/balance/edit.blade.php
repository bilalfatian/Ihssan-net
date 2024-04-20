@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Balance for {{ $user->first_name }} {{ $user->last_name }}</h2>
    <form action="{{ route('balance.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="balance">Balance</label>
            <input type="number" class="form-control" id="balance" name="balance" min="0" value="{{ $user->balance }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Balance</button>
    </form>
</div>
@endsection
