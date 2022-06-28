@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">प्रदेश सभा सदस्यहरुको नामावली</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">भौगोलिक तथा राजनीतिक अवस्था</li>
                <li class="breadcrumb-item active" aria-current="page">प्रदेश सभा सदस्यहरुको नामावली</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>
        <div class="card z-depth-0">
            <div class="card-header">
                <div style="overflow: auto;scrollbar-width: none;">
                    <div>
                        <nav class="nav nav-pills" id="pills-tab" role="tablist">
                            <h4> नयाँ प्रदेश सभा सदस्यहरुको नामावली थप्नुहोस्</h4>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form
                    action="{{ $assemblyMember->id ? route('assembly-member.update', $assemblyMember) : route('assembly-member.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($assemblyMember->id)
                        @method('PUT')
                    @endisset

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="input-name">नाम थर</label>
                            <input type="text" id="input-name" name="name" class="form-control" autocomplete="off"
                                value="{{ old('name', $assemblyMember->name) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">निर्वाचन क्षेत्र</label>
                            <input type="text" id="input-name" name="constituency" class="form-control"
                                autocomplete="off" value="{{ old('constituency', $assemblyMember->constituency) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">हालको राजनीतिक दल</label>
                            <input type="text" id="input-name" name="political_parties" class="form-control"
                                autocomplete="off"
                                value="{{ old('political_parties', $assemblyMember->political_parties) }}">
                        </div>
                    </div>



                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $assemblyMember->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
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
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->constituency }}</td>
                                <td>{{ $item->political_parties }}</td>
                                <td>
                                    <a class="action-btn text-primary"
                                        href="{{ route('assembly-member.edit', $item) }}"><i class="far fa-edit"></i></a>
                                    <form action="{{ route('assembly-member.destroy', $item) }}" method="post"
                                        onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')"
                                        class="form-inline d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="action-btn text-danger"><i
                                                class="far fa-trash-alt"></i></button>
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
