<?php

class TaskController extends Controller {

	public function index()
	{		
		$data['title'] = 'Task List';

		$data['task'] = $this->model('Task')->getAll();

		$this->view('layouts/header', $data);
		$this->view('task/index', $data);
		$this->view('layouts/footer');
	}

	public function create($data = [])
	{
		$data['title'] = 'Create Task';
		$this->view('layouts/header', $data);
		$this->view('task/create', $data);
	}

	public function store()
	{
	    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['email'])) {
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['error'] = "Invalid email format";
                $this->create($data);
                return;
            }

            $name  = $_POST['name'];
            $email = $_POST['email'];
            $text = $_POST['text'];
            $this->model('Task')->store($name, $email,$text);
            $this->redirect('task');
        }else {
            $data['error'] = 'The fields are required';
            $this->create($data);
        }
	}

	public function edit($id, $data = [])
	{
		$data['title'] = 'Edit Task';
		$data['task'] = $this->model('Task')->edit($id);

		$this->view('layouts/header', $data);
		$this->view('task/edit', $data);
	}

	public function update($id)
	{
	    if (empty($_POST['text'])) {
	        $data['error'] = 'The Text field can not be empty';
            $this->edit($id, $data);
            return;
        }
		$text = $_POST['text'];
		$status = $_POST['status'];
		$this->model('Task')->update($id, $text,$status);
		$this->redirect('task');
	}

	public function destroy($id)
	{
		$this->model('Task')->destroy($id);

		$this->redirect('task');
	}



}