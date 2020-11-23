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
        {!! Form::open(['url' => 'admin/createAccount', 'method' => 'POST']) !!}
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
          {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
        </div>
        {!! Form::close() !!}
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
        {!! Form::open(['url' => 'admin/createAccount', 'method' => 'POST']) !!}
        <div class="modal-body">

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
          {{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>

<!-- / AccountEdit Modal -->





@push('js')
    <script>
        $(document).ready(function(){
            $('select[name="brgy_id"]').on('change', function(){
                let brgy_id = $(this).val();
                if(brgy_id) {
                   console.log(brgy_id);

                   $.ajax({
                        url: '/getEvacuation/'+brgy_id,
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



	function numbers(input) {

    var regex = /[^0-9]/g;
    input.value = input.value.replace(regex, "");
    }
    </script>
@endpush
