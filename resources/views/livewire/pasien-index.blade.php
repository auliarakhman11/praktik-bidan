@section('swalcss')
      <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/build/scss/loading.scss">
@endsection
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
                <th scope="col">Kode Pasien</th>
                <th scope="col">Nama Ibu</th>
                <th scope="col">Nama Ayah</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            {{-- @php
                $no=0
            @endphp --}}
                
                @foreach ($pasien as $d)
                {{-- @php
                    $no++ 
                @endphp                      --}}
            <tr>                         
                {{-- <td scope="row">{{ $no }}</td> --}}
                <td scope="row">{{ $d->kd_pasien }}</td>
                <td scope="row">{{ $d->nm_ibu }}</td>
                <td scope="row">{{ $d->nm_ayah }}</td>
                <td scope="row">{{ $d->no_tlpn }}</td>
                <td scope="row">{{ $d->alamat }}</td>
                {{-- <td scope="row">{{ date_format($d->created_at, 'd-m-Y') }}</td> --}}
                <td scope="row">
                    <button wire:click="getPasien({{ $d->id }}) type="button" class="btn btn-sm btn-info text-light mb-1" data-toggle="modal" data-target="#updatePasien">
                        <i class="fas fa-edit"></i>
                    </button>
                    <a href="" class="btn btn-sm btn-primary text-light mb-1"><i class="fas fa-search"></i></a>
                    <button wire:click="getPasien({{ $d->id }}) type="button" class="btn btn-sm btn-danger text-light mb-1" data-toggle="modal" data-target="#delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $pasien->links() }}
    </div>
    
        
       
       <!-- Modal Insert -->
       <div wire:ignore.self class="modal fade" id="insertpasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
               <div class="modal-content">
                   <div class="modal-header bg-gradient-purple">
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
                                    <label for="exampleFormControlInput2" class="text-purple">NIK Ayah</label>
                                    <input wire:model="nik_ayah" type="number" name="nik_ayah" id="" class="form-control border-primary text-purple @error('nik_ayah') is-invalid @enderror" placeholder="NIK Ayah">
                                     @error('nik_ayah')
                                         <span class="invalid feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="text-purple">Nama Ayah</label>
                                    <input wire:model="nm_ayah" type="text" name="nm_ayah" id="" class="form-control border-primary text-purple @error('nm_ayah') is-invalid @enderror" placeholder="Nama Ayah">
                                     @error('nm_ayah')
                                         <span class="invalid feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="text-purple">NIK Ibu</label>
                                    <input wire:model="nik_ibu" type="number" name="nik_ibu" id="" class="form-control border-primary text-purple @error('nik_ibu') is-invalid @enderror" placeholder="NIK Ibu">
                                     @error('nik_ibu')
                                         <span class="invalid feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="text-purple">Nama Ibu</label>
                                    <input wire:model="nm_ibu" type="text" name="nm_ibu" id="" class="form-control border-primary text-purple @error('nm_ibu') is-invalid @enderror" placeholder="NAMA Ibu">
                                     @error('nm_ibu')
                                         <span class="invalid feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="text-purple">Tanggal Lahir Ayah</label>
                                    <input wire:model="tgl_lahir_ayah" type="date" name="tgl_lahir_ayah" id="" class="form-control border-primary text-purple @error('tgl_lahir_ayah') is-invalid @enderror" placeholder="Tanggal Lahir Ayah">
                                     @error('tgl_lahir_ayah')
                                         <span class="invalid feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="text-purple">Tanggal Lahir Ibu</label>
                                    <input wire:model="tgl_lahir_ibu" type="date" name="tgl_lahir_ibu" id="" class="form-control border-primary text-purple @error('tgl_lahir_ibu') is-invalid @enderror" placeholder="Tanggal Lahir Ibu">
                                     @error('tgl_lahir_ibu')
                                         <span class="invalid feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="text-purple">Nomor Telepon</label>
                                    <input wire:model="no_tlpn" type="number" name="no_tlpn" id="" class="form-control border-primary text-purple @error('no_tlpn') is-invalid @enderror" placeholder="Nomor Telepon">
                                     @error('no_tlpn')
                                         <span class="invalid feedback">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                               </div>
                               <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="text-purple">Alamat</label>
                                    <input wire:model="alamat" type="text" name="alamat" id="" class="form-control border-primary text-purple @error('alamat') is-invalid @enderror" placeholder="Alamat">
                                     @error('alamat')
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
                       <button type="submit"  class="btn btn-primary close-modal">Insert</button>
                    </form>
                    <div wire:loading wire:target="store">
                        <div style="color: #9561e2" class="la-line-scale-pulse-out">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                   </div>
               </div>
           </div>
       </div>

       <!-- Modal Delete -->
    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete data pasien</h5>
            <button wire:click.prevent="resetInput() type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p>Apakah anada yakin ingin menghpus data pasien {{ $nm_ibu }}</p>
            </div>
            <div class="modal-footer">
            <button wire:click.prevent="resetInput()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button wire:click="deletePasien({{$pasienId}})" type="button" class="btn btn-danger">Delete</button>
            <div wire:loading wire:target="deletePasien">
                <div style="color: #e3342f" class="la-line-scale-pulse-out">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal Update-->
    <div wire:ignore.self class="modal fade" id="updatePasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mr-1" id="exampleModalLabel">Upate Data Pasien</h5>
                    <div wire:loading wire:target="getPasien">
                        <div style="color: #9561e2" class="la-line-scale-pulse-out">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <button wire:click.prevent="resetInput()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
               <div class="modal-body">
                    <form wire:submit.prevent="update">
                        <input wire:model="pasienId" type="hidden" name="">
                        <div class="row">
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput2">NIK Ayah</label>
                                 <input wire:model="nik_ayah" type="number" name="nik_ayah" id="" class="form-control @error('nik_ayah') is-invalid @enderror" placeholder="NIK Ayah">
                                  @error('nik_ayah')
                                      <span class="invalid feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">Nama Ayah</label>
                                 <input wire:model="nm_ayah" type="text" name="nm_ayah" id="" class="form-control @error('nm_ayah') is-invalid @enderror" placeholder="Nama Ayah">
                                  @error('nm_ayah')
                                      <span class="invalid feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">NIK Ibu</label>
                                 <input wire:model="nik_ibu" type="number" name="nik_ibu" id="" class="form-control @error('nik_ibu') is-invalid @enderror" placeholder="NIK Ibu">
                                  @error('nik_ibu')
                                      <span class="invalid feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">Nama Ibu</label>
                                 <input wire:model="nm_ibu" type="text" name="nm_ibu" id="" class="form-control @error('nm_ibu') is-invalid @enderror" placeholder="NAMA Ibu">
                                  @error('nm_ibu')
                                      <span class="invalid feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">Tanggal Lahir Ayah</label>
                                 <input wire:model="tgl_lahir_ayah" type="date" name="tgl_lahir_ayah" id="" class="form-control @error('tgl_lahir_ayah') is-invalid @enderror" placeholder="Tanggal Lahir Ayah">
                                  @error('tgl_lahir_ayah')
                                      <span class="invalid feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">Tanggal Lahir Ibu</label>
                                 <input wire:model="tgl_lahir_ibu" type="date" name="tgl_lahir_ibu" id="" class="form-control @error('tgl_lahir_ibu') is-invalid @enderror" placeholder="Tanggal Lahir Ibu">
                                  @error('tgl_lahir_ibu')
                                      <span class="invalid feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">Nomor Telepon</label>
                                 <input wire:model="no_tlpn" type="number" name="no_tlpn" id="" class="form-control @error('no_tlpn') is-invalid @enderror" placeholder="Nomor Telepon">
                                  @error('no_tlpn')
                                      <span class="invalid feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">Alamat</label>
                                 <input wire:model="alamat" type="text" name="alamat" id="" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat">
                                  @error('alamat')
                                      <span class="invalid feedback">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                             </div>
                            </div>
                            
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button wire:click.prevent="resetInput()" type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary close-modal">Update</button>
                 </form>
                 <div wire:loading wire:target="update">
                    <div style="color: #9561e2" class="la-line-scale-pulse-out">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                 </div>
                </div>
            </div>
        </div>
    </div>

</div>

@section('swaljs')
    <!-- SweetAlert2 -->
<script src="{{asset('adminlte')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
@endsection
@section('footer')
<script type="text/javascript">
    window.livewire.on('pasienStored', () => {
        $('#insertpasien').modal('hide');
        Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        icon: 'success',
            title: 'Data pasien berhasil ditambahkan'
            });
    });

    window.livewire.on('pasienDeleted', () => {
        $('#delete').modal('hide');
        Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        icon: 'success',
            title: 'Data pasien berhasil dihapus'
            });
    });

    window.livewire.on('pasienUpdated', () => {
        $('#updatePasien').modal('hide');
        Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        icon: 'success',
            title: 'Data pasien berhasil diedit'
            });
    });

    window.livewire.on('contactUpdated', () => {
        $('#updateModal').modal('hide');
    });

    // window.livewire.on('delete', () => {
    //     $('#deleteModal').modal('hide');
    // });
</script>

@endsection