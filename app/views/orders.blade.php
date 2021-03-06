<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<nav class="navbar navbar-inverse" style="margin-bottom:7px">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="" href="/">Electronic Store</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav" style="margin-top:20px">
      <!--<form class="navbar-form navbar-left">-->
      <!--
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>-->
        <!--start of search form -->

        <div id="search-form"> {{Form::open(array('route' => 'search', 'method'=>'GET'))}}
                               {{Form::text('query',null,array('placeholder'=>'Search for products...'))}}
                               {{Form::submit('search')}}
                               {{Form::close()}}

        </div>

      </ul>
          <!--end of search form-->



      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
                        <li><a href="/login">Login</a></li>
                        <li><a href="/signup">Signup</a></li>
                        @else
                        <li><a href="/orders">My Orders <span class="fa fa-briefcase"></span></a></li>
                        <li><a href="/cart">Cart <span class="fa fa-shopping-cart"></span></a></li>
                        <li><a href="/logout">Logout</a></li>>

      </ul>
      @endif
    </div>
   
  </div>
</nav>

	<title>Orders</title>


</head>
<body>
	<div class="container">
		<h1>Order History</h1>

		@foreach($orders as $order)
			<a href="#">{{Auth::user()->name}} {{$order->created_at->format('m-d-Y H:i' )}} </a>

			<table class="table table-bordered table-striped">
			<thead>
			<tr>	
				<th>Product</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Total</th>

			</tr>
			</thead>
			<tbody>
			@foreach($order->order_items as $order_item)
				<tr>
					<td>{{$order_item->name}}</td>
					<td>{{$order_item->pivot->quantity}}</td>
					<td>{{$order_item->pivot->price}}</td>
					<td>{{$order_item->pivot->total}}</td>
				</tr>
			@endforeach
			<tr>
				<td></td>
				<td></td>
				<td><strong>Total</strong></td>
				<td><strong>{{$order->total}}</strong></td>
			</tr>
			</tbody>
		</table>
		@endforeach	
	</div>

</body>
</html>