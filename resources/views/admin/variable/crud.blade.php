@php
     use Illuminate\Support\Facades\DB;
@endphp
@extends('layouts.app')


@section('css-after')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="row m-4">
    <div class="col-6">
        <button class="btn btn-default" onclick="tambahData()">
            <i class="fa fa-edit"></i> 
            Tambah</button>
    </div>
    @if(Session::has('success'))
        <div class="col-6">
            <div class="alert alert-success p-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> {{ Session::get('success') }}
            </div>
        </div>
    @endif

    {{-- <div class="col-6">
        <button class="btn btn-white btn-sm float-right" id="getData">
            <i class="ni ni-cloud-download-95"></i> 
            Get Data Kemdikbud</button>
    </div> --}}
  </div>
<h2 class=" text-center">
  Data Tempat di Kota Banjar

</h2>




<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-body">
                     <form id="tambah" method="POST" action="{{ route('tambah_v') }}">
                        @csrf
                        <input type="hidden" name="id" id="i_id">
                         <div class="row">
                             
                             
                            <div class="col-md-6">
                                    <div class="form-group">
                                            <label class="form-control-label">Kota/Kabupaten</label>
                                            <select id="i_kota" required disabled class="form-control" name="kota">
                                                <option value="3279" selected>Kota Banjar</option>
                                            </select>
                                        </div>
                              </div>
                              <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Kategori</label>
                                        <select id="i_kategori" required class="form-control" name="kategori">
                                            <option value="sekolah">Sekolah</option>
                                            <option value="kantor">Kantor</option>
                                            <option value="jalan">Jalan</option>
                                            <option value="lainnya">Lainnya</option>
                                        </select>
                                    </div>
                            </div>
                         </div>
                          <div class="row">
                             
                              <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Nama Tempat</label>
                                        <input id="i_nama" required name="nama" class="form-control" type="text" placeholder="Nama Tempat">
                                    </div>
                             </div>
                              <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Kecamatan</label>
                                        <select id="i_kecamatan" required class="form-control" name="kecamatan">
                                                <option value="Kec. Banjar">Kec. Banjar</option>
                                                <option value="Kec. Purwaharja">Kec. Purwaharja</option>
                                                <option value="Kec. Langensari">Kec. Langensari</option>
                                                <option value="Kec. Pataruman">Kec. Pataruman</option>
                                        </select>
                                    </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="form-control-label">Lintang</label>
                                      <input id="i_lintang" required placeholder="Lintang" type="text" name="lintang" class="form-control">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="form-control-label">Bujur</label>
                                      <input id="i_bujur" required placeholder="Bujur" type="text" name="bujur" class="form-control">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Jumlah Orang</label>
                                        <input id="i_jumlah" required placeholder="Jumlah Orang" type="text" name="jumlah" class="form-control">
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Alamat Jalan</label>
                                        <textarea id="i_alamat" required placeholder="Alamat Jalan" type="text" name="alamat" class="form-control"></textarea>
                                    </div>
                            </div>
                          </div>
                          <div class="row">
                                <div class="col-6 mt-2">
                                    <button class="btn btn-danger" data-dismiss="modal">
                                            Batal
                                    </button>
                                </div>
                                <div class="col-6 mt-2">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                </div>
                             
                          </div>
                      </form>


                </div>
            </div>
        </div>
    </div>

<div class="container">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataSekolah">
          <thead class="thead-dark">
              <tr>
                  <th>Id</th>
                  <th>Kategori</th>
                  <th>Nama</th>
                  <th>kecamatan</th>
                  <th>Lintang</th>
                  <th>Bujur</th>
                  <th>Jumlah</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
          </thead>
      </table>

    </div>
</div>
@endsection

@section('js-after')
 <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
 
 <script>
    $(function() {
        var $search = '{{ (isset($_GET["search"])) ? $_GET["search"] : "" }}';

        $('#dataSekolah').DataTable({
            "search": {
                "search": $search
            },
            processing: true,
            serverSide: true,
            order : [[ 1, "jumlah" ]],
            ajax: "{!! route('data_v') !!}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'kategori', name: 'kategori' },
                { data: 'nama', name: 'nama' },
                { data: 'kecamatan', name: 'kecamatan' },
                { data: 'lintang', name: 'lintang' },
                { data: 'bujur', name: 'bujur' },
                { data: 'jumlah', name: 'jumlah' },
                {
                    data: 'active',
                    name: 'active',
                    render: function (data, type, full) {
                    
                        var kelas = 'btn-primary';
                        if(data == 1){
                            kelas = 'btn-primary';  
                        }else{
                            kelas = 'btn-white';
                        }
                        return `
                        <a href="/active_v/${full['id']}" class="btn ${kelas} btn-sm">
                            <i class="fa fa-eye"></i>
                            </a>
                        `;
                    }
                },
                {
                    data: 'id',
                    name: 'id',
                    render: function (data, type, full) {
                    
                        let d = JSON.stringify(full);
                        // console.log(d);
                        return `


                        <a class="btn btn-default btn-sm text-white"
                            onclick="editData('${data}')" id="sekolah-${data}" data='${d}'>
                            <i class="fa fa-edit"></i>
                            </a>
                        
                        <a href="/hapus_v/${data}" class="btn btn-danger btn-sm text-white">
                            <i class="fa fa-trash"></i>
                            </a>
                        `;
                    }
                }
            ]
        });
    });




    function tambahData(){
        $("#modal-default").modal("show");
        $("#tambah").attr("action","/tambah_v");
        
    }
    function editData(id){
        // console.log(id);
        $("#modal-default").modal("show");
        $("#tambah").attr("action","/edit_v");
        let data = $("#sekolah-"+id).attr("data");
        console.log(data);
        var d = JSON.parse(data);
        $("#i_id").val(d.id);
        $("#i_nama").val(d.nama);
        $("#i_kecamatan").val(d.kecamatan);
        $("#i_lintang").val(d.lintang);
        $("#i_bujur").val(d.bujur);
        $("#i_jumlah").val(d.jumlah);
        $("#i_alamat").val(d.alamat);
        $("#i_alamat").val(d.alamat);
    }
    </script>
<script>
  // $("#getData").click(function(){
  //  var url = '/detailSekolahGET.json';
  //  $.getJSON(url,
  //     function(data){

  //      $.post("/variable/sekolah",{
  //         data : JSON.stringify(data),
  //         _token : '{{ csrf_token() }}' 
  //        })
  //       .done((res) => {
  //         console.log(res);
  //       }) 

  //     });
  // })


</script>
 @endsection