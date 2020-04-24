@extends('layouts.app')

@section('title','|Home')

@section('content')
<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map11.png' }}" width="900px" height="600px" border="0" usemap="#Thames" />
    <map name="Thames" id="11">
    </map>

</div>

@endsection