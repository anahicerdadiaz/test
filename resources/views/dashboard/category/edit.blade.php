@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')

<form action="{{route("category.update",$category->id)}}" method="POST">
    @method('PUT')
    @include('dashboard.category._from')
</form>    
@endsection