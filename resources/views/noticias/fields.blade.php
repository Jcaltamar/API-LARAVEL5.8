<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Titulo', 'Titulo:') !!}
    {!! Form::text('Titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    {!! Form::textarea('Descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Urlimage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('UrlImage', 'Urlimage:') !!}
    {!! Form::textarea('UrlImage', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('noticias.index') !!}" class="btn btn-default">Cancel</a>
</div>
