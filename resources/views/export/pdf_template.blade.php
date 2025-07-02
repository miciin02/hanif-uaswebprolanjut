<!DOCTYPE html>
<html>

<head>
    <title>Export PDF</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 15px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        .header,
        .footer {
            width: 100%;
            margin-bottom: 20px;
        }

        .photo {
            border: 1px solid #000;
            width: 3cm;
            height: 4cm;
            display: inline-block;
        }

        .signature {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <p style="font-weight: bold;" align="center">FORMULIR SURVEY PENDUDUK TAHUN 2025</p>
    <div class="header">
        <div style="float: left; width: 50%;">
            <p>Kode Survey: {{ $survey->code }}</p>
            <p>Tanggal Survey: {{ \Carbon\Carbon::parse($survey->tanggal_survey)->format('d-m-Y') }}</p>
            <p>Nama Petugas: {{ auth()->user()->name }}</p>
        </div>
        <div style="float: right; width: 30%; text-align: center;">
            <div class="photo">Pas Foto 3x4</div>
        </div>
        <div style="clear: both;"></div>
    </div>

    <h4>a. Data Survey</h4>
    <table>
        <tr>
            <th>Kode Survey</th>
            <td>{{ $survey->code }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $survey->nik }}</td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $survey->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>Tempat, Tanggal Lahir</th>
            <td>{{ $survey->tempat_lahir }}, {{ \Carbon\Carbon::parse($survey->tanggal_lahir)->translatedFormat('d F Y') }}
            </td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $survey->alamat }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $survey->nomor_telepon }}</td>
        </tr>
    </table>

    <h4>b. Data Keluarga</h4>
    @if($keluarga)
    <table>
        <tr>
            <th>Status Pernikahan</th>
            <td>{{ $keluarga->statusPernikahan->status ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jumlah Anak</th>
            <td>{{ $keluarga->jumlah_anak }}</td>
        </tr>
        <tr>
            <th>Jumlah Tanggungan</th>
            <td>{{ $keluarga->jumlah_tanggungan }}</td>
        </tr>
    </table>
    @else
    <p>Data keluarga tidak tersedia.</p>
    @endif

    <h4>c. Data Rumah</h4>
    @if($rumah)
    <table>
        <tr>
            <th>Status Rumah</th>
            <td>{{ $rumah->statusRumah->status ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jenis Rumah</th>
            <td>{{ $rumah->jenisRumah->jenis ?? '-' }}</td>
        </tr>
        <tr>
            <th>Kondisi Rumah</th>
            <td>{{ $rumah->kondisiRumah->kondisi ?? '-' }}</td>
        </tr>
        <tr>
            <th>Luas Rumah</th>
            <td>{{ $rumah->luas_rumah }} m²</td>
        </tr>
    </table>
    @else
    <p>Data rumah tidak tersedia.</p>
    @endif

    <h4>d. Data Pekerjaan dan Pendapatan</h4>
    @if($pekerjaan)
    <table>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $pekerjaan->pekerjaan->nama_pekerjaan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Pendapatan</th>
            <td>{{ $pekerjaan->pendapatan->range_pendapatan ?? '-' }}</td>
        </tr>
    </table>
    @else
    <p>Data pekerjaan dan pendapatan tidak tersedia.</p>
    @endif

    <h4>e. Data Kendaraan</h4>
    @if($kendaraan->count() > 0)
    <table>
        <tr>
            <th>Jenis Kendaraan</th>
            <th>Jumlah</th>
        </tr>
        @foreach($kendaraan as $k)
        <tr>
            <td>{{ $k->jenisKendaraan->jenis ?? '-' }}</td>
            <td>{{ $k->jumlah_kendaraan }}</td>
        </tr>
        @endforeach
    </table>
    @else
    <p>Data kendaraan tidak tersedia.</p>
    @endif

    <div class="footer">
        <table style="width: 100%; margin-top: 50px; border: none;">
            <tr style="border: none;">
                <td style="width: 50%; border: none; text-align: center;">
                    <br>
                    <br>
                    <p style="text-align: center;">Petugas Survey</p>
                    <div class="signature">__________________________</div>
                    <p style="text-align: center;">{{ auth()->user()->name }}</p>
                </td>
                <td style="width: 50%; border: none; text-align: center;">
                    <p style="text-align: center;">__________________________, {{ \Carbon\Carbon::parse($survey->tanggal_survey)->translatedFormat('d F Y') }}</p>
                    <p style="text-align: center;">Penduduk</p>
                    <div class="signature">__________________________</div>
                    <p style="text-align: center;">{{ $survey->nama_lengkap }}</p>
                </td>
            </tr>
        </table>
    </div>



</body>

</html>