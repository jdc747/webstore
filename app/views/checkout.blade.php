@extends('Layouts.master')

@section('title')
	<title>Checkout Page</title>
@stop

@section('content')

	
		<form action=" method="POST" id="payment-form">
  <span class="payment-errors"></span>
 
  <div class="row">
    <label>
      <span>Card Number</span>
      <input type="text" data-stripe="number">
    </label>
  </div>
 
  <div class="row">
    <label>
      <span>CVC</span>
      <input type="text" data-stripe="cvc">
    </label>
  </div>
 
  <div class="row">
    <label>
      <span>Expiration (MM/YYYY)</span>
      <input type="text" data-stripe="exp-month">
    </label>
    <input type="text" data-stripe="exp-year">
  </div>
 
  <button type="submit">Buy Now</button>
</form>
@stop