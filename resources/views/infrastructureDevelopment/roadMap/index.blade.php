@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold">सुदूरपश्चिममा सेवा सञ्जालको विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">पूर्वाधार विकास</li>
                <li class="breadcrumb-item active" aria-current="page">सुदूरपश्चिममा सेवा सञ्जालको विवरण</li>
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
                            <h4>सुदूरपश्चिममा सेवा सञ्जालको विवरण</h4>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form
                    action="{{ $roadNetwork->id ? route('road-network.update', $roadNetwork) : route('road-network.store') }}"
                    method="POST" class="form">
                    @csrf
                    @isset($roadNetwork->id)
                        @method('PUT')
                    @endisset

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="input-name"> सडक सञ्जाल</label>
                            <input type="text" name="road" class="form-control"
                                value="{{ old('road', $roadNetwork->road) }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="input-name">सडक सञ्जाल सुदूरपश्चिममा लम्बाई (कि.मि)</label>
                            <input type="number" name="supa_lenght" class="form-control"
                                value="{{ old('supa_lenght', $roadNetwork->supa_lenght) }}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="input-name">नेपालमा लम्बाई (कि.मि.)</label>
                            <input type="number" name="npl_lenght" class="form-control"
                                value="{{ old('npl_lenght', $roadNetwork->npl_lenght) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-success z-depth-0">{{ $roadNetwork->id ? 'Update' : 'सेभ गर्नुहोस्' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4"></div>

        <div class="card z-depth-0">
            <div class="card-header">
                <h1 class="h3-responsive d-inline-block">सुदूरपश्चिममा सेवा सञ्जालको विवरण</h1>
                {{-- <small>(हाल {{ count($schools)  }}  विद्यालय {{ count($schools) > 1 ? 'हरु छन्' : 'छ' }} )</small> --}}

            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>सडक सञ्जाल</th>
                            <th>सडक सञ्जाल सुदूरपश्चिममा लम्बाई (कि.मि)</th>
                            <th>नेपालमा लम्बाई (कि.मि.)</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roadNetworks as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->road }}</td>
                                <td>{{ $item->supa_lenght }}</td>
                                <td>{{ $item->npl_lenght }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('road-network.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('road-network.destroy', $item) }}" method="post"
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
