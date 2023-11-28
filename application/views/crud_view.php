<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@3.0.2"></script>
    <title>To Do List</title>
</head>
<body>
    
    <div class="jumbotron" id="app">
        <div>{{fetchData()}}</div>
        <h1 align="center">This Is A TO DO List</h1>
        <div class="container ">
            <div class="clear-fix">
                <h3 style="float: left">Tasks</h3>
                <button style="float: right" class="btn btn-success" @click="showModal = true">Add Task</button>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <th>Task</th>
                    <th>Task Type</th>
                    <th>Hours Needed</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr v-for="data in taskData" :key="data.id">
                      <td>{{ data.task }}</td>
                      <td>{{ data.task_type }}</td>
                      <td>{{ data.required_time }}</td>
                      <td>
                        <button class="btn btn-success" @click="editTask(data.id)">Edit Task</button>
                        <button class="btn btn-danger" @click="deleteTask(data.id)">Task Done</button>
                      </td>
                    </tr>
                    
                </tbody>

            </table>

        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" v-if="showModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form @submit.prevent="addTask">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="task">Task</label>
              <input type="text" v-model="newTask.task" placeholder="Write The Task" class="form-control">
            </div>
            <div class="form-group">
              <label for="type">Task Type</label>
              <input type="text" v-model="newTask.task_type" placeholder="Write The Task Type" class="form-control">
            </div>
            <div class="form-group">
              <label for="hour">Hour(s) Required</label>
              <input type="text" v-model="newTask.required_time" placeholder="Write The Hour(s) Required" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
            <button type="submit" class="btn btn-info">Add Task</button>
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

<script src="<?php echo base_url();?>assets/js/app.js"></script>
  
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>




</html>