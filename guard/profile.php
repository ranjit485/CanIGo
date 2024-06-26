  <!-- Modal -->
  <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profileModal">Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">
            <div class="mt-3 mb-4">
              <img src="<?php echo"../$_SESSION[ProfilePhoto]" ?>"
                class="rounded img-fluid" style="width: 100px;" />
            </div>
            <h4 class="mb-2"><?php echo"".$_SESSION["guard_firstname"]." ".$_SESSION["guard_lastname"].""; ?></h4>
            <p class="text-muted mb-4">
            <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">Student ID</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0"><?php echo"".$_SESSION["guard_id"].""; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Username</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo"".$_SESSION["guard_username"].""; ?></p>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
    </div>
