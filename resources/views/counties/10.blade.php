@extends('layouts.app')

@section('title','|Home')

@section('content')
<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map10.png' }}" width="900px" height="600px" border="0" usemap="#East Anglia" />
    <map name="East Anglia" id="10">
    </map>

</div>

@endsection