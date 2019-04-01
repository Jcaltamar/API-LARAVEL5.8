@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Noticia
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($noticia, ['route' => ['noticias.update', $noticia->id], 'method' => 'patch']) !!}

                        @include('noticias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection