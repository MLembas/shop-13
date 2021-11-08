var cart = {};

function loadCart(){
   if(localStorage.getItem('cart')){
      cart = JSON.parse(localStorage.getItem('cart'));
      //showMiniCart();
      if (!isEmpty(cart)){
         $('.main__cart').html('Cart is empty');
      }
      else{
         showCart();
         console.log("vfdfvd")
      }
      
   }
   else{
      $('.main__cart').html('Cart is empty');
   }
}

function showCart(){
   $.getJSON('goods.json', function (data){
      var goods = data;
      var out = '';
      for(var id in cart){
         
         
         out +=`<div class="cart__item">`;
            out += `<img src="img/${goods[id].menu__img}" alt="PICTURE HERE" class="img-fluid">`;
            out += `<div class="item__description">`;
               out += `<div class="menu__title">${goods[id].menu__title  }</div>`;
               out += '<br>';
               out += `<div class="menu__price">${goods[id].menu__price  }</div>`;
               out += '<br>';
               out += `<div class="menu__text">${goods[id].menu__text  }</div>`;
               out += '<br>';
               out += `<div class="menu__raiting">${goods[id].menu__raiting  }</div>`;
               out += '<br>';
               out += `<div class="menu__title">Кількість: ${cart[id]  }</div>`;
               out += '<br>';
                  // out += `<div class="item__buttons">`;
                  //    out += `<button data-id="${id}" class="del-goods">Delete</button>`
                  //    out += `<button data-id="${id}" class="minus-goods">-</button>`;
                  //    out += `<button data-id="${id}" class="plus-goods">+</button>`;
                  // out +=`</div>`;
            out +=`</div>`;
         out += '<br>';
         out +=`</div>`;  
      }
      $('.main__cart').html(out);
   })
}

function saveCart(){
   localStorage.setItem('cart', JSON.stringify(cart));
}
function isEmpty(object){
   for( var key in object);
   if(object.hasOwnProperty(key)) return true;
   return false;
}


$(document).ready (function (){
   loadCart();
   $('.send-email').on('click', sendEmail);
});

