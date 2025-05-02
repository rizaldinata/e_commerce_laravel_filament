<div>
    <h2 class="text-lg font-bold mb-2">Informasi Pembayaran</h2>
    <p><strong>ID:</strong> {{ $pembayaran->id }}</p>
    <p><strong>Tanggal:</strong> {{ $pembayaran->tanggal_pembayaran }}</p>
    <p><strong>Total:</strong> Rp{{ number_format($pembayaran->total_harga, 0, ',', '.') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($pembayaran->status_pembayaran) }}</p>

    <h3 class="text-md font-semibold mt-4">Detail Barang</h3>
    <ul>
        @foreach ($pembayaran->detailPembayaran as $detail)
            <li>
                Produk: {{ $detail->produk->nama_produk }} <br>
                Jumlah: {{ $detail->jumlah_barang }} <br>
                Total: Rp {{ number_format($detail->total_harga_per_barang, 0, ',', '.') }}
            </li>
            <hr>
        @endforeach
    </ul>
</div>
