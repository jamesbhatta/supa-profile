@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>


<div class="container-fluied">
    <div class="card z-depth-0">
        <div class="col-12">
            <label for="" class="col-12 text-center h3 my-4">स्थानिय तह को जनसंख्या </label>
            <hr>
        </div>
        <div class="card-body">
            
            <form action="{{route('local-population.store')}}" method="POST" class="form">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="input-name">जिल्ला को नाम</label>
                        <select name="district" class="form-control" id="">
                            <option value="">जिल्ला छान्नुहोस्</option>
                            @foreach($district as $item)
                            <option value="{{$item->name}}" data-province-id="">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="input-name">न.पा./गा.वि.स. को नाम</label>
                        <select name="municipality_name" class="form-control" id="">
                            <option value="">न.पा./गा.पा छान्नुहोस्</option>
                            
                            @foreach($municipality as $item)
                            <option value="{{$item->name}}" data-province-id="">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-md-4">
                        <label for="input-name ">घरपरिवार संख्या</label>
                        <input type="number" id="input-name" name="house_number" class="form-control" autocomplete="off" value="{{old('house_number')}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name">पुरुष</label>
                        <input type="number" id="input-name" name="male_number" class="form-control" autocomplete="off" value="{{old('male_number')}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name">महिला</label>
                        <input type="number" id="input-name" name="female_number" class="form-control" autocomplete="off" value="{{old('female_number')}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name">औषत घरपरिवार सदस्य संख्या</label>
                        <input type="texr" id="input-name" name="avg_house_number" class="form-control" autocomplete="off" value="{{old('avg_house_number')}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name">लैगिंक अनुपात</label>
                        <input type="text" id="input-name" name="anupat" class="form-control" autocomplete="off" value="{{old('anupat')}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name">महिला साक्षरता (प्रतिशत)</label>
                        <input type="text" id="input-name" name="fml_edu_percentage" class="form-control" autocomplete="off" value="{{old('fml_edu_percentage')}}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="input-name">पुरुष साक्षरता (प्रतिशत)</label>
                        <input type="text" id="input-name" name="ml_edu_percentage" class="form-control" autocomplete="off" value="{{old('ml_edu_percentage')}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success z-depth-0">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="my-4"></div>
   

    <div class="my-4"></div>

    <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">स्थानिय तह को जनसंख्या विवरण</h1>
            <small>(हाल {{ count($population)  }}  स्थानिय तह को जनसंख्या विवरण {{ count($population) > 1 ? 'हरु छन्' : 'छ' }} )</small>
            
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th >क्र.स.</th>
                        <th >जिल्ला</th>
                        <th >न.पा./गा.पा.</th>
                        <th>घर संख्या</th>
                        <th>जम्मा</th>
                        <th >पुरुष</th>
                        <th>महिला</th>
                        <th>औषत परिवार सदस्य संख्या</th>
                        <th>लैगिंक अनुपात</th>
                        <th>पु. साक्षरता(%)</th>
                        <th>म. साक्षरता(%)</th>
                    </tr>
                  
                </thead>
                <tbody>
                    @forelse ($population as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->district }}</td>
                        <td>{{ $item->municipality_name }}</td>
                        <td>{{$item->house_number}}</td>
                        <td>{{$item->female_number+$item->male_number}}</td>
                        <td>{{ $item->male_number }}</td>
                        <td>{{ $item->female_number}}</td>
                        <td>{{ $item->avg_house_number}}</td>
                        <td>{{ $item->anupat}}</td>
                        <td>{{ $item->fml_edu_percentage}}</td>
                        <td>{{ $item->ml_edu_percentage}}</td>
                        <td>
                            <a class="action-btn text-primary" href="{{route('local-population.edit',$item->id)}}"><i class="far fa-edit"></i></a>
                            <form action="{{route('local-population.destroy',$item->id)}}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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
