<!DOCTYPE html>
<html>
<head>
	<title>Hasil Perbaikan</title>

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
		<h3> Hasil Perbaikan</h4>
	</center>

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
    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> Hasil Perbaikan - Dicetak tanggal @carbonNowShort()</p>
    </div>
</body>
</html>
