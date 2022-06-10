@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="card-body">
            <form action="{{ $disabilities->id ? route('disability.update', $disabilities->id) : route('disability.store') }}" method="POST" class="form">
                @csrf
                @isset($disabilities->id)
                    @method('PUT')
                @endisset
                 <div class="form-group">
                    <label for="input-name">अपाङ्गता प्रकार</label>
                    <input type="text" id="input-name" name="disability" class="form-control" autocomplete="off" value="{{ old('name',$disabilities->disability) }}">
                </div>
                <div class="form-group">
                    <label for="input-name">अपाङ्गता प्रकार (English)</label>
                    <input type="text" id="input-name" name="disability_en" class="form-control" autocomplete="off" value="{{ old('name',$disabilities->disability_en) }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">{{$disabilities->id? 'Update':'save'}}</button>
                </div>
            </form>
        </div>
       
    </div>

    <div class="my-4"></div>

    <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">न.पा./गा.वि.स. हरु</h1>
            <small>(हाल {{ count($disability)  }}  अपाङ्गता प्रकार {{ count($disability) > 1 ? 'हरु छन्' : 'छ' }} )</small>
            
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>अपाङ्गता प्रकार</th>
                        <th>अपाङ्गता प्रकार (English)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($disability as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->disability }}</td>
                        <td>{{ $item->disability_en }}</td>
                        
                        <td>
                            <a class="action-btn text-primary" href="{{ route('disability.edit', $item->id) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('disability.destroy', $item->id) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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
