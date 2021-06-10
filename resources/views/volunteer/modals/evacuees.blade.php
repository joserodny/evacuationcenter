  <!-- add evacuees area -->


  <div class="modal fade" id="addevacuees" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
     <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
         <div class="modal-content bg-gradient-danger">
           
             
             <div class="modal-header">
               <h5 class="modal-title" id="modal-notification">Evacuation Center</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <form class="form-prevent-multiple-submits" action="{{route('evacuees.store')}}" method="POST">
                  @csrf
             <div class="modal-body">
               
                 <div class="py-3 text-center">
                     <i class="fas fa-hospital ni-3x"></i>
                     <h4 class="heading mt-4">Is this person and his family members are already at designated evacuation area</h4>
                     <div class="form-group">
                      <input type="text" id="constituents_id" name="constituents_id" value="">
                       <select class="form-control form-control-alternative has-danger" name="typhoon_id" required>
                         <option value="">Select Typhoon Name</option>
                         @foreach ($typhoon as $typhoons)
                         <option value="{{$typhoons->id}}">{{$typhoons->typhoon_name}}</option>
                         @endforeach
                       </select>
                    
                     </div>
                 </div>
                 
             </div>
             
             <div class="modal-footer">
                 <button type="submit" class="btn btn-white button-prevent-multiple-submits">Yes</button>
                 <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
             </div>
           </form>
         </div>
     </div>
     </div>


        <!-- /add evacuees area -->

        @push('js')
            <!-- editmodal -->
    <script type="text/javascript">
     $('#addevacuees').on('show.bs.modal', function (event) {
 
         var button = $(event.relatedTarget) // Button that triggered the modal
         var constituents_id = button.data('constituents_id') // constituents_id data button
       
         var modal = $(this)
         modal.find('.modal-body #constituents_id').val(constituents_id) //input constituents_id id
        
         });
     </script>
     <!-- /editmodal -->
     @endpush