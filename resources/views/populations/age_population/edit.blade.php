@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>


<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label for="" class="col-12 text-center h3 my-4">उमेर अनुसारको जनसंख्या</label>
            <hr>
        </div>
        <div class="card-body">
            
            <form action="{{route('age-population.update',$population[0]->id)}}" method="POST" class="form">
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
                            
                            @foreach($districts as $item)
                            <option value="{{$item->id}}" data-province-id="">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="input-name ">उमेर समूह</label>
                        <select name="age_group" class="form-control" id="">
                            @isset($population[0]->age_group)
                                <option value="{{$population[0]->age_group}}">{{$population[0]->age_group}}</option>
                            @else
                                <option value="">उमेर समूह छान्नुहोस्</option>
                            @endisset
                            
                            <option value="00-04">00-04</option>
                            <option value="5-9">5-9</option>
                            <option value="10-14">10-14</option>
                            <option value="15-19">15-19</option>
                            <option value="20-24">20-24</option>
                            <option value="25-29">25-29</option>
                            <option value="30-34">30-34</option>
                            <option value="35-40">35-40</option>
                            <option value="41-45">41-45</option>
                            <option value="46-49">46-49</option>
                            <option value="50-54">50-54</option>
                            <option value="55-59">55-59</option>
                            <option value="60-64">60-64</option>
                            <option value="65-69">65-69</option>
                            <option value="70-74">70-74</option>
                            <option value="75 माथि">75 माथि</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="input-name">पुरुषहरुको संख्या </label>
                        <input type="text" id="input-name" name="male_num" class="form-control" autocomplete="off" value="{{$population[0]->male_num}}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="input-name">महिलाहरुको संख्या </label>
                        <input type="text" id="input-name" name="female_num" class="form-control" autocomplete="off" value="{{$population[0]->female_num}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success z-depth-0">save</button>
                    </div>
                </div>
            </form>
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
