<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <title>@yield('title', 'LeleSegar')</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
<!-- IBM Plex Sans + Condensed + Mono -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=IBM+Plex+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

   <meta name="description" content="Lelesegar menyediakan ikan lele segar berkualitas tinggi, siap untuk dipesan. Kami berkomitmen untuk memberikan produk terbaik dengan layanan pelanggan yang ramah.">
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">

   <meta property="og:title" content="Lelesegar – Lele Segar untuk Toko & Rumah">
   <meta property="og:description" content="Pesan ikan lele segar, langsung dari peternakan kami. Kualitas tinggi untuk warung & rumah tangga.">
   <meta property="og:image" content="{{ asset('og-image.jpg') }}">
   <meta property="og:url" content="{{ url()->current() }}">
   <meta property="og:type" content="website">

   <meta property="og:title" content="Lelesegar – Lele Segar untuk Toko & Rumah">
   <meta property="og:description" content="Pesan ikan lele segar, langsung dari peternakan kami. Kualitas tinggi untuk warung & rumah tangga.">
   <meta property="og:image" content="{{ asset('og-image.jpg') }}">
   <meta property="og:url" content="{{ url()->current() }}">
   <meta property="og:type" content="website">
   @vite('resources/css/app.css')
   @php
   use Carbon\Carbon;
   \Carbon\Carbon::setLocale('id');
   $hariIni = Carbon::now()->translatedFormat('l, d F Y');
   @endphp
   <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body class=" bg-white text-gray-800 p-5">
   <nav class="max-w-6xl mx-auto py-7 text-black">

      {{-- Bagian atas: Hari & Lokasi --}}
      <div class="md:flex justify-between items-start font-mono tracking-wider text-[13px] font-medium mb-4 space-y-4 md:space-y-0">
         <div class="text-center">
            <div>{{ strtoupper($hariIni) }}</div>
            <div class="hidden md:block mt-2 text-left">WELCOME</div>
         </div>

         <div class="hidden md:flex flex-col items-end text-[13px] font-medium space-y-1">
            <div class="text-right">NONGKOSAWIT, KEC. GUNUNGPATI</div>
            <div>0815-4253-3534</div>
         </div>

      </div>

      {{-- Judul & Menu --}}
      <div class="space-y-4">
         <h1 class="text-4xl md:text-6xl font-mono font-bold tracking-widest text-center">LELESEGAR.COM</h1>

         @php $current = request()->path(); @endphp
         <ul class="flex flex-wrap justify-center gap-x-5 gap-y-2 font-bold font-mono text-zinc-400 text-sm text-center">
            <li><a href="/" class="{{ $current == '/' ? 'text-zinc-900 underline underline-offset-4' : '' }}">Beranda</a></li>
            <li><a href="/tentang" class="{{ $current == 'tentang' ? 'text-zinc-900 underline underline-offset-4' : '' }}">Tentang</a></li>
            <li><a href="/panduan" class="{{ $current == 'panduan' ? 'text-zinc-900 underline underline-offset-4' : '' }}">Panduan</a></li>
            <li>
               <a href="https://maps.app.goo.gl/QxQJsBtTdrKUGr5V9"
                  target="_blank" rel="noopener noreferrer"
                  class="{{ $current == 'maps' ? 'text-zinc-900 underline underline-offset-4' : '' }}">
                  Google_Maps
               </a>
            </li>
            <li><a href="/pesan" class="{{ $current == 'pesan' ? 'text-zinc-900 ' : '' }}">Pesan</a></li>
         </ul>
      </div>

      {{-- Info Lokasi di Mobile --}}
      <div class="block md:hidden mt-6 text-center text-[13px] font-medium">
         <div>NONGKOSAWIT, KEC. GUNUNGPATI</div>
         <div>0815-4253-3534</div>
      </div>

      <div class="font-mono text-[13px] tracking-widest text-center border-y-2 py-4 font-bold mt-6">
         DIPERCAYA OLEH BANYAK PELANGGAN DAN MEMILIKI RATING 4.8+ OLEH 50+ ORANG DI GOOGLE MAPS
      </div>
   </nav>


   <main class="py-6">
      @yield('content')
   </main>

   <footer class="max-w-6xl mx-auto py-7 text-zinc-400/90 font-sans font-medium text-sm text-justify space-y-3">
      <p class="border-b pb-4">* Kami menegaskan bahwa semua data, termasuk catatan pembelian dan informasi terkait lainnya, tidak akan digunakan, disebarluaskan, maupun diperjualbelikan dalam bentuk apa pun. Komitmen terhadap keamanan dan privasi data merupakan bagian dari prinsip etis yang kami junjung tinggi dalam mendukung praktik budidaya yang profesional dan bertanggung jawab.</p>
      <p>Copyright © 2025 LELESEGAR</p>
   </footer>
</body>

</html>