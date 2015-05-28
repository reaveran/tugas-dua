<div class="navbar navbar-fixed-top navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"/>
	        <span class="icon-bar"/>
	    </button>
	    <a href="#" class = "navbar-brand">Crud Image</a>
    </div>
    <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
	    <li>{{link_to('crudimages/create', 'Upload', array('class' => 'list-group-item2'))}}</li>
	    <li>{{link_to('crudimages', 'Gallery', array('class' => 'list-group-item2'))}}</li>
    </ul>
    </div>
  </div>
</div>