<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CostController extends Controller
{
    public function __invoke()
    {
        return view('cost.welcome');
    }

    public function index(Request $request)
    {
        # Validate the request data
    $this->validate($request, [
        'custName' => 'required|alpha',
        //'shipType' => 'required',
        //'fromZipCode' => 'required|regex:/\b\d{5}\b/',
        //'toZipCode' => 'required|regex:/\b\d{5}\b/'
    ]);

        $custName = $request->input('custName', null);
        $shipType = $request->input('shipType', null);
        $fromZipCode = $request->input('fromZipCode', null);
        $toZipCode = $request->input('toZipCode', null);

        return view('cost.index')->with([
        'custName' => $custName,
        'shipType' => $shipType,
        'booksOnly' => $request->has('booksOnly'),
        'fromZipCode' => $fromZipCode,
        'toZipCode' => $toZipCode
    ]);
    }

    public function result($shipType)
    {
        return view('cost.result')->with(['shipType' => $shipType]);;
    }

    public function printRequest(Request $request)
    {

    # ======== Temporary code to explore $request ==========

    # See all the properties and methods available in the $request object
    dump($request);

    # See just the form data from the $request object
    dump($request->all());

    # See just the form data for a specific input, in this case a text input
    dump($request->input('searchTerm'));

    # See what the form data looks like for a checkbox
    dump($request->input('caseSensitive'));

    # Boolean to see if the request contains data for a particular field
    dump($request->has('searchTerm')); # Should be true
    dump($request->has('publishedYear')); # There's no publishedYear input, so this should be false

    # You can get more information about a request than just the data of the form, for example...
    dump($request->fullUrl());
    dump($request->method());
    dump($request->isMethod('post'));
   }
}
