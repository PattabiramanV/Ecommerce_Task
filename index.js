
'use strict';

var formData={};

document.getElementById('Addvariants').addEventListener("click",addVariantsFun);
function addVariantsFun(){
 
location.href='addVarient.php';
}

document.querySelector(".myForm").addEventListener("submit", function(event) {
  event.preventDefault();

  
  var productId = document.getElementById("product-id").value;
  var productCategory = document.getElementById("product-category").value;
  var productTitle = document.getElementById("product-title").value;
  var productDescription = document.getElementById("product-description").value;
  var price = document.getElementById("price").value;
  var color = document.getElementById("color").value;

   formData = {
    productId: productId,
   productCategory: productCategory,
   productTitle: productTitle,
   productDescription: productDescription,
   price: price,
   color: color
  };
  
console.log(Object.values(formData));
  // Check if all values are not empty
var allNotEmpty = Object.values(formData).every(function(value) {

  return value !== '';
});

if (allNotEmpty) {
  
localStorage.setItem('user',JSON.stringify(formData));

}


document.querySelector(".myForm").reset();


});


function addNewCategory(){

let categoryForm=document.forms.addCategory;
categoryForm.classList.toggle('hidden');
document.querySelector(".myForm").style.display='none';
}


class Cart {

    constructor() {
      this.cartId=0;    
      this.cartTotal=0;  
      this.cartItems = [];
    }
   
    addCartItem(addProductName,addProductCategory,quantity) {

        let allProducts = admin.products[addProductCategory];
          allProducts.forEach((item) => {
            if (item.productTitle == addProductName) {
                item['quantity']=quantity;
              this.cartItems.push(item);
            }
          });
          this.cartTotal=this.cartItems.length;
         this.calculateTotal();
    }

    removeCartItem(removeProductName,allCartList){
   
        let reduceCart = allCartList.cartItems.filter((item) => {
            if (removeProductName != item.productTitle) {
              return item;
            }
          });
          allCartList.cartItems = reduceCart;
          this.calculateTotal();
      }

      viewCart(){
        return this.cartItems;
      }
      
      calculateTotal(){
       this.cartItems.forEach((product)=>{
        product['totalAmount']=product.price*product.quantity;
       });
      }
      
  }

//................................Order Class..............................//

class Orders{
  
    addOrderToUser(orderId,productName,priceSummary,deliveryAddress,mobileNumber,allCartList){
        this.orderId=orderId;
        this.productList=[];
        this.priceSummary=priceSummary;
        this.deliveryAddress=deliveryAddress;
        this.mobileNumber=mobileNumber;
        this.orderStatus='Ordered';
        allCartList.forEach((item) => {
            if (item.productTitle == productName) {
              this.productList.push(item);
            }
          });
          this.calculateTotal();
    }

    calculateTotal(){

        this.productList.forEach((product)=>{
            product['totalAmount']=product.price*product.quantity;
           });
      
    }

    updateStatus(user,orderStatus){
        user.orderList.orderStatus=orderStatus;
    }
}



  
  class Users {
    constructor(userName, mobileNumber, emailId, address) {
      this.userName = userName;
      this.mobileNumber = mobileNumber;
      this.emailId = emailId;
      this.addressList = address;
      this.cartList = new Cart();
      this.orderList=new Orders();
    }

  }
  //.............................Add Product thorough admin.........................//
  // localStorage.setItem('products',JSON.stringify({}));
  class Admin extends Users {
    constructor() {
      super();
      this.products = JSON.parse(localStorage.getItem('products'));
    }
    addProduct(product) {
        // console.log(this.products.product.productCategory);
// console.log(product);
        if(this.products[product.productCategory]){
            this.products[product.productCategory].push(product);
            // this.products.push(product);

        }
        else{
            this.products[product.productCategory] = [];
            this.products[product.productCategory].push(product);
        }
    localStorage.setItem('products',JSON.stringify(this.products));
        localStorage.removeItem('user');
        console.log( this.products);
        console.log("pattabi");
    }
  }
  // localStorage.setItem('products',JSON.stringify({}));

  let admin = new Admin();
let obj=JSON.parse(localStorage.getItem("user"));
if(localStorage.getItem('user')){
  admin.addProduct(obj);

}
 console.log(admin.products);


  let user1=new Users('Pattabi V',9361120513,'pattabidckap@gmail.com',[{no:'1/25',street:'Middle street',city:'Kandhalavadi',district:'Villupuram',pinCode:607107}]);
  let user2 = new Users('Jane Doe', 9876543210, 'jane.doe@example.com', [{ no: '123', street: 'Oak Street', city: 'Springfield', district: 'Anytown', pinCode: 12345 }]);

  user1.cartList.addCartItem("Speaker",'Electronics',2);
  user1.cartList.addCartItem("Shirt",'Clothes',3);
  user1.cartList.calculateTotal();
  // user1.cartList.removeCartItem("Speaker",user1.cartList);
