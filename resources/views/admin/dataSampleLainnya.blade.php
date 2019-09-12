<h3 class="row bg-gradient-default p-2 text-white">
    <div class="col mx-2">
        <span>  <i class="ni ni-planet"></i> Tempat Lainnya</span> 
    </div>
</h3>
<div class="list-group list-group-flush">
        @php
        $datask = DB::table("variables")->where("kategori","lainnya")->orderBy("jumlah","DESC")->limit(3)->get();
        
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