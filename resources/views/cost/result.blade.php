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
            Added New Shipping Type
        </p>
    </section>
    <p>
        @if($shipType)
            <label class="category">Shipping Type : {{ $shipType}} </label><br />
            <label class="category">Shipping Cost : {{ $shipCost}} </label>
        @else
            No Shipping Type added
        @endif
    </p>
@endsection
