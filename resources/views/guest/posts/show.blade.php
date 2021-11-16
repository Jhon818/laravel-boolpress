@extends('layouts.app');

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="width: 18rem;">
                 {{ $post->title }}
                <div class="card-body">
                  <h5 class="card-title"> {{ $post->slug }}</h5>
                  <p class="card-text">{!! $post->content !!}</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                @if ($post->cover)
                <img src="{{ asset('storage' . $post->cover) }}" alt="">
                    
                @endif
              </div>
        </div>
    </div>
</div>

@endsection