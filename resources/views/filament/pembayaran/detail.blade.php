<div class="space-y-6">
    {{-- Informasi Pembayaran --}}
    <div class="bg-white shadow rounded-xl p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-900">Informasi Pembayaran</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-800">
            <div><span class="font-medium">ID:</span> {{ $pembayaran->id }}</div>
            <div><span class="font-medium">Tanggal:</span> {{ $pembayaran->tanggal_pembayaran }}</div>
            <div><span class="font-medium">Total:</span> Rp{{ number_format($pembayaran->total_harga, 0, ',', '.') }}
            </div>
            <div><span class="font-medium">Status:</span> {{ ucfirst($pembayaran->status_pembayaran) }}</div>
        </div>
    </div>

    {{-- Detail Barang --}}
    <div class="bg-white shadow rounded-xl p-6">
        <h3 class="text-lg font-semibold mb-4 text-gray-900">Detail Barang</h3>
        <ul class="space-y-4">
            @foreach ($pembayaran->detailPembayaran as $detail)
                <li class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-sm text-gray-800">
                        <div><span class="font-medium">Produk:</span> {{ $detail->produk->nama_produk }}</div>
                        <div><span class="font-medium">Jumlah:</span> {{ $detail->jumlah_barang }}</div>
                        <div><span class="font-medium">Total:</span>
                            Rp{{ number_format($detail->total_harga_per_barang, 0, ',', '.') }}</div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
