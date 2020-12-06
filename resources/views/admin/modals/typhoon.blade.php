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
     {{--    {!! Form::open(['url' => 'admin/createAccount', 'method' => 'POST']) !!} --}}
    <form action="{{route('typhoon.create')}}" method="POST">
     @csrf
        <div class="modal-body">
            <div class="form-group">
                <input name="typhoon_name" class="form-control form-control-alternative" placeholder="Typhoon name" type="text" required/>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
      </div>
    </div>
  </div>

<!-- / Addtyphoon Modal -->






@push('js')
    <!-- editmodal -->
    <script type="text/javascript">
    $('#accountedit').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var user_id = button.data('user_id') // user_id data button
        var name = button.data('name') // name databuttonedit
        var email = button.data('email') // email data button
        var number = button.data('number') // number data button

        var modal = $(this)
        modal.find('.modal-body #user_id').val(user_id) //input user_id id
        modal.find('.modal-body #name').val(name) //input name id
        modal.find('.modal-body #email').val(email) //input email id
        modal.find('.modal-body #number').val(number) //input number id
        });
    </script>
    <!-- /editmodal -->
@endpush
