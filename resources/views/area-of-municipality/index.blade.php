@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>

<div class="container-fluid">
    <div class="card z-depth-0">
        <div class="col-12">

        <!-- Large modal -->
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg">नयाँ विवरण थप्नुहोस </button>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card">
                    <div class="card-head">
                        <div class="col-12">
                            <label class="col-12 text-center font-weight-bold h4 my-5">पालिकहरुको क्षेत्रफल र वडा संख्या विवरण</label>
                            <hr>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('area.store')}}" method="POST" class="form">
                            @csrf
                            <div class="form-group">
                                <label for="select-province-id">प्रदेशको नाम</label>
                                <select id="select-province-id" class="custom-select">
                                    @isset($municipality->district->province)
                                    <option value="{{ $municipality->district->province->id }}" selected>{{ $municipality->district->province->name }}</option>
                                    @else
                                    <option value="">प्रदेश छान्नुहोस्</option>
                                    @endisset
                                    @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select-district-id">जिल्लाको नाम</label>
                                <select name="district_name" id="select-district-id" class="custom-select">
                                    @isset($municipality->district)
                                    <option value="{{ $municipality->district->id }}" selected>{{ $municipality->district->name }}</option>
                                    @else
                                    <option value="">जिल्ला छान्नुहोस्</option>
                                    @endisset
                                    @foreach($provinces as $province)
                                    @foreach($province->districts as $district)
                                    <option value="{{ $district->name }}" data-province-id="{{ $province->id }}">{{ $district->name }}</option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select-province-id">गा.पा./गा.वि.स. को नाम</label>
                                <select id="select-province-id" class="custom-select" name="municipalitiy_id">
                                    {{-- @isset($municipality->district->province) --}}
                                    {{-- <option value="" selected>{{ $municipality->district->province->name }}</option> --}}
                                    {{-- @else --}}
                                    <option value="">गा.पा./गा.वि.स. छान्नुहोस्</option>
                                    {{-- @endisset --}}
                                    @foreach($municipalities as $item)
                                    <option value="{{$item->id}}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                          
                            <div class="form-group">
                                <label for="input-name-en">न.पा./गा.वि.स. को छेत्रफल</label>
                                <input type="number" id="input-name-en" name="muncipality_area" class="form-control" autocomplete="off" value="">
                            </div>
                            <div class="form-group">
                                <label for="input-name-en">न.पा./गा.वि.स. को वार्ड सांख्य</label>
                                <input type="number" id="input-name-en" name="ward_count" class="form-control" autocomplete="off" value="}}">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success z-depth-0">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card z-depth-0">
                        <div class="card-header">
                            <h1 class="h3-responsive d-inline-block">सुदुरपस्चिमक जिल्ला अन्तर्गत पालिकहरुको क्षेत्रफल र वडा संख्या </h1>
                            {{-- <small>(हाल {{ count($municipalities)  }}  न.पा./गा.वि.स. {{ count($municipalities) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}
                            
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>क्र.स.</th>
                                        <th>जिल्ला</th>
                                        <th>न.पा./गा.वि.स.</th>
                                        
                                        <th>न.पा./गा.वि.स. को छेत्रफल</th>
                                        <th>न.पा./गा.वि.स. वार्ड सांख्य</th>
                                        
                                    </tr>
                                </thead>@forelse ($municipality['municipalities'] as $item)
                                            
                                        <td>{{$item->muncipality_area}}</td>
                                        <td>{{ $item->ward_count}}</td>
                                        @empty
                                        @endforelse
                                <tbody>
                                   
                                    @forelse ($municipalities_area as $municipality)
                                          
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$municipality->district_name}}</td>
                                        
                                        <td>{{$municipality->municipalities->name}}</td>
                                        <td>{{$municipality->muncipality_area}}</td>
                                        <td>{{$municipality->ward_count}}</td>
                                        <td>
                                            <a class="action-btn text-primary" href="{{ route('area.edit', $municipality) }}"><i class="far fa-edit"></i></a>
                                            <form action="{{ route('area.destroy', $municipality) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                            <tr>
                                              
                                        </td>
                                      
                                    </tr>
                                    @empty
                                    <tr class="text-center font-italic">
                                        <td colspan="10">* * डाटाबेसमा कुनै डाटा छैन * *</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="my-4"></div>

    {{-- <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">आर्थिक वर्षहरु</h1>
            <small>(हाल {{ $fiscalYears->count() }} आर्थिक वर्षहरु छन्)</small>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>आर्थिक वर्ष</th>
                        <th>सुरु मिति</th>
                        <th>समाप्त मिति</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fiscalYears as $fiscalYear)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="font-roboto">{{ $fiscalYear->name }}</td>
                        <td class="font-roboto">{{ $fiscalYear->start }}</td>
                        <td class="font-roboto">{{ $fiscalYear->end }}</td>
                        <td class="text-success font-weight-bold">
                            @if($fiscalYear->is_running) सक्रिय @endif
                        </td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('fiscal-year.index', $fiscalYear) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('fiscal-year.destroy', $fiscalYear) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center font-italic">
                        <td colspan="10">
                            <div>
                                <svg id="Layer_1" enable-background="new 0 0 512 512" height="40" fill="#fefefe" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m512 256c0 68.38-26.629 132.667-74.98 181.02-48.353 48.351-112.64 74.98-181.02 74.98-47.869 0-93.723-13.066-133.518-37.482l29.35-29.35c30.91 17.088 66.42 26.832 104.168 26.832 119.103 0 216-96.897 216-216 0-37.748-9.744-73.258-26.833-104.167l29.351-29.35c24.416 39.794 37.482 85.648 37.482 133.517zm-482.858 255.142-28.284-28.284 60.528-60.528c-39.719-46.325-61.386-104.661-61.386-166.33 0-68.38 26.629-132.667 74.98-181.02 48.353-48.351 112.64-74.98 181.02-74.98 61.669 0 120.005 21.667 166.33 61.386l60.528-60.528 28.284 28.284zm60.711-117.28 304.009-304.009c-37.431-31.114-85.497-49.853-137.862-49.853-119.103 0-216 96.897-216 216 0 52.365 18.738 100.431 49.853 137.862z" /></svg>
                            </div>
                            <div class="mt-3">
                                डाटाबेसमा कुनै डाटा छैन |
                            </div>
                        </td>

                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> --}}
</div>

@endsection

@push('scripts')
<script>
    $(function() {
        if ($('.fiscal-year-date')[0]) {
            $('.fiscal-year-date').nepaliDatePicker({});
        }

    })

</script>
@endpush
