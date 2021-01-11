<!-- add consti Modal -->

<div class="modal fade" id="addconsti" tabindex="-1" role="dialog" aria-labelledby="addconstiModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addconstiModalLabel">Head of the Familiy</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
     <form class="form-prevent-multiple-submits" action="{{route('dashboard.create')}}" method="POST">
         @csrf
         <div class="modal-body">
             <div class="form-group">
                 <input name="first_name" class="form-control form-control-alternative has-danger" placeholder="First Name" type="text" required/>
             </div>

             <div class="form-group">
              <input name="middle_name" class="form-control form-control-alternative has-danger" placeholder="Middle Name (Optional)" type="text"/>
             </div>

             <div class="form-group">
              <input name="last_name" class="form-control form-control-alternative has-danger" placeholder="Last Name" type="text" required/>
            </div>

            <div class="form-group">
              <input name="suffix_name" class="form-control form-control-alternative has-danger" placeholder="Suffix Name (Optional)" type="text" />
            </div>

            <div class="form-group">
              <select class="form-control form-control-alternative has-danger" name="gender" required/>
                <option value="">Gender</option>
                <option>Male</option>
                <option>Female</option>
                </select>
            </div>

            <div class="form-group">
              <input name="age" class="form-control form-control-alternative has-danger" placeholder="age" type="text" onkeyup="numbers(this)" required/>
            </div>

         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary button-prevent-multiple-submits">Add</button>
         </div>
     </form>
       </div>
     </div>
   </div>
 
 
 
   <!-- / add consti Model-->

   @push('js')
     <!-- regex number only-->
     <script type="text/javascript">
      function numbers(input) {
          var regex = /[^0-9]/g;
          input.value = input.value.replace(regex, "");
          }
     </script>
    <!-- /regex number only-->

  @endpush