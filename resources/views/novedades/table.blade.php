<table class="table table-responsive" id="novedades-table">
    <thead>
        <tr>
            <th>Titulo</th>
        <th>Descripcion</th>
        <th>Usuario</th>
        <th>Correo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($novedades as $novedades)
        <tr>
            <td>{!! $novedades->Titulo !!}</td>
            <td>{!! $novedades->Descripcion !!}</td>
            <td>{!! $novedades->Usuario !!}</td>
            <td>{!! $novedades->Correo !!}</td>
            <td>
                {!! Form::open(['route' => ['novedades.destroy', $novedades->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('novedades.show', [$novedades->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('novedades.edit', [$novedades->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>