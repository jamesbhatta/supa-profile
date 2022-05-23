@extends('layouts.letter')

@section('content')
<x-format.personal-sifaris-letter :organization="$organization"></x-format.personal-sifaris-letter>
@endsection
