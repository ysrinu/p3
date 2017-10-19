@extends('layouts.master')

@section('title')
  {{ $shipType }} cost
@endsection

@push('head')
    <link href="/css/cost/index.css" type='text/css' rel='stylesheet'>
@endpush

@section('content')
    <section>
        <header><h1>Shipping Cost Calculator</h1></header>
        <p>
            Calculated shipping cost between two zip codes is:.
        </p>
    </section>
    <p>
        @if($shipType)
            You selected <label class="category">Shipping Type : {{ $shipType}} </label><br />
         @else
            No Shipping Type selected
         @endif
    </p>
    <fieldset>
        <legend>Customer and Package Information</legend>
        <label class="category">Name : Unknown</label><br />
        <label class="category">Books Only : Unknown</label><br />
    </fieldset><br />
    <fieldset>
        <legend>Shipping Origin and Destination</legend>
        <label class="category">From ZIP Code: Unknown</label><br />
        <label class="category">To ZIP Code: Unknown</label><br />
    </fieldset><br />
    <div class='output'>
        <label type="text" name="ShippingCost"> Shipping Cost is : Unknown </label><br/>
    </div>

@endsection
