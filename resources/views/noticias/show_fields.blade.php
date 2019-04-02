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
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{!! $noticia->Descripcion !!}</p>
</div>

<!-- Urlimage Field -->
<div class="form-group">
    {!! Form::label('UrlImage', 'Urlimage:') !!}
    <p>{!! $noticia->UrlImage !!}</p>
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

