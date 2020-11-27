@extends('layouts.master')


@section('content')
<!-- modals -->
@include('admin.resources')
@include('admin.modals.account')
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
                  {{$users->barangay['barangay_name']}}
                    </th>
                    <th>
                        {{$users->evacuation['evacuation_name']}}
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

                        <button class="btn btn-info" data-user_id="{{$users->id}}" data-name="{{$users->name}}" data-email="{{$users->email}}" data-number="{{$users->number}}" data-toggle="modal" data-target="#accountedit"><i class="fas fa-user-edit"></i></button>
                        <a href="./account/delete/{{$users->id}}" class="btn btn-danger delete-confirm" style="color:white;"><i class="fas fa-user-minus"></i></a>

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
                {{$user->links('admin.pagination')}}
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid mt-9"></div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script>
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
            dangerMode:true,
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
    </script>


@endpush
