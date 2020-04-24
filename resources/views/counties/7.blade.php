@extends('layouts.app')

@section('title','|Home')

@section('content')
<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map7.png' }}" width="900px" height="600px" border="0" usemap="#West Midlands" />
    <map name="West Midlands" id="7">
    </map>

</div>

@endsection