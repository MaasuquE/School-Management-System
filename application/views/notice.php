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

      <?php if($msg = $this->session->flashdata('success_msg')){ echo '<div id="messages" class="alert alert-success" role="alert">'.$msg.'</div>'; 
			$this->session->unset_userdata('success_msg');
		} ?>	
    	<?php if($user_role!='student'){ ?>
    	<div class="pull pull-right">
    		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addTeacher" id="addTeacherModelBtn"> 
    			<i class="glyphicon glyphicon-plus-sign"></i> Add Notice
    		</button>
    	</div><br /><br />
		<?php } ?>

		<div class="row notice_sec">
		<?php if($notice->num_rows() > 0){
			$i=1;
			foreach($notice->result() as $row){ ?>
			<div class="col-md-4 notice_board">
				<h4 style="text-align:center">Notice-<?php echo $i++; ?></h4>
				<div class="notice_title"><b>Title: </b><?php echo $row->title; ?></div>
				<div class="notice_desciption"><b>Description: </b><?php echo substr($row->description,0,50); ?></div>
				<div class="row created_part">
					<div class="col-md-6">
						<b>Noticed By:</b> <br>
						<?php if($row->creator_role=='admin'){ echo 'Admin';}else{ echo $row->fname.' '.$row->lname.' Sir';}; ?>
					</div>
					<div class="col-md-6">
						<b>Noticed On:</b> <br>
						<?php echo $row->created; ?>
					</div>
				</div>
				<a href="<?php echo base_url('notice_details/'.$row->id); ?>"><div class="details_btn">Show Details</div></a>
				<div class="edit_notice notice_btn"><a href=""><i class="glyphicon glyphicon-edit"></i></a></div>
				<div class="dlt_notice notice_btn"><a href="<?php echo base_url('delete_notice/'.$row->id); ?>"><i class="glyphicon glyphicon-trash"></i></a></div>
			</div>
			<?php  }} ?>
		</div>
		
    	

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


<script type="text/javascript" src="<?php echo base_url('custom/js/notice.js') ?>"></script>