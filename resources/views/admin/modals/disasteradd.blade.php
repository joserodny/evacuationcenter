<!-- Disaster Modal -->

<div class="modal fade" id="adddisaster" tabindex="-1" role="dialog" aria-labelledby="adddisasterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adddisasterModalLabel">Add Disaster</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      {{--   {!! Form::open(['url' => 'admin/brgy', 'method' => 'POST']) !!} --}}

        <div class="modal-body">
            <div class="form-group">
                <label>Input Common Disaster, Ex. <span style="color: rgb(47, 0, 255);">Typhoon</span>, <span style="color: brown">Eartquake</span>, <span style="color: green">Landslide</span></label>

            </div>
            <div class="form-group">
                <input name="barangay_name" class="form-control form-control-alternative" placeholder="Disaster" type="text" />
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           {{--  {{Form::submit('Add', ['class' => 'btn btn-primary'])}} --}}
        </div>
       {{--  {!! Form::close() !!} --}}
      </div>
    </div>
  </div>



  <!-- / Disaster Model-->


  <script type="text/javascript"></script>
