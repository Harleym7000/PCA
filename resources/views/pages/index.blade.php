@extends('layouts.front-end')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
@foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
@endforeach
    </ul>
</div>
@endif
@include('layouts.navbar')
<div class="image-container h-screen">
<figure class="txtover"> <img src="img/IMG_2739.jpg" class="w-full h-screen object-cover"> <figcaption class="text-white text-shadow lg:mt-6 p-3 text-4xl md:text-5xl lg:text-6xl">Serving the Portstewart Community
<br><a href="/register"><x-button dusk="home-join" class="mt-8 bg-blue-500 border-none hover:bg-blue-700 rounded-3xl md:mt-16 lg:mt-20">
                    {{ __('JOIN TODAY') }}
                </x-button></a>
                <a href="/about"><x-button dusk="home-fom" class="mt-8 bg-slate-50 hover:bg-slate-300 rounded-3xl fom-btn lg:ml-12">
                    {{ __('FIND OUT MORE') }}
                </x-button></a>
</figcaption> </figure>
</div>
</div>
</div>
