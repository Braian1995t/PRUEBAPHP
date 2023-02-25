<?php

namespace App\Http\Controllers;

use App\Models\Doc_documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        
        $datos1['doc_documentos1']=DB::select('select DOC_ID,DOC_NOMBRE,DOC_CODIGO,DOC_CONTENIDO,DOC_ID_PROCESO,
        DOC_ID_TIPO,PRO_PREFIJO,PRO_NOMBRE,TIP_NOMBRE,TIP_PREFIJO from doc_documentos, pro_procesos, tip_tipo_docs WHERE PRO_ID = DOC_ID_PROCESO AND
        TIP_ID = DOC_ID_TIPO' );
        return view('doc_documento.index',$datos1);
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
        $datosdoc_documento = request()->except('_token');
        Doc_documento::insert( $datosdoc_documento);

         return response()->json($datosdoc_documento);
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
