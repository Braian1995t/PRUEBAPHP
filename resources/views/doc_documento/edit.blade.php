<form action="{{url('/doc_documento/'.$nuevoDoc->DOC_ID)}}" method="post">
@csrf
 {{method_field('PATCH')}}


<label for="Doc_nombre">Nombre documento</label>
<input type="text" name="Doc_nombre" value="{{ $nuevoDoc->DOC_NOMBRE }}" id="Doc_nombre">
<br>



<label for="Doc_codigo">codigo documento</label>
<input type="text" name="Doc_codigo" id="Doc_codigo" value="{{ $nuevoDoc->DOC_CODIGO }}">
Cambiar A

<select name="TIP_PREFIJO">
@foreach($doc_documentos2 as $doc_documento)
<option name="TIP_PREFIJO" id="TIP_PREFIJO">{{$doc_documento->TIP_PREFIJO}}</option>
@endforeach
</select>

<select name="PRO_PREFIJO">
@foreach($doc_documentos2 as $doc_documento)
<option name="PRO_PREFIJO" id="PRO_PREFIJO">{{$doc_documento->PRO_PREFIJO}}</option>
@endforeach
</select>


<br>
<label for="Doc_contenido">contenido documento</label>
<input type="text" name="Doc_contenido" id="Doc_contenido" value="{{ $nuevoDoc->DOC_CONTENIDO }}">

<input id="prodId" name="PRO_ID" type="hidden" value="{{$doc_documento->PRO_ID}}">
<input id="prodId" name="TIP_ID" type="hidden" value="{{$doc_documento->TIP_ID}}">

<br>
<input type="submit" value="Guardar datos">
<a href="{{url('/doc_documento/')}}">Regresar</a>
</form>