<!DOCTYPE html>
<html>
<head>
    <title>{{ $judul }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .summary {
            margin-bottom: 20px;
        }
        .summary-item {
            display: inline-block;
            margin-right: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 12px;
        }
        .status-badge {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: bold;
        }
        .status-belum {
            background-color: #e3f2fd;
            color: #2196f3;
        }
        .status-sangat-baik {
            background-color: #e8f5e9;
            color: #4caf50;
        }
        .status-baik {
            background-color: #e0f7fa;
            color: #00bcd4;
        }
        .status-rusak {
            background-color: #ffebee;
            color: #f44336;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>{{ $judul }}</h2>
        <p>Tanggal: {{ date('d/m/Y') }}</p>
    </div>

    <div class="summary">
        <h3>Ringkasan Jumlah Barang:</h3>
        @if($kategori && $kategori !== 'Semua Barang')
            <div class="summary-item">
                <strong>Total {{ $kategori }}:</strong> {{ number_format($databarang->sum('jumlah')) }}
            </div>
        @else
            <div class="summary-item">
                <strong>Elektronik:</strong> {{ number_format($jumlahElektronik) }}
            </div>
            <div class="summary-item">
                <strong>Perkakas:</strong> {{ number_format($jumlahPerkakas) }}
            </div>
            <div class="summary-item">
                <strong>Komponen:</strong> {{ number_format($jumlahKomponen) }}
            </div>
            <div class="summary-item">
                <strong>Logistik:</strong> {{ number_format($jumlahLogistik) }}
            </div>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                @if(!$kategori || $kategori === 'Semua Barang')
                    <th>Kategori</th>
                @endif
                <th>Status</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($databarang as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    @if(!$kategori || $kategori === 'Semua Barang')
                        <td>{{ $item->kategori }}</td>
                    @endif
                    <td>
                        @if($item->status === 'Belum Digunakan')
                            <span class="status-badge status-belum">{{ $item->status }}</span>
                        @elseif($item->status === 'Sangat Baik')
                            <span class="status-badge status-sangat-baik">{{ $item->status }}</span>
                        @elseif($item->status === 'Baik')
                            <span class="status-badge status-baik">{{ $item->status }}</span>
                        @elseif($item->status === 'Rusak')
                            <span class="status-badge status-rusak">{{ $item->status }}</span>
                        @endif
                    </td>
                    <td>{{ number_format($item->jumlah) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="{{ (!$kategori || $kategori === 'Semua Barang') ? '4' : '3' }}" style="text-align: right;"><strong>Total:</strong></td>
                <td><strong>{{ number_format($databarang->sum('jumlah')) }}</strong></td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ date('d/m/Y H:i:s') }}</p>
    </div>
</body>
</html> 