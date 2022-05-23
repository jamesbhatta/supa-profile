@extends('layouts.app')

@push('styles')
<style>
    select {
        height: calc(1.5em + 1rem + 4px) !important;
    }

</style>
@endpush

@section('content')
<div class="container">

    @include('alerts.all')

    <div class="card z-depth-0">
        <div class="card-body">
            <h2 class="h2-responsive font-weight-bolder font-noto mdb-color-text">@lang('navigation.my_settings')</h2>

            <div class="my-4"></div>

            <div class="card z-depth-0 shadow">
                <div class="card-header grey lighten-5">Letterpad Preview</div>
                <div class="card-body">
                    <x-ward-letterhead />
                </div>
            </div>

            <div class="my-4"></div>

            <form action="{{ route('user.settings.sync') }}" method="POST" class="form">
                @csrf
                <h4 class="h4-responsive font-weight-bolder font-noto mdb-color-text">Letterpad Settings</h4>
                <div class="small text-muted font-noto">These values are used to construct the letter pad for your ward.</div>

                <div class="my-3"></div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Municipality Name</label>
                            <input type="text" name="letter_municipality_name" class="form-control" value="{{ old('letter_municipality_name', $userSettings->letter_municipality_name) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tagline</label>
                            <input type="text" name="letter_tagline" class="form-control" value="{{ old('letter_tagline', $userSettings->letter_tagline) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line One</label>
                            <input type="text" name="letter_address_line_one" class="form-control" value="{{ old('letter_address_line_one', $userSettings->letter_address_line_one) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line Two</label>
                            <input type="text" name="letter_address_line_two" class="form-control" value="{{ old('letter_address_line_two', $userSettings->letter_address_line_two) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="letter_phone" class="form-control" value="{{ old('letter_phone', $userSettings->letter_phone) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" name="letter_email" class="form-control" value="{{ old('letter_email', $userSettings->letter_email) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" name="letter_website" class="form-control" value="{{ old('letter_website', $userSettings->letter_website) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary font-noto z-depth-0">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
