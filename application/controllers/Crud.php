<?php

class Crud extends CI_Controller
{
    public function index()
    {
        // // $this->load->model('Crud_model');
        // $data["task_data"] = $this->Crud_model->getAllData();
        // // echo"<pre>";print_r($data);die;
        // $this->load->view("crud_view", $data);
        // $data["task_data"] = $this->Crud_model->getAllData();

        // // Convert the data to JSON and send it as the response
        // $this->output
        //     ->set_content_type('application/json')
        //     ->set_output(json_encode(['task_data' => $data['task_data']]));
        // $this->load->view("crud_view");
        
        $this->load->view("crud_view");
        // Get all data from the model
        

        // 
    }

    public function fetchData() {
        $data['task_data'] = $this->Crud_model->getAllData();

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode(['task_data' => $data['task_data']]);
    }
    public function addTask()
    {
        $postData = json_decode(file_get_contents('php://input'), true);

        $this->form_validation->set_data($postData);
        $this->form_validation->set_rules("task","Task","trim|required");
        $this->form_validation->set_rules("type","Task Type","trim|required");
        $this->form_validation->set_rules("hour","Hour(s) Required","");

        if ($this->form_validation->run() == FALSE)
        {
            // $data_error = [

            //     "error"=> validation_errors()

            // ];

            // $this->session->set_flashdata($data_error);

            header("Content-Type: application/json");
            echo json_encode(array("error"=> validation_errors()));
        }

        else 
        {
            $result = $this->Crud_model->insertTask([

                // "task" => $this->input->post("task"),
                // "task_type" => $this->input->post("type"),
                // "required_time" => $this->input->post("hour")
                "task" => $postData["task"],
                "task_type" => $postData["task_type"],
                "required_time" => $postData["hour"],
            ]);

            // if($result)
            // {
            //     $this->session->set_flashdata("Inserted", "Successfully Inserted Data To Database");
            // }
            // else
            // {
            //     $this->session->set_flashdata("Not Inserted","Some Issue Occurred In Data Insertion");
            // }

            header('Content-Type: application/json');
            echo json_encode($result ? ['message' => 'Successfully Inserted Data To Database'] : ['error' => 'Some Issue Occurred In Data Insertion']);
        }

        redirect("crud");
    }

    public function editTask($id)
    {
        $task = $this->Crud_model->getById($id);
        header('Content-Type: application/json');
        echo json_encode($task);
    }

    public function updateTask($id)
    {
        $postData = json_decode(file_get_contents('php://input'), true);

        $this->form_validation->set_data($postData);
        $this->form_validation->set_rules("task", "Task", "trim");
        $this->form_validation->set_rules("type", "Task Type", "trim");
        $this->form_validation->set_rules("hour", "Hour(s) Required", "");

        if ($this->form_validation->run() == FALSE) {
            header('Content-Type: application/json');
            echo json_encode(['error' => validation_errors()]);
        } else {
            $result = $this->Crud_model->edit([
                "task" => $postData['task'],
                "task_type" => $postData['type'],
                "required_time" => $postData['hour']
            ], $id);

            header('Content-Type: application/json');
            echo json_encode($result ? ['message' => 'Successfully Updated Data'] : ['error' => 'Some Issue Occurred In Data Update']);
        }
    }

    public function deleteTask($id)
    {
        $result = $this->Crud_model->deleteTask($id);

        header('Content-Type: application/json');
        echo json_encode($result ? ['message' => 'Successfully Deleted Task'] : ['error' => 'Some Issue Occurred In Data Deletion']);
   
    }
}

?>