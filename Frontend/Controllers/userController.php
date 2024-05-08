<?php

function ScriptLogin(){

    /** 
     * This function is used to check if the username and password are empty
     * @param string $username
     * @param string $password
     * @return void
     */
    
    ?>
    <script>
        function LoginFrm(){
            let username=document.getElementById("username").value;
            console.log(username);
            let password=document.getElementById("password").value;
            console.log(password);
            if ((username=="")||(password=="")){
                alert("Please fill in the username and password");
                }                
            else
                document.getElementById("login-form").submit();
        }
        function ResetFrm(){
            document.getElementById("username").value="";
            document.getElementById("password").value="";
        }
    </script>
    <?php
}

function cartScripts(){
    ?>
    <script>
        function addToCart(productId) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let product = cart.find(p => p.id === productId);

            if (product) {
                product.quantity += 1;
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartUI();
            } else {
                let caller = window.location.pathname.includes('index.php') ? 'Home' : 'Other';
                fetch(`/Final/Backend/getProductDetails.php?productID=${productId}&caller=${caller}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            console.error(data.error);
                            return;
                        }
                        cart.push({
                            id: productId,
                            quantity: 1,
                            name: data.PRODUCT,
                            price: data.PRICE,
                            // Use absolute path for the image
                            image: `${window.location.origin}/Final/Frontend/AdminAssets/Images/ProductImages/${data.IMAGE}`
                        });
                        localStorage.setItem('cart', JSON.stringify(cart));
                        updateCartUI();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }

        function removeFromCart(productId) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart = cart.filter(p => p.id !== productId);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartUI();
        }

        function updateCartUI() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let total = 0;
            document.getElementById('cart-items').innerHTML = cart.map(item => 
                `<div class="d-flex justify-content-between align-items-center mb-2">
                    <img src="${item.image}" alt="${item.name}" style="width: 50px; height: 50px; object-fit: contain;">
                    <span>${item.name}</span>
                    <span>${item.quantity} x $${item.price}</span>
                    <button onclick="removeFromCart(${item.id})" class="btn btn-danger btn-sm">Remove</button>
                </div>`
            ).join('');
            cart.forEach(item => {
                total += item.quantity * item.price;
            });
            document.getElementById('total-price').textContent = `$${total.toFixed(2)}`;
        }

        function toggleCart() {
            let cartDiv = document.getElementById('cart');
            cartDiv.style.display = cartDiv.style.display === 'none' ? 'block' : 'none';
        }


        document.addEventListener('DOMContentLoaded', function() {
            updateCartUI();
        });
    </script>
    <?php
}

?>

