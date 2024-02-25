<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pemeliharaan dan Perbaikan</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

</head>

<body>
    <style type="text/css">
         body {
            font-family: 'Arial', sans-serif; /* Set your preferred font family */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 14px; /* Set your preferred font size for tables */
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            font-size: 12px; /* Set your preferred font size for the footer */
            color: rgb(94, 94, 94);
        }

        table th {
            background-color: #f2f2f2;
            font-size: 14px; /* Set your preferred font size for table headers */
        }

        .card-title {
            text-align: center;
            font-size: 18px; /* Set your preferred font size for card titles */
            margin-bottom: 10px; /* Add a little spacing between card titles and content */
        }
    </style>

    <center>
        <h3> LEMBAR PEMELIHARAAN DAN PERBAIKAN KOMPUTER </h4>
            @if ($tgl_awal != '' && $tgl_akhir != '')
                <h4> Periode @carbon_date($tgl_awal) sampai @carbon_date($tgl_akhir) </h4>
            @endif
    </center>

    <table class="table table-bordered">
        <tbody>


            <tr>
                <th scope="col">Nomor PC</th>
                <td scope="col">{{ $pc->no_pc }}</td>
            </tr>
            <tr>
                <th scope="col">Tempat ALat</th>
                <td scope="col">Lab {{ $lab->nama_lab }}</td>
            </tr>
            <tr>
                <th scope="col">Kondisi</th>
                <td scope="col"> {{ $pc->status }}</td>
            </tr>
        </tbody>
    </table>
    <div id="footer">
        <p>&copy; <?php echo date('Y'); ?> Pemeliharaan dan Perbaikan - Dicetak tanggal @carbonNowShort()</p>
    </div>
    <h4 class="">Pemeliharaan</h4>
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

            @foreach ($pemeliharaan as $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td> @carbon($data->tanggal) </td>
                    <td>{{ $data->user->fullname }}</td>
                    <td>{{ $data->perbaikan }}</td>

                </tr>
            @endforeach


            </tr>
        </tbody>
    </table>

    <h4 class="">Perbaikan</h4>
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
                @foreach ($perbaikan as $daftar)
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
                        @if ($daftar->tgl_selesai)
                            <td>@carbon_short($daftar->tgl_selesai)</td>
                        @else
                            <td>-</td>
                        @endif

                        <td>{{ $daftar->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>

</html>
