@php use App\Models\ADM\Customer; @endphp

@extends('template.principal')

@section('content')

<body>
  <div class="container py-5">
    <div class="card container-sm p-4 bg-card">
      <h1 class="text-center pb-4"> Pedidos </h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Cliente</th>
            <th scope="col">Valor da compra</th>
            <th scope="col">Status</th>
            <th scope="col">Opções</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
            <tr>
              <td>{{$order->id}}</td>
              <td>
                @php $customer = Customer::where('id', $order->customer_id)->first(); @endphp
                {{$customer->first_name}} {{$customer->last_name}}
              </td>
              <td>{{$order->price}}</td>
              <td>{{$order->status}}</td>
              <td>
              <a href="{{route('order.show', $order->id)}}" class="btn btn-primary btn-sm">Visualizar</a>
              <a href="{{route('order.edit', $order->id)}}" class="btn btn-primary btn-sm">Atualizar Status</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endsection