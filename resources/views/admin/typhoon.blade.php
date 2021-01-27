@extends('layouts.master')


@section('content')
<!-- modals -->
@include('admin.resources')
@include('admin.modals.typhoon')
<!-- end modals -->
    <div class="container-fluid mt--7">
        div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0"><button class="btn btn-success" data-toggle="modal" data-target="#typhoonname">Add</button></h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                   
                  </tr>
                </thead>
               @foreach ($typhoon as $typhoons)
                <tbody class="list">
                  <tr>
                  <th>{{$typhoons->typhoon_name}}</th>

                    <th>
                    @if($typhoons->status == 1) 
                    <span class="badge badge-pill badge-success">Inside PAR</span>
                    @elseif($typhoons->status == 0)
                    <span class="badge badge-pill badge-warning">Outside PAR</span>    
                    @endif
                    </th>

                    <th>{{$typhoons->created_at->format('M d, Y')}}</th>
                
                    <td>
                      <div class="d-flex">
                        <div>
                          @if($typhoons->status == 1) 
                         <a href="./typhoon/update/{{$typhoons->id}}" class="btn btn-success btn-icon-only delete-update" style="color:white;"><i class="fas fa-minus-circle"></i></a>
                         @elseif($typhoons->status == 0)
                         <a href="./typhoon/delete/{{$typhoons->id}}" class="btn btn-danger btn-icon-only delete-confirm" style="color:white;"><i class="far fa-times-circle"></i></a> 
                         @endif
                         <button class="btn btn-info btn-icon-only" data-id="{{$typhoons->id}}" data-name="{{$typhoons->typhoon_name}}" data-toggle="modal" data-target="#typhoonedit"><i class="fas fa-user-edit"></i></button>
                       
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
               {{$typhoon->links('layouts.pagination')}}
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid mt-9"></div>
      
    </div>
@endsection

@push('js')
    <script>
    $('.delete-update').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: 'This typhoon it`s already outside in\n Philippine Area of Responsibility?',
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
