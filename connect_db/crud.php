<?php
    include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/main.css">
    <title>Product CRUD Operation</title>
</head>

<body>
    <!-- -----------------Form Add Product(id,name,category,price,qty,created_at) -->
    <h4 class="text-center mt-4 text-decoration-underline">Add Product</h4>
    <div class="form-container border border-2">
        <form method="post">
            <label for="name">Name : </label>
            <input type="text" name="name" id="" class="form-control my-2 border border-2">
            <label for="category">Category : </label>
            <select name="category" id="category" class="form-select my-2 border border-2">
                <option value="drink">Drink</option>
                <option value="snack">Snacks</option>
                <option value="desserts">Dessert</option>
            </select>
            <label for="price">Price : </label>
            <input type="text" name="price" id="" class="form-control my-2 border border-2">
            <label for="qty">Quantity : </label>
            <input type="number" name="qty" id="" class="form-control my-2 border border-2">
            <input type="reset" value="Cancel" class="btn btn-danger mt-2">
            <input type="submit" value="Confirm Add" class="btn btn-success mt-2" name="btn_confirm_add">
        </form>
    </div>

    <div class="container">
        <table class="table" style="table-layout: fixed;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>QTY</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            <?php show_product(); ?>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Remove Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <p>Are you sure you want to delete this product?</p>
                        <input type="hidden" id="hidden_id" name="hidden_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="btn_confirm_remove">Confirm Remove</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function(){
        $('body').on('click','#btn_del',function(){
            var id = $(this).parents('tr').find('td').eq(0).text();
            $('#hidden_id').val(id);
        })
    })
</script>
<!-- 
    CRUD operation = create,read,update,delete
-->