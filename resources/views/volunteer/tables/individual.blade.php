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
 
