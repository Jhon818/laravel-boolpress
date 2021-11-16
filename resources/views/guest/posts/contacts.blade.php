@extends('layout.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Contacts</h1>
            <form action="{{ route('contacts.send')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">emaili</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="messaggio">messaggio</label>
                    <input type="text" name="messaggio" id="messaggio" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="send">
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection