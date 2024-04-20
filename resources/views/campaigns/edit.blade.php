@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Campaign</h2>
        <form method="POST" action="{{ route('campaigns.update', $campaign->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $campaign->title) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ old('description', $campaign->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $campaign->category_id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="needed_money">Needed Money</label>
                <input type="number" class="form-control" id="needed_money" name="needed_money" value="{{ old('needed_money', $campaign->needed_money) }}" required>
            </div>
            <div class="mt-3"></div>

            <div class="form-group">
                <label for="image">Campaign Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="mt-3"></div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
