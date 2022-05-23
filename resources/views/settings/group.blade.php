<div class="row">
    <div class="col-md-5">
        <h4 class="h4-responsive font-weight-bold mdb-color-text">{{ $title ?? '' }}</h4>
        <p class="small text-muted">
            {{ $description ?? '' }}
        </p>
    </div>
    <div class="col-md-7">
        <div class="card z-depth-0" style="border: 1px solid #ededed;">
            <div class="card-body">
                {{ $slot }}
            </div>
            <div class="p-3 text-right" style="background-color:#f9fafb">
                <button class="btn my-0 rounded z-depth-0 font-16px py-2 px-4" style="background-color:#374f67; color: #fff;">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="my-5" style="border-top: 1px dashed #d2d6dc;"></div>
