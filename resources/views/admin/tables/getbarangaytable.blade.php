<table class="table align-items-center table-flush" id="getBrgy">
     <thead class="thead-light">
         <tr>
             <th scope="col">Barangay</th>
             <th scope="col">Action</th>
          </tr>
     </thead>
  
     <tbody>
         
     </tbody>
  
 </table>



  
@push('js')
<script type="text/javascript">
  $(function () {
    
    $('#getBrgy').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('dashboard.getBrgy') }}"
        },
        columns: [
            {data: 'barangay_name', name: 'barangay_name'},
            {data: 'action', name: 'action'},
           

        ]
    });
    
  });


 
</script>
@endpush