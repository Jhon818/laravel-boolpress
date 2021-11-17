@extends('layouts.app');

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
          Visualizzazione della categoria 
            <div class="card" style="width: 18rem;">
                 {{ $category->id }}
                <div class="card-body">
                  <h5 class="card-title"> {{ $category->slug }}</h5>
                  <p class="card-text">{!! $category->name !!}</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div> 
              <div class="col-12 m-5">
                <h2>Lista dei post collegati alla categoria</h2>
                <ul>
                  @foreach ($category->posts as $post)
                  <li>
                    <a href="{{ route('admin.posts.show' , $post->slug) }}"> {{ $post->title }}</a>
                   
                  </li>
                      
                  @endforeach
                </ul>
              </div>
        </div>
    </div>
</div>

@endsection