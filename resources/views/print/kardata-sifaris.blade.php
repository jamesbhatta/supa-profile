@extends('layouts.letter')

@section('content')
<x-format.kardata-sifaris-letter :organization="$organization"></x-format.kardata-sifaris-letter>
@endsection
