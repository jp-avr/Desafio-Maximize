@extends('layouts.app')

@section('content')

{{-- <div class="container">
    <div class="row">

     @foreach ($materias as $materia)
     <div class="card col-md-5" style="padding: 15px">
        @include('cards.noticias')
     </div>
       
     @endforeach

      <div class="col-md-2">
        <!-- Conteúdo da terceira coluna -->
        <div class="bg-info text-white p-3">
          <h3>Terceira Coluna</h3>
          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
    </div>
  </div> --}}

  <materias-component></materias-component>

@endsection