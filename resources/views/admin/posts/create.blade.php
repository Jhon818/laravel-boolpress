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
                            <label for="category_id">category_id</label>
                            <select name="category_id" id="category_id" class="form-control  @error('category_id') is_invalid @enderror">
                                <option value=""> seleziona</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{old('category_id') == $category->id ? 'selected' : null}}>{{ $category->name }}</option>
                                    
                                @endforeach
                            </select>
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
                            <p>Seleziona i tag</p>
                            <div class="form-check form-check-inline">
                                <input name="tags[]" class="form-check-input" type="checkbox">
                                <label class="form-check-label">Test Check</label>
                              </div>
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