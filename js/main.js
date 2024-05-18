(function ($) {
  "use strict";

  // Spinner
  var spinner = function () {
    setTimeout(function () {
      if ($("#spinner").length > 0) {
        $("#spinner").removeClass("show");
      }
    }, 1);
  };
  spinner();

  // Initiate the wowjs
  new WOW().init();

  // Dropdown on mouse hover
  const $dropdown = $(".dropdown");
  const $dropdownToggle = $(".dropdown-toggle");
  const $dropdownMenu = $(".dropdown-menu");
  const showClass = "show";

  $(window).on("load resize", function () {
    if (this.matchMedia("(min-width: 992px)").matches) {
      $dropdown.hover(
        function () {
          const $this = $(this);
          $this.addClass(showClass);
          $this.find($dropdownToggle).attr("aria-expanded", "true");
          $this.find($dropdownMenu).addClass(showClass);
        },
        function () {
          const $this = $(this);
          $this.removeClass(showClass);
          $this.find($dropdownToggle).attr("aria-expanded", "false");
          $this.find($dropdownMenu).removeClass(showClass);
        }
      );
    } else {
      $dropdown.off("mouseenter mouseleave");
    }
  });

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });

  // Facts counter
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 2000,
  });

  // Modal Video
  $(document).ready(function () {
    var $videoSrc;
    $(".btn-play").click(function () {
      $videoSrc = $(this).data("src");
    });
    console.log($videoSrc);

    $("#videoModal").on("shown.bs.modal", function (e) {
      $("#video").attr(
        "src",
        $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0"
      );
    });

    $("#videoModal").on("hide.bs.modal", function (e) {
      $("#video").attr("src", $videoSrc);
    });
  });

  // Testimonials carousel
  $(".testimonial-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1000,
    margin: 25,
    dots: false,
    loop: true,
    nav: true,
    navText: [
      '<i class="bi bi-arrow-left"></i>',
      '<i class="bi bi-arrow-right"></i>',
    ],
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
    },
  });
})(jQuery);

/****NEW CART ****/

