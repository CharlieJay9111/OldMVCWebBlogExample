<section id="admin-posts">
    <div class="container t-center">
        <h1>Posts</h1>
        <div>
            <a href="<?= $this->url ?>/admin/add-post/">Add Post</a>
        </div>
        <div>
            <a href="<?= $this->url ?>/admin/categories/">Categories</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th class="t-center">Options</th>
                </tr>
            </thead>
            
            <?php foreach($values as $value) : ?>
                <tr>
                    <td><?= $value->id ?></td>
                    <td><?= $value->category ?></td>
                    <td><?= $value->title; ?></td>
                    <td class="t-center">
                        <a href="<?= $this->url ?>/admin/edit-post/<?= $value->link; ?>/">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com
                                License - https://fontawesome.com/license/free -->
                                <path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/>
                            </svg>                        </a>
                        <a href="<?= $this->url ?>/admin/remove-post/<?= $value->link; ?>/">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com
                                License - https://fontawesome.com/license/free -->
                                <path d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"/>
                            </svg>                        
                        </a>
                        <a href="<?= $this->url ?>/post/<?= $value->link; ?>/">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com
                                License - https://fontawesome.com/license/free -->
                                <path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"/>
                            </svg>                        
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>
    </div>
</section>