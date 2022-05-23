@extends('layouts.letter')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 py-5">
            <div class="card p-5 grey lighten-5 z-depth-0">
                <div class="card-body">
                   <h2 class="h2-responsive text-center font-noto">व्यापार दर्ता को लागी तपाइँको आवेदन प्रक्रियामा छ।</h2>
                   <div class="text-center my-4">
                       <div class="d-inline-block rounded bg-light text-dark font-weight-bolder p-3" style="font-size: 28px;"><small class="lang-english">Token No:</small> {{ $onlineApplication->token_number }}</div>
                       <div class="my-4"></div>
                       <a class="btn btn-success z-depth-0 btn-lg font-16px lang-english" href="{{ route('print.token', $onlineApplication->token_number) }}"><span class="mr-3"><i class="fa fa-print"></i></span>Print Form</a>
                   </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection

