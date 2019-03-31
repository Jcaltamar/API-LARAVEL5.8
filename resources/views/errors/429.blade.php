<<<<<<< HEAD
@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))
=======
@extends('errors::illustrated-layout')

@section('code', '429')
@section('title', __('Too Many Requests'))

@section('image')
<div style="background-image: url({{ asset('/svg/403.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Sorry, you are making too many requests to our servers.'))
>>>>>>> f30176aacdea85921e3bde11beed630223ffbb9b
