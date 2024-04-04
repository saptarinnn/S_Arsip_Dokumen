<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <span class="demo menu-text fw-bold" style="font-size: 17px;"><span
                class="text-primary">_pengarsipan</span>Document</span>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="align-middle bx bx-chevron-left bx-sm"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="py-1 menu-inner">
        <x-sidebar.link href="{{ route('dashboard') }}" icon="layout">Dashboard</x-sidebar.link>

        <x-sidebar.divide>Data</x-sidebar.divide>
        @can('permission.index')
            <x-sidebar.link href="{{ route('permission.index') }}" icon="key">Permission</x-sidebar.link>
        @endcan
        @can('role.index')
            <x-sidebar.link href="{{ route('role.index') }}" icon="user-check">Role</x-sidebar.link>
        @endcan
        @can('user.index')
            <x-sidebar.link href="{{ route('user.index') }}" icon="group">Pengguna</x-sidebar.link>
        @endcan
        <x-sidebar.link href="{{ route('category.index') }}" icon="purchase-tag">Kategori</x-sidebar.link>
        <x-sidebar.link href="{{ route('storages.index') }}" icon="hdd">Brankas</x-sidebar.link>

        <x-sidebar.divide>Transaksi</x-sidebar.divide>
        <x-sidebar.link href="{{ route('incoming-document.index') }}" icon="layer-plus">Dokumen Masuk</x-sidebar.link>
        <x-sidebar.link href="{{ route('outgoing-document.index') }}" icon="layer-minus">Dokumen Keluar</x-sidebar.link>
        <x-sidebar.link href="{{ route('cek-resi.index') }}" icon="receipt">Cek Resi</x-sidebar.link>

        @can('document_report.index')
            <x-sidebar.divide>Laporan</x-sidebar.divide>
            <x-sidebar.link href="{{ route('document_report.index') }}" icon="file-blank">Laporan Dokumen</x-sidebar.link>
        @endcan
    </ul>
</aside>
