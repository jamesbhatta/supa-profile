@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">श्रम तथा रोजगारको अवस्था</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{$employeementStatus->id? route('employeement-status.update',$employeementStatus):route('employeement-status.store')}}" method="POST" class="form">
                @csrf
               @isset($employeementStatus->id)
                   @method('PUT')
               @endisset
               
                <div class="form-group">
                    <label for="input-name">प्रदेश</label>
                    <select name="province" id="" class="form-control">
                        <option value="" disabled selected>कृपया प्रदेश चयन गर्नुहोस्</option>
                        @isset($employeementStatus->id)
                            <option value="{{$employeementStatus->province}}" selected>{{$employeementStatus->province}}</option>
                        @endisset
                        @foreach ($province as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-name">बेरोजगारी</label>
                    <input type="text" id="input-name" name="unemployeement" class="form-control" autocomplete="off" value="{{old('unemployeement',$employeementStatus->unemployeement)}}">
                </div>
                <div class="form-group">
                    <label for="input-name">जनसंख्याको अनुपातमा बेरोजगारी</label>
                    <input type="text" id="input-name" name="unemployeement_ratio" class="form-control" autocomplete="off" value="{{old('unemployeement_ratio',$employeementStatus->unemployeement_ratio)}}">
                </div>
                <div class="form-group">
                    <label for="input-name">श्रमशक्तिमा सहभागिताको दर</label>
                    <input type="text" id="input-name" name="labour_force_rate" class="form-control" autocomplete="off" value="{{old('labour_force_rate',$employeementStatus->labour_force_rate)}}">
                </div>
               
                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">{{$employeementStatus->id? 'Update':'सेभ गर्नुहोस्'}} </button>
                </div>
            </form>
        </div>
    </div>

    <div class="my-4"></div>

    <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">सुदूरपश्चिम प्रदेशको पहिलो मन्त्रिपरिषद्</h1>
            {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}
            
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>प्रदेश</th>
                        <th>बेरोजगारी</th>
                        <th>जनसंख्याको अनुपातमा बेरोजगारी</th>
                        <th>श्रमशक्तिमा सहभागिताको दर</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employeementStatuss as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->province}}</td>
                        <td>{{ $item->unemployeement}}</td>
                        <td>{{ $item->unemployeement_ratio}}</td>
                        <td>{{ $item->labour_force_rate}}</td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('employeement-status.edit', $item) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('employeement-status.destroy', $item) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
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

@endsection

@push('scripts')
<script>
    $(function() {

        $('#select-province-id').change(function() {
            filterOptions($(this).val(), '#select-district-id option', 'province-id');
        });

    });

</script>

@endpush








