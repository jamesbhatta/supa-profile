@props(['link'])
<div class="container-fluid dashboard-container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
      <div class="my-5"></div>
    <div class="row">
        {{-- =======Card1=============== --}}
        <div class="col-lg-4">
            <div class="card bg-warning">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class=" text-white">{{ $count ?? null }}</h3>
                            <label class="text-white">Users</label>
                        </div>
                        <div class="col-4">
                            <span class="card-icon"><i class="fa fa-users fa-3x" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                
                    <a href="{{ $link ?? '#' }}">
                        <div class="col-12 cards-footer">
                            <label class="m-2 col-12 text-center text-white" >More info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label>
                        </div>
                        
                    </a>
            </div>
        </div>

        {{-- =============Card 2=============== --}}
        <div class="col-lg-4">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class=" text-white">19,539</h3>
                            <label class="text-white">क्षेत्रफल</label>
                        </div>
                        <div class="col-4">
                            <span class="card-icon"><i data-v-b3c5cf30="" class="far fa-map fa-3x"></i></span>
                        </div>
                    </div>
                </div>
                
                    <a href="{{ $link ?? '#' }}">
                        <div class="col-12 cards-footer">
                            <label class="m-2 col-12 text-center text-white" >More info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label>
                        </div>
                        
                    </a>
            </div>
        </div>
        {{-- ==========Card3==================== --}}
        <div class="col-lg-4">
            <div class="card bg-success">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class=" text-white">9</h3>
                            <label class="text-white">जम्मा जिल्ला</label>
                        </div>
                        <div class="col-4">
                            <span class="card-icon"><i data-v-b3c5cf30="" class="fa fa-globe fa-3x"></i></span>
                        </div>
                    </div>
                </div>
                
                    <a href="{{ $link ?? '#' }}">
                        <div class="col-12 cards-footer">
                            <label class="m-2 col-12 text-center text-white" >More info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label>
                        </div>
                        
                    </a>
            </div>
        </div>

         {{-- ==========Card4==================== --}}
         <div class="col-lg-4 my-4">
            <div class="card bg-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class=" text-white">2711270</h3>
                            <label class="text-white">जनसंख्या</label>
                        </div>
                        <div class="col-4">
                            <span class="card-icon"><i class="fa fa-users fa-3x" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                
                    <a href="{{ $link ?? '#' }}">
                        <div class="col-12 cards-footer">
                            <label class="m-2 col-12 text-center text-white" >More info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label>
                        </div>
                        
                    </a>
            </div>
        </div>

        {{-- ==========Card5==================== --}}
        <div class="col-lg-4 my-4">
            <div class="card bg-secondary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class=" text-white">131</h3>
                            <label class="text-white">जनघनत्तो</label>
                        </div>
                        <div class="col-4">
                            <span class="card-icon"><i class="fa fa-users fa-3x" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                
                    <a href="{{ $link ?? '#' }}">
                        <div class="col-12 cards-footer">
                            <label class="m-2 col-12 text-center text-white" >More info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label>
                        </div>
                        
                    </a>
            </div>
        </div>
        {{-- ==========Card6==================== --}}
        <div class="col-lg-4 my-4">
            <div class="card bg-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class=" text-white">32</h3>
                            <label class="text-white">प्रदेशसभा निर्वाचन क्षेत्र</label>
                        </div>
                        <div class="col-4">
                            <span class="card-icon"><i data-v-b3c5cf30="" class="fa fa-person-booth fa-3x"></i></span>
                        </div>
                    </div>
                </div>
                
                    <a href="{{ $link ?? '#' }}">
                        <div class="col-12 cards-footer">
                            <label class="m-2 col-12 text-center text-white" >More info <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label>
                        </div>
                        
                    </a>
            </div>
        </div>
    </div>
</div>
{{-- <a class="d-flex align-items-center bg-white p-4 rounded my-3" href="{{ $link ?? '#' }}">
    <h1 class="mr-4">{{ $count ?? null }}</h1>
    <span>{{ $title ?? null }}</span>
</a> --}}
