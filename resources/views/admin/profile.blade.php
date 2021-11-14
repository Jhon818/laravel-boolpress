@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">I tuoi Dati</div>

                <div class="card-body">
                 
                       <div>{{ Auth::user()->name }}</div>
                       <div>{{ Auth::user()->mail }}</div>
                       @if (Auth::user()->api_token)
                       <div>{{ Auth::user()->api_token }}</div> 
                           
                       @else
                           
                            <form action="{{ route('admin.generate-token') }}" method="POST"></form>
                              @csrf
                              @method('Post')
                              <button type="submit" class="btn btn-primary">
                                  Genera Token Api
                              </button>
                       @endif
           
                      
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
