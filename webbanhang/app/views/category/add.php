<?php include 'app/views/shares/header.php'; ?>
<div class="container mt-4">
    <h2>➕ Thêm danh mục mới</h2>
    <form action="/webbanhang/Category/add" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Thêm danh mục</button>
    </form>
</div>
<?php include 'app/views/shares/footer.php'; ?>
