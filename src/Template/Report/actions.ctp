<form class="form-horizontal" role="form" method="post">
<div class="form-group">
  <label class="control-label col-sm-2" for="status">Status :</label>
  <div class="col-sm-8">
    <select class="form-control" id="status" name="status">
        <option value="">Select status</option>
        <option value="Accepted">Accepted</option>
        <option value="Not Accepted">Not Accepted</option>
      </select>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="reason">Reason :</label>
  <div class="col-sm-8">          
    <input type="text" class="form-control" id="reason" name="reason" placeholder="Enter Reason (if unaccepted)">
  </div>
</div>
<div class="form-group">        
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-default">Submit</button>
  </div>
</div>
</form>