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
}
    </style>

</head>
{{-- <div class="container-fluid"> --}}
  <img class="ml-5 float-left" src="{{public_path('adminlte/dist/img/IBI.png')}}" alt="" style="width: 80px; height: 80px;">
  <img class="mr-5 float-right" src="{{public_path('adminlte/dist/img/Delima.png')}}" alt="" style="width: 80px; height: 80px;">
{{-- <img src="{{ public_path("storage/images/".$user->profile_pic) }}" alt="" style="width: 150px; height: 150px;"> --}}
			<h5 class="text-center font-weight-bold">LAPORAN PELAYANAN PERSALINAN DI PRAKTIK MANDIRI BIDAN ENDANG T</h5>
      <h5 class="text-center font-weight-bold">Jalan Angsana Raya No 24 RT 24 Blok V Perumnas. 081349342707</h5>
      <br>
			<hr class="text-center font-weight-bold bg-dark" style="border-top: 5px solid">
			<br>
@php
    $no = 1;
@endphp

{{-- </div> --}}
    <table class="text-center">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Jam</th>
          <th scope="col">Nama Ibu</th>
          <th scope="col">Nama Ayah</th>
          <th scope="col">Hamil Ke</th>
          <th scope="col">Umur Hamil</th>
          <th scope="col">ANC Ke</th>
          <th scope="col">Letak Janin</th>
          <th scope="col">Jenis Persalinan</th>
          <th scope="col">Lahir</th>
          <th scope="col">JenKel</th>
          <th scope="col">Kembar</th>
          <th scope="col">BB</th>
          <th scope="col">PB</th>
          <th scope="col">LK</th>
          <th scope="col">Alamat</th>
          <th scope="col">No HP</th>
          <th scope="col">Rujuk Ke</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($persalinan as $d)
        <tr>
          <th scope="row">{{ $no }}</th>
          <td scope="row">{{ date('d-m-Y', strtotime($d->tgl_lahir)) }}</td>
          <td>{{ $d->jam_lahir }}</td>
          <td>Ny. {{ $d->nm_ibu }}</td>
          <td>Tn. {{ $d->nm_ayah }}</td>
          <td>{{ $d->hamil_ke }}</td>
          <td>{{ $d->umur_hamil }}</td>
          <td>{{ $d->anc_ke }}</td>
          <td>{{ $d->letak_janin }}</td>
          <td>{{ $d->jenis_persalinan }}</td>
          <td>{{ $d->lahir }}</td>
          <td style="font-size=10px">{{ $d->jenkel }}</td>
          <td>{{ $d->kembar }}</td>
          <td>{{ $d->bb }}</td>
          <td>{{ $d->pb }}</td>
          <td>{{ $d->lk }}</td>
          <td>{{ $d->alamat }}</td>
          <td>{{ $d->no_tlpn }}</td>
          <td>{{ $d->rujuk }}</td>
        </tr>
        @php
            $no ++
        @endphp
        @endforeach          
      </tbody>
    </table>

    
</body>
</html>