mostar lista documentos

<table class="table table-light">
    <thead class="thead-light">
    <tr>
            <th>Documento</th>
            <th>Proceso</th>
            <th>Tipo</th>
            <th>codigo</th>
            <th>acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($doc_documentos1 as $doc_documento)
        <tr>
            <td>{{$doc_documento->DOC_NOMBRE}}</td>
            <td>({{$doc_documento->PRO_PREFIJO}})  {{$doc_documento->PRO_NOMBRE}}</td>
            <td>({{$doc_documento->TIP_PREFIJO}})  {{$doc_documento->TIP_NOMBRE}}</td>
            <td>{{$doc_documento->DOC_CODIGO}}</td>
            <td>Editar | Borrar</td>
        </tr>
        @endforeach
    </thead>
    <tbody>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>