<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 6px 20px 5px 20px;
            line-height: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 4px 3px;
        }

        th {
            text-align: left;
        }

        .d-block {
            display: block;
        }

        img.image {
            width: auto;
            height: 80px;
            max-width: 150px;
            max-height: 150px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .p-1 {
            padding: 5px 1px 5px 1px;
        }

        .font-10 {
            font-size: 10pt;
        }

        .font-11 {
            font-size: 11pt;
        }

        .font-12 {
            font-size: 12pt;
        }

        .font-13 {
            font-size: 13pt;
        }

        .border-bottom-header {
            border-bottom: 1px solid;
        }

        .border-all,
        .border-all th,
        .border-all td {
            border: 1px solid;
        }
    </style>
</head>
<body>
    <table class="border-bottom-header">
        <tr>
            <td width="15%" class="text-center">
                @php
                    $path = public_path('polinema-bw.jpeg');
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                @endphp
                <img src="{{ $base64 }}" class="image">
            </td>
            <td width="85%">
                <span class="text-center d-block font-11 font-bold mb-1">
                    KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI
                </span>
                <span class="text-center d-block font-13 font-bold mb-1">
                    POLITEKNIK NEGERI MALANG
                </span>
                <span class="text-center d-block font-10">
                    Jl. Soekarno-Hatta No. 9 Malang 65141
                </span>
                <span class="text-center d-block font-10">
                    Telepon (0341) 404424 Pes. 101-105, 0341-404420, Fax. (0341) 404420
                </span>
                <span class="text-center d-block font-10">
                    Laman: www.polinema.ac.id
                </span>
            </td>
        </tr>
    </table>

    <h2 class="text-center">{{ $kriteria->kriteria_nama }}</h2>
    <p class="text-center">Tanggal: {{ $tanggal }}</p>

    <div class="mt-3">
        <h3>1. Penetapan</h3>
        {!! nl2br($kriteria->penetapan->penetapan) !!}
        
        @if($kriteria->penetapan->dokumen)
            <h4>Dokumen Pendukung:</h4>
            @foreach(json_decode($kriteria->penetapan->dokumen ?? '[]') as $file)
                <img src="{{ public_path($file) }}" style="max-width:200px;">
            @endforeach
        @endif
    </div>

    <div class="mt-3">
        <h3>2. Pelaksanaan</h3>
        {!! nl2br($kriteria->pelaksanaan->pelaksanaan) !!}
        
        @if($kriteria->pelaksanaan->dokumen)
            <h4>Dokumen Pendukung:</h4>
            @foreach(json_decode($kriteria->pelaksanaan->dokumen ?? '[]') as $file)
                <img src="{{ public_path($file) }}" style="max-width:200px;">
            @endforeach
        @endif
    </div>

    <div class="mt-3">
        <h3>3. Evaluasi</h3>
        {!! nl2br($kriteria->evaluasi->evaluasi) !!}
        
        @if($kriteria->evaluasi->dokumen)
            @foreach(json_decode($kriteria->evaluasi->dokumen ?? '[]') as $file)
                <img src="{{ public_path($file) }}" style="max-width:200px;">
            @endforeach
        @endif
    </div>

    <div class="mt-3">
        <h3>4. Pengendalian</h3>
        {!! nl2br($kriteria->pengendalian->pengendalian) !!}
        
        @if($kriteria->pengendalian->dokumen)
            <h4>Dokumen Pendukung:</h4>
            @foreach(json_decode($kriteria->pengendalian->dokumen ?? '[]') as $file)
                <img src="{{ public_path($file) }}" style="max-width:200px;">
            @endforeach
        @endif
    </div>

    <div class="mt-3">
        <h3>5. Peningkatan</h3>
        {!! nl2br($kriteria->peningkatan->peningkatan) !!}
        
        @if($kriteria->peningkatan->dokumen)
            <h4>Dokumen Pendukung:</h4>
            @foreach(json_decode($kriteria->peningkatan->dokumen ?? '[]') as $file)
                <img src="{{ public_path($file) }}" style="max-width:200px;">
            @endforeach
        @endif
    </div>

    <div class="mt-5">
        <table>
            <tr>
                <td width="50%"></td>
                <td class="text-center">
                    <p>Malang, {{ $tanggal }}</p>
                    <p>Direktur Politeknik Negeri Malang</p>
                    <br><br><br>
                    <p><u>Prof. Dr. Ir. ....................................</u></p>
                    <p>NIP. .......................................</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>