@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>


<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label for="" class="col-12 text-center h3 my-4">स्थानिय तह को जनसंख्या </label>
            <hr>
        </div>
        <div class="card-body">
            
            <form action="{{route('population.update',$population[0]->id)}}" method="POST" class="form">
                @csrf
                @method('PUT')
                    
               
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="input-name">जिल्ला को नाम</label>
                        <select name="district_id" class="form-control" id="">
                            @isset($population[0]->districts->name)
                                <option value="{{$population[0]->districts->id}}">{{$population[0]->districts->name}}</option>
                            @else
                                <option value="">जिल्ला छान्नुहोस्</option>
                            @endisset
                            @foreach($districts as $district)
                            <option value="{{$district->id}}" data-province-id="">{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="input-name">न.पा./गा.वि.स. को नाम</label>
                        <select name="municipality_id" class="form-control" id="">
                            @isset($population[0]->municipalities->name)
                                <option value="{{$population[0]->municipalities->id}}">{{$population[0]->municipalities->name}}</option>
                            @else
                                <option value="">न.पा./गा.पा छान्नुहोस्</option>
                            @endisset
                            
                            @foreach($municipalities as $item)
                            <option value="{{$item->id}}" data-province-id="">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-md-4">
                        <label for="input-name ">घरपरिवार संख्या</label>
                        <input type="text" id="input-name" name="family_num" class="form-control" autocomplete="off" value="{{old('house_number',$population[0]->family_num)}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name">पुरुष</label>
                        <input type="text" id="input-name" name="male_num" class="form-control" autocomplete="off" value="{{old('male_number',$population[0]->male_num)}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input-name">महिला</label>
                        <input type="text" id="input-name" name="female_num" class="form-control" autocomplete="off" value="{{old('female_number',$population[0]->female_num)}}">
                    </div>
                   
                    <div class="form-group">
                        <button type="submit" class="btn btn-success z-depth-0">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="my-4"></div>
   

   
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
