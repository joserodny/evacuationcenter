<!-- Barangay Modal -->

<div class="modal fade" id="addbarangay" tabindex="-1" role="dialog" aria-labelledby="barangayModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="barangayModalLabel">Add Barangay</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form class="form-prevent-multiple-submits" action="{{route('dashboard.brgy')}}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <input name="barangay_name" class="form-control form-control-alternative has-danger" placeholder="Barangay Area" type="text" required/>
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



  <!-- / Barangay Model-->



  <!-- Evacuation Modal -->
<div class="modal fade" id="addevacuation" tabindex="-1" role="dialog" aria-labelledby="evacuationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="evacuationModalLabel">Add Evacuation Center</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
     <form class="form-prevent-multiple-submits" action="{{route('dashboard.evacuation')}}" method="POST">
           @csrf
        <div class="modal-body">
            <div class="form-group">

                <select class="form-control form-control-alternative" name="brgy_id" required>
             <option value="">- Select barangay -</option>
                @foreach($barangay as $brgys)
                <option value="{{ $brgys->id }}">{{ $brgys->barangay_name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <input name="evacuation_name" class="form-control form-control-alternative" placeholder="Evacuation name" type="text" required/>
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


<!-- / Evacuation Modal -->
