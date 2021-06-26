<div class="card border-0">
     
     <div class="table-responsive">
         <!-- Projects table -->
         <table class="table align-items-center table-flush" id="evacueesindi">
             <thead class="thead-light">
                 <tr>
                    <th scope="col" class="sort" data-sort="name">First Name</th>
                    <th scope="col" class="sort" data-sort="name">Middle Name</th>
                    <th scope="col" class="sort" data-sort="name">Last Name</th>
                    <th scope="col" class="sort" data-sort="name">Suffix Name</th>
                    <th scope="col" class="sort" data-sort="name">Barangay</th>
                    <th scope="col">action</th>
                 </tr>
             </thead>
            
                 
             
             <tbody>
              
             </tbody>
          
         </table>
     </div>
 </div>


 
@push('js')
<script type="text/javascript">
  $(function () {
    
    $('#evacueesindi').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('dashboard.evacueesindi') }}"
        },
        columns: [
            {data: 'first_name', name: 'first_name'},
            {data: 'middle_name', name: 'middle_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'suffix_name', name: 'suffix_name'},
            {data: 'barangay_name', name: 'barangay_name'},
            {data: 'action', name: 'action', orderable: false, searchable: true},
        ]
    });
    
  });


 
</script>
@endpush