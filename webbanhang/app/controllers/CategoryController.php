<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    public function list()
    {
        SessionHelper::requireAdmin();
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    public function add()
    {
        SessionHelper::requireAdmin();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $this->categoryModel->addCategory($name, $description);
            header('Location: /webbanhang/Category/list');
        } else {
            include 'app/views/category/add.php';
        }
    }

    public function edit($id)
    {
        SessionHelper::requireAdmin();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $this->categoryModel->updateCategory($id, $name, $description);
            header('Location: /webbanhang/Category/list');
        } else {
            $category = $this->categoryModel->getCategoryById($id);
            include 'app/views/category/edit.php';
        }
    }

    public function delete($id)
    {
        SessionHelper::requireAdmin();
        $this->categoryModel->deleteCategory($id);
        header('Location: /webbanhang/Category/list');
    }
}
?>
