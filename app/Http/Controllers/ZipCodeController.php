<?php

namespace App\Http\Controllers;

Use Alert;
use App\Imports\ZipCodesImport;
use Illuminate\Http\Request;

class ZipCodeController extends Controller
{
    
    /**
     * Show the view to upload the excel file to import
     * 
     * @return View
     */
    public function import()
    {
        return view('imports.index');
    }

    /**
     * Import the zip codes from excel file
     * 
     */
    public function store(Request $request)
    {
        set_time_limit(-1);
        $import = new ZipCodesImport();
        $import->import(request()->file('file'));

        Alert::info('The codes had been imported');

        return redirect()->route('zipcode.import.index');
    }
}
