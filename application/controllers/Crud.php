<?php

class Crud extends CI_Controller
{
    public function index()
    {
        // $this->load->model('Crud_model');
        $data["task_data"] = $this->Crud_model->getAllData();
        // echo"<pre>";print_r($data);die;
        $this->load->view("crud_view", $data);
    }

    public function addTask()
    {
        $this->form_validation->set_rules("task","Task","trim|required");
        $this->form_validation->set_rules("type","Task Type","trim|required");
        $this->form_validation->set_rules("hour","Hour(s) Required","");

        if ($this->form_validation->run() == FALSE)
        {
            $data_error = [

                "error"=> validation_errors()

            ];

            $this->session->set_flashdata($data_error);
        }

        else 
        {
            $result = $this->Crud_model->insertTask([

                "task" => $this->input->post("task"),
                "task_type" => $this->input->post("type"),
                "required_time" => $this->input->post("hour")
 
            ]);

            if($result)
            {
                $this->session->set_flashdata("Inserted", "Successfully Inserted Data To Database");
            }
            else
            {
                $this->session->set_flashdata("Not Inserted","Some Issue Occurred In Data Insertion");
            }
        }

        redirect("crud");
    }

    public function editTask($id)
    {
        $task_data['task_data'] = $this->Crud_model->getById($id);
        $this->load->view("edit_view", $task_data);
    }

    public function updateTask($id)
    {
        $this->form_validation->set_rules("task","Task","trim");
        $this->form_validation->set_rules("type","Task Type","trim");
        $this->form_validation->set_rules("hour","Hour(s) Required","");

        if ($this->form_validation->run() == FALSE)
        {
            $data_error = [

                "error"=> validation_errors()

            ];

            $this->session->set_flashdata($data_error);
        }

        else 
        {
            $result = $this->Crud_model->edit([

                "task" => $this->input->post("task"),
                "task_type" => $this->input->post("type"),
                "required_time" => $this->input->post("hour")
 
            ], $id);

            if($result)
            {
                $this->session->set_flashdata("Inserted", "Successfully Inserted Data To Database");
            }
            else
            {
                $this->session->set_flashdata("Not Inserted","Some Issue Occurred In Data Insertion");
            }
        }

        redirect("crud");
    }

    public function deleteTask($id)
    {
        $this->db->where("id", $id);
        $result = $this->db->delete("tasks");

        if($result)
            {
                $this->session->set_flashdata("Deleted", "Successfully Done Task");
            }
            else
            {
                $this->session->set_flashdata("Not Deleted","Some Issue Occurred In Data Insertion");
            }

        redirect("crud");
    }
}

?>