<<<<<<< HEAD
@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))
=======
@extends('errors::illustrated-layout')

@section('code', '500')
@section('title', __('Error'))

@section('image')
<div style="background-image: url({{ asset('/svg/500.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Whoops, something went wrong on our servers.'))
>>>>>>> f30176aacdea85921e3bde11beed630223ffbb9b
