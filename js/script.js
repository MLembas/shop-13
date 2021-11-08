
var cart = {};


function init(){
   //$.getJSON('goods.json', goodsOut);
   $.post(
      "admin/core.php",
      {
         "action" : "loadGoods"
      },
      goodsOut
   );
}
function goodsOut(data){
   //var goods = JSON.parse(data);
   data = JSON.parse(data);
   console.log(data);
   var out= '';
   for (var key in data){
      out +=`<div class="menu1">`;
         out +=`<a href="item.html#${key}" class="forlinks"><img src="img/${data[key].menu__img}" alt="PICTURE HERE" class="img-fluid">`;
         //out +=`<img src="img/${data[key].menu__img}" alt="PICTURE HERE" class="img-fluid">`;//ORIG
         // out +=`<img src="img/menu__img" alt="PICTURE HERE">`;
         out +=`<div class="menu__container">`;
            out +=`<div class="first__line">`;
            out +=`<div class="menu__title"><a href="item.html#${key}" class="forlinks">${data[key].menu__title}</div>`;
            out +=`<div class="menu__price">${data[key].menu__price}</div>`;
            out +=`</div>`;
            out +=`<div class="menu__text">${data[key].menu__text}</div>`;
            out +=`<div class="menu__text"><a href="item.html#${key}">View</a></div>`;
            //out +=`<button class="add_to_cart" data-id="${key}">Buy</button>`;
            out +=`<div class="second__line">`;
               out +=`<button class="add_to_cart" data-id="${key}">Add to cart</button>`;
               out +=`<div class="menu__raiting">${data[key].menu__raiting}</div>`;
            out +=`</div>`;
         out +=`</div>`;
      out +=`</div>`;
   }
   $('.goods__out').html(out);
   $('.add_to_cart').on('click', addToCart);
   //$('.add__to__cart').click(addToCart());
}

 function addToCart(){
   //  var id = $(this).attr('data-id');
   //  console.log("id");
   let id = $.parseJSON($(this).attr('data-id'));
   // console.log(id);
   // console.log("rrr");

   if (cart[id]==undefined){
      cart[id]=1;
   }
   else{
      cart[id]++;
   }
   showMiniCart();
   saveCart();
 }

function saveCart(){
   localStorage.setItem('cart', JSON.stringify(cart));
}

function showMiniCart(){
   var out="";
   for(var key in cart){
      out+= key + '---' + cart[key];
   }
   $('.mini-cart').html(out);
}

function loadCart(){
   if(localStorage.getItem('cart')){
      cart = JSON.parse(localStorage.getItem('cart'));
      showMiniCart();
      
   }
   
}


$(document).ready(function(){
   init();
   loadCart();
});
 

// -------------------CART---------------//


