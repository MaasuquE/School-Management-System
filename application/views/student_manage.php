<?php
    include('templates/header.php');
?>

<div>
    <table class="table">
        <thead>
            <tr>
                <th>Iamge</th>
                <th>Name</th>
                <th>Class</th>
                <th>Section</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="<?php echo $class_data->image; ?>" alt=""></td>
                <td><?php echo $class_data->fname.' '.$class_data->lname; ?></td>
                <td><?php echo $class_data->class_name; ?></td>
                <td><?php echo $section_data->section_name?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php  
    include('templates/footer.php');
?>