@extends('admin.layout')

@section('title', "Deposits") 

@section(" header-texts")
<?php 
$headerBig = "Deposits";
$headerSmall =" View deposit transactions";
?>
@stop 

@section("content") 
@include("admin.deposits-content")
@stop 