<!DOCTYPE html>
<html>
<head>
	<title>Hasil Pemeliharaan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            /* font-size: 9pt; */
        }

        /* Style for the footer */
        #footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
           color:rgb(94, 94, 94)
        }
    </style>
	<center>
		<h5> LEMBAR PEMELIHARAAN DAN PERBAIKAN KOMPUTER  </h4>
        @if ($tgl_awal !="" && $tgl_akhir!="")

		<h5> Periode @carbon_date($tgl_awal) sampai @carbon_date($tgl_akhir)  </h5>
        @endif
	</center>
    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> Pemeliharaan dan Perbaikan - Dicetak tanggal @carbonNowShort()</p>
    </div>
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
