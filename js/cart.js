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
               out += `<div class="menu__title">${cart[id]  }</div>`;
               out += '<br>';
                  out += `<div class="item__buttons">`;
                     out += `<button data-id="${id}" class="del-goods">Delete</button>`
                     out += `<button data-id="${id}" class="minus-goods">-</button>`;
                     out += `<button data-id="${id}" class="plus-goods">+</button>`;
                     out += `<button data-id="${id}" class="is-logged">/</button>`;
                  out +=`</div>`;
            out +=`</div>`;
         out += '<br>';
         out +=`</div>`;  
      }
      $('.main__cart').html(out);
      $('.del-goods').on('click', delGoods);
      $('.plus-goods').on('click', plusGoods);
      $('.minus-goods').on('click', minusGoods);
      $('.is-logged').on('click', checkLogged);
   })
}

function delGoods(){
   var id = $(this).attr('data-id');
   delete cart[id];
   saveCart();
   showCart();
}
function plusGoods(){
   var id = $(this).attr('data-id');
   cart[id]++;
   saveCart();
   showCart();
}
function minusGoods(){
   var id = $(this).attr('data-id');
   if(cart[id]==1){
      delete cart[id];
   }
   else{
      cart[id]--;
   }
   saveCart();
   showCart();
}
function checkLogged(){
   if (Cooki)
{
    alert('logged');
}
else
{
   alert('notLogged');
}
}

function saveCart(){
   localStorage.setItem('cart', JSON.stringify(cart));
}
function isEmpty(object){
   for( var key in object);
   if(object.hasOwnProperty(key)) return true;
   return false;
}

function sendEmail(){
   var ename = $('#ename').val();
   var email = $('#email').val();
   var ephone = $('#ephone').val();
   if(ename !='' && email!='' && ephone !=''){
      if(isEmpty(cart)){
         $.post(
            "core/mail.php",
            {
               "ename" : ename,
               "email" : email,
               "ephone" : ephone,
               "cart" : cart
            },
            function(data){
               if(data==1){
                  alert('Your order is sent');
               }
               else{
                  alert('Repeat your order');
               }
                //console.log('data')// треба створити меілпхп і тоді все має ворк
             }
          );
      }
      else{
         alert('Cart is empty')
      }
   }
   else{
      alert('enter fields')
   }
}

$(document).ready (function (){
   loadCart();
   $('.send-email').on('click', sendEmail);
});



//c 8 минуты


