<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="jambotron">
        <h1 align="center">Edit Tasks</h1>
        <div class="container">
            <form action="<?php echo base_url()?>index.php/crud/updateTask/<?php echo $task_data->id?>" method="post">
                <div class="form-group">
                    <div class="form-group">
                        <label for="task">Edit Task Name</label>
                        <input type="text" name="task" placeholder=<?php echo $task_data->task?> class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="type">Edit Task Type</label>
                        <input type="text" name="type" placeholder=<?php echo $task_data->task_type?> class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="hour">Edit Time Required</label>
                        <input type="text" name="hour" placeholder=<?php echo $task_data->required_time?> class="form-control">
                    </div>
                    
                    <input type="submit" name="edit" value="Edit Done" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</html>