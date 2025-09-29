@extends('layout.frontend')

@section('content')
<div class="container">
  <br>
  <div class="row">
    <!-- {{ Html::form('GET','/search')->open()}}
<div class="input-group mb-2">
    {{ Html::input('text','keyword', $keyword ?? '')->class('form-control') }}
    <span class="input-group-btn">
        {{ Html::submit('Search')->class('btn btn-primary') }}
    </span>
</div>
{{  Html::form()->close() }} -->
    @foreach($products as $product)
    <div class="col-xs-18 col-sm-6 col-md-3">
      <div class="thumbnail">
        <!-- <img src="img/{{$product->image}}" width="200px" alt=""> -->
        <a href="{{url('/show/'.$product->id)}}">
          <img src="{{asset('img/'.$product->image)}}" width="200px" alt="">
        </a>
        <div class="caption">
          <h4>{{ $product->name }}</h4>
          <p>{{ $product->description }}</p>
          <p><strong>Price: </strong> {{ $product->price }}$</p>
          <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a></p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <!-- Pagination -->
  {{ $products->links('pagination::bootstrap-5');}}
</div>
@endsection