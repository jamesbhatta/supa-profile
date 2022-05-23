<form action="{{ route('online-application.index') }}" class="form">
    <div class="form-group text-center">
        <h1 class="h1-responsive font-weight-bolder indigo-text font-noto">@lang('app.token_number')</h1>
    </div>
    <div class="form-group text-center">
        <div class="input-group w-responsive d-inline-flex my-2">
            <div class="input-group-prepend">
                <span class="input-group-text blue lighten-5 indigo-text" id="basic-addon1"> <span class="svg-icon svg-baseline">@include('svg.token')</span></span>
            </div>
            <input type="number" name="token_number" class="form-control form-control-lg" value="{{ $tokenNumber ?? '' }}" autocomplete="off" required autofocus>
        </div>
    </div>
    <div class="form-group text-center font-noto">
        <button class="btn btn-indigo z-depth-0"><span class="svg-icon svg-baseline font-16px mr-2">@include('svg.search')</span>Search</button>
    </div>
</form>
