@extends('templates.index')
@push('additional-js')
    <script>
        $(document).ready(function() {
            $('#filter_lab_id').on('change', function() {
                var labId = $(this).val();
                $.ajax({
                    url: '/laporan/get/' + labId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var pcSelect = $('#filter_pc_id');
                        pcSelect.empty();
                        if ($.isEmptyObject(data)) {
                            pcSelect.append($('<option>', {
                                value: '',
                                text: 'Tidak ada nomor PC yang tersedia',
                                disabled: true,
                            }));
                        } else {
                            const dataArray = Object.entries(data);
                            dataArray.sort(([key1, value1], [key2, value2]) => parseInt(key1) -
                                parseInt(key2));
                            pcSelect.append($('<option>', {
                                value: 'semua',
                                text: 'Semua'
                            }));
                            dataArray.forEach(([number, id]) => {
                                pcSelect.append($('<option>', {
                                    value: id,
                                    text: number
                                }));
                            });
                        }
                    },
                    error: function(error) {
                        console.error('Error fetching PC data', error);
                    }
                });
            });

            // filter data

        });

        function filterData() {
            var lab = $('#filter_lab_id').val();
            var komputer = $('#filter_pc_id').val();
            var startDate = $('#filter_tgl_awal').val();
            var endDate = $('#filter_tgl_akhir').val();
            console.log(lab)
            console.log(komputer)
            console.log(startDate)
            console.log(endDate)

            $.ajax({
                url: '/laporan/filterData', // Sesuaikan dengan route yang Anda buat
                method: 'POST',
                data: {
                    lab: lab,
                    komputer: komputer,
                    start_date: startDate,
                    end_date: endDate,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data)
                    // console.log(data.pemeliharaan.length)
                    // if (data.pemeliharaan.length > 0) {
                    $('#input_lab_id').val(lab)
                    $('#input_pc_id').val(komputer)
                    $('#input_tgl_awal').val(startDate)
                    $('#input_tgl_akhir').val(endDate)


                    // console.log('cek komputer'.komputer)
                    console.log($('#input_pc_id').val(komputer))
                    if ($('#input_pc_id').val() === 'semua') {
                        $('#input_lab_id_semua').val(lab)
                    $('#input_pc_id_semua').val(komputer)
                    $('#input_tgl_awal_semua').val(startDate)
                    $('#input_tgl_akhir_semua').val(endDate)
                        console.log('semua pc')
                        displayTableAll(data);
                        $('#result-table-all').show();
                        $('#result-table').hide();
                    } else {
                        displayTable(data);
                        $('#result-table').show();
                        $('#no-data-message').hide();
                        $('#result-table-all').hide();
                    }
                    $('#no-data-message').hide();
                    console.log("work")
                    // } else {
                    //     $('#result-table').hide();
                    //     $('#no-data-message').show();
                    //     console.log("zonk")
                    // }
                },
                error: function() {
                    console.log("error")
                    $('#result-table-all').hide();
                    $('#result-table').hide();
                    $('#no-data-message').show();
                }
            });
        }

        function displayTableAll(data) {

                var tablePemeliharaan = $('#table-pemeliharaan-semua');
                var tablePerbaikan = $('#table-perbaikan-semua');
                tablePemeliharaan.empty();
                tablePerbaikan.empty();

                // console.log('tampil data pc ')
                // var tablePemeliharaan = $('#table-pemeliharaan');
                // var tablePerbaikan = $('#table-perbaikan');
                // tablePemeliharaan.empty();
                // tablePerbaikan.empty();

            var list = $('#list_perbaikan');

            console.log('tampil')
            var i = 1
            if (data.pemeliharaan == 0) {
                var row = '<tr > <td colspan="6" class="text-center">Tidak Ada data Pemeliharaan</td></tr>';
                tablePemeliharaan.append(row);
            }
            $.each(data.pemeliharaan, function(index, item) {
                var row = '<tr>' +
                    '<td>' + i++ + '</td>' +
                    '<td>' + item.tanggal + '</td>' +
                    '<td>' + item.pc.no_pc + '</td>' +
                    '<td>' + item.user.fullname + '</td>' +
                    // '<td>' + item.pc.lab. + '</td>' +
                    '<td>' + item.perbaikan + '</td>' +
                    '</tr>';
                // Tambahkan baris dengan kolom-kolom lain sesuai dengan model Anda

                tablePemeliharaan.append(row);
            });
            var x = 1
            if (data.perbaikan == 0) {
                var row = '<tr > <td colspan="6" class="text-center">Tidak Ada data Perbaikan</td></tr>';
                tablePerbaikan.append(row);
            }
            $.each(data.perbaikan, function(index, item) {
                var tgl_selesai = item.tgl_selesai ? item.tgl_selesai : '-'
                var row = '<tr>' +
                    '<td>' + x++ + '</td>' +
                    '<td>' + item.kerusakan + '</td>' +
                    '<td>' + item.tgl_kerusakan + '</td>' +
                    '<td>' + item.pc.no_pc + '</td>' +
                    '<td><ul id="list_perbaikan_semua' + x + '"></ul></td>' +
                    '<td>' + tgl_selesai + '</td>' +
                    '<td>' + item.status + '</td>' +
                    '</tr>';

                // Assuming tablePerbaikan is the tbody element
                tablePerbaikan.append(row);

                var list = $('#list_perbaikan_semua' + x);


                $.each(item.detail, function(innerIndex, innerItem) {
                    console.log(innerItem)
                    var listItem = '<li>' +
                        innerItem.jenis_perbaikan + ': ' + innerItem.perbaikan +
                        '</li>';
                    list.append(listItem);
                });
            });

            $('#result-table').show();
        }
        function displayTable(data) {

                // var tablePemeliharaan = $('#table-pemeliharaan-semua');
                // var tablePerbaikan = $('#table-perbaikan-semua');
                // tablePemeliharaan.empty();
                // tablePerbaikan.empty();

                console.log('tampil data pc ')
                var tablePemeliharaan = $('#table-pemeliharaan');
                var tablePerbaikan = $('#table-perbaikan');
                tablePemeliharaan.empty();
                tablePerbaikan.empty();

            var list = $('#list_perbaikan');

            console.log('tampil')
            var i = 1
            if (data.pemeliharaan == 0) {
                var row = '<tr > <td colspan="6" class="text-center">Tidak Ada data Pemeliharaan</td></tr>';
                tablePemeliharaan.append(row);
            }
            $.each(data.pemeliharaan, function(index, item) {
                var row = '<tr>' +
                    '<td>' + i++ + '</td>' +
                    '<td>' + item.tanggal + '</td>' +
                    '<td>' + item.user.fullname + '</td>' +
                    // '<td>' + item.pc.lab. + '</td>' +
                    '<td>' + item.perbaikan + '</td>' +
                    '</tr>';
                // Tambahkan baris dengan kolom-kolom lain sesuai dengan model Anda

                tablePemeliharaan.append(row);
            });
            var x = 1
            if (data.perbaikan == 0) {
                var row = '<tr > <td colspan="6" class="text-center">Tidak Ada data Perbaikan</td></tr>';
                tablePerbaikan.append(row);
            }
            $.each(data.perbaikan, function(index, item) {
                var tgl_selesai = item.tgl_selesai ? item.tgl_selesai : '-'
                var row = '<tr>' +
                    '<td>' + x++ + '</td>' +
                    '<td>' + item.kerusakan + '</td>' +
                    '<td>' + item.tgl_kerusakan + '</td>' +
                    '<td><ul id="list_perbaikan_' + x + '"></ul></td>' +
                    '<td>' + tgl_selesai + '</td>' +
                    '<td>' + item.status + '</td>' +
                    '</tr>';

                // Assuming tablePerbaikan is the tbody element
                tablePerbaikan.append(row);

                var list = $('#list_perbaikan_' + x);


                $.each(item.detail, function(innerIndex, innerItem) {
                    console.log(innerItem)
                    var listItem = '<li>' +
                        innerItem.jenis_perbaikan + ': ' + innerItem.perbaikan +
                        '</li>';
                    list.append(listItem);
                });
            });

            $('#result-table').show();
        }
    </script>
