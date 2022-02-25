@extends('layouts.base')

@section('documentTitle')
  {{ $comic->title }}
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <form action="{{ route('comics.update', $comic->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
          <label for="title" class="form-label">Title Comic</label>
          <input type="text" value="{{$comic->title}}" class="form-control" id="title" name="title">
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input type="text" value="{{$comic->author}}" class="form-control" id="author" name="author">
          @error('author')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input step="0.01" value="{{$comic->price}}" type="number" class="form-control" id="price" name="price">
          @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="genre" class="form-label">Genre</label>
          <input type="text" value="{{$comic->genre}}" class="form-control" id="genre" name="genre">
          @error('genre')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3">{{$comic->description}}</textarea>
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">photo</label>
          <input type="text" value="{{$comic->photo}}" class="form-control" id="photo" name="photo">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-primary" href="{{ route('comics.index') }}">Go Back</a>
      </form>
    </div>
  </div>
@endsection