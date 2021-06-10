  <!-- add evacuees area -->
<div class="modal fade" id="editIndi" tabindex="-1" role="dialog" aria-labelledby="addconstiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addconstiModalLabel">Edit Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form class="form-prevent-multiple-submits" action="{{route('individual.update')}}" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control form-control-alternative" id="id" name="id" value="">
              <input name="first_name" class="form-control form-control-alternative has-danger" id="first_name" placeholder="First Name" type="text" required/>
          </div>

          <div class="form-group">
           <input name="middle_name" class="form-control form-control-alternative has-danger"  id="middle_name" placeholder="Middle Name (Optional)" type="text"/>
          </div>

          <div class="form-group">
           <input name="last_name" class="form-control form-control-alternative has-danger"  id="last_name" placeholder="Last Name" type="text" required/>
         </div>

         <div class="form-group">
           <input name="suffix_name" class="form-control form-control-alternative has-danger" id="suffix_name" placeholder="Suffix Name (Optional)" type="text" />
         </div>

         <div class="form-group">
           <select class="form-control form-control-alternative has-danger" id="gender" name="gender" required>
             <option value="">Gender</option>
             <option>Male</option>
             <option>Female</option>
             </select>
         </div>
      </div>
      
         
      
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary button-prevent-multiple-submits">Update</button>
      </div>
  </form>
      </div>
  </div>
</div>


     

     
        <!-- /add evacuees area -->

        @push('js')
            <!-- editmodal -->
    <script type="text/javascript">
      $( function() {
         $("#datepicker2").datepicker();
         });  
     $('#editIndi').on('show.bs.modal', function (event) {
 
         var button = $(event.relatedTarget) // Button that triggered the modal
         var id = button.data('id') // constituents_id data button
         var first_name = button.data('first_name') 
         var middle_name = button.data('middle_name') 
         var last_name = button.data('last_name') 
         var suffix_name = button.data('suffix_name') 
         var gender = button.data('gender') 
         var birthday = button.data('birthday') 
         var modal = $(this)
         modal.find('.modal-body #id').val(id) //input constituents_id id
         modal.find('.modal-body #first_name').val(first_name)
         modal.find('.modal-body #middle_name').val(middle_name)
         modal.find('.modal-body #last_name').val(last_name)
         modal.find('.modal-body #suffix_name').val(suffix_name)
         modal.find('.modal-body #gender').val(gender)
         modal.find('.modal-body #datepicker2').val(birthday)
         });


       
     </script>
     <!-- /editmodal --> 
     @endpush

     