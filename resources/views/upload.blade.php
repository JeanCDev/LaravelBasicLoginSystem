@extends('layouts/app-layout')

@section('content')

  <div class="container">
    @if($errors->any())
      <ul>

        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    @endif
  </div>

  <div class="container d-flex justify-content-center mt-5">
    <form action="{{route('uploadSubmit')}}" method="post" enctype="multipart/form-data">
      @csrf
      <label for="file">Arquivo</label><br>
      <input type="file" id="photo" name="photo">
      
      <div class="mt-5 d-flex justify-content-center">
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
    </form>
  </div>
@endsection