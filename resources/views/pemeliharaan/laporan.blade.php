<!DOCTYPE html>
<html>
<head>
	<title>Hasil Pemeliharaan</title>

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
		<h3> Hasil Pemeliharaan</h4>
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
