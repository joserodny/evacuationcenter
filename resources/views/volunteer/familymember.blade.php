@extends('layouts.master')


@section('content')
    @include('volunteer.headers.headercard')
    @include('volunteer.modals.constituents')

    <div class="container-fluid mt--7">
        <div class="row">
        <div class="col">

            <div class="d-flex flex-row-reverse text-white text-uppercase">
              <span>
                {{ auth()->user()->barangay['barangay_name'] }},
                {{ auth()->user()->evacuation['evacuation_name'] }}
              </span>
             </div>


            <!-- Tabs with icons -->
            <div class="mt-3"></div>
            <div class="card bg-default shadow">
              <form class="form-prevent-multiple-submits" action="{{route('familymember.update')}}" method="POST">
                @csrf
                @method('PUT')
                  <div class="card text-uppercase">
                      <!-- Card header -->
                    
                      <!-- Light table -->
                      <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col" class="sort">Fist Name</th>
                              <th scope="col" class="sort">Middle Name</th>
                              <th scope="col" class="sort">Last Name</th>
                              <th scope="col" class="sort">Suffix Name</th>
                              <th scope="col" class="sort">Gender</th>
                              <th scope="col" class="sort"></th>
                              <th scope="col" class="sort">Age</th>
                              <th scope="col">
                            
                                <a href="./remove/{{$id}}"
                                class="btn btn-danger btn-icon delete-all"  style="color:white;">
                                <i class="far fa-trash-alt"></i>
                                 </a>

                              </th>
                            </tr>
                          </thead>
                          @foreach ($familymember as $familymembers)
                              
                          
                          <tbody class="list" id="familymember">
                            <tr>
                              <th>
                                <input name="id[]" class="form-control form-control-alternative has-danger" type="hidden" value="{{$familymembers->id}}" required/>
                                <input name="first_name[]" class="form-control form-control-alternative has-danger"  type="text" placeholder="First Name" value="{{$familymembers->first_name}}" required/>
                              </th>
                              <td>
                                <input name="middle_name[]" class="form-control form-control-alternative has-danger"  type="text" placeholder="Middle Name (Optional)" value="{{$familymembers->middle_name}}"/>
                              </td>
                              <td>
                                <input name="last_name[]" class="form-control form-control-alternative has-danger"  type="text" placeholder="Last Name" value="{{$familymembers->last_name}}" required/>
                              </td>
                              <td>
                                <input name="suffix_name[]" class="form-control form-control-alternative has-danger"  type="text" placeholder="Suffix Name (Optional)"/>
                              </td>
                              <td>
                              
                                
                             
                                <select class="form-control form-control-alternative has-danger" name="gender[]" required>
                                  <option value="Male" @if($familymembers->gender == 'Male') selected @endif>Male</option>
                                  <option value="Female" @if($familymembers->gender == 'Female') selected @endif>Female</option>
                                  
                             
                              </td>
                              <td>
                               <input name="birthday[]" class="form-control form-control-alternative  datepicker" type="date" placeholder="Birthdate" >
                              
                              </td>
                              <td> <span>{{ $familymembers->birthday}}</span> </td>
                              <td>
                                 <a href="./delete/{{$familymembers->id}}" class="btn btn-warning btn-icon-only delete-confirm" style="color:white;">
                                  <i class="fas fa-minus"></i>
                                 </a>
                              </td>
                            </tr> 
                            
                              
                          </tbody>
                          @endforeach
                        </table>

                       
                      </div>
                      <!-- Card footer -->
                      
                      <div class="row justify-content-md-center">
                       
                        <div class="col-md-auto mt-2 mb-2">
                         <button class="btn btn-icon btn-warning" type="submit">
                            <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                              <span class="btn-inner--text">Update</span>
                          </button>
                        </div>
                       
                      </div>


                 

                    </div>
                </form>
            
            </div>
        </div>
      </div>
       <div class="mt-5"></div>
       @include('layouts.footer')
    </div>
@endsection
          
@push('js')


 
<script>
  $('.delete-confirm').on('click', function (event) {
      event.preventDefault();
      const url = $(this).attr('href');
      swal({
          title: 'Are you sure you want to remove this person?',
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

  $('.delete-all').on('click', function (event) {
      event.preventDefault();
      const url = $(this).attr('href');
      swal({
          title: 'Are you sure you want to remove all?',
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

  $(function(){
    $('.datepicker').datepicker();
  });
  
  </script>

@endpush

