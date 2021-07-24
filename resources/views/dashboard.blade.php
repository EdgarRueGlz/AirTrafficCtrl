@extends('components.layouts.main')
@section('content')
<script type="text/javascript" src="{{ URL::asset('/js/aircraft/main.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}" />
<div class="main-container">
    <h4 class="title">Lista de trafico</h4>
    <div class="header">
        <a href="{{ route('aircraft-create') }}">Agregar Aereonave</a>
    </div>
    <div id="table-cotainer"></div>
</div>
@endsection