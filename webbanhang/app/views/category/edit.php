<?php include 'app/views/shares/header.php'; ?>

<?php if (!isset($category) || !is_object($category)) {
    echo "Invalid category data.";
    exit;
} ?>
<div class="container mt-4">
    <h2>✏️ Chỉnh sửa danh mục</h2>
    <form action="/webbanhang/Category/edit/<?php echo $category->id; ?>" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    </form>
</div>
<?php include 'app/views/shares/footer.php'; ?>
