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
                      <div class="card-header border-0 ">
                        {{$headfam->first_name}} {{$headfam->middle_name}} {{$headfam->last_name}}, {{$headfam->suffix_name}}
                      </div>
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
                              <th scope="col" class="sort">Birthdate</th>
                              <th scope="col">
                                <button class="btn btn-info btn-icon-only" name="add" id="add-btn">
                                  <span class="btn-inner-icon"><i class="fas fa-plus"></i></span>
                                </button>
                            </th>
                            
                            </tr>
                          </thead>
                          <tbody class="list" id="familymember">
                         
                            <tr>
                             
                              <th>
                                <input name="moreFields[0][first_name]" class="form-control form-control-alternative has-danger"  type="text" placeholder="First Name" required/>
                              </th>
                              <td>
                                <input name="moreFields[0][middle_name]" class="form-control form-control-alternative has-danger"  type="text" placeholder="Middle Name (Optional)"/>
                              </td>
                              <td>
                                <input name="moreFields[0][last_name]" class="form-control form-control-alternative has-danger"  type="text" placeholder="Last Name" required/>
                              </td>
                              <td>
                                <input name="moreFields[0][suffix_name]" class="form-control form-control-alternative has-danger"  type="text" placeholder="Suffix Name (Optional)"/>
                              </td>
                              <td>
                                <select class="form-control form-control-alternative has-danger" name="moreFields[0][gender]" required>
                                  <option value="">Gender</option>
                                  <option>Male</option>
                                  <option>Female</option>
                                </select>
                              </td>
                              <td>
                                 <input name="moreFields[0][birthday]" class="form-control datepicker1" data-date-format='yyyy-mm-dd' placeholder="Select Birthday" type="date" required>
                               </td>
                              <td>
                                <input type="hidden" name="moreFields[0][head_id]" value="{{$headfam->id}}"> 
                              </td>
                             
                              
                            </tr>  
                          </tbody>
                        
                        </table>
                      </div>
                      <!-- Card footer -->
                      <div class="card-footer py-4">
                        <div class="card-header border-0 ">                    
                          <h3 class="mb-0"><button class="btn btn-success text-uppercase button-prevent-multiple-submits">Save</button></h3> 
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

<script type="text/javascript">
  var i = 0;
  $("#add-btn").click(function(){
  ++i;
  $("#familymember").append('<tr>'+
    '<td><input type="text" name="moreFields['+i+'][first_name]" placeholder="First Name" class="form-control form-control-alternative has-danger" required/></td>'+
    '<td><input type="text" name="moreFields['+i+'][middle_name]" placeholder="Middle Name (Optional)" class="form-control form-control-alternative has-danger" /></td>'+
    '<td><input type="text" name="moreFields['+i+'][last_name]" placeholder="Last Name" class="form-control form-control-alternative has-danger" required/></td>'+
    '<td><input type="text" name="moreFields['+i+'][suffix_name]" placeholder="Suffix Name (Optional)" class="form-control form-control-alternative has-danger"/></td>'+
    '<td>'+
      '<select name="moreFields['+i+'][gender]" class="form-control form-control-alternative has-danger" required >'+
        '<option value="">Select</option>'+
        '<option>Male</option><option>Female</option>'+
      '</select>'+
    '</td>'+
    '<td>'+
      '<input name="moreFields['+i+'][birthday]" class="form-control datepicker1" data-date-format="yyyy-mm-dd"  placeholder="Select Birthday" type="date" required>'+
    '</td>'+
    '<td><button type="button" class="btn btn-danger btn-icon-only remove-tr"><input type="hidden" name="moreFields['+i+'][head_id]" value="{{$headfam->id}}"><span class="btn-inner-icon"><i class="fas fa-minus"></i></span></button></td>'+
    '</tr>');
    $( function() {
        $( '.datepicker1' ).datepicker();
      } );
    });
  $(document).on('click', '.remove-tr', function(){  
  $(this).parents('tr').remove();
  });  
  </script>

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    <script>
      $( function() {
        $( '.datepicker1' ).datepicker();
      } );
    </script>
@endpush

