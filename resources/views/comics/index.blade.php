@extends('layouts.base')

@section('documentTitle')
    {{ $title }}
@endsection

@section('content')
<div class="container-fluid pe-5 ps-5">
  <div class="row">
    <h1 class="h1">Admin - All Comics</h1>
  </div>
  <div class="row">
    <div class="col">
      <a href="{{ route('comics.create') }}" class="btn btn-primary mb-2">Add new comic</a>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <table class="table table-primary">
        <thead>
          <tr class="table-primary">
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Genre</th>
            <th>Description</th>
            <th>Photo</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($comics as $comic)
          <tr>
            <td class="text-capitalize">{{ $comic->title }}</td>
            <td>{{ $comic->author }}</td>
            <td>{{ $comic->price }} €</td>
            <td>{{ $comic->genre }}</td>
            <td>{{ $comic->description }}</td>
            <td>{{ $comic->photo }}</td>
            <td><a class="btn btn-primary" href="{{ route('comics.show', $comic->id) }}">View</a> <a class="btn btn-primary mt-2" href="{{route('comics.edit', $comic->id)}}">Edit</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
      </div>
    </div>
    <div class="row">
        <div class="col">
          {{ $comics->links() }}
        </div>
    </div>
  </div>
@endsection