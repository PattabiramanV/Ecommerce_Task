<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<style>
    .container {
    max-width: 600px;
    margin: 14px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
textarea,
select {
    width: calc(100% - 12px);
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

textarea {
    height: 100px;
    resize: vertical;
}

.button_group {
    text-align: right;
}

input[type="submit"] {
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

</style>
</head>

<body>
    <?php 
    include("./ConnectDb.php");
    
    $db=new ConnectDb(); 
    $getData=$db->setQuery("SELECT * FROM Variants");

    ?>
    <div class="container container1">
        <h2>Select Variants</h2>
        <form name="addProductForm"> 
    
        <?php foreach($getData as $row) : ?>
            <div class="form-group">
                <label for="productId"><?php  echo $row['Variants_name']?></label>
                
<div class="flex items-center">
        <input type="checkbox" class="mr-2 cursor-pointer">
        <input type="text" id="productId" name="<?php  echo $row['Variants_name']?>" required class="border rounded px-2 py-1">
</div>

            </div>
          <?php endforeach ?>
           <div class="button_group flex justify-between">
            <input type="submit" value="Add Product" onclick="submitProductFun()">
            <input type="submit" value="Add New Varients" onclick="addNewVariantsFun()">
        </div>
        </form>
    </div>

    




    <div class="container2 container hidden">
    <h2>Add Variants</h2>

    <form name="addProductForm" method="post"> 
        <div class="grid grid-cols-2 gap-4">
        <label for="productId">Enter Variant Name:</label>
            <input type="text" id="addVariant" name="addVariant" required class="border rounded px-2 py-1 col-span-2">
            <input type="submit" value="Add Variants" onclick="window.reload()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer  mx-auto block " >
        </div>     
    </form>
</div>




    <?php 

    
    if(!empty($_POST['addVariant'])){
       $variantName=$_POST['addVariant'];
        $sql="INSERT INTO Variants (Variants_name)
        SELECT '$variantName'
        WHERE NOT EXISTS (
            SELECT 1 FROM Variants WHERE Variants_name = '$variantName'
        );
        ";
       
     if($db->connection->query($sql)==true && $db->connection->affected_rows > 0){
        echo "<script>alert('Variant added successfully.');</script>";
     }
     else{
        echo "<script>alert('Variant already exists.');</script>";
     }
    }
    ?>
<script   src="addNewVariant.js"></script>
</body>
</html>

