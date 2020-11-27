<!-- AddAccount Modal -->
<div class="modal fade" id="addaccount" tabindex="-1" role="dialog" aria-labelledby="addaccountModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addaccountModalLabel">Add Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
     {{--    {!! Form::open(['url' => 'admin/createAccount', 'method' => 'POST']) !!} --}}
    <form action="{{route('account.create')}}" method="POST">
     @csrf
        <div class="modal-body">
             <div class="form-group">

                <select class="form-control form-control-alternative" name="brgy_id" id="barangay" required>
                 <option value="">- Select barangay -</option>
                    @foreach ($barangay as $barangays)
                <option value="{{$barangays->id}}">{{$barangays->barangay_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="evacuation_id" class="form-control form-control-alternative" id="evacuation" required>
                    <option value="">- Select Evacuation -</option>

                </select>
             </div>
             <div class="form-group">
                <select name="role" class="form-control form-control-alternative" required>
                    <option value="">- Select User Role -</option>
                    <option value="admin">ADMIN</option>
                    <option value="user">VOLUNTEER</option>
                </select>
             </div>
            <div class="form-group">
                <input name="name" class="form-control form-control-alternative" placeholder="Full Name" type="text" required/>
            </div>
            <div class="form-group">
                <input name="email" class="form-control form-control-alternative" placeholder="Email" type="email" required/>
            </div>
            <div class="form-group">
                <input name="number" class="form-control form-control-alternative" placeholder="09xxxxxxxxx" type="text" pattern="\d{11}" maxlength="11" onkeyup="numbers(this)" title="a mobile number consists of 11 digits" required/>
            </div>
            <div class="form-group">
                <h2>Default password: EvaVolunteer112</h2>
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

<!-- / AddAccount Modal -->

<!-- AccountEdit Modal -->
<div class="modal fade" id="accountedit" tabindex="-1" role="dialog" aria-labelledby="accounteditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="accounteditModalLabel">Edit Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form action="{{route('account.update')}}" method="POST">
        @method('patch')
        @csrf
        <div class="modal-body">
        <input id="user_id" type="hidden" name="user_id" value="">
            <div class="form-group">
                <input name="name" class="form-control form-control-alternative" placeholder="Full Name" type="text" id="name" required/>
            </div>
            <div class="form-group">
                <input name="email" class="form-control form-control-alternative" placeholder="Email" type="email" id="email" required/>
            </div>
            <div class="form-group">
                <input name="number" class="form-control form-control-alternative" placeholder="09xxxxxxxxx" type="text" id="number" pattern="\d{11}" maxlength="11" onkeyup="numbers(this)" title="a mobile number consists of 11 digits" required/>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>

<!-- / AccountEdit Modal -->





@push('js')
  <!-- dropdown -->
    <script>
        $(document).ready(function(){
            $('select[name="brgy_id"]').on('change', function(){
                let brgy_id = $(this).val();
                if(brgy_id) {
                   console.log(brgy_id);

                   $.ajax({
                        url: './account/getevacuation/'+brgy_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);

                            $('select[name="evacuation_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="evacuation_id"]')
                                    .append('<option value="'+key+'">'+value+'</option>')

                            });
                        }
                    });
                } else {
                    $('select[name="evacuation_id"]').empty();
                }

            });
        });

    </script>
    <!-- /dropdown -->
    <!-- regex number only-->
    <script type="text/javascript">
        function numbers(input) {
            var regex = /[^0-9]/g;
            input.value = input.value.replace(regex, "");
            }
    </script>
    <!-- /regex number only-->
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
