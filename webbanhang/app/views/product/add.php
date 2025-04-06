<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white text-center">
            <h2 class="mb-0">Thêm Sản Phẩm Mới</h2>
        </div>
        <div class="card-body">
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="/webbanhang/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">
                <div class="form-group mb-4">
                    <label for="name" class="font-weight-bold">Tên sản phẩm:</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên sản phẩm..." required>
                </div>

                <div class="form-group mb-4">
                    <label for="description" class="font-weight-bold">Mô tả:</label>
                    <textarea id="description" name="description" class="form-control" rows="5" placeholder="Nhập mô tả sản phẩm..." required></textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="price" class="font-weight-bold">Giá:</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" placeholder="Nhập giá sản phẩm..." required>
                </div>

                <div class="form-group mb-4">
                    <label for="category_id" class="font-weight-bold">Danh mục:</label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        <option value="" selected disabled>Chọn danh mục</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>">
                                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label for="image" class="font-weight-bold">Hình ảnh:</label>
                    <div class="custom-file">
                        <input type="file" id="image" name="image" class="custom-file-input" onchange="updateFileName()">
                        <label class="custom-file-label" for="image">Chọn tệp...</label>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success px-5 py-2">Thêm Sản Phẩm</button>
                    <a href="/webbanhang/Product/list" class="btn btn-secondary px-5 py-2 ml-2">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function updateFileName() {
        var input = document.getElementById('image');
        var label = input.nextElementSibling; 
        var fileName = input.files.length > 0 ? input.files[0].name : "Chọn tệp...";
        label.textContent = fileName;
    }
</script>

<?php include 'app/views/shares/footer.php'; ?>
