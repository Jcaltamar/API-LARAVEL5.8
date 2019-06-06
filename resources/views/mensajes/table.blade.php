<table class="table table-responsive" id="mensajes-table">
    <thead>
        <tr>
            <th>Mensaje</th>
        <th>Url</th>
        <th>Schedule</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mensajes as $mensaje)
        <tr>
            <td>{!! $mensaje->mensaje !!}</td>
            <td>{!! $mensaje->url !!}</td>
            <td>{!! $mensaje->schedule !!}</td>
            <td>
                {!! Form::open(['route' => ['mensajes.destroy', $mensaje->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('mensajes.show', [$mensaje->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('mensajes.edit', [$mensaje->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>