<x-filament::card>
    <div class="text-center space-y-3">
        <h2 class="text-xl font-bold tracking-widest text-gray-800">Estimasi Pendapatan Bersih</h2>
        <p class="text-3xl text-amber-600 font-mono">
            Rp {{ number_format($this->getData()['pendapatanBersih'], 0, ',', '.') }}
        </p>

        <div class="text-sm text-gray-500">
            <p>Harga Jual per Kg: Rp {{ number_format($this->getData()['hargaJual'], 0, ',', '.') }}</p>
            <p>Harga Beli per Kg: Rp {{ number_format($this->getData()['hargaBeli'], 0, ',', '.') }}</p>
        </div>
    </div>
</x-filament::card>