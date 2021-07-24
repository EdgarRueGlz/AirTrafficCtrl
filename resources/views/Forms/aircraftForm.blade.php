@extends('components.layouts.main')
@section('content')
    <div class="form-cotainer">
        <div class="form-input">
            <label class="form-label">Modelo</label>
            <input type="text" class="formInput" id="model" name="model" required>
        </div>
        <div class="form-input">
            <label class="form-label">Tipo</label>
            <select id="type" class="formSelect" name="type">
                <option value="0">Seleccione el tipo</option>
                <option value="1">Emergencia</option>
                <option value="2">VIP</option>
                <option value="3">Pasajero</option>
                <option value="4">Cargo</option>
            </select>
        </div>
        <div class="form-input">
            <label class="form-label">Tamaño</label>
            <select id="size" class="formSelect" name="size">
                <option value="0">Seleccione el tamaño</option>
                <option value="1">Chico</option>
                <option value="2">Grande</option>
            </select>
        </div>
        <div class="form-footer">
            <a class="btn cancel" href="{{ route('dashboard') }}">Cancelar</a>
            <button  class="btn primary" type="submit" onclick="sendData()">Guardar</button>
        </div>
    </div>

<script type="text/javascript" src="{{ URL::asset('/js/aircraft/form.js') }}"></script>
@endsection