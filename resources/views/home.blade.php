@extends('layouts.app')

@section('meta')
<meta name="user-id" content="{{ Auth::user()->id }}">
@endsection

@section('app')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Laravel Messager</div>
                <div id="app" class="card-body">
                    <app-chat><app-chat/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
