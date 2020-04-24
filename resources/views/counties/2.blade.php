@extends('layouts.app')

@section('title','|Home')

@section('content')
<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map2.png' }}" width="900px" height="600px" border="0" usemap="#Cumbria and Lancashire" />
    <map name="Cumbria and Lancashire" id="2">
    </map>

</div>

@endsection