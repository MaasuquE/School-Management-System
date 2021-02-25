<?php  

if(isset($this->session->role)){
    $user_role = $this->session->role;
}

?>

<ol class="breadcrumb">
  <li><a href="<?php echo base_url('dashboard') ?>">Home</a></li> 
  <li class="active">Notice</li>
</ol>
<div class="panel panel-default">
  <div class="panel-body">  	
    <fieldset>
    	<legend>Notice</legend>    	

      <div id="messages"></div>	
    	<?php if($user_role!='student'){ ?>
    	<div class="pull pull-right">
    		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addTeacher" id="addTeacherModelBtn"> 
    			<i class="glyphicon glyphicon-plus-sign"></i> Add Notice
    		</button>
    	</div><br /><br />
		<?php } ?>
    	<table id="manageNoticeTable" class="table table-bordered">
    		<thead>
    			<tr>
    				<th>SL No.</th>
    				<th>Notice title</th>
    				<th>Description</th>
    				<th>Noticed By</th>
    				<th>Noticed On</th>
					<?php if($user_role!='student'){ ?>
    				<th style="text-align:center">Action</th>
					<?php } ?>
    			</tr>
    		</thead>
			<tbody>
				<?php if($notice->num_rows() > 0){
					$i=1;
					foreach($notice->result() as $row){ ?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row->title; ?></td>
						<td><?php echo $row->description; ?></td>
						<td><?php if($row->creator_role=='admin'){ echo 'Admin';}else{ echo $row->fname.' '.$row->lname.' Sir';}; ?></td>
						<td><?php echo $row->created; ?></td>
						<?php if($user_role!='student'){ ?>
						<td class="notice_action">
							<a href=""><i class="glyphicon glyphicon-edit"></i></a>
							<a href="<?php echo base_url('notice/delete_notice/'.$row->id) ?>"><i class="glyphicon glyphicon-trash"></i></a>
						</td>
						<!-- <td><select name="" id="">
							<option value="" selected disabled>Action</option>
							<option value="">Edit</option>
							<option value="">delete</option>
						</select></td> -->
						<?php } ?>
					</tr>
					<?php }} ?>
			</tbody>
    	</table>	

    </fieldset>	
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="addTeacher">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Notice</h4>
      </div>

      <form class="form-horizontal" method="post" id="createTeacherForm" action="notice/create" enctype="multipart/form-data">

      <div class="modal-body create-modal notice-modal">
      
      	<div id="add-teacher-messages"></div>

      	<div class="row">
		  	<div class="col-md-10">
				  <div class="form-group">
					<label for="fname" class="col-sm-4 control-label">Notice Title : </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="fname" name="notice_title" placeholder="Notice title" required/>
					</div>
				</div>
				<div class="form-group">
					<label for="fname" class="col-sm-4 control-label">Notice Description : </label>
					<div class="col-sm-8">
						<textarea rows="10"  class="form-control" id="fname" name="notice_desc" placeholder="Describe youre notice..." required> </textarea>
					</div>
				</div>
		  	</div>
		  	<!-- /col-md-12 -->
		    
		</div>
	 	<!-- /row -->
      </div>
      <!-- /modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->