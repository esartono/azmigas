<li>
    <a class="js-arrow" href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
</li>
<li class="has-sub">
    <a class="js-arrow" href="#"><i class="fas fa-gears"></i>Master Data</a>
    <ul class="list-unstyled navbar__sub-list js-sub-list">
        <li>
            <a href="{{ route('users.index') }}">User</a>
        </li>
        <li>
            <a href="{{ route('employees.index') }}">Karyawan</a>
        </li>
        <li>
            <a href="{{ route('products.index') }}">Produk</a>
        </li>
        <li>
            <a href="{{ route('type_product_transactions.index') }}">Tipe Penjualan / Pembelian</a>
        </li>
        <li>
            <a href="{{ route('vehicles.index') }}">Kendaraan</a>
        </li>
        <li>
            <a href="{{ route('drivers.index') }}">Supir</a>
        </li>
        <li>
            <a href="{{ route('warehouses.index') }}">Gudang</a>
        </li>
        <li>
            <a href="{{ route('suppliers.index') }}">Pemasok</a>
        </li>
        <li>
            <a href="{{ route('customers.index') }}">Pelanggan</a>
        </li>
    </ul>
</li>
<li class="has-sub">
    <a class="js-arrow" href="#"><i class="fas fa-gears"></i>Master Data Keuangan</a>
    <ul class="list-unstyled navbar__sub-list js-sub-list">
        <li>
            <a href="index4.html">Akun</a>
        </li>
        <li>
            <a href="index4.html">Kartu Kredit</a>
        </li>
        <li>
            <a href="index4.html">Perusahaan</a>
        </li>
    </ul>
</li>
<li>
    <a class="js-arrow" href="{{ route('jualbeli') }}"><i class="fas fa-cart-plus"></i>Transaksi Retail</a>
</li>
<li class="has-sub">
    <a class="js-arrow" href="{{ route('routes.index') }}"><i class="fas fa-truck"></i>Rute - Grosir</a>
</li>
<li>
    <a href="{{url('/product_transactions')}}"><i class="fas fa-list"></i>Daftar Transaksi Produk</a>
</li>