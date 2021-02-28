<div>
    <table class="table">
        <thead>
            <tr>
                <th>Iamge</th>
                <th>Name</th>
                <!-- <th>Class</th>
                <th>Section</th> -->
            </tr>
        </thead>
        <tbody>
        <?php foreach($studentData as $key=>$value ) {
                // $section_data = $this->fetchSectionByClassSection($value['class_id'], $value['section_id']);
                // $class_data = $this->model_classes->fetchClassData($value['class_id']);
            ?>
            <tr>
                <td><img src="<?php echo $value['image']; ?>" alt=""></td>
                <td><?php echo $value['fname'].' '.$value['lname']; ?></td>
                <!-- <td><?php echo $class_data['class_name']; ?></td>
                <td><?php echo $section_data['section_name'];?></td> -->
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
