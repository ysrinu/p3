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
 <form action="/cost/air" method="GET">
     <fieldset>
         <legend>Customer and Package Information</legend>
         <label for="custName" class="category">Name (Required)</label><br />
         <input type="text" name="custName" required id="custName" value="" placeholder="Enter Customer Name" autofocus="autofocus"/><br /><br />
         <label class="category">Shipping Type (Required)</label><br />
         <input type="radio" name="shipType" required id="ground" value="ground" /><label for="ground">Ground</label><br>
         <input type="radio" name="shipType" required id="express" value="express" /><label for="express">Express</label><br>
         <input type="radio" name="shipType" required id="overnight" value="overnight" /><label for="overnight">Overnight</label><br>
         <br />
         <input type="checkbox" name="booksOnly" id="booksOnly" /><label for="booksOnly">Books only</label><br />
     </fieldset><br />
     <fieldset>
         <legend>Shipping Origin and Destination</legend>
         <label for="fromZipCode" class="category">From ZIP Code (Required)</label><br />
         <input type="text" pattern="[0-9]{5}" required name="fromZipCode" id="fromZipCode" placeholder="Enter 5-digit origin zip code" title="Enter 5-digit zipcode"/><br /><br />
         <label for="toZipCode" class="category">To ZIP Code (Required)</label><br />
         <input type="text" pattern="[0-9]{5}" required name="toZipCode" id="toZipCode" placeholder="Enter 5-digit destination zip code" title="Enter 5-digit zipcode"/><br /><br />
     </fieldset><br />
     <input id="submitButton" type="submit" name="submitButton" value="Calculate Cost"/><br /><br />
 </form>
@endsection
