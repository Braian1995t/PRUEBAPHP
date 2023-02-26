<?php

namespace App\Http\Controllers;

use App\Models\Doc_documento;
use App\Models\ProProceso;
use App\Models\TipTipoDoc;
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
        DOC_ID_TIPO,PRO_PREFIJO,PRO_NOMBRE,TIP_NOMBRE,TIP_PREFIJO from doc_documentos, pro_procesos, tip_tipo_docs 
        WHERE PRO_ID = DOC_ID_PROCESO AND TIP_ID = DOC_ID_TIPO' );
        return view('doc_documento.index',$datos1);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
       $datos2['doc_documentos2']=DB::select('select PRO_ID,PRO_PREFIJO,TIP_ID,TIP_PREFIJO from  
       pro_procesos, tip_tipo_docs');
        
            return view('doc_documento.create',$datos2);
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosdoc_documento = request()->except('_token');
       // Doc_documento::insert( $datosdoc_documento);
  //  $ID_tipo=DB::select('select TIP_ID from tip_tipo_docs where active = ?', [1])
   // $ID_proceso=DB::select('select PRO_ID from pro_procesos where PRO_PREFIJO = ?', [$datosdoc_documento->PRO_PREFIJO]);

  //  DB::insert('insert into doc_documentos (DOC_NOMBRE, DOC_CODIGO,DOC_CONTENIDO,DOC_ID_PROCESO,DOC_ID_TIPO)
    // values (?, ?, ?, ?, ?)', ['Dayle'.'-'.'Dayle', 'Dayle','Dayle',1,1]);

          $nombre_Doc = $datosdoc_documento['Doc_nombre'];
          $TIP_PREFIJO = $datosdoc_documento['TIP_PREFIJO'];
          $PRO_PREFIJO = $datosdoc_documento['PRO_PREFIJO'];
          $Doc_contenido = $datosdoc_documento['Doc_contenido'];
          $PRO_ID = $datosdoc_documento['PRO_ID'];
          $TIP_ID = $datosdoc_documento['TIP_ID'];
          $nuevoValor=DB::select(' SELECT MAX(CAST(RIGHT(DOC_CODIGO, 1) AS INT)) + 1 AS nuevo_valor FROM doc_documentos');
          $nuevoValor1=$nuevoValor[0]->nuevo_valor;
          
          DB::insert('insert into doc_documentos (DOC_NOMBRE, DOC_CODIGO, DOC_CONTENIDO,DOC_ID_PROCESO,DOC_ID_TIPO) 
          values (?, ?, ?, ?, ?)', [$nombre_Doc, $TIP_PREFIJO.'-'.$PRO_PREFIJO.'-'.$nuevoValor1,$Doc_contenido,$PRO_ID,$TIP_ID]);
         return response()->json($TIP_ID);
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
    public function destroy( $DOC_ID)
    {
         DB::delete('DELETE FROM doc_documentos where DOC_ID = ?', [ $DOC_ID]);
       // return response()->json($DOC_ID);
        return redirect('doc_documento');
    }
}
