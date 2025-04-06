<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0">Sửa sản phẩm</h2>
        </div>
        <div class="card-body">
            <?php if (!empty($errors)): ?>
            
            <?php if (!is_object($product)) {
                echo '<div class="alert alert-danger">Invalid product data.</div>';
                return;
            } ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
                <input type="hidden" name="id" value="<?php echo $product->id; ?>">

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Tên sản phẩm:</label>
                    <input type="text" id="name" name="name" class="form-control" 
                        value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="description" class="font-weight-bold">Mô tả:</label>
                    <textarea id="description" name="description" class="form-control" required><?php 
                        echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="price" class="font-weight-bold">Giá:</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01"
                        value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="category_id" class="font-weight-bold">Danh mục:</label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>" 
                                <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image" class="font-weight-bold">Hình ảnh:</label>
                    <div class="custom-file">
                        <input type="file" id="image" name="image" class="custom-file-input" onchange="previewImage(event)">
                        <label class="custom-file-label" for="image">Chọn tệp...</label>
                    </div>
                    <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">

                    <div class="mt-3">
                        <?php if ($product->image): ?>
                            <img id="preview" src="/<?php echo $product->image; ?>" alt="Ảnh sản phẩm" class="img-thumbnail" style="max-width: 200px;">
                        <?php else: ?>
                            <img id="preview" class="img-thumbnail d-none" style="max-width: 200px;">
                        <?php endif; ?>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4">Lưu thay đổi</button>
                    <a href="/webbanhang/Product/list" class="btn btn-secondary px-4 ml-2">Quay lại danh sách</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var input = event.target;
        var label = input.nextElementSibling;
        var fileName = input.files.length > 0 ? input.files[0].name : "Chọn tệp...";
        label.textContent = fileName;

        var reader = new FileReader();
        reader.onload = function(){
            var img = document.getElementById('preview');
            img.src = reader.result;
            img.classList.remove("d-none");
        };
        if (input.files.length > 0) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php include 'app/views/shares/footer.php'; ?>
