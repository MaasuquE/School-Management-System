<?php  ?>
<div class="well">
	Class Name :<?php  echo $classData['class_name'] ?>
</div>
<div id="messages"></div>
    <?php if($this->session->role=='admin'){ ?>
	    <div class="pull pull-right">
        <button class="btn btn-default" data-toggle="modal" data-target="#addSectionModal" onclick="addSection('<?php echo $classData['class_id'];  ?>')">Add Section</button>	
		</div>
	<?php  } ?>
    <br /> <br />
    <table class="table table-bordered" id="manageSectionTable" >
		<thead>	
			<tr>
                <th> Subject Name </th>			    		
                <th> Teacher Name  </th>
                <?php if($this->session->role=='admin'){
                echo '<th> Action </th>';
                }?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sectionData->result() as $value){
                $teacher = getTeacherData($value->teacher_id);
                ?>
            <tr>
                <td><?php echo $value->section_name; ?></td>
                <td><?php echo $teacher['fname'].' '.$teacher['lname']; ?></td>
                <td><div class="btn-group">
 				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 				    Action <span class="caret"></span>
 				  </button>
 				  <ul class="dropdown-menu">
                   <li><a type="button" data-toggle="modal" data-target="#editSectionModal" onclick="editSection('<?php echo $value->section_id; ?>','<?php echo $value->class_id;?>')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
			        <li><a type="button" data-toggle="modal" data-target="#removeSectionModal" onclick="removeSection('<?php echo $value->section_id; ?>','<?php echo $value->class_id;?>')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>	    
 				  </ul>
 				</div></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
