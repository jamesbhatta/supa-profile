<div class="row letter-head ward-letterhead">
    <div class="col-2">
        <img class="img-fluid" src="{{ asset(config('constants.letterhead.municipality.logo_url')) }}" alt="" style="max-height: 100px;">
    </div>
    <div class="col-7 text-center text-danger">
        <h2 class="h2-responsive font-weight-bold">{{ Auth::user()->settings->letter_municipality_name ?? settings('municipality_name') }}</h2>
        <div class="my-2"></div>
        <h4 class="h4-responsive font-weight-bold">
            @if(Auth::user()->settings->letter_tagline)
            {{ Auth::user()->settings->letter_tagline }}
            @else
            {{ Auth::user()->ward->name }} नं. वडा कार्यालय
            @endif
        </h4>
        <div class="font-weight-bold">
            <div>{{ Auth::user()->settings->letter_address_line_one ?? settings('municipality_address_line_one') }}</div>
            <div>{{ Auth::user()->settings->letter_address_line_two ?? settings('municipality_address_line_two') }}</div>
        </div>
    </div>
    <div class="col-3 text-right">
        @if(Auth::user()->settings->letter_phone)
        <div class="font-weight- small">
            {{ Auth::user()->settings->letter_phone }}
        </div>
        @endif
        @if(Auth::user()->settings->letter_email)
        <div class="small">
            {{ Auth::user()->settings->letter_email }}
        </div>
        @endif
        @if(Auth::user()->settings->letter_website)
        <div class="small">
            {{ Auth::user()->settings->letter_website }}
        </div>
        @endif
    </div>
</div>
<div class="mt-4 mb-3" style="border-bottom: 4px solid #000;"></div>
