@extends('layouts.dashboard')
@section('title', 'All categorys')
@section('content')
    @if (session('updated'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('updated') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
    @endif
    @if (session('inserted'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('inserted') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
    @endif
    @if (session('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('deleted') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
    @endif

    <ul>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col"># ID</th>
                <th scope="col">Name</th>
                <th class="text-center" scope="col">Slug</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <th scope="row">{{$category->name}}</th>
                        <th scope="row">{{$category->slug}}</th>
                 <td>
                     @if ($category->category)
                     {{ $category->category->name }} 
                     @endif
                 </td>
                        <td><a href="{{ route('admin.categories.show', $category->id) }}">{{$category->title}}</a></td>
                        <td class="text-center">
                            <a class="mx-2 text-reset btn btn-warning" href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                            <form class="delete-category" action="{{route('admin.categories.destroy', $category->id)}}" class="d-inline-block delete-category" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mx-2" type="submit">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        
    </ul>
@endsection