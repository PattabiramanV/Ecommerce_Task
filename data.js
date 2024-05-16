var formData={};

document.getElementById('Addvariants').addEventListener("click",addVariantsFun);
function addVariantsFun(){
 
location.href='addVarient.php';
}

document.querySelector(".myForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent the default form submission

  // Get form data
  var productId = document.getElementById("product-id").value;
  var productCategory = document.getElementById("product-category").value;
  var productTitle = document.getElementById("product-title").value;
  var productDescription = document.getElementById("product-description").value;
  var price = document.getElementById("price").value;
  var color = document.getElementById("color").value;

  // Create an object to store form data
   formData = {
    "product-id": productId,
    "product-category": productCategory,
    "product-title": productTitle,
    "product-description": productDescription,
    "price": price,
    "color": color
  };

  console.log("Form Data Object:", formData);

});

export default formData;