user1.orderList.addOrderToUser(1,'Speaker','Delivering exceptional sound quality at an affordable price.',user1.addressList,9698319123,user1.cartList.cartItems);
admin.orderList.updateStatus(user1,'Product is packed');

  console.log(user1);
  user2.cartList.addCartItem("Pant",'Clothes',3);

 console.log(user2);







  














  //......................waste........................//




//   class Product {

//     constructor(productId,productCategory,productTitle,productDescription,price,color){
//         this.productId=productId;
//         this.productCategory=productCategory;
//         this.productTitle=productTitle;
//         this.productDescription=productDescription;
//         this.price=price;
//         this.color=color;
//     }
//   }
  
//   class Electronics extends Product {
//     constructor(productId,productCategory,productTitle,productDescription,price,color,size,weight,highlights){
//         super(productId,productCategory,productTitle,productDescription,price,color);
//         this.size=size;
//         this.weight=weight;
//         this.highlights=highlights;

        
//     }
//   }
  
  // let speaker=new Electronics(1,'Electronics','Speaker','Its time to enjoy',2000,'Black','30X50','500g','Wireless range: 10 m');
  // let headPhone = new Electronics(5,"Electronics","HeadPhone","It is very nice product",1000,"blue","3x4","50g","Wireless range: 10 m");
//   let phone = new Electronics(2, 'Electronics', 'Phone', 'Stay connected on the go', 1000, 'White', '70X150', '150g', '5G connectivity');
//   let laptop = new Electronics(3, 'Electronics', 'Laptop', 'Powerful computing on the move', 1500, 'Silver', '300X200', '1000g', '8GB RAM, 256GB SSD');
//   let smartWatch = new Electronics(4, 'Electronics', 'Smartwatch', 'Stay active and connected', 500, 'Black', '40X40', '50g', 'Heart rate monitor, Sleep tracker');

//   //........................Clothes.............................//

//   class Clothes extends Product {
    
//     constructor(productId,productCategory,productTitle,productDescription,price,color,size,shirtType,returnPolicy){
//         super(productId,productCategory,productTitle,productDescription,price,color);
//         this.size=size;
//         this.shirtType=shirtType;
//         this.returnPolicy=returnPolicy;
    
//     }
//   }
  
//   let shirt=new Clothes(1,'Clothes','Shirt','Its is very easy to wash',1000,'grey','L','checked','5 Days return policy');
//   let jeans = new Clothes(2, 'Clothes', 'Jeans', 'Classic denim for everyday wear', 1500, 'Blue', 'M', 'Regular fit', 'Free size exchange');
//   let dress = new Clothes(3, 'Clothes', 'Dress', 'Elegant attire for any occasion', 2000, 'Black', 'S', 'Floral pattern', '30-day money-back guarantee');
//   let hoodie = new Clothes(4, 'Clothes', 'Hoodie', 'Comfortable and stylish hooded sweatshirt', 1200, 'Red', 'XL', 'Graphic print', 'Limited edition design');
//   let sneakers = new Clothes(5, 'Clothes', 'Sneakers', 'Sporty footwear for active lifestyles', 800, 'White', 'US 9', 'Canvas material', 'Non-slip sole');


//   class Furniture extends Product {
//     constructor(productId, productCategory, productTitle, productDescription, price, color, material, dimensions, weight, features) {
//         super(productId, productCategory, productTitle, productDescription, price, color);
//         this.material = material;
//         this.dimensions = dimensions;
//         this.weight = weight;
//         this.features = features;
//     }
// }

// // Category 4: Furniture
// let table = new Furniture(6, 'Furniture', 'Table', 'A sturdy table for your home', 800, 'Brown', 'Wood', '100x50x75', '20kg', 'Elegant design');
// let chair = new Furniture(7, 'Furniture', 'Chair', 'Comfortable seating for any room', 500, 'Black', 'Metal', '40x40x80', '5kg', 'Foldable for storage');
// let sofa = new Furniture(8, 'Furniture', 'Sofa', 'Relax in style with this cozy sofa', 2000, 'Gray', 'Fabric', '200x100x80', '50kg', 'Removable cushions');
