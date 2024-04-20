@extends('layouts.app')

@section('content')
<div class="container">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mt-3">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                    <div class="mt-3">
                    </div>
</div>
@endsection
