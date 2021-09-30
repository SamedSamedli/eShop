$(".add-to-cart-btn").click(function () {
  var elem = $(this);
  $.ajax({
    data: { prodId: $(this).data("id") },
    url: "controllers/addToCart.php",
    type: "post",
    success: function (res) {
      alert(res);
      elem.addClass("disabled");
      elem.text("In the cart");
    },
  });
});

$("#cart .cart-item span.remove").click(function () {
  var elem = $(this);
  $.ajax({
    data: { prodId: $(this).data("id") },
    url: "controllers/removeFromCart.php",
    type: "post",
    success: function (res) {
      alert(res);
      elem.parent().remove();
      updateCartTotal();
    },
  });
});

var total = 0;
updateCartTotal();

function updateCartTotal() {
  total = 0;
  if (!isNaN(parseInt($(".shipping").val()))) {
    var shipping = parseInt($(".shipping").val());
    total = total + shipping;
  }
  $(".cart-item").each(function () {
    total += $(this).find(".price span").text() * $(this).find("input").val();
  });
  $(".total-price .price").text(total.toFixed(2) + "$");
}

$(".cart-item input").on("keyup change", function () {
  updateCartTotal();
});

$(".shipping").change(function () {
  updateCartTotal();
});

$(".pay-btn button").click(function () {
  if (!isNaN(parseInt($(".shipping").val()))) {
    $.ajax({
      data: { amount: total.toFixed(2) },
      url: "controllers/pay.php",
      type: "post",
      success: function (res) {
        if (res.includes("success")) {
          alert(res);
          window.location.replace("/");
        } else {
          alert(res);
        }
      },
    });
  } else {
    alert("Please choose a shipping method.");
  }
});

$(".rating span").mouseenter(function () {
  $(this).addClass("active");
  $(this).prevAll().addClass("active");
});

$(".rating span").mouseleave(function () {
  $(this).removeClass("active");
  $(this).prevAll().removeClass("active");
});

$(".rating span").click(function () {
  var elem = $(this);
  $.ajax({
    data: {
      prodId: $(this).parent().data("id"),
      rating: $(this).index() + 1,
    },
    url: "controllers/addRating.php",
    type: "post",
    success: function (res) {
      alert(res);
      $(elem).parent().remove();
    },
  });
});