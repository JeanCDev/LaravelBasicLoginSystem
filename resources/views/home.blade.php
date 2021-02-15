@extends('layouts/app-layout')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      {{-- Pega os arquivos de storage --}}
      <form action="{{route('download')}}" method='get'>
        <button type="submit" class="btn btn-primary my-3">Baixar imagem</button>
      </form>

      <img src="{{asset('storage/images/photo.jpg')}}">
    </div>
  </div>
</div>

@endsection