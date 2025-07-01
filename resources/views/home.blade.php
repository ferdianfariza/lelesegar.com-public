@extends('layouts.app')

@section('title', 'Beranda')

@section('content')



<div
    x-data="{
    active: 0,
    total: 2,
    startX: 0,
    endX: 0,
    handleSwipe() {
      if (this.startX - this.endX > 50) {
        this.active = (this.active + 1) % this.total
      } else if (this.endX - this.startX > 50) {
        this.active = (this.active - 1 + this.total) % this.total
      }
    }
  }"
    class="text-center select-none mb-10">

    <!-- Gambar (dengan swipe area) -->
    <div
        class="relative max-w-6xl mx-auto"
        @touchstart="startX = $event.touches[0].clientX"
        @touchend="endX = $event.changedTouches[0].clientX; handleSwipe()">
        <template x-for="(img, index) in total" :key="index">
            <img
                x-show="active === index"
                :src="`/images/lele-${index + 1}.png`"
                class="mx-auto transition duration-500"
                alt="Lele"
                loading="lazy">
        </template>

        <!-- Panah Kiri -->
        <button
            @click="active = (active - 1 + total) % total"
            class="absolute left-0 top-1/2 transform -translate-y-1/2 text-2xl font-bold">
            &lt;
        </button>

        <!-- Panah Kanan -->
        <button
            @click="active = (active + 1) % total"
            class="absolute right-0 top-1/2 transform -translate-y-1/2 text-2xl font-bold">
            &gt;
        </button>
    </div>

    <!-- Indikator -->
    <div class="mt-6 flex justify-center space-x-4 font-bold text-zinc-400">
        <template x-for="i in total" :key="i">
            <button
                @click="active = i - 1"
                :class="{ 'text-black underline underline-offset-4': active === i - 1 }"
                x-text="i"></button>
        </template>
    </div>
</div>



<div class="grid grid-cols-1 md:grid-cols-4 gap-11 max-w-6xl mx-auto text-sm text-justify font-sans font-medium">
    <p>Clarias gariepinus, atau yang lebih dikenal sebagai lele dumbo, merupakan spesies ikan lele asal Afrika yang mulai masuk ke Indonesia sejak tahun 1980-an. Sejak saat itu, lele dumbo menjadi salah satu jenis ikan air tawar yang paling banyak dibudidayakan karena pertumbuhannya yang cepat, ketahanan terhadap lingkungan, serta efisiensi dalam pakan.</p>
    <p>Dalam perjalanan kami sebagai pelaku budidaya ikan air tawar selama lebih dari satu dekade, kami telah mencoba berbagai jenis ikan—mulai dari ikan patin, nila, mujair, hingga gurame. Namun, berdasarkan pengalaman di lapangan dan kebutuhan pasar di daerah kami, lele dumbo terbukti paling adaptif dan produktif. Kondisi air, suhu, serta karakteristik lingkungan di wilayah Semarang dan sekitarnya sangat cocok untuk pertumbuhan lele jenis ini.</p>
    <p>Selain itu, permintaan pasar terhadap lele dumbo terus meningkat, terutama dari warung makan, restoran penyet, dan konsumen rumah tangga yang mencari sumber protein yang terjangkau namun berkualitas. Dari sinilah kami akhirnya memfokuskan sebagian besar kegiatan budidaya kami pada spesies Clarias gariepinus, karena terbukti memberikan hasil panen yang stabil, sehat, dan diminati pasar.</p>
    <p>Dengan fokus pada satu spesies unggulan ini, kami bisa mengoptimalkan kualitas, kecepatan panen, dan efisiensi distribusi—yang semuanya bermuara pada pelayanan terbaik untuk pelanggan.

    </p>
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



@endsection