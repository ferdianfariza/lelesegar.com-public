@extends('layouts.app')

@section('title', $page->title)

@section('content')
<div class="max-w-6xl mx-auto">
   <h1 class="text-4xl font-mono uppercase tracking-widest font-[700] mb-4 text-center md:text-left">{{ $page->title }}</h1>
   <div class="prose prose-neutral text-black max-w-none text-justify leading-loose font-sans font-medium text-sm">
      {!! $page->content !!}
   </div>
   <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 md:gap-11 max-w-6xl mx-auto text-xl tracking-widest text-center font-mono text-zinc-700 py-15">

      <!-- BUAT PESANAN -->
      <a href="{{ route('order.create') }}"
         class="order-1 md:order-2 col-span-1 sm:col-span-2 md:col-span-2 bg-black text-white px-6 py-8 font-bold hover:bg-green-800 transition">
         BUAT PESANAN
      </a>

      <!-- HUBUNGI KAMI -->
      <a href="https://wa.me/6281542533534"
         class="order-2 md:order-1 col-span-1 border-2 border-black px-6 py-8 font-bold hover:bg-green-800 hover:text-white transition">
         HUBUNGI KAMI
      </a>

      <!-- GOOGLE MAPS -->
      <a href="https://maps.app.goo.gl/QxQJsBtTdrKUGr5V9" target="_blank" rel="noopener noreferrer"
         class="order-3 md:order-3 col-span-1 border-2 border-black px-6 py-8 font-bold hover:bg-green-800 hover:text-white transition">
         GOOGLE-MAPS
      </a>
   </div>

</div>
@endsection