  <!-- Modal -->
  <div class="modal fade" id="leaveModal" tabindex="-1" role="dialog" aria-labelledby="leaveModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profileModal">Leave</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="card" style="border-radius: 15px;">
            <div class="card-body text-center">
              <div class="mt-3 mb-4">
                <img src="#" class="rounded img-fluid" id="studentProfile" style="width: 100px; height:120px" />
              </div>
              <h4 class="mb-2" id="studentName"></h4>
              <p class="text-muted mb-4" id="studentDepartment"></p>
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Type</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0" id="leaveType"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-4">
                      <p class="mb-0">Reson</p>
                    </div>
                    <div class="col-sm-8">
                      <p class="text-muted mb-0" id="leaveReson"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">From</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0" id="leaveStart"></p>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">To</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0" id="leaveEnd"></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0 m-2"> Teacher</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0" id="teacherStatus"></p>
                  </div>
                </div>
                <form action="hod_approve.php" method="post">
                  <input type="hidden" name="student_id" value="" id="studentId"> <!-- Replace "12345" with the actual student ID -->

                  <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>
                          <button class='btn btn-success' type="submit" name="action" value="approve">Approve</button>
                        </td>
                        <td>
                          <button class='btn btn-success' type="submit" name="action" value="reject">Reject</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>