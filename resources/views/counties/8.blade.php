@extends('layouts.app')

@section('title','|Home')

@section('content')
<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map8.png' }}" width="900px" height="600px" border="0" usemap="#Wessex" />
    <map name="Wessex" id="8">
    </map>

</div>

@endsection