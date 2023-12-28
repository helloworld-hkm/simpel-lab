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
		<h5> Hasil Pemeliharaan</h4>
	</center>
    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> Hasil Pemeliharaan - Dicetak tanggal @carbonNowShort()</p>
    </div>
    <table class="table table-bordered">

        <tbody>
            <tr>
                <th scope="row" width="50%">Nomor komputer</th>
                <td id="detail_noPc">{{ $pemeliharaan->pc->no_pc }}</td>
            </tr>
            <tr>
                <th scope="row" width="50%">Tempat Alat</th>
                <td id="detail_lab">{{ $lab->lab->nama_lab }}</td>
            </tr>
            <tr>
                <th scope="row" width="50%">Tanggal Pengecekan</th>
                <td id="detail_tanggal"> @carbon_date($pemeliharaan->tanggal )</td>
            </tr>
            <tr>
                <th scope="row" width="50%">Nama Pelaksana</th>
                <td id="detail_pelaksana">{{ $pemeliharaan->user->fullname }}</td>
            </tr>
            <tr>
                <td scope="" colspan="2" width="50%">
                    <p><b>Detail Pemeliharaan</b> </p>
                    <span>
                        <ul id="prosedur_list">
                            @foreach ($pemeliharaan->detail as $detail)
                                <li>{{ $detail->keterangan }}</li>
                            @endforeach
                        </ul>
                    </span>
                </td>
            </tr>
            <tr>
                <th scope="row" width="50%">Kondisi</th>
                <td id="detail_kondisi">{{ $pemeliharaan->perbaikan }}</td>
            </tr>
            <?php if ($kerusakan) {?>


            <tr>
                <th scope="row" width="50%">Kerusakan</th>
                <td id="detail_kondisi">{{ $kerusakan->kerusakan }}</td>
            </tr>
            <?php   }?>
        </tbody>
    </table>

</body>
</html>
