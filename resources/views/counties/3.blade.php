@extends('layouts.app')

@section('title','|Home')

@section('content')
<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map3.png' }}" width="900px" height="600px" border="0" usemap="#Yorkshire" />
    <map name="Yorkshire" id="3">
    </map>

</div>

@endsection