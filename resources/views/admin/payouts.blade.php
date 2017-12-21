@extends('admin.layout')

@section('title', "Payouts") 

@section(" header-texts")
<?php 
$headerBig = "Payouts";
$headerSmall =" View profit payouts";
?>
@stop 

@section("content") 
@include("admin.payouts-content")
@stop 