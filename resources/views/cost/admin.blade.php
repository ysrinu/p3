@extends('layouts.master')

@section('title')
    Create new Shipping Type
@endsection

@section('content')
    <section>
        <header><h1>Shipping Cost Calculator</h1></header>
        <p>
            Create New Shipping type
        </p>
    </section>
    <form action="/ship" method="POST">
        {{ csrf_field() }}

        <fieldset>
            <legend>Shipping Information</legend>
            <label for="shipType" class="category">Shipping Type (Required)</label><br />
            <input type="text" name="shipType" id="shipType" value='{{ old('shipType') }}' placeholder="Enter Shipping Type" autofocus="autofocus"/><br />
            @if($errors->get('shipType'))
               <ul class='alertdanger'>
                   @foreach($errors->get('shipType') as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
            @endif
            <br />
            <label for="shipCost" class="category">Shipping Cost (Required)</label><br />
            <input type="text" name="shipCost" id="shipType" value='{{ old('shipCost') }}' placeholder="Enter Shipping Cost"/><br />
            @if($errors->get('shipCost'))
               <ul class='alertdanger'>
                   @foreach($errors->get('shipCost') as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
            @endif
</fieldset><br />
        <input id="submitButton" type="submit" name="submitButton" value="Add New Shipping Type"/><br /><br />
    </form>
@endsection
