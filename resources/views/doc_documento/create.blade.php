@extends('layouts.app')
@section('content')
<div class="container">



<form action="{{url('/doc_documento')}}" method="post">
@csrf

<label for="Doc_nombre">Nombre documento</label>
<input type="text" name="Doc_nombre" id="Doc_nombre" required>
<br>


<label for="Doc_codigo">codigo documento</label>
<select name="TIP_PREFIJO">
@foreach(collect($doc_documentos2)->unique('TIP_PREFIJO') as $doc_documento)
<option name="TIP_PREFIJO" id="TIP_PREFIJO">{{$doc_documento->TIP_PREFIJO}}</option>
@endforeach
</select>

<select name="PRO_PREFIJO">
@foreach(collect($doc_documentos2)->unique('PRO_PREFIJO') as $doc_documento)
<option name="PRO_PREFIJO" id="PRO_PREFIJO">{{$doc_documento->PRO_PREFIJO}}</option>
@endforeach
</select>



<br>
<label for="Doc_contenido">contenido documento</label>
<input type="text" name="Doc_contenido" id="Doc_contenido" required>

<input id="prodId" name="PRO_ID" type="hidden" value="{{$doc_documento->PRO_ID}}">
<input id="prodId" name="TIP_ID" type="hidden" value="{{$doc_documento->TIP_ID}}">

<br>
<input type="submit" value="Guardar datos">

<a href="{{url('/doc_documento/')}}">Regresar</a>

</form>

</div>
@endsection