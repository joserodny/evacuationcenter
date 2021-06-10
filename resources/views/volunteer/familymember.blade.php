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
              <form class="form-prevent-multiple-submits" action="{{route('familymember.store')}}" method="POST">
                @csrf
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
                                <input name="moreFields[0][first_name]" class="form-control form-control-alternative has-danger"  type="text" placeholder="First Name" value="{{$familymembers->first_name}}" required/>
                              </th>
                              <td>
                                <input name="moreFields[0][middle_name]" class="form-control form-control-alternative has-danger"  type="text" placeholder="Middle Name (Optional)" value="{{$familymembers->middle_name}}"/>
                              </td>
                              <td>
                                <input name="moreFields[0][last_name]" class="form-control form-control-alternative has-danger"  type="text" placeholder="Last Name" value="{{$familymembers->last_name}}" required/>
                              </td>
                              <td>
                                <input name="moreFields[0][suffix_name]" class="form-control form-control-alternative has-danger"  type="text" placeholder="Suffix Name (Optional)"/>
                              </td>
                              <td>
                                <span>{{$familymembers->gender}}</span>
                              </td>
                              <td>
                               <input name="moreFields[0][age]" class="form-control form-control-alternative has-danger" onkeyup="numbers(this)" type="text" placeholder="Age" value="{{$familymembers->age}}" required/>
                               
                              </td>
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
  </script>


@endpush

