@extends('layouts.master')


@section('content')
    @include('volunteer.headers.headercard')
  @include('volunteer.modals.constituents')
  @include('volunteer.modals.evacuees')

    <div class="container-fluid mt--7 bg-gradient-black">
        <div class="row">
        <div class="col">

            <div class="d-flex flex-row-reverse text-white text-uppercase">
              <span>
                {{ auth()->user()->barangay['barangay_name'] }},
                {{ auth()->user()->evacuation['evacuation_name'] }}

              </span>
             </div>

            <!-- Tabs with icons -->
            <div class="nav-wrapper">
              <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-users"></i> Constituents per family</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-user"></i> Constituents Individual</a>
                </li>
             
              </ul>
            </div>


            <div class="card shadow ">
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade active show" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                    <!-- constituents per family  -->
                      @include('volunteer.tables.familyhead')
                    <!-- / Constituents per family -->

                  </div>
                  <div class="tab-pane fade active active" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                  
                  <!-- constituents individual -->
                  @include('volunteer.tables.individual')
                  <!-- /Constituents individual -->
                  </div>
                </div>
            </div>



        
          </div>
      </div>


      <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab1" data-toggle="tab" href="#tabs-icons-text-11" role="tab" aria-controls="tabs-icons-text-11" aria-selected="true"><i class="fas fa-users"></i> Active Evacuees Head of the family</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab1" data-toggle="tab" href="#tabs-icons-text-21" role="tab" aria-controls="tabs-icons-text-21" aria-selected="false"><i class="fas fa-user"></i> Active Evacuees Individual</a>
                    </li>
                   
                </ul>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabs-icons-text-11" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab1">
                          @include('volunteer.tables.evacueeshead')
                        </div>
                        <div class="tab-pane fade active" id="tabs-icons-text-21" role="tabpanel1" aria-labelledby="tabs-icons-text-2-tab1">
                            @include('volunteer.tables.evacueesindividual')
                        </div>
                   
                    </div>
                </div>
            </div>   
        </div>
          
        
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header border-0"></div>
                {!! $chart->container() !!}
            </div>
        </div>

        

        
    </div> 

       <div class="mt-5"></div>
      @include('layouts.footer')
    </div>
@endsection


@push('js')
    <script>
    

    $('.disable').on('click', function (event){
      event.preventDefault();
      swal({
      icon: 'warning',
      title: 'Please add family member first!',
      text: '..',
      buttons: false,
      timer: 2500
    })
    });

    var i = setInterval(function(){
        document.getElementById("tabs-icons-text-2-tab").click();
        document.getElementById("tabs-icons-text-2-tab1").click();
    } ,500);
    setTimeout(function( ) { clearInterval( i ); }, 500);   

    
    
    
    </script>


<script src="{{ LarapexChart::cdn() }}"></script>
{{ $chart->script() }}

<script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
