  
  <div class="modal fade" id="addacc" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Rooms</h4>
        </div>

        <div class="modal-body">
            <div>
    <div class='table-responsive'>

    <table class="table">
    <form method = "POST" action="addAccounts.php">
      
    <tr>
      <th>UserName:</th>
      <td><input class = 'form-control' type='text' name='username'/></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><input class = 'form-control' type='text' name='password'/></td>
    </tr>
    <tr>
      <th>FullName:</th>
      <td><input class = 'form-control' type='text' name='fullname'/></td>
    </tr>
    <tr>
      <th>ContactNo:</th>
      <td><input class = 'form-control' type='text' name='contactno' onkeypress="return restrictCharacters(this, event, phoneOnly);"/></td>
    </tr>
    <tr>
      <th>UserType:</th>
      <td>
        <select  class='form-control'  name = 'usertype'>
        <option value = '#' selected hidden></option>
          <option value = 'Admin'>Admin</option>
          <option value = 'Frontdesk'>Frontdesk</option>
            </select>
          </td>
    </tr>
    </table>
    </div>
    </div>
    </div>        
        <div class="modal-footer">
          <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
           <input type="submit" name="adds" data-toggle='modal' class='btn btn-success' value="Confirm">
         </form>
        </div>
      </div>
    </div>
  </div>
</div>