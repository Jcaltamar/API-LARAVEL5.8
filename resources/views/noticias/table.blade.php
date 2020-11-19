<table class="table table-responsive" id="noticias-table">
    <thead>
        <tr>
            <th>Titulo</th>
        <th>Descripcion</th>
        <th>Urlimage</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($noticias as $noticia)
        <tr>
            <td>{!! $noticia->Titulo !!}</td>
            <td>{!! $noticia->Descripcion !!}</td>
            <td>{!! $noticia->UrlImage !!}</td>
            <td>
                {!! Form::open(['route' => ['noticias.destroy', $noticia->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('noticias.show', [$noticia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('noticias.edit', [$noticia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>