<!-- Mensaje Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mensaje', 'Mensaje:') !!}
    {!! Form::textarea('mensaje', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('data', 'Data:',['class' => 'hidden']) !!}
    {!! Form::textarea('data', null, ['class' => 'form-control hidden']) !!}
</div>

<!-- Buttons Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('buttons', 'Buttons:',['class' => 'hidden']) !!}
    {!! Form::textarea('buttons', null, ['class' => 'form-control hidden']) !!}
</div>

<!-- Schedule Field -->
<div class="form-group col-sm-6">
    {!! Form::label('schedule', 'Schedule:',['class' => 'hidden']) !!}
    {!! Form::text('schedule', null, ['class' => 'form-control hidden']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mensajes.index') !!}" class="btn btn-default">Cancel</a>
</div>
