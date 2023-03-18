@extends('layouts.main')

@section('container')
    <h1>Halaman about!</h1>
    <!-- tanda di bawah sama dengan => php echo $name -->
    <h3>{{ $name }}</h3> 
    <p>{{ $email }}</p> 
    <img src=img/{{ $image }} alt={{ $name }} width="200px" class="img-thumbnail rounded-circle">
@endsection
