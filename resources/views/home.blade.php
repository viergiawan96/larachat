@extends('layouts.app')

@section('meta')
<meta name="user-id" content="{{ Auth::user()->id }}">
@endsection

@section('app')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<div id="app" class="contanier">
    <app-chat><app-chat/>
</div>
@endsection
