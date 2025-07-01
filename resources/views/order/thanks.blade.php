@extends('layouts.app')

@section('title', 'Form Pemesanan')

@section('content')
<div class="max-w-6xl mx-auto mt-10">
   <h1 class="text-4xl font-mono uppercase tracking-widest font-[700] mb-4 text-center md:text-left">TERIMA KASIH!</h1>
   <div class="prose prose-neutral text-black max-w-none text-justify leading-loose mb-10">
      Pesanan kamu sudah kami terima dengan baik. <strong>Silakan cek WhatsApp untuk konfirmasi pengambilan dan pembayaran.</strong> Berikut detail pemesanannya:
   </div>

   <div class="space-y-4 grid grid-cols-1">
      <!-- DATA DIRI -->
      <div class="flex-col">
         <h2 class="text-xl font-mono text-white uppercase tracking-widest font-[700] bg-black p-5">DATA PEMESANAN</h2>
         <div class="flex-col space-y-6 p-6 pb-10 border-2">
            <p><strong>ID Pemesanan:</strong> {{ $order->id }}</p>
            <p><strong>Nama:</strong> {{ $order->customer->name }}</p>
            <p><strong>WhatsApp:</strong> {{ $order->customer->whatsapp }}</p>
            <p><strong>Alamat:</strong> {{ $order->customer->address }}</p>
            <p><strong>Kuantitas (kg):</strong> {{ $order->quantity_kg }}</p>
            <p><strong>Jumlah ekor/kg:</strong> {{ $order->fish_per_kg ?? '-' }}</p>
            <p><strong>Catatan:</strong> {{ $order->notes ?? '-' }}</p>

            <div class="pt-6 border-t mt-6">
               <p class="text-lg font-bold text-green-700">
                  Estimasi Total Pembayaran:
                  <br>Rp {{ number_format($order->quantity_kg * $hargaPerKg, 0, ',', '.') }}
               </p>
               <p class="text-sm text-gray-600 mt-1">Silakan siapkan uang tunai sebesar estimasi di atas saat pengambilan dan pembayaran di tempat.</p>
            </div>

         </div>
      </div>
   </div>

   <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 md:gap-11 max-w-6xl mx-auto text-xl tracking-widest text-center font-mono text-zinc-700 py-15 mt-10">
      <a href="/" class="order-1 md:order-1 col-span-1 border-2 border-black px-6 py-8 font-bold hover:bg-green-800 hover:text-white transition">HOME</a>
      <a href="/pesan" class="order-2 md:order-2 col-span-1 sm:col-span-2 bg-black text-white px-6 py-8 font-bold hover:bg-green-800 transition">PESAN LAGI</a>
      <a href="https://maps.app.goo.gl/QxQJsBtTdrKUGr5V9" target="_blank" rel="noopener noreferrer" class="order-3 md:order-3 col-span-1 border-2 border-black px-6 py-8 font-bold hover:bg-green-800 hover:text-white transition">GOOGLE MAPS</a>
   </div>
</div>
@endsection