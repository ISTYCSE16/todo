<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <title>To Do List</title>
</head>
<body>
    
    <div class="jumbotron">
        <h1 align="center">This Is A TO DO List</h1>
        <div class="container ">
            <div class="clear-fix">
                <h3 style="float: left">Tasks</h3>
                <a style="float: right" class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Task</a>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <th>Task</th>
                    <th>Task Type</th>
                    <th>Hours Needed</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach($task_data as $data):?>

                        <tr>
                            <td><?php echo $data->task ?></td>
                            <td><?php echo $data->task_type ?></td>
                            <td><?php echo $data->required_time ?></td>
                            <td>
                                <a class="btn btn-success" href="<?php echo base_url()?>index.php/crud/editTask/<?php echo $data->id?>">Edit Task</a>
                                <a class="btn btn-danger" href="<?php echo base_url()?>index.php/crud/deleteTask/<?php echo $data->id?>">Task Done</a>
                            </td>
                        </tr>        

                    <?php endforeach;?>
                    
                </tbody>

            </table>

        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo base_url()?>index.php/crud/addTask" method="post">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="task">Task</label>
              <input type="text" name="task" placeholder="Write The Task" class="form-control">
            </div>
            <div class="form-group">
              <label for="type">Task Type</label>
              <input type="text" name="type" placeholder="Write The Task Type" class="form-control">
            </div>
            <div class="form-group">
              <label for="hour">Hour(s) Required</label>
              <input type="text" name="hour" placeholder="Write The Hour(s) Required" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="insert" value="Add Task" class="btn btn-info">
          </div>
        </form>
      </div>
    </div>
  </div>


<?php if ($this->session->flashdata("error")):?>

  <div align="center" style="color: #FFF" class="bg-danger">
    <?php echo $this->session->flashdata("error"); ?>
  </div>

<?php endif;?>

<?php if ($this->session->flashdata("Inserted")):?>

<div align="center" style="color: #FFF" class="bg-success">
  <?php echo $this->session->flashdata("Inserted"); ?>
</div>

<?php endif;?>

<?php if ($this->session->flashdata("Not Inserted")):?>

<div align="center" style="color: #FFF" class="bg-danger">
  <?php echo $this->session->flashdata("Not Inserted"); ?>
<?php endif;?>

<?php if ($this->session->flashdata("Deleted")):?>

<div align="center" style="color: #FFF" class="bg-danger">
  <?php echo $this->session->flashdata("Deleted"); ?>
</div>

<?php endif;?>
</div>

  
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>



</html>