<section id="add-post">
    <div class="container">
        <h1>Add Post</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title">
            <select name="category_id">
                <?php foreach($values as $value) : ?>
                    <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                <?php endforeach; ?>
            </select>
            <input type="file" name="image">
            <?php include __DIR__ . "/forms/editor.php"; ?>
            <button>Send</button>
        </form>
    </div>
</section>