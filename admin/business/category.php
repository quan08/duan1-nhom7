<?php

function cate_index()
{
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    // lấy danh sách danh mục
    $sql = "SELECT * from categories where name like '%$keyword%'";
    $cates = executeQuery($sql, true);
    $keyword = '';
    // hiển thị view
    admin_render('category/index.php', compact('cates', 'keyword'), 'admin-assets/custom/admin-global.js');
}

function cate_remove()
{
    $id = $_GET['id'];
    $sql = "DELETE from categories where id = $id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'danh-muc');
}

function cate_add_form()
{
    admin_render('category/add-form.php', [], 'admin-assets/custom/admin-global.js');
}

function cate_save_add()
{
    $name = $_POST['name'];
    $show_menu = isset($_POST['show_menu']) ? 1 : 0;
    $sql = "INSERT into categories (name, show_menu) values ('$name', $show_menu)";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'danh-muc');
}
