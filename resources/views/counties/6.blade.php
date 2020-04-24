@extends('layouts.app')

@section('title','|Home')

@section('content')
<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map6.png' }}" width="900px" height="600px" border="0" usemap="#East Midlands" />
    <map name="East Midlands" id="6">
    </map>

</div>

@endsection