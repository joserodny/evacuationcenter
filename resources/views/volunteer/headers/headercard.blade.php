
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">

    <div class="container-fluid">
        <div class="header-body">
              <!-- error handling -->
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible" role="alert" id="errorsuccess">
        <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-inner-text">{{$error}}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endforeach
    @endif
    @if(session('message'))
        <div class="alert alert-success alert-dismissible" role="alert" id="errorsuccess">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-inner-text">{{ session('message') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- /error handling -->
            <!-- Card stats -->
            <div class="row">
                <div class="col-sm ">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Evacuees</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$totalEvacuees}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                              
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm ">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Male</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$totalMale}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-male"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                              
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm ">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Female</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$totalFemale}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-female"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                              
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>
@push('js')
<script type="text/javascript">
    $('#errorsuccess').fadeOut(5000);
</script>
@endpush

