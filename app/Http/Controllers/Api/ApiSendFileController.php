<?php

namespace App\Http\Controllers\Api;

use App\Imports\TemplateImport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ApiSendFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client= new \App\Client\ExcelApiClient();// INIZIO TEST
        $data = [
            "{\"col1\":\"value5\",\"col2\":\"value6\",\"col4\":\"value3\",\"col3\":\"value8\"}",
            "{\"col1\":\"value1\",\"col2\":\"value3\",\"col4\":\"value4\",\"col3\":\"value5\"}"
        ];
        dd($client->new_page('prova', $data));    //FINE TEST ------ DA CAMBIARE

        Excel::import(new TemplateImport, $request->file('excelFile'));


        // TODO: Fatti tornare un json avente la riga di intestazione e tutti i valori
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
