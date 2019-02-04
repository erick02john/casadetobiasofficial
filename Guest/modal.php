<!-- edituser -->
<div class="modal fade" id="editname" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit name</h4>
        </div>

        <div class="modal-body">
            <div>
    <div class='table-responsive'>
    <table class="table">
    <form method = "POST" action="updateguestinfo.php">
      <input type='hidden' name = 'guestid' <?php echo "value='{$info['GuestId']}'"; ?>>
      <tr>
        <th>First</th>
        <td><input class = 'form-control' type='text' name='fName' align='middle' <?php echo "value='{$info['GuestFName']}'"; ?>  /></td>
      </tr>
      <tr>
        <th>Middle</th>
        <td><input class = 'form-control' type='text' name='mName' align='middle' <?php echo "value='{$info['GuestMName']}'"; ?>  /></td>
      </tr>
      <tr>
        <th>Last</th>
        <td><input class = 'form-control' type='text' name='lName' align='middle' <?php echo "value='{$info['GuestLName']}'"; ?>  /></td>
      </tr>
      <tr>
        <th>Password</th>
        <td><input class = 'form-control' type='password' name='password' align='middle' REQUIRED/></td>
      </tr>
    </tr>
    </table>
    </div>
    </div>
    </div>        
        <div class='modal-footer'>
        <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
    <a href='#areyousure' data-toggle='modal' class='btn btn-success' >Update</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class='modal fade' id='areyousure' role='dialog' style='z-index: 9998'>
            <div class='modal-dialog modal-sm'>
              <div class='modal-content'>
                <div class='modal-body'>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Cancel'><span aria-hidden='true'>&times;</span></button>
                  <h4 align='center'><i class='glyphicon glyphicon-question-sign'></i> Are you sure you want to update?</h4>
                </div>
                <div class='modal-footer'>
                    <a class='btn btn-default' data-dismiss='modal'>NO</a>
                    <input type='submit' class='btn btn-warning' name='updatename' value='YES' />
                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>



<!-- editaddress -->
<div class="modal fade" id="editadd" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit address</h4>
        </div>

        <div class="modal-body">
            <div>
    <div class='table-responsive'>
    <table class="table">
    <form method = "POST" action="updateguestinfo.php">
      <input type='hidden' name = 'guestid' <?php echo "value='{$info['GuestId']}'"; ?>>
      <tr>
        <th>Address</th>
        <td><input class = 'form-control' type='text' name='address' align='middle' <?php echo "value='$add'"; ?>  REQUIRED /></td>
      </tr>
        <th>Password</th>
        <td><input class = 'form-control' type='password' name='password' align='middle' REQUIRED/></td>
      </tr>
    </tr>
    </table>
    </div>
    </div>
    </div>        
        <div class='modal-footer'>
        <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
    <a href='#areyousureadd' data-toggle='modal' class='btn btn-success' >Update</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class='modal fade' id='areyousureadd' role='dialog' style='z-index: 9998'>
            <div class='modal-dialog modal-sm'>
              <div class='modal-content'>
                <div class='modal-body'>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Cancel'><span aria-hidden='true'>&times;</span></button>
                  <h4 align='center'><i class='glyphicon glyphicon-question-sign'></i> Are you sure you want to update?</h4>
                </div>
                <div class='modal-footer'>
                    <a class='btn btn-default' data-dismiss='modal'>NO</a>
                    <input type='submit' class='btn btn-warning' name='updateadd' value='YES' />
                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>


