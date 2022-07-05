@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">सुदूरपश्चिम प्रदेशमा हालको मन्त्रिपरिषद्</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">भौगोलिक तथा राजनीतिक अवस्था</li>
                <li class="breadcrumb-item active" aria-current="page">सुदूरपश्चिम प्रदेशमा हालको मन्त्रिपरिषद्</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>
        <div class="row">
            <div class="card z-depth-0 col-lg-4">
                <nav class="nav nav-pills p-3" id="pills-tab" role="tablist">
                    <h4> नयाँ हालको मन्त्रिपरिषद् थप्नुहोस्</h4>
                </nav>
                <div class="card-body">
                    <form
                        action="{{ $currentMinistry->id ? route('current-ministry.update', $currentMinistry) : route('current-ministry.store') }}"
                        method="POST" class="form" enctype="multipart/form-data">
                        @csrf
                        @isset($currentMinistry->id)
                            @method('PUT')
                        @endisset
    
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="input-name">नाम थर</label>
                                <input type="text" id="input-name" name="name" class="form-control" autocomplete="off"
                                    value="{{ old('name', $currentMinistry->name) }}">
                            </div>
                            <div class="form-group col-12">
                                <label for="input-name">पद</label>
                                <input type="text" id="input-name" name="post" class="form-control" autocomplete="off"
                                    value="{{ old('post', $currentMinistry->post) }}">
                            </div>
                            <div class="form-group col-12">
                                <label for="input-name">मन्त्रालय</label>
                                <input type="text" id="input-name" name="ministry" class="form-control" autocomplete="off"
                                    value="{{ old('ministry', $currentMinistry->ministry) }}">
                            </div>
                            <div class="form-group col-12">
                                <label for="input-name">दल</label>
                                <input type="text" id="input-name" name="team" class="form-control" autocomplete="off"
                                    value="{{ old('team', $currentMinistry->team) }}">
                            </div>
                            <div class="form-group col-12">
                                <label for="input-name">प्रोफाइल</label>
                                <input type="file" id="input-name" name="profile" class="form-control" autocomplete="off"
                                    value="{{ old('team', $currentMinistry->team) }}">
                            </div>
                        </div>
    
    
                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-success z-depth-0">{{ $currentMinistry->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="card col-lg-7 ml-5 z-depth-0">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>क्र.स.</th>
                                <th>नाम थर</th>
                                <th>पद</th>
                                <th>मन्त्रालय </th>
                                <th>दल</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($currentMinistries as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->post }}</td>
                                    <td>{{ $item->ministry }}</td>
                                    <td>{{ $item->team }}</td>
                                    <td>
                                        <a class="action-btn text-primary"
                                            href="{{ route('current-ministry.edit', $item->id) }}"><i
                                                class="far fa-edit"></i></a>
                                        <form action="{{ route('current-ministry.destroy', $item->id) }}" method="post"
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
