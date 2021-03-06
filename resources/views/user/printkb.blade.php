<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<div class="container-fluid">
  <img class="ml-5 float-left" src="{{public_path('adminlte/dist/img/IBI.png')}}" alt="" style="width: 80px; height: 80px;">
  <img class="mr-5 float-right" src="{{public_path('adminlte/dist/img/Delima.png')}}" alt="" style="width: 80px; height: 80px;">
{{-- <img src="{{ public_path("storage/images/".$user->profile_pic) }}" alt="" style="width: 150px; height: 150px;"> --}}
			<h5 class="text-center font-weight-bold">LAPORAN PELAYANAN KB DI PRAKTIK MANDIRI BIDAN ENDANG T</h5>
      <h5 class="text-center font-weight-bold">Jalan Angsana Raya No 24 RT 24 Blok V Perumnas. 081349342707</h5>
      <br>
			<hr class="text-center font-weight-bold bg-dark" style="border-top: 5px solid"></hr>
			<br>
@php
    $no = 1;
@endphp
    <table class="table table-striped table-bordered border">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Askeptor</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nama Ibu</th>
            <th scope="col">Umur Ibu</th>
            <th scope="col">Nama Ayah</th>
            <th scope="col">Umur Ayah</th>
            <th scope="col">Jumlah Anak</th>
            <th scope="col">Jenis Kontrasepsi</th>
            <th scope="col">Post Partum</th>
            <th scope="col">Alamat</th>
            <th scope="col">No HP</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kb as $d)
          <tr>
            <th scope="row">{{ $no }}</th>
            <td>{{ $d->askeptor }}</td>
            <td>{{ date_format($d->created_at, 'd-m-Y') }}</td>
            <td>Ny. {{ $d->nm_ibu }}</td>
            <td>{{ $d->umur_ibu }}</td>
            <td>Tn. {{ $d->nm_ayah }}</td>
            <td>{{ $d->umur_ayah }}</td>
            <td>{{ $d->jml_anak }}</td>
            <td>{{ $d->jns_kontrasepsi }}</td>
            <td>{{ $d->post_partum }}</td>
            <td>{{ $d->alamat }}</td>
            <td>{{ $d->no_tlpn }}</td>
          </tr>
          @php
              $no ++
          @endphp
          @endforeach          
        </tbody>
      </table>
</div>

    
</body>
</html>