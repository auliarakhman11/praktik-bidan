<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
      table, th, td {
  border: 1px solid black;
  font-size: 12px;
}
  table.table-fit {
    width: auto !important;
    table-layout: auto !important;
}
table.table-fit thead th, table.table-fit tfoot th {
    width: auto !important;
}
table.table-fit tbody td, table.table-fit tfoot td {
    width: auto !important;
}

    </style>

</head>
{{-- <div class="container-fluid"> --}}
  <img class="ml-5 float-left" src="{{public_path('adminlte/dist/img/IBI.png')}}" alt="" style="width: 80px; height: 80px;">
  <img class="mr-5 float-right" src="{{public_path('adminlte/dist/img/Delima.png')}}" alt="" style="width: 80px; height: 80px;">
{{-- <img src="{{ public_path("storage/images/".$user->profile_pic) }}" alt="" style="width: 150px; height: 150px;"> --}}
			<h5 class="text-center font-weight-bold">LAPORAN PELAYANAN ANC DI PRAKTIK MANDIRI BIDAN ENDANG T</h5>
      <h5 class="text-center font-weight-bold">Jalan Angsana Raya No 24 RT 24 Blok V Perumnas. 081349342707</h5>
      <br>
			<hr class="text-center font-weight-bold bg-dark" style="border-top: 5px solid">
			<br>
@php
    $no = 1;
@endphp

{{-- </div> --}}
    <table class="table-fit text-center">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Nama Ibu NIK</th>
          <th scope="col">Nama Ayah NIK</th>
          <th scope="col">No KK</th>
          <th scope="col">G</th>
          <th scope="col">P</th>
          <th scope="col">A</th>
          <th scope="col">HPHT</th>
          <th scope="col">BB</th>
          <th scope="col">TD</th>
          <th scope="col">TB</th>
          <th scope="col">LI LA</th>
          <th scope="col">HB</th>
          <th scope="col">TT</th>
          <th scope="col">GOL DAR</th>
          <th scope="col">KB SBLM HAMIL</th>
          <th scope="col">RIWAYAT PENYAKIT</th>
          <th scope="col">RIWAYAT ALERGI</th>
          <th scope="col">JARAK KEHAMILAN</th>
          <th scope="col">ALAMAT</th>
          <th scope="col">NO TLPN</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pemeriksaan as $d)
        <tr>
          <th scope="row">{{ $no }}</th>
          <td scope="row">{{ date('d-m-Y', strtotime($d->tanggal)) }}</td>
          <td>Ny. {{ $d->nm_ibu }} / {{ $d->nik_ibu }}</td>
          <td>Tn. {{ $d->nm_ayah }} / {{ $d->nik_ayah }}</td>
          <td>{{ $d->no_kk }}</td>
          <td>{{ $d->g }}</td>
          <td>{{ $d->p }}</td>
          <td>{{ $d->a }}</td>
          <td>{{ $d->hpht }}</td>
          <td>{{ $d->bb }}</td>
          <td>{{ $d->td }}</td>
          <td>{{ $d->tb }}</td>
          <td>{{ $d->li_la }}</td>
          <td>{{ $d->hb }}</td>
          <td>{{ $d->tt }}</td>
          <td>{{ $d->gol_darah }}</td>
          <td>{{ $d->kb_sebelum_hamil }}</td>
          <td>{{ $d->riwayat_penyakit }}</td>
          <td>{{ $d->riwayat_alergi }}</td>
          <td>{{ $d->jarak_kehamilan }}</td>
          <td>{{ $d->alamat }}</td>
          <td>{{ $d->no_tlpn }}</td>
        </tr>
        @php
            $no ++
        @endphp
        @endforeach          
      </tbody>
    </table>

    
</body>
</html>