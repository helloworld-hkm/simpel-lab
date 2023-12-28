<!DOCTYPE html>
<html>
<head>
	<title>Hasil Perbaikan</title>
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
		<h5> Hasil Perbaikan</h4>
	</center>
    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> Hasil Perbaikan - Dicetak tanggal @carbonNowShort()</p>
    </div>
    <table class="table table-bordered">

        <tbody>
            <tr>
                <th scope="row" width="50%">Nomor komputer</th>
                <td id="detail_noPc">{{ $perbaikan->pc->no_pc }}</td>
            </tr>
            <tr>
                <th scope="row" width="50%">Tempat Alat</th>
                <td id="detail_lab">{{ $perbaikan->lab->nama_lab }}</td>
            </tr>
            <tr>
                <th scope="row" width="50%">Tanggal Kerusakan</th>
                <td id="detail_tanggal">@carbon_date($perbaikan->tgl_kerusakan)</td>
            </tr>
            <tr>
                <th scope="row" width="50%">Tanggal Selesai</th>
                <td id="detail_selesai">@carbon_date($perbaikan->tgl_selesai)  </td>
            </tr>

            <tr>
                <td scope="" colspan="2" width="50%">
                    <p><b>Kerusakan</b> </p>
                    <span>
                        {{ $perbaikan->kerusakan }}
                    </span>
                </td>
            </tr>
            <tr>
                <td scope="" colspan="2" width="50%">
                    <p><b>Detail Perbaikan</b> </p>
                    <span>
                        <ul id="detail_perbaikan">
                            @foreach ($daftar as $d)
                            <li>{{ $d->jenis_perbaikan }} : {{ $d->perbaikan }}</li>
                            @endforeach
                        </ul>
                    </span>
                </td>
            </tr>
            <tr>
                <th scope="row" width="50%">Status</th>
                <td id="status">
                    {{ $perbaikan->status }}
                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>
