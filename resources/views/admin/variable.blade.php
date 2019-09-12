@php
     use Illuminate\Support\Facades\DB;
@endphp
@extends('layouts.app')

@section('content')

<h1 class="mt-4 text-center">
  Kota Banjar
</h1>
@include('admin.head_variable')

<h2 class="mt-1 text-center">Tempat Paling Potensial</h2>
<br>

@include('admin.dataSampleSekolah')
@include('admin.dataSampleKantor')
@include('admin.dataSampleLainnya')
<br>
<br>
@endsection