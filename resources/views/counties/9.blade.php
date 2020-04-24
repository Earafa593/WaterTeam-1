@extends('layouts.app')

@section('title','|Home')

@section('content')
<div id="counties">
    <img id = "England" src="/storage/images/{{ 'map9.png' }}" width="900px" height="600px" border="0" usemap="#Devon, Cornwall and the Isles of Scilly" />
    <map name="Devon, Cornwall and the Isles of Scilly" id="9">
    </map>

</div>

@endsection