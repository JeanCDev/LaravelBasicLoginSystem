<div class="container-fluid bg-dark text-white p-3">
  <div class="container">
    <div class="row">
      <div class="col-6">
        [App de login]
      </div>
      <div class="col-6">
        {{session('user')}} | 
        <a href="{{route('logout')}}">Logout</a>
      </div>
    </div>
  </div>
</div>