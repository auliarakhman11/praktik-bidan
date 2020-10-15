<div>
    
    <div class="card">
        <div class="card-header bg-gradient-purple">
            <h3 class="card-title">Table Data Pemeriksaan Kehamilan</h3>
        </div>
        <div class="card-body table-responsive">
            @if (!empty($pasienId))
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#insertperiksa">
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
                    <th scope="col">G</th>
                    <th scope="col">P</th>
                    <th scope="col">A</th>
                    <th scope="col">HPHT</th>
                    <th scope="col">KB Sebelum Hamil</th>
                    <th scope="col">Riwayat Penyakit</th>
                    <th scope="col">Riwayat Alergi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                {{-- @php
                    $no=0
                @endphp --}}
                    
                    @foreach ($periksa as $dataperiksa)
                    {{-- @php
                        $no++ 
                    @endphp                      --}}
                <tr>                         
                    {{-- <td scope="row">{{ $no }}</td> --}}
                    <td scope="row">{{ $dataperiksa->g }}</td>
                    <td scope="row">{{ $dataperiksa->p }}</td>
                    <td scope="row">{{ $dataperiksa->a }}</td>
                    <td scope="row">{{ $dataperiksa->hpht }}</td>
                    <td scope="row">{{ $dataperiksa->kb_sebelum_hamil }}</td>
                    <td scope="row">{{ $dataperiksa->riwayat_penyakit }}</td>
                    <td scope="row">{{ $dataperiksa->riwayat_alergi }}</td>
                    <td scope="row">{{ date_format($dataperiksa->created_at, 'd-m-Y') }}</td>
                    <td scope="row">
                        <button wire:click="getPeriksa({{ $dataperiksa->id }}) type="button" class="btn btn-sm btn-info text-light mb-1" data-toggle="modal" data-target="#updateperiksa">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button wire:click="getPeriksa({{ $dataperiksa->id }}) type="button" class="btn btn-sm btn-danger text-light mb-1" data-toggle="modal" data-target="#deleteperiksa">
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
                    <th scope="col">G</th>
                    <th scope="col">P</th>
                    <th scope="col">A</th>
                    <th scope="col">HPHT</th>
                    <th scope="col">KB Sebelum Hamil</th>
                    <th scope="col">Riwayat Penyakit</th>
                    <th scope="col">Riwayat Alergi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                {{-- @php
                    $no=0
                @endphp --}}
                    
                    @foreach ($periksa as $dataperiksa)
                    {{-- @php
                        $no++ 
                    @endphp                      --}}
                <tr>                         
                    {{-- <td scope="row">{{ $no }}</td> --}}
                    <td scope="row">{{ $dataperiksa->kd_pasien }}</td>
                    <td scope="row">{{ $dataperiksa->nm_ibu }}</td>
                    <td scope="row">{{ $dataperiksa->g }}</td>
                    <td scope="row">{{ $dataperiksa->p }}</td>
                    <td scope="row">{{ $dataperiksa->a }}</td>
                    <td scope="row">{{ $dataperiksa->hpht }}</td>
                    <td scope="row">{{ $dataperiksa->kb_sebelum_hamil }}</td>
                    <td scope="row">{{ $dataperiksa->riwayat_penyakit }}</td>
                    <td scope="row">{{ $dataperiksa->riwayat_alergi }}</td>
                    <td scope="row">{{ date_format($dataperiksa->created_at, 'd-m-Y') }}</td>
                    <td scope="row">
                        <button wire:click="getPeriksa({{ $dataperiksa->id }}) type="button" class="btn btn-sm btn-info text-light mb-1" data-toggle="modal" data-target="#updateperiksa">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button wire:click="getPeriksa({{ $dataperiksa->id }}) type="button" class="btn btn-sm btn-danger text-light mb-1" data-toggle="modal" data-target="#deleteperiksa">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @endif
            
            {{ $periksa->links() }}
        </div>
        
            
           
           <!-- Modal Insert -->
           <div wire:ignore.self class="modal fade" id="insertperiksa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                   <div class="modal-content">
                       <div class="modal-header bg-gradient-purple">
                           <h5 class="modal-title" id="exampleModalLabel">Form Data Pemeriksaan</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true close-btn">×</span>
                           </button>
                       </div>
                      <div class="modal-body">
                           <form wire:submit.prevent="store">
                               <div class="row">
                                   <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2" class="text-purple">NO KK</label>
                                        <input wire:model="no_kk" type="number" name="no_kk" id="" class="form-control border-primary text-purple @error('no_kk') is-invalid @enderror" placeholder="NO KK">
                                         @error('no_kk')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">G</label>
                                        <input wire:model="g" type="number" name="g" id="" class="form-control border-primary text-purple @error('g') is-invalid @enderror" placeholder="G">
                                         @error('g')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">P</label>
                                        <input wire:model="p" type="number" name="p" id="" class="form-control border-primary text-purple @error('p') is-invalid @enderror" placeholder="P">
                                         @error('p')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">A</label>
                                        <input wire:model="a" type="number" name="a" id="" class="form-control border-primary text-purple @error('a') is-invalid @enderror" placeholder="A">
                                         @error('a')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">HPHT</label>
                                        <input wire:model="hpht" type="text" name="hpht" id="" class="form-control border-primary text-purple @error('hpht') is-invalid @enderror" placeholder="HPHT">
                                         @error('hpht')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">BB</label>
                                        <input wire:model="bb" type="number" name="bb" id="" class="form-control border-primary text-purple @error('bb') is-invalid @enderror" placeholder="BB">
                                         @error('bb')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">TD</label>
                                        <input wire:model="td" type="text" name="td" id="" class="form-control border-primary text-purple @error('td') is-invalid @enderror" placeholder="TD">
                                         @error('td')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">TB</label>
                                        <input wire:model="tb" type="number" name="tb" id="" class="form-control border-primary text-purple @error('tb') is-invalid @enderror" placeholder="TB">
                                         @error('tb')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">LI LA</label>
                                        <input wire:model="li_la" type="text" name="li_la" id="" class="form-control border-primary text-purple @error('li_la') is-invalid @enderror" placeholder="LI LA">
                                         @error('li_la')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">hb</label>
                                        <input wire:model="hb" type="text" name="hb" id="" class="form-control border-primary text-purple @error('hb') is-invalid @enderror" placeholder="hb">
                                         @error('hb')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">TT</label>
                                        <input wire:model="tt" type="number" name="tt" id="" class="form-control border-primary text-purple @error('tt') is-invalid @enderror" placeholder="TT">
                                         @error('tt')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Gol Darah</label>
                                        <input wire:model="gol_darah" type="text" name="gol_darah" id="" class="form-control border-primary text-purple @error('gol_darah') is-invalid @enderror" placeholder="Gol Darah">
                                         @error('gol_darah')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">KB Sebelum Hamil</label>
                                        <select wire:model='kb_sebelum_hamil' class="form-control border-primary text-purple @error('kb_sebelum_hamil') is-invalid @enderror" name="kb_sebelum_hamil">
                                            <option selected>Pilih jenis KB</option>
                                            <option value="Suntik KB 1 bulan">Suntik KB 1 bulan</option>
                                            <option value="Suntik KB 3 bulan">Suntik KB 3 bulan</option>
                                            <option value="Pil Laktasi">Pil Laktasi</option>
                                            <option value="Pil Kombinasi">Pil Kombinasi</option>
                                            <option value="IUD">IUD</option>
                                            <option value="Implant">Implant</option>
                                          </select>
                                         @error('kb_sebelum_hamil')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Riwayat Penyakit</label>
                                        <input wire:model="riwayat_penyakit" type="text" name="riwayat_penyakit" id="" class="form-control border-primary text-purple @error('riwayat_penyakit') is-invalid @enderror" placeholder="Riwayat Penyakit">
                                         @error('riwayat_penyakit')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Riwayat Alergi</label>
                                        <input wire:model="riwayat_alergi" type="text" name="riwayat_alergi" id="" class="form-control border-primary text-purple @error('riwayat_alergi') is-invalid @enderror" placeholder="Riwayat Alergi">
                                         @error('riwayat_alergi')
                                             <span class="invalid feedback">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                    </div>
                                   </div>
                                   <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1" class="text-purple">Jarak Kehamilan</label>
                                        <input wire:model="jarak_kehamilan" type="text" name="jarak_kehamilan" id="" class="form-control border-primary text-purple @error('jarak_kehamilan') is-invalid @enderror" placeholder="Jarak Kehamilan">
                                         @error('jarak_kehamilan')
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
        <div wire:ignore.self class="modal fade" id="deleteperiksa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete data Periksa</h5>
                <button wire:click.prevent="resetInput() type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anada yakin ingin menghpus data Periksa</p>
                </div>
                <div class="modal-footer">
                <button wire:click.prevent="resetInput()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="deletePeriksa({{$periksaId}})" type="button" class="btn btn-danger">Delete</button>
                <div wire:loading wire:target="deletePeriksa">
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
        <div wire:ignore.self class="modal fade" id="updateperiksa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mr-1" id="exampleModalLabel">Upate Data Periksa</h5>
                        <div wire:loading wire:target="getPeriksa">
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
                                <div class="col-12">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput2" class="text-purple">NO KK</label>
                                     <input wire:model="no_kk" type="number" name="no_kk" id="" class="form-control border-primary text-purple @error('no_kk') is-invalid @enderror" placeholder="NO KK">
                                      @error('no_kk')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-4">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">G</label>
                                     <input wire:model="g" type="number" name="g" id="" class="form-control border-primary text-purple @error('g') is-invalid @enderror" placeholder="G">
                                      @error('g')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-4">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">P</label>
                                     <input wire:model="p" type="number" name="p" id="" class="form-control border-primary text-purple @error('p') is-invalid @enderror" placeholder="P">
                                      @error('p')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-4">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">A</label>
                                     <input wire:model="a" type="number" name="a" id="" class="form-control border-primary text-purple @error('a') is-invalid @enderror" placeholder="A">
                                      @error('a')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">HPHT</label>
                                     <input wire:model="hpht" type="text" name="hpht" id="" class="form-control border-primary text-purple @error('hpht') is-invalid @enderror" placeholder="HPHT">
                                      @error('hpht')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">BB</label>
                                     <input wire:model="bb" type="number" name="bb" id="" class="form-control border-primary text-purple @error('bb') is-invalid @enderror" placeholder="BB">
                                      @error('bb')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">TD</label>
                                     <input wire:model="td" type="text" name="td" id="" class="form-control border-primary text-purple @error('td') is-invalid @enderror" placeholder="TD">
                                      @error('td')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">TB</label>
                                     <input wire:model="tb" type="number" name="tb" id="" class="form-control border-primary text-purple @error('tb') is-invalid @enderror" placeholder="TB">
                                      @error('tb')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">LI LA</label>
                                     <input wire:model="li_la" type="text" name="li_la" id="" class="form-control border-primary text-purple @error('li_la') is-invalid @enderror" placeholder="LI LA">
                                      @error('li_la')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">hb</label>
                                     <input wire:model="hb" type="text" name="hb" id="" class="form-control border-primary text-purple @error('hb') is-invalid @enderror" placeholder="hb">
                                      @error('hb')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">TT</label>
                                     <input wire:model="tt" type="number" name="tt" id="" class="form-control border-primary text-purple @error('tt') is-invalid @enderror" placeholder="TT">
                                      @error('tt')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-6">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Gol Darah</label>
                                     <input wire:model="gol_darah" type="text" name="gol_darah" id="" class="form-control border-primary text-purple @error('gol_darah') is-invalid @enderror" placeholder="Gol Darah">
                                      @error('gol_darah')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-12">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">KB Sebelum Hamil</label>
                                     <select wire:model='kb_sebelum_hamil' class="form-control border-primary text-purple @error('kb_sebelum_hamil') is-invalid @enderror" name="kb_sebelum_hamil">
                                         <option value="Suntik KB 1 bulan">Suntik KB 1 bulan</option>
                                         <option value="Suntik KB 3 bulan">Suntik KB 3 bulan</option>
                                         <option value="Pil Laktasi">Pil Laktasi</option>
                                         <option value="Pil Kombinasi">Pil Kombinasi</option>
                                         <option value="IUD">IUD</option>
                                         <option value="Implant">Implant</option>
                                       </select>
                                      @error('kb_sebelum_hamil')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-12">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Riwayat Penyakit</label>
                                     <input wire:model="riwayat_penyakit" type="text" name="riwayat_penyakit" id="" class="form-control border-primary text-purple @error('riwayat_penyakit') is-invalid @enderror" placeholder="Riwayat Penyakit">
                                      @error('riwayat_penyakit')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-12">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Riwayat Alergi</label>
                                     <input wire:model="riwayat_alergi" type="text" name="riwayat_alergi" id="" class="form-control border-primary text-purple @error('riwayat_alergi') is-invalid @enderror" placeholder="Riwayat Alergi">
                                      @error('riwayat_alergi')
                                          <span class="invalid feedback">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                 </div>
                                </div>
                                <div class="col-12">
                                 <div class="form-group">
                                     <label for="exampleFormControlInput1" class="text-purple">Jarak Kehamilan</label>
                                     <input wire:model="jarak_kehamilan" type="text" name="jarak_kehamilan" id="" class="form-control border-primary text-purple @error('jarak_kehamilan') is-invalid @enderror" placeholder="Jarak Kehamilan">
                                      @error('jarak_kehamilan')
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
