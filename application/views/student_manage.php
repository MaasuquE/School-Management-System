<div>
    <table id="student_table" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Student Id</th>
                <th>Name</th>
                <th>Class</th>
                <th>Section</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1; foreach($studentData as $key=>$value ) { 
            $class_data = getClassData($value['class_id']); 
            $section_data = getSectionData($value['section_id']); ?>
            
            <tr>
                
                 <td><?php echo $i++; ?></td>
                <td><img src="<?php echo $value['image']; ?>" class="img-circle candidate-photo" alt="Student Image"></td>
                <td><?php echo $value['student_id']; ?></td>
                <td><?php echo $value['fname'].' '.$value['lname']; ?></td>
                <td><?php echo $class_data['class_name']; ?></td>
                <td><?php echo $section_data['section_name'];?></td>
                <td><div class="btn-group">
		     	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		     	    Action <span class="caret"></span>
		     	  </button>
		     	  <ul class="dropdown-menu">			  	
		     	    <li><a href="#" data-toggle="modal" data-target="#editStudentModal" onclick="updateStudent('<?php echo $value['student_id'] ?>')">Edit</a></li>
		     	    <li><a href="#" data-toggle="modal" data-target="#removeStudentModal" onclick="removeStudent('<?php echo $value['student_id'] ?>')">Remove</a></li>			    
		     	  </ul>
		     	</div></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
	$(document).ready( function () {
    $('#student_table').DataTable();
});
</script>