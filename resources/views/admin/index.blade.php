@extends('admin.layout')

@section('title', "Dashboard") 

@section(" header-texts")
<?php 
$headerBig = "Dashboard";
$headerSmall =" Statistics Overview";
?>
@stop 

@section("content") 
@include("admin.index-content")
@stop 