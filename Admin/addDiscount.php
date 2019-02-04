

<div class="modal fade" id="addDiscount" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Discount</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div>
              <div class="table-responsive">
                  <table class="display table" style="border: none;">
                    <form method = "POST" action="updatediscount.php">
                      <tr>
                        <th>Discount Type:</th>
                        <td><input class="form-control" type="text" name="dt" onkeypress="return restrictCharacters(this, event, phoneOnly);" autocomplete="off"/></td>
                      </tr>
                      <tr>
                        <th>Discount Percent:</th>
                        <td><input class='form-control' type="text" name="dp" onkeypress="return restrictCharacters(this, event, integerOnly);" autocomplete="off"/></td>
                      </tr>
                  </table>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <a class='btn btn-default' data-dismiss='modal'/>Cancel</a>
           <input type="submit" name="add" data-toggle='modal' class='btn btn-success' value="Confirm">
         </form>
        </div>
      </div>
    </div>
  </div>