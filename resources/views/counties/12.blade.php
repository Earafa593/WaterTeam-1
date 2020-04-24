@extends('layouts.app')

@section('title','|Home')

@section('content')
<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map12.png' }}" width="900px" height="600px" border="0" usemap="#Hertfordshire and North London" />
    <map name="Hertfordshire and North London" id="12">
    </map>

</div>

@endsection