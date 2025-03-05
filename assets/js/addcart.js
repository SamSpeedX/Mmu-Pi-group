// const form = document.querySelector(".form");
const form = document.querySelectorAll("form");
const errorText = document.getElementById("error");

function add(e) {
  e.preventDefault();
}
// form.onsubmit = (e)=>{
//     e.preventDefault();

//     const regurl = "http://127.0.0.1:8000/add-to-cart";

//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", regurl, true);
//     xhr.onload = ()=>{
//       if(xhr.readyState === XMLHttpRequest.DONE){
//           if(xhr.status === 200){
//               let data = xhr.response;
//               if(data === "success"){
//                 errorText.style.display = "block";
//                 errorText.textContent = data;
//                 setTimeout(() => {
//                     errorText.remove();
//                 }, 3000);
                
//               }else{
//                 errorText.style.display = "block";
//                 errorText.textContent = data;
//                 setTimeout(() => {
//                     errorText.remove(); 
//                 }, 10000);
//               }
//           }
//       }
//     }
//     let formData = new FormData(form);
//     xhr.send(formData);
// }


    // document.addEventListener("DOMContentLoaded", function (e) {
    // let cartCountElement = document.getElementById("iterm-no");
    // e.preventDefault();

    // document.querySelectorAll(".buy-btn").forEach((button) => {
    //     button.addEventListener("click", function (e) {
    //       e.preventDefault();
    //         let product = this.closest(".form"); // Adjusted selector
    //         if (!product) return; // Safety check

    //         let productData = {
    //             id: product.getAttribute("data-id"),
    //             img: product.querySelector("img").src,
    //             name: product.querySelector("h6").textContent.trim(),
    //             price: parseFloat(product.querySelector(".product-price").textContent) || 0,
    //             quantity: 1 // Always add 1 item
    //         };

            // alert(productData.name);

            // fetch("http://127.0.0.1:8000/add-to-cart", {
            //     method: "POST",
            //     headers: { "Content-Type": "application/json" },
            //     body: JSON.stringify(productData)
            // })
            // .then(response => response.json())
            // .then(data => {
            //     if (data.status === "success") {
            //         alert("✅ " + productData.name + " added to cart!");

            //         // Update cart count dynamically
            //         if (cartCountElement) {
            //             let currentCount = parseInt(cartCountElement.textContent) || 0;
            //             cartCountElement.textContent = currentCount + 1;
            //         }
            //     } else {
            //         alert("❌ Failed to add product to cart.");
            //     }
            // })
            // .catch(error => console.error("Error:", error));
//         });
//     });
// });


    //   document.addEventListener("DOMContentLoaded", function () {
    // document.querySelectorAll(".form").forEach((product) => {
        // let priceElement = product.querySelector(".product-price");
        // let quantityInput = product.querySelector(".product-quantity");
        // let totalElement = product.querySelector(".price");

        // // Increase Quantity
        // product.querySelector(".btn-increase").addEventListener("click", function () {
        //     quantityInput.value = parseInt(quantityInput.value) + 1;
        //     updatePrice();
        // });

        // // Decrease Quantity
        // product.querySelector(".btn-decrease").addEventListener("click", function () {
        //     if (quantityInput.value > 1) {
        //         quantityInput.value = parseInt(quantityInput.value) - 1;
        //         updatePrice();
        //     }
        // });

        // Update Price Function
        // function updatePrice() {
        //     let unitPrice = parseFloat(priceElement.textContent);
        //     let quantity = parseInt(quantityInput.value);
        //     let newTotal = unitPrice * quantity;
        //     totalElement.textContent = newTotal;
        // }

        // AJAX "Buy Now" Button
        // product.querySelector(".btn-buy").addEventListener("click", function (e) {
        //   e.preventDefault();
            // let productData = {
            //     id: product.getAttribute("data-id"),
            //     img: product.querySelector("img").src,
            //     name: product.querySelector("h4").textContent,
            //     price: totalElement.textContent,
            //     quantity: quantityInput.value
            // };
            // alert("sam")
            // Send AJAX Request
            // let xhr = new XMLHttpRequest();
            // xhr.open("POST", "add_to_cart.php", true);
            // xhr.setRequestHeader("Content-Type", "application/json");
            
            // xhr.onreadystatechange = function () {
            //     if (xhr.readyState === 4 && xhr.status === 200) {
            //         alert("Added to cart: " + productData.name);
            //     }
            // };

            // xhr.send(JSON.stringify(productData));
//         });
//     });
// });
