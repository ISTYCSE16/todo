<?php

class Crud_model extends CI_Model
{
    public function getAllData()
    {
        $query = $this->db->get("tasks");
        if ($query)
        {
            return $query->result();
        }
    }

    public function insertTask($data)
    {
        $query = $this->db->insert("tasks", $data);
        if ($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getById($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get("tasks");
        if ($query)
        {
            return $query->row();
        }
    }

    public function edit($data, $id)
    {
        $this->db->where("id", $id);
        // $prev_data = $this->getById($id);
        $this->db->update("tasks", $data);
    }
}


?>