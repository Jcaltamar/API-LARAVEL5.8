<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $mensaje->id !!}</p>
</div>

<!-- Mensaje Field -->
<div class="form-group">
    {!! Form::label('mensaje', 'Mensaje:') !!}
    <p>{!! $mensaje->mensaje !!}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    <p>{!! $mensaje->url !!}</p>
</div>

<!-- Data Field -->
<div class="form-group">
    {!! Form::label('data', 'Data:') !!}
    <p>{!! $mensaje->data !!}</p>
</div>

<!-- Buttons Field -->
<div class="form-group">
    {!! Form::label('buttons', 'Buttons:') !!}
    <p>{!! $mensaje->buttons !!}</p>
</div>

<!-- Schedule Field -->
<div class="form-group">
    {!! Form::label('schedule', 'Schedule:') !!}
    <p>{!! $mensaje->schedule !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $mensaje->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $mensaje->updated_at !!}</p>
</div>

