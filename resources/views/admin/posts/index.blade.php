@extends('layouts.dashboard')
@section('title', 'All Posts')
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
                <th scope="col">Titolo</th>
                <th class="text-center" scope="col">Actions</th>
                <th class="text-center" scope="col">Category</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <th scope="row">{{$post->slug}}</th>
                 <td>
                     @if ($post->category)
                     {{ $post->category->name }} 
                     @endif
                 </td>
                        <td><a href="{{ route('admin.posts.show', $post->slug) }}">{{$post->title}}</a></td>
                        <td class="text-center">
                            <a class="mx-2 text-reset btn btn-warning" href="{{ route('admin.posts.edit', $post->slug) }}">Edit</a>
                            <form class="delete-post" action="{{route('admin.posts.destroy', $post->slug)}}" class="d-inline-block delete-post" method="post">
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