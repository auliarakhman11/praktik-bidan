<div class="card">
    <div class="card-header bg-gradient-purple">
        <h3 class="card-title">Table Data Pasien</h3>
    </div>
    <div class="card-body table-responsive">
        <div class="row">
            <div class="col">
                <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>
            </div>
            <div class="col-5">
                <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Search">
            </div>
        </div>
        <hr>
        <table class="table table-hover table-sm table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">NIK Ibu</th>
                <th scope="col">NIK Ayah</th>
                <th scope="col">Nama Ibu</th>
                <th scope="col">Nama Ayah</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Alamat</th>
                <th scope="col">Created At</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @php
                $no=0
            @endphp
                
                @foreach ($pasien as $d)
                @php
                    $no++ 
                @endphp                     
            <tr>                         
                <td scope="row">{{ $no }}</td>
                <td scope="row">{{ $d->nik_ibu }}</td>
                <td scope="row">{{ $d->nik_ayah }}</td>
                <td scope="row">{{ $d->nm_ibu }}</td>
                <td scope="row">{{ $d->nm_ayah }}</td>
                <td scope="row">{{ $d->no_tlpn }}</td>
                <td scope="row">{{ $d->alamat }}</td>
                <td scope="row">{{ date_format($d->created_at, 'd-m-Y') }}</td>
                <td scope="row">
                    <button data-toggle="modal" data-target="#updateModal" class="btn btn-sm btn-info text-light"><i class="fas fa-edit"></i></button>
                    <a href="" class="btn btn-sm btn-primary text-light"><i class="fas fa-search"></i></a>
                    <button data-toggle="modal" data-target="#deleteModal"  class="btn btn-sm btn-danger text-light"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>    
</div>
