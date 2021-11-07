@extends('layouts.dashboard')
@section('title', 'New post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">               
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                                <article>
                    <h1>Vista Create Post</h1>
                    <form action="{{route('admin.posts.store')}}" method="post">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="title">Titolo</label>
                            <input value="{{old('title')}}" type="text" name="title" id="title" class="form-control  
                            @error('title')
                                is-invalid
                            @enderror">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea type="text" name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{old('content')}}</textarea>@error('content') <div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <textarea type="text" name="thumbnail" id="thumbnail" class="form-control
                            @error('thumbnail') is-invalid @enderror">{{old('thumbnail')}}</textarea>@error('thumbnail')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input value="{{old('author')}}" type="text" name="author" id="author" class="form-control   
                            @error('author')
                                is-invalid
                            @enderror">
                            @error('author')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Crea post</button>
                        </div>

                    </form>
                </article>
                
            </div>
        </div>
    </div>
@endsection