@extends('layouts.dashboard')
@section('title', $post->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <article>
                    <h3 class="mb-3">ID post: {{$post->id}}</h3>
                    <header class="mb-4">
                        <h1 class="fw bolder mb-1">{{ $post->title }}</h1>
                    </header>
                    <div class="text-muded fst-italic mb-2">Author: {{ $post->author }}</div>
                    <section class="mb-5">
                      
                          
                                    <div class="card" style="width: 18rem;">
                                         {{ $post->title }}
                                        <div class="card-body">
                                          <h5 class="card-title"> {{ $post->slug }}</h5>
                                          <p class="card-text">{!! $post->content !!}</p>
                                          <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                        @if ($post->cover)
                                        <img src="{{ asset('storage/' . $post->cover) }}" alt="">
                                            
                                        @endif
    
                            
                        </div>
                    </section>
                </article>
                
            </div>
        </div>
    </div>
@endsection