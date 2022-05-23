<div class="row">
    @can('organization.edit')
    @if((!$organization->isRegistered()) || Auth::user()->hasAnyRole(['super-admin', 'admin']))
    <div class="col-md-4 d-flex">
        <a class="action-wrapper" href="{{ route('organization.edit', $organization) }}">
            <div class="icon-wrapper blue lighten-5 p-4">
                <div class="icon text-primary"><i class="fa fa-edit"></i></div>
            </div>
            <div class="label">
                Edit
            </div>
        </a>
    </div>
    @endif
    @endcan

    @if(!$organization->isVerified() && $organization->isChecked())
    @can('organization.verify')
    <div class="col-md-4 d-flex">
        <a class="action-wrapper" href="{{ route('organization.verify.form', $organization) }}">
            <div class="icon-wrapper green lighten-5 p-4">
                <div class="icon text-success"><i class="fa fa-check"></i></div>
            </div>
            <div class="label">
                सिफारिस गर्नुहोस
            </div>
        </a>
    </div>
    @endcan
    @endif

    @if($organization->isVerified() && !$organization->isRegistered())
    @can('organization.register')
    <div class="col-md-4 d-flex">
        <a class="action-wrapper" href="{{ route('organization.register.form', $organization) }}">
            <div class="icon-wrapper indigo lighten-5 p-4">
                <div class="icon indigo-text"><i class="fa fa-check"></i></div>
            </div>
            <div class="label">
                दर्ता गर्नुहोस
            </div>
        </a>
    </div>
    @endcan
    @endif

    @if($organization->isRegistered())
    @can('organization.register')
    <div class="col-md-4 d-flex">
        <a class="action-wrapper" href="{{ route('organization.renew.form', $organization) }}">
            <div class="icon-wrapper green lighten-5 p-4">
                <div class="icon text-success"><i class="fa fa-sync"></i></div>
            </div>
            <div class="label">
                नवीकरण गर्नुहोस
            </div>
        </a>
    </div>
    @endcan
    @endif

    @if($organization->isVerified() && $organization->isRegistered())
    @can('organization.register')
    <div class="col-md-4 d-flex">
        <a class="action-wrapper" href="{{ route('organization.close.form', $organization) }}">
            <div class="icon-wrapper red lighten-5 p-4">
                <div class="icon text-danger"><i class="fa fa-times"></i></div>
            </div>
            <div class="label">
                बन्द गर्नुहोस
            </div>
        </a>
    </div>
    @endcan
    @endif

    @if($organization->isRegistered())
    @can('organization.register')
    <div class="col-md-4 d-flex">
        <a class="action-wrapper" href="{{ route('organization.rename.form', $organization) }}">
            <div class="icon-wrapper amber lighten-5 p-4">
                <div class="icon text-warning"><i class="fa fa-signature"></i></div>
            </div>
            <div class="label">
                नाम परिवर्तन गर्नुहोस
            </div>
        </a>
    </div>
    <div class="col-md-4 d-flex">
        <a class="action-wrapper" href="{{ route('naamsari.index', $organization) }}">
            <div class="icon-wrapper amber lighten-5 p-4">
                <div class="icon text-warning"><i class="fa fa-signature"></i></div>
            </div>
            <div class="label">
                नामसारी
            </div>
        </a>
    </div>
    <div class="col-md-4 d-flex">
        <a class="action-wrapper" href="{{ route('subsidiary.create', $organization) }}">
            <div class="icon-wrapper green lighten-5 p-4">
                <div class="icon text-success"><i class="fa fa-plus"></i></div>
            </div>
            <div class="label">व्यवसाय थप</div>
        </a>
    </div>
    <div class="col-md-4 d-flex">
        <a class="action-wrapper" href="{{ route('karobar-paribartan.index', $organization) }}">
            <div class="icon-wrapper purple lighten-5 p-4">
                <div class="icon text-secondary"><i class="fa fa-pen-nib"></i></div>
            </div>
            <div class="label">कारोवार परिवर्तन</div>
        </a>
    </div>
    @endcan
    @endif

</div>
