function addToCart(product, url, csrf) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    const existingProduct = cart.find((item) => item.id === product.id);
    if (existingProduct) {
        existingProduct.quantity += 1;
    } else {
        cart.push(product);
    }

    localStorage.setItem("cart", JSON.stringify(cart));

    updateCartOnServer(cart, url, csrf, (data) => {
        toastr.success(data.message);
    });
}

function updateCartOnServer(cart, url, csrf, callbackFunction = (data) => {}) {
    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrf,
        },
        body: JSON.stringify({
            cart: cart,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            callbackFunction(data);
        })
        .catch((error) => {
            console.error("Error:", error);
            toastr.error("Unexpected Error Occurred");
        });
}

function removeFromCart(productId, url, csrf) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart = cart.filter((item) => item.id !== productId);

    localStorage.setItem("cart", JSON.stringify(cart));

    const productCard = document
        .getElementById(`quantity-${productId}`)
        .closest(".product-list-card");
    productCard.remove();

    updateCartOnServer(cart, url, csrf, (data) => {
        toastr.info("Item removed from cart");
    });
}

function updateQuantity(productId, change, url, csrf) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    const existingProduct = cart.find((item) => item.id === productId);
    debugger;
    if (existingProduct) {
        const newQuantity = Math.max(1, existingProduct.quantity + change);

        if (existingProduct.quantity == newQuantity) {
            toastr.error("Quantity cannot be less than 1");
            return;
        }

        existingProduct.quantity = newQuantity;

        document.getElementById(`quantity-${productId}`).textContent =
            newQuantity;
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartOnServer(cart, url, csrf);
}

function clearCart(url, csrf) {
    localStorage.removeItem("cart");

    updateCartOnServer([], url, csrf, (data) => {
        toastr.info("Cart cleared successfully!");
        setTimeout(() => {
            location.reload();
        }, 1000);
    });
}
