@section('swalcss')
      <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="{{asset('adminlte')}}/build/scss/loading.scss">
@endsection
<div class="card">
    <div class="card-header bg-gradient-purple">
        <h3 class="card-title">Table Data User</h3>
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
            <div class="col">
                <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Search">
            </div>
        </div>
        <hr>
        <table class="table table-hover table-sm table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Hak Akses</th>
                <th scope="col">Created At</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @php
                $no=0
            @endphp
                
                @foreach ($users as $d)
                @php
                    $no++ 
                @endphp                     
            <tr>                         
                <td scope="row">{{ $no }}</td>
                <td scope="row">{{ $d->name }}</td>
                <td scope="row">{{ $d->email }}</td>
                @if ($d->role_id === 1)
                <td scope="row"><button wire:click="getRoleUser({{ $d->id }}) type="button" class="btn btn-sm btn-success text-light mb-1" data-toggle="modal" data-target="#editroleuser">
                    Admin
                </button></td>
                @else
                <td scope="row"><button wire:click="getRoleAdmin({{ $d->id }}) type="button" class="btn btn-sm btn-info text-light mb-1" data-toggle="modal" data-target="#editroleadmin">
                    User
                </button></td>
                @endif
                <td scope="row">{{ date_format($d->created_at, 'd-m-Y') }}</td>
                <td scope="row">
                    {{-- <button wire:click="getUser({{ $d->id }}) type="button" class="btn btn-sm btn-info text-light mb-1" data-toggle="modal" data-target="#updatePasien">
                        <i class="fas fa-edit"></i>
                    </button> --}}
                    <button wire:click="getUser({{ $d->id }}) type="button" class="btn btn-sm btn-danger text-light mb-1" data-toggle="modal" data-target="#deleteuser">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
    
        
       <!-- Modal Delete -->
    <div wire:ignore.self class="modal fade" id="deleteuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete data users</h5>
            <button wire:click.prevent="resetInput() type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p>Apakah anada yakin ingin menghpus data User <strong>{{ $name }}</strong></p>
            </div>
            <div class="modal-footer">
            <button wire:click.prevent="resetInput()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button wire:click="deleteUser({{$userId}})" type="button" class="btn btn-danger">Delete</button>
            <div wire:loading wire:target="deleteUser">
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

<!-- Modal Ubah Hak Akses User -->
<div wire:ignore.self class="modal fade" id="editroleuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Hak Akses</h5>
        <button wire:click.prevent="resetInput() type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <p>Apakah anda yakin ingin mengubah hak akses <strong>{{ $name }}</strong> menjadi user biasa?</p>
        </div>
        <div class="modal-footer">
        <button wire:click.prevent="resetInput()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button wire:click="updateRole({{$userId}})" type="button" class="btn btn-primary">Ubah</button>
        <div wire:loading wire:target="updateRole">
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

<!-- Modal Ubah Hak Akses admin -->
<div wire:ignore.self class="modal fade" id="editroleadmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Hak Akses</h5>
        <button wire:click.prevent="resetInput() type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <p>Apakah anda yakin ingin mengubah hak akses <strong>{{ $name }}</strong>  menjadi Admin?</p>
        </div>
        <div class="modal-footer">
        <button wire:click.prevent="resetInput()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button wire:click="updateRole({{$userId}})" type="button" class="btn btn-primary">Ubah</button>
        <div wire:loading wire:target="updateRole">
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


    <!-- Modal Update-->
    {{-- <div wire:ignore.self class="modal fade" id="updatePasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mr-1" id="exampleModalLabel">Upate Data Pasien</h5>
                    <div wire:loading wire:target="getUser">
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
    </div> --}}

</div>

@section('swaljs')
    <!-- SweetAlert2 -->
<script src="{{asset('adminlte')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
@endsection
@section('footer')
<script type="text/javascript">
    window.livewire.on('roleUpdated', () => {
        $('#editroleuser').modal('hide');
        $('#editroleadmin').modal('hide');
        Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        icon: 'success',
            title: 'Hak akses user berhasil dirubah'
            });
    });

    window.livewire.on('userDeleted', () => {
        $('#deleteuser').modal('hide');
        Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        icon: 'success',
            title: 'Data user berhasil dihapus'
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