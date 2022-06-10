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
            <form action="{{route('bank.store')}}" method="POST" class="form">
                @csrf
                <div class="form-group">
                    <label for="input-name">बैंक तथा वित्तिय संस्था</label>
                    <input type="text" id="input-name" name="bank" class="form-control" autocomplete="off" value="">
                </div>
                <div class="form-group">
                    <label for="input-name">बैंक तथा वित्तिय संस्था (English)</label>
                    <input type="text" id="input-name" name="bank_en" class="form-control" autocomplete="off" value="">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">Save</button>
                </div>
            </form>
        </div>
        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">बैंक तथा वित्तिय संस्था विवरण हरु</h1>
                <small>(हाल {{ count($banks)  }}  बैंक तथा वित्तिय संस्था {{ count($banks) > 1 ? 'हरु छन्' : 'छ' }} )</small>
                
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>बैंक तथा वित्तिय संस्था</th>
                            <th>बैंक तथा वित्तिय संस्था (English)</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($banks as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->bank }}</td>
                            <td>{{$item->bank_en}}</td>
                            <td>
                                <a class="action-btn text-primary" href="{{ route('bank.edit', $item->id) }}"><i class="far fa-edit"></i></a>
                                <form action="{{ route('bank.destroy', $item->id) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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
