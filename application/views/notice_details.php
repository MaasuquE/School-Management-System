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
    	<legend>Notice Details</legend>  
        <?php foreach($notice->result() as $row){ ?>
		<div class="row notice_details">
            <div class="title">
            <u><h4>Notice Title:</h4></u><span><?php echo $row->title; ?></span>
            </div>
            <div class="description">
            <u><h4>Noticed Description:</h4></u><span><?php echo $row->description; ?></span>
            </div>
            <div class="title">
                <u><h4>Noticed By:</h4></u><span><?php echo $row->fname.''.$row->lname; ?></span>
            </div>
            <div class="description">
             <u><h4>Noticed On:</h4></u><span><?php echo $row->created; ?></span>
            </div>
		</div>
		<?php  } ?>
    </fieldset>	
  </div>
</div>
