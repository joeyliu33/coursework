@extends('layouts/master')

    @section('title')
        ER diagram
    @endsection

    @section('content') 
    <h2>ER diagram</h2><br>
    <img src="{{url('images/diagram.jpg')}}" width=700px; height=320px;>
    @endsection