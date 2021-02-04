@extends('layouts/login-layout')

@section('content')
  
<div class="container">
  <div class="row mt-5">
    <div class="col-sm-4 offset-sm-4">
      <form action="{{route('submit')}}" method="POST">
        @csrf
        <h4>Login</h4>

        @if (isset($error))
        <div class="alert alert-danger mt-5">
          <li>{{$error}}</li>
        </div>
      @endif

        <div class="form-group">
          <label for="" class="form-label">Usuário:</label>
          <input type="text" name="email" class="form-control" placeholder="digite seu email">
        </div>

        <div class="form-group">
          <label for="" class="form-label">Senha:</label>
          <input type="password" name="password" class="form-control" placeholder="digite sua Senha">
        </div>

        <div class="form-group mt-3">
          <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
      </form>

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
