<div class="card">
    <div class="card-body">
        <h3>Stok Tanggal : {{ date('d-m-Y') }}</h3>
    </div>
    <div class="card-deck">
        <div class="card">
                <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Produk</th>
                                <th rowspan="2" width="25%" style="vertical-align : middle;text-align:center;">Stok</th>
                                <th colspan="2" width="25%" style="vertical-align : middle;text-align:center;">Total Hari Ini</th>
                            </tr>
                            <tr>
                                <th>Jual</th>
                                <th>Beli</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($products_f as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td style="text-align: center">{{ number_format($f->stock) }}</td>    
                                <td style="text-align: center">{{ number_format(App\ProductTransaction::total_transaksi_harian(date('Y-m-d'), $f->id, 1)) }}</td>
                                <td style="text-align: center">{{ number_format(App\ProductTransaction::total_transaksi_harian(date('Y-m-d'), $f->id, 0)) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <th scope="row" colspan=2>Belum ada data</th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>                        
        </div>
        <div class="card">
                <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Produk</th>
                                <th rowspan="2" width="25%" style="vertical-align : middle;text-align:center;">Stok</th>
                                <th colspan="2" width="25%" style="vertical-align : middle;text-align:center;">Total Hari Ini</th>
                            </tr>
                            <tr>
                                <th>Jual</th>
                                <th>Beli</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($products_m as $m)
                            <tr>
                                <td>{{ $m->name }}</td>
                                <td style="text-align: center">{{ number_format($m->stock) }}</td>    
                                <td style="text-align: center">{{ number_format(App\ProductTransaction::total_transaksi_harian(date('Y-m-d'), $m->id, 1)) }}</td>
                                <td style="text-align: center">{{ number_format(App\ProductTransaction::total_transaksi_harian(date('Y-m-d'), $m->id, 0)) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <th scope="row" colspan=2>Belum ada data</th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>            
        </div>
        <div class="card">
                <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Produk</th>
                                <th rowspan="2" width="25%" style="vertical-align : middle;text-align:center;">Stok</th>
                                <th colspan="2" width="25%" style="vertical-align : middle;text-align:center;">Total Hari Ini</th>
                            </tr>
                            <tr>
                                <th>Jual</th>
                                <th>Beli</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($products_e as $e)
                            <tr>
                                <td>{{ $e->name }}</td>
                                <td style="text-align: center">{{ number_format($e->stock) }}</td>    
                                <td style="text-align: center">{{ number_format(App\ProductTransaction::total_transaksi_harian(date('Y-m-d'), $e->id, 1)) }}</td>
                                <td style="text-align: center">{{ number_format(App\ProductTransaction::total_transaksi_harian(date('Y-m-d'), $e->id, 0)) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <th scope="row" colspan=2>Belum ada data</th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
            
        </div>
    </div>
</div>
