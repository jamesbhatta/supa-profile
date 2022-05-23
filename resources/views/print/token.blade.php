@extends('layouts.letter')

@section('content')
<x-format.token-letter :organization="$organization" :onlineApplication="$onlineApplication"></x-format.token-letter>
@endsection
