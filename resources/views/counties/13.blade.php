@extends('layouts.app')

@section('title','|Home')

@section('content')
<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map13.png' }}" width="900px" height="600px" border="0" usemap="#Kent, South London and East Sussex" />
    <map name="Kent, South London and East Sussex" id="13">
    </map>

</div>

@endsection