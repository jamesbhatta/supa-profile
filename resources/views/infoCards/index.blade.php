@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="card-body">
            <form action="{{ $updateMode ? route('info-card.update', $infoCard->id) : route('info-card.store') }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                @isset($infoCard->id)
                @method('put')
                @endisset
                <div class="form-group">
                    <label for="input-name">Label</label>
                    <input type="text" id="input-name" name="label" class="form-control" autocomplete="off" value="{{ old('label', $infoCard->label) }}">
                </div>
                <div class="form-group">
                    <label for="input-name-en">Value</label>
                    <input type="text" id="input-name-en" name="value" class="form-control" autocomplete="off" value="{{ old('value',$infoCard->value) }}">
                </div>

                <div class="form-group">
                    <label for="input-name-en">Icon</label>
                    {{-- <input type="file" class="form-control" name="icon" > --}}
                    <input type="text" id="input-name-en" name="icon" class="form-control" autocomplete="off" value="{{ old('icon',$infoCard->icon) }}">
                </div>

                <div class="form-group">
                    <label for="input-name-en">Card Theme</label>
                    {{-- <input type="text" id="input-name-en" name="card_theme" class="form-control" autocomplete="off" value="{{ old('card_theme',$infoCard->card_theme) }}"> --}}
                    <select name="" class="custom-select">
                        @foreach ($themes as $theme)
                            <option value="{{ $theme }}" @if(old('card_theme', $infoCard->card_theme) == $theme) selected @endif>{{ ucwords(str_replace('-', ' ', $theme)) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="input-name-en">Position</label>
                    <input type="number" id="input-name-en" name="position" class="form-control" autocomplete="off" value="{{ old('position',$infoCard->position) }}">
                </div>
               
                <div class="form-group">
                    <label for="input-name-en">Link</label>
                    <input type="text" id="input-name-en" name="link" class="form-control" autocomplete="off" value="{{ old('link',$infoCard->link) }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">{{ $updateMode ? 'Update' : 'Create' }}</button>
                </div>
            </form>
        </div>
    </div>

    <div class="my-4"></div>

    <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">न.पा./गा.वि.स. हरु</h1>
            {{-- <small>(हाल {{ count($municipalities)  }}  न.पा./गा.वि.स. {{ count($municipalities) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}
            
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>Label</th>
                        <th>Value</th>
                        <th>Icon</th>
                        <th>Card Theme</th>
                        <th>Position</th>
                        <th>Links</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($infoCards as $infocard)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $infocard->label }}</td>
                        <td>{{ $infocard->value }}</td>
                        <td>{{ $infocard->icon }}</td>
                        <td>{{ $infocard->card_theme}}</td>
                        <td>{{ $infocard->position}}</td>
                        <td>{{ $infocard->link}}</td>
                        
                        <td>
                            <a class="action-btn text-primary" href="{{ route('info-card.edit', $infocard) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('info-card.destroy', $infocard) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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
