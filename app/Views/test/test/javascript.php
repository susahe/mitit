<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<style>
.v-center {
  min-height:200px;
  display: flex;
  justify-content:center;
  flex-flow: column wrap;
}
</style>
<div class="container">
  <div class="row">
        <div class="col-md-12 text-center"><h3>Pick List Example</h3></div>
  		<div class="col-sm-4 col-sm-offset-1">
          <div class="list-group" id="list1">
          <a href="#" class="list-group-item active">List 1 <input title="toggle all" type="checkbox" class="all pull-right"></a>
          <a href="#" class="list-group-item">Second item <input type="checkbox" class="pull-right"></a>
          <a href="#" class="list-group-item">Third item <input type="checkbox" class="pull-right"></a>
          <a href="#" class="list-group-item">More item <input type="checkbox" class="pull-right"></a>
          <a href="#" class="list-group-item">Another <input type="checkbox" class="pull-right"></a>
          </div>
        </div>
        <div class="col-md-2 v-center">
     		<button title="Send to list 2" class="btn btn-default center-block add"><i class="glyphicon glyphicon-chevron-right"></i></button>
            <button title="Send to list 1" class="btn btn-default center-block remove"><i class="glyphicon glyphicon-chevron-left"></i></button>
        </div>
        <div class="col-sm-4">
    	  <div class="list-group" id="list2">
          <a href="#" class="list-group-item active">List 2 <input title="toggle all" type="checkbox" class="all pull-right"></a>
          <a href="#" class="list-group-item">Alpha <input type="checkbox" class="pull-right"></a>
          <a href="#" class="list-group-item">Charlie <input type="checkbox" class="pull-right"></a>
          <a href="#" class="list-group-item">Bravo <input type="checkbox" class="pull-right"></a>
          </div>
        </div>
  </div>
</div>
