<?php

class Task
{

    private $db;
    private $table = 'task';

    public function __construct()
    {
        $this->db = new DB;
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->select();
    }

    public function store($name, $email, $text)
    {
        $this->db->prepare("INSERT INTO {$this->table} (`name`, `email`, `text`, `status`) VALUES (?, ?, ?, ?)");
        $this->db->bindParam('ssss', [$name, $email, $text, 0]);

        return $this->db->execute();
    }

    public function edit($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
        return $this->db->select()[0];
    }

    public function update($id, $text, $status)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
        $oldText = $this->db->select()[0]['text'];
        $isEdited = false;
        $query = false;
        if ($oldText != $text) {
            $isEdited = true;
        }

        if ($isEdited == true) {
            if (isset($status)) {
                $this->db->prepare("UPDATE {$this->table} SET text = ?, status = ?, is_edited = true WHERE id = {$id}");
                $this->db->bindParam('ss', [$text, $status]);
            } else {
                $this->db->prepare("UPDATE {$this->table} SET is_edited = true, text = ? WHERE id = {$id}");
                $this->db->bindParam('s', [$text]);
            }
            $query = true;
        } else {
            if (isset($status)) {
                $this->db->prepare("UPDATE {$this->table} SET status = ? WHERE id = {$id}");
                $this->db->bindParam('s', [$status]);
                $query = true;
            }
        }
        if ($query) {
            return $this->db->execute();
        }
        return false;
    }

    public function destroy($id)
    {
        $this->db->prepare("DELETE FROM {$this->table} WHERE id = {$id}");
        return $this->db->execute();
    }

}