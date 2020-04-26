@extends('layouts.app')

@section('title','|Home')

@section('content')
<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map4.png' }}" width="900px" height="600px" border="0" usemap="#Greater Manchester,Merseyside and Cheshire" />
    <map name="Greater Manchester,Merseyside and Cheshire" id="4">
    </map>

</div>

@endsection