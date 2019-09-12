<div class="row mb-4 mt-3">

        <div class="col-lg-4 mt-3">
            <a href="/variable/v?search=sekolah">
          <div class="card bg-gradient-default">
              <!-- Card body -->
              <div class="card-body"> 
              <div class="row">
                  <div class="col">
                      <h3 class="card-title text-uppercase text-muted mb-2 text-white">Sekolah / Kampus</h3>
                      <span class="h2 font-weight-bold mb-0 text-white">
                          <i class="ni ni-circle-08"></i>
                        
                        @php
                            echo DB::table("variables")->where("kategori","sekolah")->sum('jumlah');
                        @endphp

                          <small>Jiwa</small></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                        <i class="ni ni-badge"></i>
                    </div>
                  </div>
              </div>
              <p class="mb-0 text-sm">
                  <span class="text-white mr-2"> <i class="fa fa-arrow-up"></i> 
                    @php
                        echo DB::table("variables")->where("kategori","sekolah")->count('id');
                    @endphp
                    <span class="text-light">Gedung</span>
                  </span>
              </p>
              </div>
          </div>
            </a>
      </div>

      <div class="col-lg-4 mt-3">
        <a href="/variable/v?search=kantor">
        <div class="card bg-gradient-primary">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                  <div class="col">
                      <h3 class="card-title text-uppercase text-muted mb-2 text-white">Kantor / Intansi</h3>
                      <span class="h2 font-weight-bold mb-0 text-white">
                          <i class="ni ni-circle-08"></i>
                        
                            @php
                                echo DB::table("variables")->where("kategori","kantor")->sum('jumlah');
                            @endphp
                          <small>Jiwa</small></span>
                  </div>
                  <div class="col-auto">
                      <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                          <i class="ni ni-square-pin"></i>
                      </div>
                    </div>
                </div>
                <p class="mb-0 text-sm">
                    <span class="text-white mr-2"> <i class="fa fa-arrow-up"></i>
                        @php
                            echo DB::table("variables")->where("kategori","kantor")->count('id');
                        @endphp
                      <span class="text-light">Gedung</span>
                    </span>
                </p>
              </div>
          </div>
        </a>
      </div>
  
      <div class="col-lg-4 mt-3">
        <a href="/variable/v?search=lainnya">
            <div class="card bg-gradient-danger">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title text-uppercase text-muted mb-2 text-white">Tempat Lainnya</h3>
                            <span class="h2 font-weight-bold mb-0 text-white">
                                <i class="ni ni-circle-08"></i>
                            
                                @php
                                    echo DB::table("variables")->where("kategori","lainnya")->sum('jumlah');
                                @endphp
                                <small>Jiwa</small></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                <i class="ni ni-planet"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0 text-sm">
                        <span class="text-white mr-2"> <i class="fa fa-arrow-up"></i> 
                            @php
                                echo DB::table("variables")->where("kategori","lainnya")->count('id');
                            @endphp
                            <span class="text-light">Gedung</span>
                        </span>
                    </p>
                    </div>
                </div>
            </a>
        </div>
  </div>
  