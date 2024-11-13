<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php 
    include 'connection.php';
    function insert_product(){
        global $connection;
        if(isset($_POST['btn_confirm_add'])){
            $name     = $_POST['name'];
            $category = $_POST['category'];
            $qty      = $_POST['qty'];
            $price    = $_POST['price'];
    
    
            if(!empty($name) && !empty($category) && !empty('qty') && !empty($price)){
                $sql_insert_product = "INSERT INTO tbl_product (name,category,qty,price) VALUES('$name','$category','$qty','$price')";
                $result = $connection -> query($sql_insert_product); 
                if($result){
                    echo '
                            <script>
                                $(document).ready(function(){
                                    swal({
                                        title: "Success Insert Product",
                                        text: "You inserted product",
                                        icon: "success",
                                    });
                                })
                            </script>
                    ';
                }
            }
        }
    }
    insert_product();
    function show_product(){
        global $connection;
        $sql_show = "SELECT * FROM tbl_product WHERE 1";
        //result = rows
        $result   = $connection -> query($sql_show);

        while($row      = mysqli_fetch_assoc($result)){
            echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['category'].'</td>
                    <td>'.$row['qty'].'</td>
                    <td>'.$row['price'].'</td>
                    <td>'.$row['created_at'].'</td>
                    <td>
                        <button name="btn_edit" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn_edit">Edit</button>
                        <button id="btn_del" name="btn_remove" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Remove</button>
                    </td>
                </tr>
            ';
        }
    }
    function remove_product(){
        global $connection;
        if(isset($_POST['btn_confirm_remove'])){
            $id = $_POST['hidden_id'];

            $sql_delete = "DELETE FROM tbl_product WHERE id='$id'";

            $result     = $connection -> query($sql_delete);

            if($result){
                echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Success Remove Product",
                                    text: "You removed product",
                                    icon: "success",
                                });
                            })
                        </script>
                    ';
            }
            else{
                echo '
                            <script>
                                $(document).ready(function(){
                                    swal({
                                        title: "Failed Remove Product",
                                        text: "You failed removed product",
                                        icon: "error",
                                    });
                                })
                            </script>
                        ';
            }
        }
    }
    remove_product();
    function edit_product(){
        global $connection;

        if(isset($_POST['btn_confirm_edit'])){
            $id       = $_POST['edited_id'];
            $name     = $_POST['edited_name'];
            $category = $_POST['edited_category'];
            $qty      = $_POST['edited_qty'];
            $price    = $_POST['edited_price'];
            if(!empty($name) && !empty($category) && !empty('qty') && !empty($price)){
                $sql_edit = "UPDATE tbl_product SET `name`='$name',`category`='$category',`qty`='$qty',`price`='$price' WHERE `id`='$id'";

                $result   = $connection -> query($sql_edit);


                if($result){
                    echo '
                            <script>
                                $(document).ready(function(){
                                    swal({
                                        title: "Success Edit Product",
                                        text: "You Edited product",
                                        icon: "success",
                                    });
                                })
                            </script>
                        ';
                }
                else{
                    echo '
                                <script>
                                    $(document).ready(function(){
                                        swal({
                                            title: "Failed Edited Product",
                                            text: "You failed Edited product",
                                            icon: "error",
                                        });
                                    })
                                </script>
                            ';
                }
            }

        }
    }
    edit_product();