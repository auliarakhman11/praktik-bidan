<div class="card">
    <div class="card-header bg-gradient-purple">
        <h3 class="card-title">Table Data Pasien</h3>
    </div>
    <div class="card-body table-responsive">
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#insertpasien">
            Tambah Data
           </button>
           <button wire:click="$refresh" type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#insertpasien">
            Refresh
           </button>
        <div class="row">
            <div class="col">
                <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>
            </div>
            <div class="col">
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
        {{ $pasien->links() }}
    </div>
    
        
       
       <!-- Modal -->
       <div wire:ignore.self class="modal fade" id="insertpasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Form Data Pasien</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn">×</span>
                       </button>
                   </div>
                  <div class="modal-body">
                       <form wire:submit.prevent="store">
                           <div class="row">
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput2">NIK Ayah</label>
                                    <input wire:model="phone" type="number" name="phone" id="" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                                     @error('phone')
                                         <span class="invalid feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name</label>
                                    <input wire:model="name" type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                                     @error('name')
                                         <span class="invalid feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                           </div>
                           
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                       <button type="submit"  class="btn btn-primary close-modal">Save changes</button>
                    </form>
                   </div>
               </div>
           </div>
       </div>
</div>
