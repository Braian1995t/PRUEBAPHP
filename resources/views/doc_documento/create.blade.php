formulario de creacion de documentos

<form action="{{url('/doc_documento')}}" method="post">
@csrf

<label for="Doc_nombre">Nombre documento</label>
<input type="text" name="Doc_nombre" id="Doc_nombre">
<br>

<label for="Doc_codigo">codigo documento</label>
<input type="text" name="Doc_codigo" id="Doc_codigo">
<br>

<label for="Doc_contenido">contenido documento</label>
<input type="text" name="Doc_contenido" id="Doc_contenido">
<br>

<label for="Doc_id_tipo">id tipo documento</label>
<input type="text" name="Doc_id_tipo" id="Doc_id_tipo">
<br>

<label for="Doc_id_proceso">id proceso documento</label>
<input type="text" name="Doc_id_proceso" id="Doc_id_proceso">
<br>

<input type="submit" value="Guardar datos">



</form>