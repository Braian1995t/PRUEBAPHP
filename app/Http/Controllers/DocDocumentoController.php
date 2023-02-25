<?php

namespace App\Http\Controllers;

use App\Models\Doc_documento;
use Illuminate\Http\Request;

class DocDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('doc_documento.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
            return view('doc_documento.create');
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Doc_documento $doc_documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doc_documento $doc_documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doc_documento $doc_documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doc_documento $doc_documento)
    {
        //
    }
}
