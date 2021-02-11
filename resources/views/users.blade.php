@extends('layouts/login-layout')

@php
  use App\Classes\Tools;

  $tools = new Tools();
@endphp

@section('content')
  
<div class="container">
  <div class="row mt-5">
    <div class="col-sm-4 offset-sm-4">
      
      <table class="table table-striped">
        <tr>
          <th>ID</th>
          <th>Email</th>
          <th>Editar</th>
        </tr>
        @foreach ($users as $user)
        <tr>
          <td>{{$tools->crypt($user->id)}}</td>
          <td>{{$user->email}}</td>
          <td>
            <a href="{{ route('edit', ['id' => $tools->crypt($user->id)]) }}">Editar</a>
          </td>
        </tr>
        @endforeach

      </table>

      @if ($errors->any())
        <div class="alert alert-danger mt-5">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
  </div>
</div>

@endsection
