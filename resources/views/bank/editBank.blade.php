@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">बैंक तथा वित्तिय संस्था विवरण</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{route('bank.update',$banks[0]->id)}}" method="POST" class="form">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="input-name">बैंक तथा वित्तिय संस्था</label>
                    <input type="text" id="input-name" name="bank" class="form-control" autocomplete="off" value="{{$banks[0]->bank}}">
                </div>
                <div class="form-group">
                    <label for="input-name">बैंक तथा वित्तिय संस्था (English)</label>
                    <input type="text" id="input-name" name="bank_en" class="form-control" autocomplete="off" value="{{$banks[0]->bank_en}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">Update</button>
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
