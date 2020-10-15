<div>
    <div class="card">
        <div class="card-header bg-gradient-purple">
            <h3 class="card-title">Table Data Persalinan</h3>
        </div>
        <div class="card-body table-responsive">
            @if (!empty($pasienId))
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#insertpersalinan">
                Tambah Data
               </button>
            @endif
               
            <div class="row">
                <div class="col">
                    <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
                @if (empty($pasienId))
                <div class="col">
                    <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Search">
                </div>
                @endif
            </div>
            <hr>
            @if (!empty($pasienId))
            <table class="table table-hover table-sm table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Hamil ke</th>
                    <th scope="col">Umur Hamil</th>
                    <th scope="col">ANC ke</th>
                    <th scope="col">Jenis Persalinan</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                {{-- @php
                    $no=0
                @endphp --}}
                    
                    @foreach ($persalinan as $datapersalinan)
                    {{-- @php
                        $no++ 
                    @endphp                      --}}
                <tr>                         
                    {{-- <td scope="row">{{ $no }}</td> --}}
                    <td scope="row">{{ date('d-m-Y', strtotime($datapersalinan->tgl_lahir)) }}</td>
                    <td scope="row">{{ $datapersalinan->hamil_ke }}</td>
                    <td scope="row">{{ $datapersalinan->umur_hamil }}</td>
                    <td scope="row">{{ $datapersalinan->anc_ke }}</td>
                    <td scope="row">{{ $datapersalinan->jenis_persalinan }}</td>
                    <td scope="row">{{ $datapersalinan->jenkel }}</td>
                    <td scope="row">
                        <button wire:click="getPersalinan({{ $datapersalinan->id }})"  type="button" class="btn btn-sm btn-info text-light mb-1" data-toggle="modal" data-target="#updatepersalinan">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button wire:click="getPersalinan({{ $datapersalinan->id }})" type="button" class="btn btn-sm btn-danger text-light mb-1" data-toggle="modal" data-target="#deletepersalinan">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>                
            @else
            <table class="table table-hover table-sm table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Kode Pasien</th>
                    <th scope="col">Nama Ibu</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Hamil ke</th>
                    <th scope="col">Umur Hamil</th>
                    <th scope="col">ANC ke</th>
                    <th scope="col">Jenis Persalinan</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                {{-- @php
                    $no=0
                @endphp --}}
                    
                    @foreach ($persalinan as $datapersalinan)
                    {{-- @php
                        $no++ 
                    @endphp                      --}}
                <tr>                         
                    {{-- <td scope="row">{{ $no }}</td> --}}
                    <td scope="row">{{ $datapersalinan->kd_pasien }}</td>
                    <td scope="row">{{ $datapersalinan->nm_ibu }}</td>
                    <td scope="row">{{ date('d-m-Y', strtotime($datapersalinan->tgl_lahir)) }}</td>
                    <td scope="row">{{ $datapersalinan->hamil_ke }}</td>
                    <td scope="row">{{ $datapersalinan->umur_hamil }}</td>
                    <td scope="row">{{ $datapersalinan->anc_ke }}</td>
                    <td scope="row">{{ $datapersalinan->jenis_persalinan }}</td>
                    <td scope="row">{{ $datapersalinan->jenkel }}</td>
                    <td scope="row">
                        <button wire:click="getPersalinan({{ $datapersalinan->id }})"  type="button" class="btn btn-sm btn-info text-light mb-1" data-toggle="modal" data-target="#updatepersalinan">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button wire:click="getPersalinan({{ $datapersalinan->id }})" type="button" class="btn btn-sm btn-danger text-light mb-1" data-toggle="modal" data-target="#deletepersalinan">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @endif
            
            {{ $persalinan->links() }}
        </div>
        
            
           
           <!-- Modal Insert -->
           <div wire:ignore.self class="modal fade" id="insertpersalinan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                   <div class="modal-content">
                       <div class="modal-header bg-gradient-purple">
                           <h5 class="modal-title" id="exampleModalLabel">Form Data Persalinan</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true close-btn">×</span>
                           </button>
                       </div>
                      <div class="modal-body">
                           <form wire:submit.prevent="store">
                               <div class="row">
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2" class="text-purple">Tanggal Lahir</label>
                                        <input wire:model="tgl_lahir" type="date" name="tgl_lahir" id="" class="form-control border-primary text-purple @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggal lahir">
                                         @error('tgl_lahir')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Jam Lahir</label>
                                        <input wire:model="jam_lahir" type="text" name="jam_lahir" id="" class="form-control border-primary text-purple @error('jam_lahir') is-invalid @enderror" placeholder="Jam Lahir">
                                         @error('jam_lahir')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Hamil Ke</label>
                                        <input wire:model="hamil_ke" type="number" name="hamil_ke" id="" class="form-control border-primary text-purple @error('hamil_ke') is-invalid @enderror" placeholder="Hamil Ke">
                                         @error('hamil_ke')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Umur Hamil</label>
                                        <input wire:model="umur_hamil" type="text" name="umur_hamil" id="" class="form-control border-primary text-purple @error('umur_hamil') is-invalid @enderror" placeholder="Umur Hamil">
                                         @error('umur_hamil')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">ANC Ke</label>
                                        <input wire:model="anc_ke" type="number" name="anc_ke" id="" class="form-control border-primary text-purple @error('anc_ke') is-invalid @enderror" placeholder="ANC Ke">
                                         @error('anc_ke')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Letak Janin</label>
                                        <select wire:model='letak_janin' class="form-control border-primary text-purple @error('letak_janin') is-invalid @enderror" name="letak_janin">
                                            <option selected>Pilih Letak Janin</option>
                                            <option value="Kepala">Kepala</option>
                                            <option value="Sungsang">Sungsang</option>
                                            <option value="Lantang">Lantang</option>
                                            <option value="Lain2">Lain2</option>
                                          </select>
                                         @error('letak_janin')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Jenis Persalinan</label>
                                        <select wire:model='jenis_persalinan' class="form-control border-primary text-purple @error('jenis_persalinan') is-invalid @enderror" name="jenis_persalinan">
                                            <option selected>Pilih Jenis Persalinan</option>
                                            <option value="SPTBK">SPTBK</option>
                                            <option value="LETSU">LETSU</option>
                                            <option value="LAIN2">LAIN2</option>
                                          </select>
                                         @error('jenis_persalinan')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Lahir</label>
                                        <select wire:model='lahir' class="form-control border-primary text-purple @error('lahir') is-invalid @enderror" name="lahir">
                                            <option selected>Pilih Lahir</option>
                                            <option value="H">H</option>
                                            <option value="M">M</option>
                                          </select>
                                         @error('lahir')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Jenis Kelamin</label>
                                        <select wire:model='jenkel' class="form-control border-primary text-purple @error('jenkel') is-invalid @enderror" name="jenkel">
                                            <option selected>Pilih Jenis Kelamin</option>
                                            <option value="L">L</option>
                                            <option value="P">P</option>
                                          </select>
                                         @error('jenkel')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Kembar</label>
                                        <select wire:model='kembar' class="form-control border-primary text-purple @error('kembar') is-invalid @enderror" name="kembar">
                                            <option selected>Pilih Isian</option>
                                            <option value="Tidak">Tidak</option>
                                            <option value="Ya">Ya</option>
                                          </select>
                                         @error('kembar')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">BB</label>
                                        <input wire:model="bb" type="text" name="bb" id="" class="form-control border-primary text-purple @error('bb') is-invalid @enderror" placeholder="BB">
                                         @error('bb')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">PB</label>
                                        <input wire:model="pb" type="text" name="pb" id="" class="form-control border-primary text-purple @error('pb') is-invalid @enderror" placeholder="PB">
                                         @error('pb')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">LK</label>
                                        <input wire:model="lk" type="number" name="lk" id="" class="form-control border-primary text-purple @error('lk') is-invalid @enderror" placeholder="LK">
                                         @error('lk')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Rujuk Ke</label>
                                        <input wire:model="rujuk" type="text" name="rujuk" id="" class="form-control border-primary text-purple @error('rujuk') is-invalid @enderror" placeholder="Rujuk Ke">
                                         @error('rujuk')
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
        <div wire:ignore.self class="modal fade" id="deletepersalinan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete data Persalinan</h5>
                <button wire:click.prevent="resetInput() type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anada yakin ingin menghpus data Persalinan {{ $hamil_ke }}</p>
                </div>
                <div class="modal-footer">
                <button wire:click.prevent="resetInput()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="deletePersalinan({{$persalinanId}})" type="button" class="btn btn-danger">Delete</button>
                <div wire:loading wire:target="deletePersalinan">
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
        <div wire:ignore.self class="modal fade" id="updatepersalinan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mr-1" id="exampleModalLabel">Upate Data Persalinan</h5>
                        <div wire:loading wire:target="getPersalinan">
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
                            <div class="row">
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput2" class="text-purple">Tanggal Lahir</label>
                                     <input wire:model="tgl_lahir" type="date" name="tgl_lahir" id="" class="form-control border-primary text-purple @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggal lahir">
                                      @error('tgl_lahir')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Jam Lahir</label>
                                     <input wire:model="jam_lahir" type="text" name="jam_lahir" id="" class="form-control border-primary text-purple @error('jam_lahir') is-invalid @enderror" placeholder="Jam Lahir">
                                      @error('jam_lahir')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Hamil Ke</label>
                                     <input wire:model="hamil_ke" type="number" name="hamil_ke" id="" class="form-control border-primary text-purple @error('hamil_ke') is-invalid @enderror" placeholder="Hamil Ke">
                                      @error('hamil_ke')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Umur Hamil</label>
                                     <input wire:model="umur_hamil" type="text" name="umur_hamil" id="" class="form-control border-primary text-purple @error('umur_hamil') is-invalid @enderror" placeholder="Umur Hamil">
                                      @error('umur_hamil')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">ANC Ke</label>
                                     <input wire:model="anc_ke" type="number" name="anc_ke" id="" class="form-control border-primary text-purple @error('anc_ke') is-invalid @enderror" placeholder="ANC Ke">
                                      @error('anc_ke')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Letak Janin</label>
                                     <select wire:model='letak_janin' class="form-control border-primary text-purple @error('letak_janin') is-invalid @enderror" name="letak_janin">
                                         <option value="Kepala">Kepala</option>
                                         <option value="Sungsang">Sungsang</option>
                                         <option value="Lantang">Lantang</option>
                                         <option value="Lain2">Lain2</option>
                                       </select>
                                      @error('letak_janin')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Jenis Persalinan</label>
                                     <select wire:model='jenis_persalinan' class="form-control border-primary text-purple @error('jenis_persalinan') is-invalid @enderror" name="jenis_persalinan">
                                         <option value="SPTBK">SPTBK</option>
                                         <option value="LETSU">LETSU</option>
                                         <option value="LAIN2">LAIN2</option>
                                       </select>
                                      @error('jenis_persalinan')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Lahir</label>
                                     <select wire:model='lahir' class="form-control border-primary text-purple @error('lahir') is-invalid @enderror" name="lahir">
                                         <option value="H">H</option>
                                         <option value="M">M</option>
                                       </select>
                                      @error('lahir')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Jenis Kelamin</label>
                                     <select wire:model='jenkel' class="form-control border-primary text-purple @error('jenkel') is-invalid @enderror" name="jenkel">
                                         <option value="L">L</option>
                                         <option value="P">P</option>
                                       </select>
                                      @error('jenkel')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Kembar</label>
                                     <select wire:model='kembar' class="form-control border-primary text-purple @error('kembar') is-invalid @enderror" name="kembar">
                                         <option value="Tidak">Tidak</option>
                                         <option value="Ya">Ya</option>
                                       </select>
                                      @error('kembar')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">BB</label>
                                     <input wire:model="bb" type="text" name="bb" id="" class="form-control border-primary text-purple @error('bb') is-invalid @enderror" placeholder="BB">
                                      @error('bb')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">PB</label>
                                     <input wire:model="pb" type="text" name="pb" id="" class="form-control border-primary text-purple @error('pb') is-invalid @enderror" placeholder="PB">
                                      @error('pb')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">LK</label>
                                     <input wire:model="lk" type="number" name="lk" id="" class="form-control border-primary text-purple @error('lk') is-invalid @enderror" placeholder="LK">
                                      @error('lk')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Rujuk Ke</label>
                                     <input wire:model="rujuk" type="text" name="rujuk" id="" class="form-control border-primary text-purple @error('rujuk') is-invalid @enderror" placeholder="Rujuk Ke">
                                      @error('rujuk')
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
</div>
