<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $noticia->id !!}</p>
</div>

<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('Titulo', 'Titulo:') !!}
    <p>{!! $noticia->Titulo !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $noticia->descripcion !!}</p>
</div>

<!-- Urlimage Field -->
<div class="form-group">
    {!! Form::label('Urlimage', 'Urlimage:') !!}
    <p>{!! $noticia->Urlimage !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $noticia->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $noticia->updated_at !!}</p>
</div>