// Shopping Cart API
var shoppingCart = (function () {
  // Private methods and properties
  let cart = [];

  // Constructor
  function Item(name, price, count) {
    this.name = name;
    this.price = price;
    this.count = count;
  }

  // Save cart
  function saveCart() {
    sessionStorage.setItem("shoppingCart", JSON.stringify(cart));
  }

  // Load cart
  function loadCart() {
    cart = JSON.parse(sessionStorage.getItem("shoppingCart")) || [];
  }
  if (sessionStorage.getItem("shoppingCart") != null) {
    loadCart();
  }

  // Public methods and properties
  var obj = {};

  // Add to cart
  obj.addItemToCart = function (name, price, count) {
    for (var item in cart) {
      if (cart[item].name === name) {
        cart[item].count++;
        saveCart();
        return;
      }
    }
    var item = new Item(name, price, count);
    cart.push(item);
    saveCart();
  };

  // Set count from item
  obj.setCountForItem = function (name, count) {
    for (var i in cart) {
      if (cart[i].name === name) {
        cart[i].count = count;
        break;
      }
    }
    saveCart();
  };

  // Remove item from cart
  obj.removeItemFromCart = function (name) {
    for (var item in cart) {
      if (cart[item].name === name) {
        cart[item].count--;
        if (cart[item].count === 0) {
          cart.splice(item, 1);
        }
        break;
      }
    }
    saveCart();
  };

  // Remove all items from cart
  obj.removeItemFromCartAll = function (name) {
    for (var item in cart) {
      if (cart[item].name === name) {
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  };

  // Clear cart
  obj.clearCart = function () {
    cart = [];
    saveCart();
  };

  // Count cart
  obj.totalCount = function () {
    var totalCount = 0;
    for (var item in cart) {
      totalCount += cart[item].count;
    }
    return totalCount;
  };

  // Total cart
  obj.totalCart = function () {
    var totalCart = 0;
    for (var item in cart) {
      totalCart += cart[item].price * cart[item].count;
    }
    return Number(totalCart.toFixed(2));
  };

  // List cart
  obj.listCart = function () {
    var cartCopy = [];
    for (var i in cart) {
      var item = cart[i];
      var itemCopy = {};
      for (var p in item) {
        itemCopy[p] = item[p];
      }
      itemCopy.total = Number(item.price * item.count).toFixed(2);
      cartCopy.push(itemCopy);
    }
    return cartCopy;
  };

  // Return object
  return obj;
})();

// Triggers / Events
$(".add-to-cart").click(function (event) {
  event.preventDefault();
  var name = $(this).data("name");
  var price = Number($(this).data("price"));
  shoppingCart.addItemToCart(name, price, 1);
  displayCart();
});

// Clear items
$(".clear-cart").click(function () {
  shoppingCart.clearCart();
  displayCart();
});

function displayCart() {
  var cartArray = shoppingCart.listCart();
  var output = "";
  for (var i in cartArray) {
    output +=
      "<tr>" +
      "<td>" +
      cartArray[i].name +
      "</td>" +
      "<td>(" +
      cartArray[i].price +
      ")</td>" +
      "<td><div class='input-group'>" +
      "<button class='minus-item input-group-addon btn btn-primary' data-name='" +
      cartArray[i].name +
      "'>-</button>" +
      "<input type='number' class='item-count form-control' data-name='" +
      cartArray[i].name +
      "' value='" +
      cartArray[i].count +
      "'>" +
      "<button class='plus-item btn btn-primary input-group-addon' data-name='" +
      cartArray[i].name +
      "'>+</button></div></td>" +
      "<td><button class='delete-item btn btn-danger' data-name='" +
      cartArray[i].name +
      "'>X</button></td>" +
      " = " +
      "<td>" +
      cartArray[i].total +
      "</td>" +
      "</tr>";
  }
  $(".show-cart").html(output);
  $(".total-cart").html(shoppingCart.totalCart());
  $(".total-count").html(shoppingCart.totalCount());
}

// Delete item button
$(".show-cart").on("click", ".delete-item", function (event) {
  var name = $(this).data("name");
  shoppingCart.removeItemFromCartAll(name);
  displayCart();
});

// -1
$(".show-cart").on("click", ".minus-item", function (event) {
  var name = $(this).data("name");
  shoppingCart.removeItemFromCart(name);
  displayCart();
});

// +1
$(".show-cart").on("click", ".plus-item", function (event) {
  var name = $(this).data("name");
  shoppingCart.addItemToCart(name, undefined, 1); // corrected function call
  displayCart();
});

// Item count input
$(".show-cart").on("change", ".item-count", function (event) {
  var name = $(this).data("name");
  var count = Number($(this).val());
  shoppingCart.setCountForItem(name, count);
  displayCart();
});

displayCart();

/***********CHECKOUT************
// Function to update the checkout modal with cart items and total amount
function updateCheckoutModal() {
  var cartArray = shoppingCart.listCart();
  var checkoutCartItems = document.getElementById("checkoutCartItems");
  var checkoutTotalAmount = document.getElementById("checkoutTotalAmount");
  var cartTotal = shoppingCart.totalCart();

  // Clear previous items in the checkout modal
  checkoutCartItems.innerHTML = "";

  // Populate cart items in the checkout modal
  cartArray.forEach(function (item) {
    var itemRow = document.createElement("tr");
    itemRow.innerHTML = `
      <td>${item.name}</td>
      <td>$${item.price}</td>
      <td>${item.count}</td>
      <td>$${(item.price * item.count).toFixed(2)}</td>
    `;
    checkoutCartItems.appendChild(itemRow);
  });

  // Update total amount in the checkout modal
  checkoutTotalAmount.textContent = cartTotal.toFixed(2);
}

// Display the checkout modal when "Order now" button is clicked
$("#orderNowBtn").click(function () {
  // Close the cart modal if it's open
  $("#cartModal").modal("hide");
  updateCheckoutModal(); // Update the checkout modal content
  $("#checkoutModal").modal("show"); // Show the checkout modal
});

// Handle form submission
$("#checkoutForm").submit(function (event) {
  event.preventDefault(); // Prevent default form submission

  // Get selected payment method and delivery option
  var paymentMethod = $("input[name='paymentMethod']:checked").val();
  var deliveryOption =$("#deliveryOption").val();

  // You can further process the checkout information here, such as sending it to a server

  // Clear the cart after successful order
  shoppingCart.clearCart();
  displayCart(); // Update the cart display

  // Close the checkout modal after submitting the form
  $("#checkoutModal").modal("hide");
});

// Close modal when clicking the "x" button
$("#checkoutModal .close").click(function () {
  $("#checkoutModal").modal("hide");
});
/****END OF CHECKOUT*****/

/***********CHECKOUT************/
// Function to update the checkout modal with cart items and total amount
function updateCheckoutModal() {
  var cartArray = shoppingCart.listCart();
  var checkoutCartItems = document.getElementById("checkoutCartItems");
  var checkoutTotalAmount = document.getElementById("checkoutTotalAmount");
  var cartTotal = shoppingCart.totalCart();

  // Clear previous items in the checkout modal
  checkoutCartItems.innerHTML = "";

  // Populate cart items in the checkout modal
  cartArray.forEach(function (item) {
    var itemRow = document.createElement("tr");
    itemRow.innerHTML = `
      <td>${item.name}</td>
      <td>PHP ${item.price}</td>
      <td>${item.count}</td>
      <td>PHP ${(item.price * item.count).toFixed(2)}</td>
    `;
    checkoutCartItems.appendChild(itemRow);
  });

  // Update total amount in the checkout modal
  checkoutTotalAmount.textContent = cartTotal.toFixed(2);
}

// Display the checkout modal when "Order now" button is clicked
$("#orderNowBtn").click(function () {
  // Close the cart modal if it's open
  $("#cartModal").modal("hide");
  updateCheckoutModal(); // Update the checkout modal content
  $("#checkoutModal").modal("show"); // Show the checkout modal
});

// Function to update the receipt modal with order details
function updateReceiptModal(paymentMethod, deliveryOption) {
  var receiptCartItems = document.getElementById("receiptCartItems");
  var receiptTotalAmount = document.getElementById("receiptTotalAmountDetail");
  var receiptPaymentMethod = document.getElementById(
    "receiptPaymentMethodDetail"
  );
  var receiptDeliveryOption = document.getElementById(
    "receiptDeliveryOptionDetail"
  );

  // Get data from the checkout modal
  var checkoutTotalAmount = document.getElementById(
    "checkoutTotalAmount"
  ).textContent;

  // Clear previous items in the receipt modal
  receiptCartItems.innerHTML = "";

  // Populate cart items in the receipt modal
  $("#checkoutCartItems tr").each(function () {
    var name = $(this).find("td:eq(0)").text();
    var price = $(this).find("td:eq(1)").text().replace("PHP ", "");
    var quantity = $(this).find("td:eq(2)").text();
    var total = $(this).find("td:eq(3)").text().replace("PHP ", "");

    var itemRow = document.createElement("tr");
    itemRow.innerHTML = `
      <td>${name}</td>
      <td>PHP ${price}</td>
      <td>${quantity}</td>
      <td>PHP ${total}</td>
    `;
    receiptCartItems.appendChild(itemRow);
  });

  // Update total amount, payment method, and delivery option in the receipt modal
  receiptTotalAmount.textContent = checkoutTotalAmount;
  receiptPaymentMethod.value = paymentMethod;
  receiptDeliveryOption.value = deliveryOption;

  // Update hidden inputs with the same data
  document.getElementById("receiptTotalAmountInput").value =
    checkoutTotalAmount;
  document.getElementById("receiptPaymentMethodInput").value = paymentMethod;
  document.getElementById("receiptDeliveryOptionInput").value = deliveryOption;
}

// Handle form submission
$("#checkoutForm").submit(function (event) {
  event.preventDefault(); // Prevent default form submission

  // Get selected payment method and delivery option
  var paymentMethod = $("input[name='paymentMethod']:checked").val();
  var deliveryOption = $("#deliveryOption").val();

  // Further process the checkout information here, such as sending it to a server

  // Close the checkout modal after submitting the form
  $("#checkoutModal").modal("hide");

  // Update and show the receipt modal
  updateReceiptModal(paymentMethod, deliveryOption);
  $("#receiptModal").modal("show");
});

// Close modal when clicking the "x" button
$("#checkoutModal .close").click(function () {
  $("#checkoutModal").modal("hide");
});

// Close modal when clicking the "x" button in the receipt modal
$("#receiptModal .close").click(function () {
  $("#receiptModal").modal("hide");
});

/****END OF CHECKOUT*****/

/****SESSION JS ****/
