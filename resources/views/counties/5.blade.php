@extends('layouts.app')

@section('title','|Home')

@section('content')
<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map5.png' }}" width="900px" height="600px" border="0" usemap="#Lincolnshire and Northamptonshire" />
    <map name="Lincolnshire and Northamptonshire" id="5">
    </map>

</div>

@endsection