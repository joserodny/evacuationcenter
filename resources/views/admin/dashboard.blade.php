@extends('layouts.master')


@section('content')

   @include('admin.resources')
   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
            
                <div class="card-body">
                   @include('admin.tables.activeEvacueesTable')
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card shadow">
                
                <div class="card-body">
                    <!-- Chart -->
                   {!! $MaleFemale->container() !!}
                </div>
            </div>
        </div>
    </div>

        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Evacuation Center</h3>
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
                                    <th scope="col">Barangay</th>
                                    <th scope="col">Center</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            @foreach ($evacuation as $evacuations)
                            <tbody>
                                <tr>
                                    <th scope="row">
                                      {{$evacuations->barangay['barangay_name']}}
                                    </th>
                                    <td>
                                      {{$evacuations->evacuation_name}}
                                    </td>
                                    <td>
                                      <button class="btn btn-sm btn-primary btn-icon-only rounded-circle" type="button">
                                        <span class="btn-inner-icon"><i class="far fa-edit"></i></span>
                                      </button>
                                    </td>   
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Barangay</h3>
                            </div>
                            <div class="col text-right">
                               
                            </div>
                        </div>
                        @include('admin.tables.getbarangaytable')
                    </div>
                    
                </div>
            </div>
        </>
        <div class="mt-5">
        </div>
        @include('layouts.footer')
    </div>
@endsection

@push('js')
    <script src="{{ LarapexChart::cdn() }}"></script>
    {{-- {{ $chart->script() }} --}}
    {{ $MaleFemale->script() }}
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
