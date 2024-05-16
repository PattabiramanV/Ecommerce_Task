<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>

<?php 
    include("./ConnectDb.php");
    
    $db=new ConnectDb(); 
    $getData=$db->setQuery("SELECT * FROM categary");

    ?>
<div class="max-w-md mx-auto mt-4">
    <form class="bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4 myForm border border-gray-300 rounded-lg">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="product-id">
                Product ID
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-id" type="number" placeholder="Enter product ID">
        </div>
        <div class="mb-4">
            <div class="flex justify-between items-center">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="product-category">
                    Product Category
                </label>
                <a onclick="addNewCategory()" class="text-blue-500 hover:underline cursor-pointer">Add new category</a>
            </div>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-category">
                <option>Select category</option>
                <?php foreach($getData as $row) : ?>
                <option><?php echo $row['categary_name'] ?></option>
                <?php endforeach ?>
                <!-- Add more categories as needed -->
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="product-title">
                Product Title
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-title" type="text" placeholder="Enter product title">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="product-description">
                Product Description
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-description" placeholder="Enter product description"></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                Price
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" type="text" placeholder="Enter price">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="color">
                Color
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="color" type="text" placeholder="Enter color">
        </div>
        <!-- Add more input fields as needed -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Save
            </button>
            <button id="Addvariants" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Add variants
            </button>
        </div>
    </form>
</div>




<form name="addCategory" method="post" class="w-1/3 hidden bg-gray-100 shadow-md p-4 rounded-lg mx-auto my-0"> <!-- Added mx-auto for horizontal centering and my-0 for margin-top and margin-bottom set to 0 -->
    <div class="grid grid-cols-2 gap-4">
        <label for="categoryId" class="text-gray-700">Enter Category:</label>
        <input type="text" id="addCategory" name="addCategory" required class="border rounded px-2 py-1 col-span-2 w-full">
        <input type="submit" value="Add Category" onclick="window.reload()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer mx-auto block">
    </div>     
</form>



<?php
if (!empty($_POST['addCategory'])) {

    $newCategory = $_POST['addCategory'];

    $query="INSERT INTO categary (categary_name)
    SELECT '$newCategory'
    WHERE NOT EXISTS (
        SELECT 1 FROM categary WHERE categary_name = '$newCategory'
    );
    ";
    $getCategoryData = $db->connection->query($query);
    
    if ($getCategoryData) {
        if ($db->connection->affected_rows > 0) {
            echo "<script>alert('Category added successfully.');</script>";
        } else {
            echo "<script>alert('Category already exists.');</script>";
        }
    } else {
        echo "Error adding category.";
    }
}

?>


 <script src="index.js"></script>
</body>
  </html>