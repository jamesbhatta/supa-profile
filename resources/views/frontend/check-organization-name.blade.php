@extends('layouts.frontend')

@section('content')
<div class="my-4"></div>
<div class="container">
    {{-- <livewire:organization-name-search /> --}}

    <div class="card z-depth-0 mb-4 font-noto">
        <div class="card-header bg-primary text-white">
            <h4 class="h4-responsive"> नयाँ नाम जाँच</h4>
        </div>
        <div class="card-body">
             {{-- Information --}}
             @guest
             <div class="card z-depth-0 border mb-4">
                 <div class="card-body">
                     <div>यस पालिका र अन्तर्गतका वडा कार्यालयमा पहिल्यै दर्ता भईसकेका व्यवसाय सङ्गँ मिल्दो नाम दर्ता हुने छैन । Space, ह्र्स्व र दिर्घका आधारमा System ले नाम दिएमा यसलाई पालिकाले अस्विकृत गर्न सक्नेछ ।</div>
                    </div>
                </div>
            @endguest
            
            <form action="{{ route('check-organization-name') }}" method="POST">
                @csrf
                <div class="form-group text-right">
                    <x-romanized-keyboard-switcher />
                </div>
                <div class="form-group">
                    <label for="" class="required">व्यवसायको नाम</label>
                    <input type="text" name="org_name" class="form-control unicode-font rounded-0 @error('org_name') is-invalid @enderror" value="{{ old('org_name') }}" placeholder="फर्मको नामजाँचको लागी यहाँ टाईप गर्नुहोस ।">
                    @error('org_name')
                    <small class="invalid-feedback">
                        {{ $message }}
                    </small>
                    @enderror
                    <div class="small my-2">
                        (Space, ह्र्स्व ,दिर्घ, र , एण्ड राखेको आधारमा सिस्टमले नाम दिएमा त्यसलाई विभागले अस्विकृत गर्न सक्नेछ ।)
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary z-depth-0 font-15px"><span class="svg-icon svg-baseline">@include('svg.search')</span> नाम जाँच गर्नुहोस्</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection

@push('scripts')
@include('layouts.partials.romanized-keyboard-scripts')
@endpush
