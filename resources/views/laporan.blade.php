@include('header')

<div class="container">
    <nav class="navbar navbar-expand-sm navbar-dark" id="navbar_top">
        <a class="navbar-brand text-dark" href="/">
            <h3>Star Helm</h3>
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href=""><i
                        class="fa fa-info-circle text-success"></i> Anda Login Sebagai Admin</a>
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href="/admin"><i
                        class="fa fa-book text-success"></i> Data Barang</a>
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href="/pengeluaran"><i
                        class="fa fa-sign-out text-success"></i> Pengeluaran</a>
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href="/laporan"><i
                        class="fa fa-print text-success"></i> Laporan</a>
                <a class="btn btn-dark text-light my-2 my-sm-0 ml-1 mr-1" href="/"><i
                        class="fa fa-sign-out text-success"></i> Keluar</a>
            </form>
        </div>
    </nav>
</div>

<div class="container py-5">

    <!-- For Demo Purpose-->
    <header class="text-center mb-5 mt-5">
        <h1 class="display-4 font-weight-bold">Toko Star Helm</h1>
    </header>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- Two  Row [Prosucts]-->
    <div class="col-md mb-5" data-aos="fade-down">
        <div class="row">
            <h2 class="font-weight-bold">Data Riwayat</h2>
            <input type="month" class="col-md-4 ml-auto mr-2" id="">
            <button type="submit" class="btn btn-outline-success col-md-2 my-auto"><i class="fa fa-search"></i> Cari</button>
            <a class="btn btn-dark text-light ml-auto my-auto" href="/pengeluaran"><i
                    class="fa fa-sign-out text-light"></i> Pengeluaran</a>
            <a class="btn btn-dark text-light ml-auto col-md-2 my-auto" href="/pdf" target="_blank"><i class="fa fa-file-pdf-o text-light"></i> Export PDF</a>

        </div>
    </div>

    <div class="row pb-5 mb-4">

        <table class="table">
            <thead>
                <tr class="text-center">
                    <th class="col-md-2">Nama Barang</th>
                    <th class="col-md-3">Keterangan</th>
                    <th class="col-md-2">Jenis</th>
                    <th class="col-md-2">Kode Barang</th>
                    <th class="col-md-1">Jumlah</th>
                    <th class="col-md-4">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>Helm Honda Classic</td>
                    <td>Dijual</td>
                    <td>Barang Keluar</td>
                    <td>A101</td>
                    <td>1</td>
                    <td>25 February 2022</td>
                </tr>
                <tr class="text-center">
                    <td>Helm Honda Classic</td>
                    <td>Kulakan</td>
                    <td>Barang Masuk</td>
                    <td>A102</td>
                    <td>5</td>
                    <td>25 February 2022</td>
                </tr>
                <tr class="text-center">
                    <td>Helm Honda Classic</td>
                    <td>Kulakan</td>
                    <td>Barang Masuk</td>
                    <td>A101</td>
                    <td>10</td>
                    <td>25 February 2022</td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="justify-content-center mx-auto d-flex mt-5">
        {{ $katalog->links() }}
    </div>

</div>
</div>

</div>

<div class="row pb-5 mb-4">
    <div class="card border-primary col-md-8 mx-auto">
        <div class="card-body">
            <div class="">
                <a class="card-text justify-content-center d-flex">Nomor Whatsapp Toko Saat Ini</a>
                @foreach ($wa as $data)
                    <h3 class="card-title ml-4 mr-5  justify-content-center d-flex"><b>{{ $data->no_wa }}</b></h3>
                    <div class="mx-auto d-flex justify-content-center">
                        <a href="" class="btn btn-success col-md-3 mr-2 ml-2" data-toggle="modal"
                            data-target="#edit_wa"><i class="fa fa-whatsapp"></i> Ganti Nomor</a>
                        <a href="" class="btn btn-secondary col-md-3 mr-2 ml-2" data-toggle="modal"
                            data-target="#edit_pesan"><i class="fa fa-envelope"></i> Rubah Pesan</a>
                        <a href="https://wa.me/62{{ $data->no_wa }}?text=test" class="btn btn-dark col-md-3 mr-2 ml-2"
                            target="_blank"><i class="fa fa-recycle"></i>
                            Coba</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

</div>

<div class="modal fade" id="edit_wa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Edit Nomor Whatsapp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/wa/edit" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">
                            @csrf
                            @foreach ($wa as $data)
                                <label for="no_wa">Nomor WhatsApp</label>
                                <input type="number" value="{{ $data->no_wa }}" class="form-control" id="no_wa"
                                    name="no_wa" placeholder="Nomor WhatsApp">
                                <p class="mt-2 small text-muted font-italic">Masukkan Nomor Whatsapp yang Akan
                                    Digunakan sebagai whatsapp BajuStore tanpa angka 0 atau kode negara. Cth :
                                    89680591192.</p>
                            @endforeach
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="btn-tambah"><i class="fa fa-check"></i>
                    Ganti</button>
                </form>
                <button type="button" class="btn btn-danger" name="btn-hapus" data-dismiss="modal"><i
                        class=""></i> Batal</button>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="edit_pesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Edit Nomor Whatsapp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/wa/pesan" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">
                            @csrf
                            @foreach ($wa as $data)
                                <label for="no_wa">Pesan WhatsApp</label>
                                <input type="text" value="{{ $data->pesan }}" class="form-control" id="pesan"
                                    name="pesan" placeholder="Pesan WhatsApp">
                                <p class="mt-2 small text-muted font-italic">Rangkai Kata Sesuka Anda, Nomor Order Akan
                                    Tertulis Otomatis di Akhir Kata yang Anda Buat.</p>
                            @endforeach
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="btn-tambah"><i class="fa fa-check"></i>
                    Rubah</button>
                </form>
                <button type="button" class="btn btn-danger" name="btn-hapus" data-dismiss="modal"><i
                        class=""></i> Batal</button>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    AOS.init();
</script>
