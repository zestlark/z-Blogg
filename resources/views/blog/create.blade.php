@extends('layouts.main')

@section('page')
    <form method="POST" action="{{ route('createBlog') }}" class="m-5">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" >
            @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="keyword">Keyword</label>
            <input type="text" class="form-control" id="keyword" name="keyword" >
            @error('keyword')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" class="form-control" id="url" name="url" >
            @error('url')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input readonly value="{{ Auth::user()->name }}" type="text" class="form-control" id="author"
                name="author" >
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
