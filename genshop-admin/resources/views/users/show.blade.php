@extends('template.principal')

@section('content')
<div class="container py-5">
  <div class="card mb-3 container-sm" style="max-width: 1500px;">
    <div class="row g-0">
      <div class="col-md-7">
        <div class="card-body">
          <h2 class="card-title">{{ $user->name }}</h2>
          <p class="card-text mt-n0">
          <h6>Email:</h6>
          </p>
          <p class="card-text">
            {{ $user->email }}
          </p>
          <p class="card-text mt-n0">
          <h6>Permissões:</h6>
          </p>
          <p class="card-text">
            {{ $user->permissions }}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
