@extends('layouts.app')

@section('meta')
<meta name="user-id" content="{{ Auth::user()->id }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Chatting With Laravel</div>
                <div id="app" class="card-body">
                    <app-chat><app-chat/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
