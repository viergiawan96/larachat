@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div id="app" class="card-body">
                    <app-chat><app-chat/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
