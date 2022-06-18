@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>
<div class="container">
    <div class="card z-depth-0">
        <div class="col-12">
            <label class="col-12 text-center font-weight-bold h4 my-5">प्रदेश सभा सदस्यहरुको नामावली</label>
            <hr>
        </div>
        <div class="card-body">
            <form action="{{$assemblyMember->id? route('assembly-member.update',$assemblyMember):route('assembly-member.store')}}" method="POST" class="form">
                @csrf
                @isset($assemblyMember->id)
                    @method('PUT')
                @endisset
               
                <div class="form-group">
                    <label for="input-name">नाम थर</label>
                    <input type="text" id="input-name" name="name" class="form-control" autocomplete="off" value="{{old('name',$assemblyMember->name)}}">
                </div>
                <div class="form-group">
                    <label for="input-name">निर्वाचन क्षेत्र</label>
                    <input type="text" id="input-name" name="constituency" class="form-control" autocomplete="off" value="{{old('constituency',$assemblyMember->constituency)}}">
                </div>
                <div class="form-group">
                    <label for="input-name">हालको राजनीतिक दल</label>
                    <input type="text" id="input-name" name="political_parties" class="form-control" autocomplete="off" value="{{old('political_parties',$assemblyMember->political_parties)}}">
                </div>
               
               
              
                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">{{$assemblyMember->id? 'Update':'सेभ गर्नुहोस्'}} </button>
                </div>
            </form>
        </div>
    </div>

    <div class="my-4"></div>

    <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">प्रदेश सभा सदस्यहरुको नामावली</h1>
            {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}
            
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>नाम थर</th>
                        <th>निर्वाचन क्षेत्र</th>
                        <th>हालको राजनीतिक दल</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assemplyMembers as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->constituency}}</td>
                        <td>{{$item->political_parties}}</td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('assembly-member.edit', $item) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('assembly-member.destroy', $item) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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