@endpush
@section('content')
    <div class="pagetitle">

        <h1>Laporan Pemeliharaan dan Perbaikan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Laporan</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">

        <div class="row">
            <div class="col-12">
                <!-- Recent Activity -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Filter Laporan Perbaikan & Pemeliharaan</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3 has-validation">
                                    <select class="form-select" name="lab_id" value="" id="filter_lab_id"
                                        aria-label="State" required>
                                        <option label=" " hidden disabled selected></option>
                                        @foreach ($lab as $l)
                                            <option value="{{ $l->id }}">{{ $l->nama_lab }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Lab Komputer</label>
                                    <div class="invalid-feedback">
                                        Silahkan isi Lokasi Pc
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3 has-validation">
                                    <select class="form-select" name="pc_id" value="" id="filter_pc_id"
                                        aria-label="State" placeholeder="" required>

                                    </select>
                                    <label for="floatingSelect">No PC</label>
                                    <div class="invalid-feedback">
                                        Silahkan isi Nomor Pc
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3 has-validation">
                                    <input type="datetime-local" class="form-control" name="tgl_awal" id="filter_tgl_awal"
                                        value="" maxlength="255" id="floatingName" placeholder="Your Name" required>

                                    <label for="floatingName">Tanggal Awal </label>
                                    <div class="invalid-feedback">
                                        Tanggal harus diisi
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-floating mb-3 has-validation">
                                    <input type="datetime-local" class="form-control" name="tgl_akhir" id="filter_tgl_akhir"
                                        value="" maxlength="255" id="floatingName" placeholder="Your Name" required>

                                    <label for="floatingName">Tanggal Akhir </label>
                                    <div class="invalid-feedback">
                                        Tanggal harus diisi
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button class="btn btn-primary ml-auto" onclick="filterData()"><i class="bi bi-search"></i>
                            Cari</button>
                    </div>

                </div><!-- End Recent Activity -->

            </div><!-- End Right side columns -->
            <div class="col-12" id="result-table"style="display: none;">
                <!-- Recent Activity -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">Hasil</h5>
                            <form action="/laporan/cetak" method="post" target="_blank">
                                @csrf
                                <input type="text" hidden name="input_lab_id" id="input_lab_id">
                                <input type="text" hidden name="input_pc_id" id="input_pc_id">
                                <input type="text" hidden name="input_tgl_awal" id="input_tgl_awal">
                                <input type="text" hidden name="input_tgl_akhir" id="input_tgl_akhir">
                                <button class="btn btn-success ml-auto"><i class="bi bi-printer"></i> Cetak Laporan</button>
                            </form>

                        </div>
                        <div class="row card-footer">
                            <div class="col-12 ">
                                <h5 class="card-title">Pemeliharaan</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Pelakasana</th>
                                            <th scope="col">Hasil</th>

                                        </tr>
                                    </thead>
                                    <tbody id="table-pemeliharaan">

                                        {{-- @foreach ($pemeliharaan as $data)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td> @carbon($data->tanggal) </td>
                                                <td>{{ $data->user->fullname }}</td>
                                                <td>{{ $data->perbaikan }}</td>

                                            </tr>
                                        @endforeach --}}


                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 ">
                                <h5 class="card-title">Perbaikan</h5>
                                <div class="table-responsive">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Kerusakan</th>
                                                <th scope="col">Tanggal kerusakan</th>
                                                <th scope="col">perbaikan</th>
                                                <th scope="col">Tanggal Selesai</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-perbaikan">
                                            {{-- @foreach ($list_perbaikan as $daftar)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $daftar->kerusakan }}</td>
                                                    <td>@carbon_short($daftar->tgl_kerusakan)</td>
                                                    <td>
                                                        <ul>
                                                            @foreach ($daftar->detail as $detail)
                                                                <li>{{ $detail->jenis_perbaikan }} :
                                                                    {{ $detail->perbaikan }}</li>
                                                            @endforeach
                                                        </ul>

                                                    </td>
                                                    @if ($daftar->kerusakan)
                                                        <td>@carbon_short($daftar->tgl_selesai)</td>
                                                    @else
                                                        <td>-</td>
                                                    @endif

                                                    <td>{{ $daftar->status }}</td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Recent Activity -->

            </div><!-- End Right side columns -->
            <div class="col-12" id="result-table-all"style="display: none;">
                <!-- Recent Activity -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">Hasil</h5>
                            <form action="/laporan/cetakLab" method="post" target="_blank">
                                @csrf
                                <input type="text" hidden name="input_lab_id" id="input_lab_id_semua">
                                <input type="text" hidden  name="input_pc_id" id="input_pc_id_semua">
                                <input type="text" hidden name="input_tgl_awal" id="input_tgl_awal_semua">
                                <input type="text" hidden name="input_tgl_akhir" id="input_tgl_akhir_semua">
                                <button class="btn btn-success ml-auto"><i class="bi bi-printer"></i> Cetak
                                    Laporan</button>
                            </form>

                        </div>
                        <div class="row card-footer">
                            <div class="col-12 ">
                                <h5 class="card-title">Pemeliharaan</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">No PC</th>
                                            <th scope="col">Pelakasana</th>
                                            <th scope="col">Hasil</th>

                                        </tr>
                                    </thead>
                                    <tbody id="table-pemeliharaan-semua">

                                        {{-- @foreach ($pemeliharaan as $data)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td> @carbon($data->tanggal) </td>
                                                <td>{{ $data->user->fullname }}</td>
                                                <td>{{ $data->perbaikan }}</td>

                                            </tr>
                                        @endforeach --}}


                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 ">
                                <h5 class="card-title">Perbaikan</h5>
                                <div class="table-responsive">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Kerusakan</th>
                                                <th scope="col">Tanggal kerusakan</th>
                                                <th scope="col">No PC</th>
                                                <th scope="col">perbaikan</th>
                                                <th scope="col">Tanggal Selesai</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-perbaikan-semua">
                                            {{-- @foreach ($list_perbaikan as $daftar)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $daftar->kerusakan }}</td>
                                                    <td>@carbon_short($daftar->tgl_kerusakan)</td>
                                                    <td>
                                                        <ul>
                                                            @foreach ($daftar->detail as $detail)
                                                                <li>{{ $detail->jenis_perbaikan }} :
                                                                    {{ $detail->perbaikan }}</li>
                                                            @endforeach
                                                        </ul>

                                                    </td>
                                                    @if ($daftar->kerusakan)
                                                        <td>@carbon_short($daftar->tgl_selesai)</td>
                                                    @else
                                                        <td>-</td>
                                                    @endif

                                                    <td>{{ $daftar->status }}</td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Recent Activity -->

            </div><!-- End Right side columns -->
            <div class="col-12" id="no-data-message"style="display: none;">
                <!-- Recent Activity -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">Hasil</h5>

                        </div>
                        <div class="row ">
                            <div class="col-12 text-center text-danger">
                                <h5><i class="bi bi-exclamation-square"></i> Data Tidak Ditermukan</h5>
                            </div>

                        </div>
                    </div>


                </div><!-- End Recent Activity -->

            </div><!-- End Right side columns -->

        </div>

    </section>
@endsection
