@extends('layouts.master')

@section('title')
    Show book
@endsection

@section('content')
<section>
 <header><h1>Shipping Cost Calculator</h1></header>
 <p>
     Calculate shipping cost between two zip codes.
 </p>
 </section>
 <form action="/cost" method="GET">
     <fieldset>
         <legend>Customer and Package Information</legend>
         <label for="custName" class="category">Name (Required)</label><br />
         <input type="text" name="custName" required id="custName" value='{{ $custName }}' placeholder="Enter Customer Name" autofocus="autofocus"/><br />
         @if($errors->get('custName'))
            <ul>
                @foreach($errors->get('custName') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
         @endif
         <br />
         <label class="category">Shipping Type (Required)</label><br />
         <input type="radio" name="shipType" required id="ground" value="ground" {{ ($shipType === 'ground') ? 'CHECKED' : '' }} /><label for="ground">Ground</label><br>
         <input type="radio" name="shipType" required id="express" value="express" {{ ($shipType === 'express') ? 'CHECKED' : '' }}/><label for="express">Express</label><br>
         <input type="radio" name="shipType" required id="overnight" value="overnight" {{ ($shipType === 'overnight') ? 'CHECKED' : '' }}/><label for="overnight">Overnight</label><br>
         @if($errors->get('shipType'))
            <ul>
                @foreach($errors->get('shipType') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
         @endif
         <br />
         <input type="checkbox" name="booksOnly" id="booksOnly" {{ ($booksOnly) ? 'CHECKED' : '' }} /><label for="booksOnly">Books only</label><br />
     </fieldset><br />
     <fieldset>
         <legend>Shipping Origin and Destination</legend>
         <label for="fromZipCode" class="category">From ZIP Code (Required)</label><br />
         <input type="text" pattern="[0-9]{5}" required name="fromZipCode" id="fromZipCode" value="{{ $fromZipCode }}" placeholder="Enter 5-digit origin zip code" title="Enter 5-digit zipcode"/><br /><br />
         <label for="toZipCode" class="category">To ZIP Code (Required)</label><br />
         <input type="text" pattern="[0-9]{5}" required name="toZipCode" id="toZipCode"  value="{{ $toZipCode }}" placeholder="Enter 5-digit destination zip code" title="Enter 5-digit zipcode"/><br /><br />
     </fieldset><br />
     <input id="submitButton" type="submit" name="submitButton" value="Calculate Cost"/><br /><br />
     @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
 </form>
@endsection
