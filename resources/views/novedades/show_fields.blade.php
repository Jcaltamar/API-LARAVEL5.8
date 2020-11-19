<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $novedades->id !!}</p>
</div>

<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('Titulo', 'Titulo:') !!}
    <p>{!! $novedades->Titulo !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{!! $novedades->Descripcion !!}</p>
</div>

<!-- Usuario Field -->
<div class="form-group">
    {!! Form::label('Usuario', 'Usuario:') !!}
    <p>{!! $novedades->Usuario !!}</p>
</div>

<!-- Correo Field -->
<div class="form-group">
    {!! Form::label('Correo', 'Correo:') !!}
    <p>{!! $novedades->Correo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $novedades->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $novedades->updated_at !!}</p>
</div>

