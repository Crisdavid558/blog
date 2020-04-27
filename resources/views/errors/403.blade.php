@extends('layouts.app')
@section('content')


<section class="section clases ">
<h2 class="text-uppercase text-center tipoa publicaciones-destacadas">No tienes Autorización!</h2>
        <footer class="error404">
        </footer>
</section>




@include('includes.login-modal')

@endsection

@if($errors->any())
@section('include-login-modal')
<script src="{{ asset('js/login-modal.js') }}"></script>
@endsection
@endif