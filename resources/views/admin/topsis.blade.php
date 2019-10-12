@php
     use Illuminate\Support\Facades\DB;
@endphp
@extends('layouts.app')

@section('content')

<h1 class="mt-4 text-center">
  Topsis
</h1>
<form method="POST" action="/tambah-topsis">
  @csrf
  <div class="card">
    <div class="card-body">
      
  <div class="row">

    <h2 class="col-md-12">Masukkan data Hasil Clustring</h2>
    <div class="col-md-3">
        <div class="form-group">
          <label for="">Nama Tempat Centroid</label>
         <input name="nama" type="text" class="form-control" placeholder="Nama Tempat">
          </div>
      </div>
      
    <div class="col-md-3">
      <div class="form-group">
        <label for="">Kepadatan Penduduk</label>
          <select class="form-control" name="kepadatan_penduduk">
              <option value="1">(1) 0.000 - 10.000</option>
              <option value="2">(2) 11.000 - 20.000</option>
              <option value="3">(3) 21.000 - 30.000</option>
              <option value="4">(4) 31.000 - 40.000</option>
              <option value="5">(5) 41.000 - 50.000</option>
              <option value="6">(6) 51.000 - 60.000</option>
          </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="">Aksebilitas (meter)</label>
            <select class="form-control" name="aksebilitas">
                <option value="3">(1) 0,00 - 5,00</option>
                <option value="2">(2) 5,00 - 10,00</option>
                <option value="1">(3) >10,00 </option>
            </select>
          </div>
      </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="">Lokasi Usaha</label>
            <select class="form-control" name="lokasi">
                <option value="3">(3) Dekat Kota</option>
                <option value="2">(2) Pertengahan Kota</option>
                <option value="1">(1) Jauh dari Kota</option>
            </select>
          </div>
      </div>


      <div class="col-md-3">
          <div class="form-group">
            <label for="">Jenis Usaha yang Sama (unit)</label>
              <select class="form-control" name="jenis_usaha_sama">
                  <option value="3">(3) 0 - 3</option>
                  <option value="2">(2) 4 - 6</option>
                  <option value="1">(1) 7 - 9</option>
              </select>
            </div>
        </div>
  
        <div class="col-md-12 text-right">
            <button class="btn btn-default btn-dark" type="submit">
              <i class="fa fa-plus"></i>
              Tambah
            </button>
        </div>

    
  </div>

</div>
</div>
</form>
<br>
<h2 class="text-center">Hasil Topsis</h2>

    @php
        
        $d = App\Topsis::all();
        
    @endphp
<div class="table-responsive">
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
            <th>Nama</th>
            <th>C1 (Kepadatan Penduduk) 45% </th>
            <th>C3 (Aksebilitas) 25% </th>
            <th>C2 (Lokasi Usaha) 25% </th>
            <th>C4 (Jenis Usaha Sama) 10% </th>
            <th>Rank</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    @php
        $c1 = 0;
        $c2 = 0;
        $c3 = 0;
        $c4 = 0;
        foreach ($d as $h) {
          $c1 += pow($h->kepadatan_penduduk,2);
          $c2 += pow($h->aksebilitas,2);
          $c3 += pow($h->lokasi,2);
          $c4 += pow($h->jenis_usaha_sama,2);
        }
    @endphp
    @foreach ($d as $key => $i)
        
    <tr>
      <td> {{ $i->nama }}</td>
      <td> {{ $i->kepadatan_penduduk }} <br>
         ({{ pow($c1,-0.5)*$i->kepadatan_penduduk }}) <br>
         45% <br>
         ({{ $c1p = pow($c1,-0.5)*$i->kepadatan_penduduk*45/100 }})
      </td>
      <td> {{ $i->aksebilitas }} 
          <br>
          ({{ pow($c2,-0.5)*$i->aksebilitas }})
          <br> 
          25% <br> ({{ $c2p = pow($c2,-0.5)*$i->aksebilitas*25/100 }})
          </td>
      <td> {{ $i->lokasi }} <br> ({{ pow($c3,-0.5)*$i->lokasi }})
        <br> 25% <br>({{ $c3p = pow($c3,-0.5)*$i->lokasi*25/100 }})        
      </td>
      <td> {{ $i->jenis_usaha_sama }} <br> ({{ pow($c1,-0.5)*$i->jenis_usaha_sama }})
        <br> 10% <br> ({{ $c4p = pow($c4,-0.5)*$i->jenis_usaha_sama*10/100 }})        
      
      </td>
      <td> {{ $c1p+$c2p+$c3p+$c4p }} </td>
      <td> 
      <a onclick="deleteT('{{ $i->id }}')" href="#" class="btn btn-sm btn-danger">
        <i class="fa fa-trash"></i>  
      </a>  
      </td>
    </tr>
 
     @endforeach
    </tbody>
</table>
</div>


</div>
<br>


<br>
<br>
@endsection

@section('css-after')
  
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">

@endsection
@section('js-after')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script>
    

var table = $('#example').DataTable({
  order: [ 5, 'desc' ]
});

function deleteT(id){

  swal({
      title: "Are you sure?",
      text: "Your will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    },
    function(){
      $.post("/hapus-topsis/"+id,{
          _token : "{{ csrf_token() }}"
        })
        .done((res) => {
          // swal("Deleted!", "Your imaginary file has been deleted.", "success");
          location.reload()
          // table.ajax.reload();
        })
    });
}

</script>
@endsection