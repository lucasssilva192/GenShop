@php use App\Models\ADM\Customer; @endphp
@extends('template.principal')

@section('content')
<div class="container py-5">
  <div class="card mb-3 bg-card" style="max-width: 1500px;">
    <div class="row g-0 p-3">
      <div class="col-md-7">
        <div class="card-body">
          <h2 class="card-title">Pedido #{{ $order->id }}</h2>
          <p class="card-text mt-n0">
          <h6>@php $customer = Customer::where('id', $order->customer_id)->first(); @endphp
              Cliente que comprou: {{$customer->first_name}} {{$customer->last_name}}</h6>
          </p>
          <div class="d-flex align-items-center bg-light mb-3" style="height: 100px;">
              <p class="card-text">
              <h6>Valor Total:  {{$order->price}}</h6>
              </p>
          </div>
          <div class="d-flex align-items-center bg-light mb-3" style="height: 100px;">
              <p class="card-text">
              <h6>Produtos da compra:</h6>
              </p>
              <div>
              </div>
          </div>
          <div class="d-flex align-items-center bg-light mb-3" style="height: 100px;">
          <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
            <tr>
              <td>{{$product->id}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->price}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
          </div>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection