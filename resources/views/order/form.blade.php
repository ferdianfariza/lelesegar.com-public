@extends('layouts.app')

@section('title', 'Form Pemesanan')

@section('content')
<div class="max-w-6xl mx-auto mt-10 ">
   <div class="max-w-6xl mx-auto mt-10">
      <h1 class="text-4xl font-mono uppercase tracking-widest font-[700] mb-4 text-center md:text-left">TULIS PESANANMU</h1>
      <div class="prose prose-neutral text-black max-w-none text-justify leading-loose mb-10 font-sans font-medium text-sm">
         Silakan isi form berikut dengan data diri dan data pesanan secara lengkap dan jelas. Data ini akan kami gunakan untuk menghubungi Anda, mengatur jadwal pengiriman, serta memastikan pesanan Anda sesuai dengan kebutuhan. Pastikan nomor WhatsApp yang Anda masukkan aktif, dan alamat sudah ditulis lengkap untuk mempermudah proses pengiriman. Jika Anda memiliki permintaan khusus, silakan tambahkan pada bagian catatan.
         <br>
         Kami akan segera memproses pesanan Anda setelah menerima form ini. Terima kasih telah mempercayakan kebutuhan lele segar Anda kepada kami!
      </div>
   </div>
   @if (session('success'))
   <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-4">
      {{ session('success') }}
   </div>
   @endif

   @if ($errors->any())
   <div class="bg-red-100 text-red-700 border border-red-400 p-4 mb-4 rounded">
      <ul class="list-disc list-inside text-sm">
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif

   <form action="/pesan" method="POST">
      @csrf
      <div class="space-y-4 grid grid-cols-1 md:grid-cols-2 gap-10">
         <!-- DATA DIRI -->
         <div class="flex-col">
            <h2 class="text-xl font-mono text-white uppercase tracking-widest font-[700] bg-black p-5">DATA DIRI</h2>
            <div class="flex-col space-y-6 p-6 pb-10 border-2">

               <div class="flex items-end gap-4">
                  <label for="name" class="flex min-w-[100px] font-medium text-left">Nama:<p class="text-red-500">*</p></label>
                  <input type="text" name="name" id="name" placeholder="Isi nama kamu"
                     class="flex-1 py-1 border-b focus:outline-none focus:ring-0 focus:border-black"
                     required>
               </div>

               <div class="flex items-end gap-4">
                  <label for="whatsapp" class="flex min-w-[100px] font-medium">WhatsApp:<p class="text-red-500">*</p></label>
                  <input type="text" name="whatsapp" id="whatsapp" placeholder="Nomor WhatsApp aktif kamu"
                     class="flex-1 py-1 border-b focus:outline-none focus:ring-0 focus:border-black"
                     required>
               </div>

               <div class="flex items-end gap-4">
                  <label for="address" class="flex min-w-[100px] font-medium">Alamat:<p class="text-red-500">*</p></label>
                  <textarea name="address" id="address" rows="1" placeholder="Alamat rumah kamu"
                     class="flex-1 py-1 border-b focus:outline-none focus:ring-0 focus:border-black"
                     required></textarea>
               </div>
            </div>
         </div>

         <!-- DATA PESANAN LELE -->
         <div class="flex-col">
            <h2 class="text-xl font-mono text-white uppercase tracking-widest font-[700] bg-black p-5">DATA PESANAN LELE</h2>
            <div class="flex-col space-y-6 p-6 pb-10 border-2">

               <div class="flex items-end gap-4">
                  <label for="quantity_kg" class="flex min-w-[120px] font-medium">Kuantitas (kg): <p class="text-red-500">*</p></label>
                  <input type="number" name="quantity_kg" id="quantity_kg" placeholder="Isi berapa kilo lele yang ingin dipesan"
                     class="flex-1 py-1 border-b focus:outline-none focus:ring-0 focus:border-black"
                     required>
               </div>

               <div class="flex items-end gap-4">
                  <label for="fish_per_kg" class="min-w-[120px] font-medium">Jumlah ekor/kg:</label>
                  <input type="number" name="fish_per_kg" id="fish_per_kg" placeholder="(opsional) jumlah ekor per satu kilo"
                     class="flex-1 py-1 border-b focus:outline-none focus:ring-0 focus:border-black">
               </div>

               <div class="flex items-end gap-4">
                  <label for="notes" class="min-w-[120px] font-medium">Catatan:</label>
                  <textarea name="notes" id="notes" rows="1" placeholder="(opsional) catatan khusus untuk pesanan ini"
                     class="flex-1 py-1 border-b focus:outline-none focus:ring-0 focus:border-black"></textarea>
               </div>

            </div>
         </div>
      </div>





      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 md:gap-11 max-w-6xl mx-auto text-xl tracking-widest text-center font-mono text-zinc-700 py-15">

         <!-- Tombol Tengah: KONFIRMASI PESANAN -->
         <button type="submit"
            class="order-1 md:order-2 col-span-1 sm:col-span-2 md:col-span-2 bg-black text-white px-6 py-8 font-bold hover:bg-green-800 transition">
            KONFIRMASI PESANAN
         </button>

         <!-- Kiri: HUBUNGI KAMI -->
         <a href="https://wa.me/6281542533534"
            class="order-2 md:order-1 col-span-1 border-2 border-black px-6 py-8 font-bold hover:bg-green-800 hover:text-white transition">
            HUBUNGI KAMI
         </a>

         <!-- Kanan: GOOGLE MAPS -->
         <a href="https://maps.app.goo.gl/QxQJsBtTdrKUGr5V9" target="_blank" rel="noopener noreferrer"
            class="order-3 md:order-3 col-span-1 border-2 border-black px-6 py-8 font-bold hover:bg-green-800 hover:text-white transition">
            GOOGLE-MAPS
         </a>
      </div>

   </form>
</div>
@endsection