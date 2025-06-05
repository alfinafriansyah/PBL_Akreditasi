<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 6px 20px 5px 20px;
            line-height: 1.5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td, th {
            padding: 8px;
            vertical-align: top;
        }
        th {
            text-align: left;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .border-bottom {
            border-bottom: 1px solid #000;
        }
        .border-all {
            border: 1px solid #000;
        }
        .mt-3 {
            margin-top: 1rem;
        }
        .mb-3 {
            margin-bottom: 1rem;
        }
        .font-12 {
            font-size: 12pt;
        }
        .font-14 {
            font-size: 14pt;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td width="15%" class="text-center">
                <img src="{{ public_path('polinema-bw.jpeg') }}" style="height: 80px;">
            </td>
            <td width="85%">
                <div class="text-center font-14" style="font-weight: bold;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</div>
                <div class="text-center font-14" style="font-weight: bold;">POLITEKNIK NEGERI MALANG</div>
                <div class="text-center">Jl. Soekarno-Hatta No. 9 Malang 65141</div>
                <div class="text-center">Telepon (0341) 404424 Pes. 101-105, 0341-404420, Fax. (0341) 404420</div>
                <div class="text-center">Laman: www.polinema.ac.id</div>
            </td>
        </tr>
    </table>

    <div class="border-bottom mt-3 mb-3"></div>

    <h2 class="text-center">LAPORAN KRITERIA {{ $kriteria->kriteria_kode }}</h2>
    <p class="text-center">Tanggal: {{ $tanggal }}</p>

    <div class="mt-3">
        <h3>1. Penetapan</h3>
        <p>{!! nl2br(e($kriteria->penetapan->penetapan)) !!}</p>
        
        @if($kriteria->penetapan->dokumen)
            <h4>Dokumen Pendukung:</h4>
            @foreach(json_decode($kriteria->penetapan->dokumen) as $doc)
                <div>{{ basename($doc) }}</div>
            @endforeach
        @endif
    </div>

    <div class="mt-3">
        <h3>2. Pelaksanaan</h3>
        <p>{!! nl2br(e($kriteria->pelaksanaan->pelaksanaan)) !!}</p>
        
        @if($kriteria->pelaksanaan->dokumen)
            <h4>Dokumen Pendukung:</h4>
            @foreach(json_decode($kriteria->pelaksanaan->dokumen) as $doc)
                <div>{{ basename($doc) }}</div>
            @endforeach
        @endif
    </div>

    <div class="mt-3">
        <h3>3. Evaluasi</h3>
        <p>{!! nl2br(e($kriteria->evaluasi->evaluasi)) !!}</p>
        
        @if($kriteria->evaluasi->dokumen)
            <h4>Dokumen Pendukung:</h4>
            @foreach(json_decode($kriteria->evaluasi->dokumen) as $doc)
                <div>{{ basename($doc) }}</div>
            @endforeach
        @endif
    </div>

    <div class="mt-3">
        <h3>4. Pengendalian</h3>
        <p>{!! nl2br(e($kriteria->pengendalian->pengendalian)) !!}</p>
        
        @if($kriteria->pengendalian->dokumen)
            <h4>Dokumen Pendukung:</h4>
            @foreach(json_decode($kriteria->pengendalian->dokumen) as $doc)
                <div>{{ basename($doc) }}</div>
            @endforeach
        @endif
    </div>

    <div class="mt-3">
        <h3>5. Peningkatan</h3>
        <p>{!! nl2br(e($kriteria->peningkatan->peningkatan)) !!}</p>
        
        @if($kriteria->peningkatan->dokumen)
            <h4>Dokumen Pendukung:</h4>
            @foreach(json_decode($kriteria->peningkatan->dokumen) as $doc)
                <div>{{ basename($doc) }}</div>
            @endforeach
        @endif
    </div>

    <div class="mt-5">
        <table>
            <tr>
                <td width="70%"></td>
                <td class="text-center">
                    <p>Malang, {{ $tanggal }}</p>
                    <p>Direktur Politeknik Negeri Malang</p>
                    <br><br><br>
                    <p><u>Prof. Dr. Ir. ...................................................................</u></p>
                    <p>NIP. .......................................</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>