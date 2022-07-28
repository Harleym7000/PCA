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
<div id="about" class="mb-6">
    <img class="h-96 w-full object-cover" src="/img/cleanup.jpg">
    <div id="about-text" class="w-3/4 m-auto">
    <h1 id="abt-heading" class="text-center mt-5 text-3xl lg:text-5xl text-blue-600 font-semibold">- What We Do -</h1>
    <p class="text-lg md:text-xl lg:text-3xl mt-3 text-center">Portstewart Community Association is a charitable organisation which currently organises and implements The Red Sails Festival alongside other events and activities for the benefit of the community.</p>
    <div class="abt-line"></div>
</div>
<div class="container mx-auto px-4 mt-5 flex justify-center items-center">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 border-red-500 gap-4">
<div class=" bg-white rounded-lg border border-gray-200 shadow-2xl shadow-gray-500 dark:bg-gray-800 dark:border-gray-700 mb-4">
    <a href="/red-sails">
        <img class="rounded-t-lg object-cover h-80 w-full border-solid border-4 border-slate-900" src="img/redsails.jpg" alt="" />
    </a>
        <h1 class="mt-3 text-3xl font-semibold text-center">Red Sails Festival</h1>
        <p class="mb-3 font-normal text-slate-700 text-center text-xl m-3">Red Sails Festival runs over the course of a week every summer in Portstewart. Live music, dance and activities for everyone to enjoy, finishing with our famous fireworks display</p>
    </div>
    <div class="bg-white rounded-lg border border-gray-200 shadow-2xl shadow-gray-500 dark:bg-gray-800 dark:border-gray-700 mb-4">
    <a href="/red-sails">
        <img class="rounded-t-lg object-cover h-80 w-full border-solid border-4 border-slate-900" src="img/event.jpg" alt="" />
    </a>
        <a href="/events"><h1 class="mt-3 text-3xl text-blue-500 font-semibold text-center">Community Events</h1></a>
        <p class="mb-3 font-normal text-slate-700 text-xl text-center m-3">Portstewart Community Association hold events of all kinds for people of all ages within the community. Why not go to our events page to find an <a href="/events" class="text-blue-500">event</a> for you?</p>
    </div>
    <div class="bg-white rounded-lg border border-gray-200 shadow-2xl shadow-gray-500 dark:bg-gray-800 dark:border-gray-700 mb-4">
    <a href="/red-sails">
        <img class="rounded-t-lg object-cover h-80 w-full border-solid border-4 border-slate-900" src="img/cleanup.jpg" alt="" />
    </a>
        <h1 class="mt-3 text-3xl font-semibold text-center">Town Clean-Ups</h1>
        <p class="mb-3 font-normal text-slate-700 text-xl text-center m-3">Once a month, members of the PCA alongside members of the local community commit an hour of their time to helping to keep our town tidy. Refreshments available afterwards</p>
    </div>
</div>
</div>
</div>
<div class="abt-line"></div>
@include('layouts.footer')
