<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="#" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Pattern</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="inputstringnow">Input Pattern</label>
            <input type="text" class="form-control" id="inputstringnow" name="actionValue" placeholder="Input String" minlength="2" maxlength="253">
          </div>
	<div class="form-check">
	  <input class="form-check-input" type="radio" name="searchOptions" id="flexRadioDefault1" checked value="0">
	  <label class="form-check-label" for="flexRadioDefault1">
	    Anywhere in Domain Name
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="radio" name="searchOptions" id="flexRadioDefault2" value="1">
	  <label class="form-check-label" for="flexRadioDefault2">
	    Domain Name Ends With
	  </label>
	</div>

	<div class="form-check">
	  <input class="form-check-input" type="radio" name="searchOptions" id="flexRadioDefault3" value="2">        
	  <label class="form-check-label" for="flexRadioDefault3">
	    Domain Name Begins With        
	  </label>
	</div>  

	<div class="form-check">
	  <input class="form-check-input" type="radio" name="searchOptions" id="flexRadioDefault4" value="4">        
	  <label class="form-check-label" for="flexRadioDefault4">
	    Exact Match        
	  </label>
	</div>  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        <button type="submit" name="addAction" class="btn btn-success">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>
