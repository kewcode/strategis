<h3 class="row bg-gradient-primary p-2 text-white">
    <div class="col mx-2">
        <span> <i class="ni ni-square-pin"></i> Kantor/Intansi</span> 
    </div>
</h3>
<div class="list-group list-group-flush">
        @php
        $datask = DB::table("variables")->where("kategori","kantor")->orderBy("jumlah","DESC")->limit(3)->get();
        
    @endphp
    @foreach ($datask as $i)
        
  
     <a href="#!" class="list-group-item list-group-item-action">
         <div class="row align-items-center">
                 <div class="col ml--2">
                 <div class="d-flex justify-content-between align-items-center">
                     <div>
                         <h4 class="mb-0 text-sm">{{ $i->nama }}</h4>
                     </div>
                     <div class="text-right pt-3">
                         {{ $i->jumlah }} Orang
                     </div>
                 </div>
             <p class="text-sm mb-0">{{ $i->alamat }}</p>
             </div>
         </div>
     </a>
 
     @endforeach
</div>
<br>