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
        if ($request->has('tempHidden')) {
            $this->validate($request, [
                'custName' => 'required',
                'shipType' => 'required',
                'fromZipCode' => 'required|regex:/\b\d{5}\b/',
                'toZipCode' => 'required|regex:/\b\d{5}\b/'
            ]);}

            $custName = $request->input('custName', null);
            $shipType = $request->input('shipType', null);
            $fromZipCode = $request->input('fromZipCode', null);
            $toZipCode = $request->input('toZipCode', null);
            $booksOnly = $request->has('booksOnly');

            // Compute Cost
            // Ideally the cost calcuation logic belong should belong to it's own class file

            $charge_per_mile=0.25; # charge per shipping mile in $.
            # based on shipping type, set the surcharge
            $shipTypeSurcharge=0;

            switch ($shipType) {
                case "ground":
                $shipTypeSurcharge=10;
                break;
                case "express":
                $shipTypeSurcharge=50;
                break;
                case "overnight":
                $shipTypeSurcharge=100;
                break;
            }

            # Initialize total cost to zero dolllars
            $shipCost=0;

            # For the sake of simplicity, we will calculate the distance between two zipcodes as the differene of their numeric zipcodes, miles as the unit
            # Ideally, we should lookup a web service that will return distance between geogrphical pg_connection_status
            $dist = ABS( intval($fromZipCode) - intval($toZipCode));
            $shipCost=($dist * $charge_per_mile) + $shipTypeSurcharge;

            # if book-only, give 10% discount
            if ($booksOnly==true) $shipCost = $shipCost * 0.90;

            return view('cost.index')->with([
                'custName' => $custName,
                'shipType' => $shipType,
                'booksOnly' => $booksOnly,
                'fromZipCode' => $fromZipCode,
                'toZipCode' => $toZipCode,
                'shipCost' => $shipCost
            ]);
        }

        public function admin(Request $request)
        {
            return view('cost.admin');
        }

        public function store(Request $request)
        {
            $this->validate($request, [
                'shipType' => 'required|alpha',
                'shipCost' => 'required|numeric'
            ]);

            $shipType = $request->input('shipType');
            $shipCost = $request->input('shipCost');

            /* This is a placeholder to submit this data to database system */

            # Redirect the user to confirm the new shipping added
            return view('cost.result')->with(['shipType' => $shipType,'shipCost' => $shipCost]);

        }
    }
