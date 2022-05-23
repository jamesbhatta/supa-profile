@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>

<div class="container">
    <div class="card z-depth-0">
        <div class="card-body">
            <form action="{{ $organizationType->id ? route('organization-type.update', $organizationType) : route('organization-type.store') }}" method="POST" class="form">
                @csrf
                @if($organizationType->id)
                @method('put')
                @endif
                <div class="form-group">
                    <label for="input-name">व्यवसाय किसिम</label>
                    <input type="text" id="input-name" name="name" class="form-control" autocomplete="off" value="{{ old('name', $organizationType->name) }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success z-depth-0">{{ $organizationType->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्'}}</button>
                </div>
            </form>
        </div>
    </div>

    <div class="my-4"></div>

    <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">व्यवसाय किसिम</h1>
            <small>(हाल {{ $organizationTypes->count() }} किसिमको व्यवसाय छन्)</small>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>व्यवसाय किसिम</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($organizationTypes as $organizationType)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $organizationType->name }}</td>
                        <td>
                            <a class="action-btn text-primary" href="{{ route('organization-type.edit', $organizationType) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('organization-type.destroy', $organizationType) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center font-italic">
                        <td colspan="10">
                            <div class="mt-3">
                                ** डाटाबेसमा कुनै डाटा छैन | **
                            </div>
                        </td>

                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
