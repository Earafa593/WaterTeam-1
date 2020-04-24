@extends('layouts.app')

@section('title','|Home')

@section('content')
<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map14.png' }}" width="900px" height="600px" border="0" usemap="#Solent and South Downs" />
    <map name="Solent and South Downs" id="14">
    </map>

</div>

@endsection