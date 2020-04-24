@extends('layouts.app')

@section('title','|Home')

@section('content')

<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map1.png' }}" width="900px" height="600px" border="0" usemap="#North West" />
    <map name="North West" id="1">
    </map>

</div>

@endsection