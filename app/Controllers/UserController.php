<?php
require_once __DIR__ . '/../Models/User.php';
class UserController {
    private $model;
    public function __construct() {
        $this->model = new User();
    }
    public function index() {
        $users = $this->model->all();
        include __DIR__ . '/../Views/users/index.php';
    }
    public function create() {
        include __DIR__ . '/../Views/users/create.php';
    }
    public function store() {
        $this->model->create($_POST, $_FILES['photo']);
        header("Location: index.php");
    }
}
?>