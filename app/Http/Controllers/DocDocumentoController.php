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

          $nombre_Doc = $datosdoc_documento['Doc_nombre'];
          $TIP_PREFIJO = $datosdoc_documento['TIP_PREFIJO'];
          $PRO_PREFIJO = $datosdoc_documento['PRO_PREFIJO'];
          $Doc_contenido = $datosdoc_documento['Doc_contenido'];
          $PRO_ID = $datosdoc_documento['PRO_ID'];
          $TIP_ID = $datosdoc_documento['TIP_ID'];
          
          $nuevo= DB::select(' SELECT COALESCE(MAX(CAST(REGEXP_REPLACE(DOC_CODIGO,"[^0-9]+", "") AS INT)) + 1, 1) AS siguiente_numero FROM doc_documentos');
          $nuevoValor1=$nuevo[0]->siguiente_numero;
          
          
          DB::insert('insert into doc_documentos (DOC_NOMBRE, DOC_CODIGO, DOC_CONTENIDO,DOC_ID_PROCESO,DOC_ID_TIPO) 
          values (?, ?, ?, ?, ?)', [$nombre_Doc, $TIP_PREFIJO.'-'.$PRO_PREFIJO.'-'.$nuevoValor1,$Doc_contenido,$PRO_ID,$TIP_ID]);
        // return response()->json( $nuevoValor1);
        return redirect('doc_documento')->with('mensaje','Documento agregado con exito');
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
    public function edit($DOC_ID)
    {
        
        $datos2['doc_documentos2']=DB::select('select PRO_ID,PRO_PREFIJO,TIP_ID,TIP_PREFIJO from  
       pro_procesos, tip_tipo_docs');

        $editDoc['doc_documentos3']=DB::select('select * from doc_documentos  
        where DOC_ID = (?)', [$DOC_ID]);

        $nuevoDoc=Doc_documento::findOrFail($DOC_ID);
      // return response()->json($nuevoDoc);
       return view('doc_documento.edit',$datos2,compact('nuevoDoc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$DOC_ID)
    {
        $datosdoc_documento = request()->except(['_token','_method']);
          $nombre_Doc = $datosdoc_documento['Doc_nombre'];
          $TIP_PREFIJO = $datosdoc_documento['TIP_PREFIJO'];
          $PRO_PREFIJO = $datosdoc_documento['PRO_PREFIJO'];
          $Doc_contenido = $datosdoc_documento['Doc_contenido'];
          $PRO_ID = $datosdoc_documento['PRO_ID'];
          $TIP_ID = $datosdoc_documento['TIP_ID'];

          $nuevo= DB::select(' SELECT MAX(CAST(REGEXP_REPLACE(DOC_CODIGO,"[^0-9]+", "") AS INT)) + 1 AS siguiente_numero FROM doc_documentos');
          $nuevoValor1=$nuevo[0]->siguiente_numero;

          
        DB::update('update doc_documentos set 
        DOC_NOMBRE ='.'"'.$nombre_Doc.'"'.'
        ,Doc_codigo ='.'"'.$TIP_PREFIJO.'-'.$PRO_PREFIJO.'-'.$nuevoValor1.'"'.'
        ,Doc_contenido ='.'"'.$Doc_contenido.'"'.' 
        ,DOC_ID_PROCESO ='.'"'.$PRO_ID.'"'.' 
        ,DOC_ID_TIPO ='.'"'.$TIP_ID.'"'.' 
        where DOC_ID = ?', [$DOC_ID]);
          
        //return response()->json($nuevoValor1);

        return redirect('doc_documento');
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


