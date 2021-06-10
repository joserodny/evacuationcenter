@include('volunteer.modals.indiedit')
<!-- Card header -->
<div class="card-header border-0 test">
  <button class="btn btn-primary text-uppercase" data-toggle="modal" data-target="#addindi"> Add Individual</button>
</div>
<div class="col border-0">
<div class="table-responsive ">
    <table class="table align-items-center table-flush dataTables_wrapper dt-bootstrap4 data-table" id="individual">
      <thead class="thead-light">
        <tr>
          <th scope="col" class="sort" data-sort="name">First Name</th>
          <th scope="col" class="sort" data-sort="name">Middle Name</th>
          <th scope="col" class="sort" data-sort="name">Last Name</th>
          <th scope="col" class="sort" data-sort="name">Suffix Name</th>
          <th scope="col" class="sort" data-sort="name">Barangay</th>
          <th scope="col" class="sort" data-sort="name"></th>
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
     
     $('#individual').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
           url: "{{ route('dashboard.individual') }}"
         },
         columns: [
             {data: 'first_name', name: 'first_name'},
             {data: 'middle_name', name: 'middle_name'},
             {data: 'last_name', name: 'last_name'},
             {data: 'suffix_name', name: 'suffix_name'},
             {data: 'barangay_name', name: 'barangay_name'},
             {data: 'hidden', name: 'hidden', orderable: false, searchable: true},
             {data: 'action', name: 'action', orderable: false, searchable: true},
           
         ]
     });
     
   });


   
 </script>
 @endpush
 

   
{{-- 

   <div class="card">
     <!-- Card header -->
     <div class="card-header border-0 bg-gradient-green">      
         
       <div class="row">
         <div class="col">                       
           <h3 class="mb-0"><button class="btn btn-primary text-uppercase" data-toggle="modal" data-target="#addindi"> Add Individual</button></h3> 
         </div>
         <div class="col">
           
             <div class="form-group mb-0">
                 <div class="input-group input-group-alternative">
                     <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fas fa-search"></i></span>
                     </div>
                     <input type="text" class="form-control searchData" placeholder="Search" name="search" id="search">
                 </div>
             </div>
        
         </div>
       </div>
    
     </div>

     <!-- Light table -->
     

     <div class="table-responsive">
       <table id="example" class="table align-items-center table-flush">
         <thead class="thead-light">
           <tr>
             <th scope="col" class="sort" data-sort="name">Full Name</th>
             <th scope="col" class="sort" data-sort="budget">Barangay</th>
          
             <th scope="col">Action</th>
           
           </tr>
         </thead>

         @foreach ($individual as $individuals)
             
        
         <tbody class="list">
           <tr>
             <th scope="row">
               {{$individuals->first_name}} 
               {{$individuals->middle_name}} 
               {{$individuals->last_name}}, 
               {{$individuals->suffix_name}}
             </th>
             <td class="budget">
               {{$individuals->barangay_name}}
             </td>
           
             <td>
               <button data-constituents_id="{{$individuals->id}}" class="btn btn-icon btn-primary " type="button" data-toggle="modal" data-target="#addevacuees">
                 <span class="btn-inner--icon"><i class="fas fa-hospital-alt"></i></span>
                   <span class="btn-inner--text"><i class="fas fa-plus"></i></span>
               </button>
             </td>
         
           </tr>  
         </tbody>
         @endforeach
       </table>
     </div>
     <!-- Card footer -->
    



   </div> --}}