<!-- editaddress -->
<div class="modal fade" id="editnumber" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit ContactNumber</h4>
        </div>

        <div class="modal-body">
            <div>
    <div class='table-responsive'>
    <table class="table">
    <form method = "POST" action="updateguestinfo.php">
      <input type='hidden' name = 'guestid' <?php echo "value='{$info['GuestId']}'"; ?>>
      <tr>
        <th>Number</th>
        <td><input class = 'form-control' type='text' name='number' align='middle' maxlength="15"  <?php echo "value='{$info['ContactNumber']}'"; ?>  onkeypress='return restrictCharacters(this, event, phoneOnly);' REQUIRED /></td>
      </tr>
        <th>Password</th>
        <td><input class = 'form-control' type='password' name='password' align='middle' REQUIRED /></td>
      </tr>
    </tr>
    </table>
    </div>
    </div>
    </div>        
        <div class='modal-footer'>
        <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
        <a href='#areyousurenumber' data-toggle='modal' class='btn btn-success' >Update</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class='modal fade' id='areyousurenumber' role='dialog' style='z-index: 9998'>
            <div class='modal-dialog modal-sm'>
              <div class='modal-content'>
                <div class='modal-body'>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Cancel'><span aria-hidden='true'>&times;</span></button>
                  <h4 align='center'><i class='glyphicon glyphicon-question-sign'></i> Are you sure you want to update?</h4>
                </div>
                <div class='modal-footer'>
                    <a class='btn btn-default' data-dismiss='modal'>NO</a>
                    <input type='submit' class='btn btn-warning' name='updatenumber' value='YES' />
                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>

<!-- editpassword -->
<div class="modal fade" id="editpassword" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit password</h4>
        </div>

        <div class="modal-body">
            <div>
    <div class='table-responsive'>
    <table class="table">
    <form method = "POST" action="updateguestinfo.php">
      <input type='hidden' name = 'guestid' <?php echo "value='{$info['GuestId']}'"; ?>>
      <tr>
        <th>Current</th>
        <td><input class = 'form-control' type='password' name='password' align='middle' REQUIRED /></td>
      </tr>
      <tr>
        <th>New</th>
        <td><input class = 'form-control' type='password' name='newpassword' align='middle' REQUIRED /><td>
      </tr>
       <tr>
        <th>Retype New</th>
        <td><input class = 'form-control' type='password' name='rnewpassword' align='middle' REQUIRED /><td>
      </tr>
    </tr>
    </table>
    </div>
    </div>
    </div>        
        <div class='modal-footer'>
        <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
        <a href='#areyousurepassword' data-toggle='modal' class='btn btn-success' >Update</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class='modal fade' id='areyousurepassword' role='dialog' style='z-index: 9998'>
            <div class='modal-dialog modal-sm'>
              <div class='modal-content'>
                <div class='modal-body'>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Cancel'><span aria-hidden='true'>&times;</span></button>
                  <h4 align='center'><i class='glyphicon glyphicon-question-sign'></i> Are you sure you want to update?</h4>
                </div>
                <div class='modal-footer'>
                    <a class='btn btn-default' data-dismiss='modal'>NO</a>
                    <input type='submit' class='btn btn-warning' name='updatepassword' value='YES' />
                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>

<!-- editpass -->
<div class="modal fade" id="editemail" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Email</h4>
        </div>

        <div class="modal-body">
            <div>
    <div class='table-responsive'>
    <table class="table">
    <form method = "POST" action="updateguestinfo.php">
      <input type='hidden' name = 'guestid' <?php echo "value='{$info['GuestId']}'"; ?>>
      <tr>
        <th>Email</th>
        <td><input class = 'form-control' type='text' name='email' align='middle' maxlength="15"  <?php echo "value='{$info['Email']}'"; ?>  onkeypress='return restrictCharacters(this, event, phoneOnly);' REQUIRED /></td>
      </tr>
        <th>Password</th>
        <td><input class = 'form-control' type='password' name='password' align='middle' REQUIRED /></td>
      </tr>
    </tr>
    </table>
    </div>
    </div>
    </div>        
        <div class='modal-footer'>
        <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
        <a href='#areyousureEmail' data-toggle='modal' class='btn btn-success' >Update</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class='modal fade' id='areyousureEmail' role='dialog' style='z-index: 9998'>
            <div class='modal-dialog modal-sm'>
              <div class='modal-content'>
                <div class='modal-body'>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Cancel'><span aria-hidden='true'>&times;</span></button>
                  <h4 align='center'><i class='glyphicon glyphicon-question-sign'></i> Are you sure you want to update?</h4>
                </div>
                <div class='modal-footer'>
                    <a class='btn btn-default' data-dismiss='modal'>NO</a>
                    <input type='submit' class='btn btn-warning' name='updateEmail' value='YES' />
                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>