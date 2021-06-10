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
                        <div class="tab-pane fade" id="tabs-icons-text-21" role="tabpanel1" aria-labelledby="tabs-icons-text-2-tab1">
                            @include('volunteer.tables.evacueesindividual')
                        </div>
                   
                    </div>
                </div>
            </div>   
        </div>
            {{-- <div class="card shadow">
                <div class="card-header border-0 bg-gradient-green">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0" style="color: white">Active Evacuees</h3>
                        </div>
                        <div class="col text-right sm col-5">
                         
                         
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input class="form-control searchData" placeholder="Search" type="text">
                                    </div>
                                </div>
                           
                            
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">full name</th>
                                <th scope="col">barangay</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        @foreach ($evacuees as $evacuee)
                            
                        
                        <tbody>
                            <tr>
                                <td scope="row">
                                    {{$evacuee->first_name}} 
                                    {{$evacuee->middle_name}} 
                                    {{$evacuee->last_name}}, 
                                    {{$evacuee->suffix_name}}
                                </td>
                                <td>
                                    {{$evacuee->barangay_name}}
                                </td>
                                <td>
                                   <a href="./evacuees/update/{{$evacuee->head_id}}"
                                         class="btn btn-sm btn-warning btn-icon-only rounded-circle update-confirm" style="color:white;">
                                    <i class="fas fa-sign-out-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="card-footer py-3">

                  </div>
            </div> --}}


            
        
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Social traffic</h3>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Referral</th>
                                <th scope="col">Visitors</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    Facebook
                                </th>
                                <td>
                                    1,480
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">60%</span>
                                        <div>
                                            <div class="progress">
                                            <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Facebook
                                </th>
                                <td>
                                    5,480
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">70%</span>
                                        <div>
                                            <div class="progress">
                                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Google
                                </th>
                                <td>
                                    4,807
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">80%</span>
                                        <div>
                                            <div class="progress">
                                            <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Instagram
                                </th>
                                <td>
                                    3,678
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">75%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    twitter
                                </th>
                                <td>
                                    2,645
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">30%</span>
                                        <div>
                                            <div class="progress">
                                            <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
    } ,500);
    setTimeout(function( ) { clearInterval( i ); }, 500);    
    </script>



<script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
