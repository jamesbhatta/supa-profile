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
            
            <form action="{{route('age-population.store')}}" method="POST" class="form">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="input-name">जिल्ला को नाम</label>
                        <select name="district_id" class="form-control" id="">
                            <option value="">जिल्ला छान्नुहोस्</option>
                            @foreach($districts as $item)
                            <option value="{{$item->id}}" data-province-id="">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="input-name ">उमेर समूह</label>
                        <select name="age_group" class="form-control" id="">
                            <option value="">उमेर समूह छान्नुहोस्</option>
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
                        <input type="text" id="input-name" name="male_num" class="form-control" autocomplete="off" value="{{old('male_number')}}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="input-name">महिलाहरुको संख्या </label>
                        <input type="text" id="input-name" name="female_num" class="form-control" autocomplete="off" value="{{old('female_number')}}">
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
            <h1 class="h3-responsive d-inline-block">उमेर अनुसारको जनसंख्या विवरण</h1>
            <small>(हाल {{ count($population)  }}  जनसंख्या विवरण {{ count($population) > 1 ? 'हरु छन्' : 'छ' }} )</small>
            
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th >क्र.स.</th>
                        <th >जिल्ला</th>
                        <th >उमेर समूह</th>
                        <th >पुरुष</th>
                        <th>महिला</th>
                        <th>जम्मा</th>
                        
                    </tr>
                  
                </thead>
                <tbody>
                    @forelse ($population as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->districts->name }}</td>
                        <td>{{$item->age_group}}</td>
                        <td>{{ $item->male_num }}</td>
                        <td>{{ $item->female_num}}</td>
                        <td>{{$item->female_num+$item->male_num}}</td>

                        <td>
                            <a class="action-btn text-primary" href="{{route('age-population.edit',$item->id)}}"><i class="far fa-edit"></i></a>
                            <form action="{{route('age-population.destroy',$item->id)}}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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
