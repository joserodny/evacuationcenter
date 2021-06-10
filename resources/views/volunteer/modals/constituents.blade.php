<!-- add head consti Modal -->

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
              <select class="form-control form-control-alternative has-danger" name="gender" required>
                <option value="">Gender</option>
                <option>Male</option>
                <option>Female</option>
                </select>
            </div>

            <div class="form-group">
              <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                  </div>
                  <input name="birthday" class="form-control datepicker" data-date-format='yyyy-mm-dd' id="datepicker" placeholder="Select Birthday" type="text">
              </div>
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
 
 
 
   <!-- / end head consti Modal-->

 <!-- add indi consti -->
 <div class="modal fade" id="addindi" tabindex="-1" role="dialog" aria-labelledby="addindiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addindiModalLabel">Add Individual</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form class="form-prevent-multiple-submits" action="{{route('dashboard.createindi')}}" method="POST">
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
           <select class="form-control form-control-alternative has-danger" name="gender" required>
             <option value="">Gender</option>
             <option>Male</option>
             <option>Female</option>
             </select>
         </div>

         <div class="form-group">
          <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
              </div>
              <input name="birthday" class="form-control datepicker" data-date-format='yyyy-mm-dd' id="datepicker1" placeholder="Select Birthday" type="text">
          </div>
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


 <!-- / end indi consti -->

   @push('js')
   <script>
    $( function() {
      $( "#datepicker" ).datepicker();
       $( "#datepicker1" ).datepicker();
    } );
    </script>
        

  @endpush