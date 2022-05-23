<div class="card shodow-0 border">
    <div class="card-body">
        <div class="d-flex mb-3">
            <h5 class="h5-responsive font-weight-bold">थप व्यवसाय / फार्मको विवरण</h5>
            <a href="{{ route('subsidiary.create', $organization) }}" class="ml-auto btn btn-sm btn-primary z-depth-0">Add New</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>व्यवसायको नाम</th>
                    <th>कारोबार गर्ने वस्तु</th>
                    <th>वडा नं</th>
                    <th>व्यवसाय संचालन हुने स्थान</th>
                    <th>संचालन मिति</th>
                    <th>लागत पूजी रु.</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subsidiaries as $subsidiary)
                <tr>
                    <td>{{ $subsidiary->name }}</td>
                    <td>{{ $subsidiary->org_product_type }}</td>
                    <td>{{ $subsidiary->ward->name }}</td>
                    <td>{{ $subsidiary->address }}</td>
                    <td>{{ $subsidiary->start_date }}</td>
                    <td>{{ $subsidiary->capital }}</td>
                    <td>
                        <a class="btn btn-primary btn-md font-noto my-0 py-2 px-3 z-depth-0" href="{{ route('subsidiary.edit', $subsidiary) }}">Edit</a>
                        <form action="{{ route('subsidiary.destroy', $subsidiary) }}" method="POST" class="d-inline" onsubmit="return confirm('Sure to trash?')">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-md font-noto my-0 py-2 px-3 z-depth-0" type="submit">Delete</butt>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
