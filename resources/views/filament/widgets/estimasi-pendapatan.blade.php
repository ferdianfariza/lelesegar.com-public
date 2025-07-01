<x-filament::card>
    <div class="text-center space-y-2">
        <h2 class="text-xl font-bold tracking-widest text-gray-800">Estimasi Pendapatan Kotor</h2>
        <p class="text-3xl text-green-600 font-mono">{{ $this->totalPendapatan() }}</p>
        <p class="text-sm text-gray-500">Berdasarkan harga per kg: {{ $this->hargaPerKg() }}</p>
    </div>
</x-filament::card>