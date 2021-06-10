

    <!-- Card header -->
    <div class="card-header border-0">
      @if(empty($statId))
      <h3 class="mb-0"><button class="btn btn-primary text-uppercase" data-toggle="modal" data-target="#addconsti">Add Head of the family</button></h3> 
      @elseif ($statId->status_id == auth()->user()->id)
      <h3 class="mb-0"><a href="./familymember/{{$statId->id}}" class="btn btn-danger text-uppercase" >Add family member</a></h3>  
      @endif
    </div>
    <div class="col border-0">
    <div class="table-responsive ">
        <table class="table align-items-center table-flush dataTables_wrapper dt-bootstrap4 data-table" id="headFam">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="sort" data-sort="name">First Name</th>
              <th scope="col" class="sort" data-sort="name">Middle Name</th>
              <th scope="col" class="sort" data-sort="name">Last Name</th>
              <th scope="col" class="sort" data-sort="name">Suffix Name</th>
              <th scope="col" class="sort" data-sort="budget">Barangay</th>
              <th scope="col" class="sort" data-sort="status">Add Family Members</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
      
        <tbody class="list">
        
        </tbody>
      
        </table>
    </div>
  </div>


@push('js')
<script type="text/javascript">
  $(function () {
    
    $('#headFam').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('dashboard.familyhead') }}"
        },
        columns: [
            {data: 'first_name', name: 'first_name'},
            {data: 'middle_name', name: 'middle_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'suffix_name', name: 'suffix_name'},
            {data: 'barangay_name', name: 'barangay_name'},
            {data: 'addfam', name: 'addfam', orderable: false, searchable: true},
            {data: 'action', name: 'action', orderable: false, searchable: true},
        ]
    });
    
  });
</script>
@endpush





   {{-- <div class="card text-uppercase">
    <!-- Card header -->
    <div class="card-header border-0 bg-gradient-green">      
      
      <div class="row">
        <div class="col">
          @if(empty($statId))
          <h3 class="mb-0"><button class="btn btn-primary text-uppercase" data-toggle="modal" data-target="#addconsti">Add Head of the family</button></h3> 
          @elseif ($statId->status_id == auth()->user()->id)
          <h3 class="mb-0"><a href="./familymember/{{$statId->id}}" class="btn btn-danger text-uppercase" >Add family member</a></h3>  
          @endif
        
        </div>
        <div class="col">
          <form action="submit">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                </div>
            </div>
        </form>
        </div>
      </div>
   
    </div>
    <!-- Light table -->
    <div class="table-responsive">
      <table id="testTable" class="table align-items-center table-flush dataTables_wrapper dt-bootstrap4">
        <thead class="thead-light">
          <tr>
            <th scope="col" class="sort" data-sort="name">Full Name</th>
            <th scope="col" class="sort" data-sort="budget">Barangay</th>
            <th scope="col" class="sort" data-sort="status">Add Family Members</th>
            <th scope="col">Action</th>
           
          
          </tr>
        </thead>
        @foreach ($headfamily as $headfamilys)
   
        <tbody class="list">
          <tr>
            <th scope="row">
              {{$headfamilys->first_name}} 
              {{$headfamilys->middle_name}} 
              {{$headfamilys->last_name}}, 
              {{$headfamilys->suffix_name}}
             
              
              &nbsp;
             
              <a href="./familymember/edit/{{$headfamilys->head_id}}"
                class="btn btn-sm bg-blue btn-icon-only rounded-circle" style="color:white;">
                <i class="fas fa-edit"></i>
              </a>
          

            </th>
            <td class="budget">
              {{$headfamilys->barangay_name}}
            </td>
            <td>
              <a href="./familymember/{{$headfamilys->id}}" class="btn btn-warning" type="submit">
                <span class="btn-inner-icon">
                  <i class="fas fa-users"> <i class="fas fa-plus"></i></i>
                </span>
              </a>
             
            </td>
            <td>
             
              <button data-constituents_id="{{$headfamilys->head_id}}" class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#addevacuees">
                <span class="btn-inner--icon"><i class="fas fa-hospital-alt"></i></span>
                  <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
              </button>
            
        

            </td>
          
        
          </tr>  
        </tbody>
        @endforeach
      </table>
    </div>
    <!-- Card footer -->
    <div class="card-footer py-4">
      {{$headfamily->links('layouts.pagination')}}
    </div>
  </div> --}}