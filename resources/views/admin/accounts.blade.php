@extends('layouts.master')


@section('content')
<!-- modals -->
@include('admin.resources')
@include('admin.modals.addaccount')
<!-- end modals -->
    <div class="container-fluid mt--7">
        div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0"><button class="btn btn-success" data-toggle="modal" data-target="#addaccount">Add Account</button></h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Barangay</th>
                    <th>Evacuation Center</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>

                    <th></th>
                  </tr>
                </thead>
                @foreach ($user as $users)
                <tbody class="list">
                  <tr>
                    <th>
                        {{$users->barangay_name}}
                    </th>
                    <th>
                        {{$users->evacuation_name}}
                    </th>
                    <th>
                        {{$users->name}}
                    </th>
                    <td>
                        {{$users->email}}
                    </td>
                    <td>
                        {{$users->number}}
                    </td>
                    <td>
                      <div class="d-flex">
                        <div>

                        <button class="btn btn-info" data-toggle="modal" data-target="#accountedit"><i class="fas fa-user-edit"></i></button>
                         <button class="btn btn-danger"><i class="fas fa-user-minus"></i></button>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
