<!-- Addtyphoon Modal -->
<div class="modal fade" id="typhoonname" tabindex="-1" role="dialog" aria-labelledby="typhoonnameModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="typhoonnameModalLabel">Add Typhoon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form class="form-prevent-multiple-submits" action="{{route('typhoon.create')}}" method="POST">
     @csrf
        <div class="modal-body">
            <div class="form-group">
                <input name="typhoon_name" class="form-control form-control-alternative" placeholder="Typhoon name" type="text" required/>
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

<!-- / Addtyphoon Modal -->

<!-- Edittyphoon Modal -->
<div class="modal fade" id="typhoonedit" tabindex="-1" role="dialog" aria-labelledby="typhooneditModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="typhooneditModalLabel">Edit Typhoon name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <form class="form-prevent-multiple-submits" action="{{route('typhoon.update')}}" method="POST">
   @method('patch')
   @csrf
      <div class="modal-body">
          <div class="form-group">
              <input type="hidden" name="id" id="typhoon_id" value="">
              <input name="typhoon_name" id="name" class="form-control form-control-alternative" placeholder="Typhoon name" type="text" required/>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary button-prevent-multiple-submits">Save Changes</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!-- / Addtyphoon Modal -->




@push('js')
    <!-- editmodal -->
    <script type="text/javascript">
    $('#typhoonedit').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') 
        var name = button.data('name') 
      
        var modal = $(this)
        modal.find('.modal-body #typhoon_id').val(id) 
        modal.find('.modal-body #name').val(name) 
       
        });
    </script>
    <!-- /editmodal -->
@endpush
