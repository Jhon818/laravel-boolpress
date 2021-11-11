@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex flex-column">
                <div class="card my-bg mb-3 my-shadow">
                    <div class="card-header my-bg-dark py-0 px-4">
                        <h2 class="mt-2 mb-3 text-white"> Crea post</h2>
                    </div>
                    <div class="card-body d-flex flex-column py-3 my-hr px-4">
                        <form action="{{ route('admin.categories.update', $category->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="text-white my-font-s20" for="name">Nome</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$category['name'])}}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                               <button type="submit" class="btn btn-success">Invia</button>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection