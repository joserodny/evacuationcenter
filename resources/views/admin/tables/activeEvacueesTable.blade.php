<table class="table align-items-center table-flush" id="getEvacuees">
     <thead class="thead-light">
         <tr>
             <th scope="col">Barangay</th>
             <th scope="col">Evacuation Center</th>
             <th scope="col">Total Families</th>
             <th scope="col">Total Individual</th>
             <th scope="col">Infant</th>
             <th scope="col">Child</th>
             <th scope="col">Adult</th>
             <th scope="col">Senior</th>
            
         </tr>
     </thead>
  
     <tbody>
         
     </tbody>
  
 </table>



  
@push('js')
<script type="text/javascript">
  $(function () {
    
    $('#getEvacuees').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('dashboard.getEvacuees') }}"
        },
        columns: [
            {data: 'barangay_name', name: 'barangay_name'},
            {data: 'evacuation_name', name: 'evacuation_name'},
            {data: 'family', name: 'family'},
            {data: 'individual', name: 'individual'},
            {data: 'infant', name: 'infant'},
            {data: 'child', name: 'child'},
            {data: 'adult', name: 'adult'},
            {data: 'senior', name: 'senior'}

        ]
    });
    
  });


 
</script>
@endpush