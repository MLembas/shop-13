function init(){
   $.post(
      "core.php",
      {
         "action" : "init"
      },
      showGoods
   );
}

function showGoods(data){
   //console.log(data);
   data = JSON.parse(data);
   var out='<select>';
   out +=`<option data-id="0">New item</option>`;
   for(var id in data){
      out += `<option data-id="${id}">${data[id].menu__title}</option>`;
   }
   out +='</select>';
   $('.goods__out').html(out); 
   $('.goods__out select').on('change', selectGoods);
}

function selectGoods(){
   var id = $('.goods__out select option:selected').attr('data-id');
   console.log(id);
   $.post(
      "core.php",
      {
         "action" : "selectOneGoods",
         "gid" : id
      },
      function(data){
         data = JSON.parse(data);
         $('#gimg').val(data.menu__img);
         $('#gmenu__name').val(data.menu__title);
         $('#gmenu__price').val(data.menu__price);
         $('#gmenu__descr').val(data.menu__text);
         $('#gmenu__raiting').val(data.menu__raiting);
         $('#gmenu__order').val(data.ord);
         $('#gid').val(data.id);
      }
   );
}

function saveToDb(){
   var id = $('#gid').val();
   console.log(id);
   if(id!=0){
      $.post(
         "core.php",
         {
            "action" : "updateGoods",
            "id" : id,
            "gimg" : $('#gimg').val(),
            "gmenu__title" : $('#gmenu__title').val(),
            "gmenu__price" : $('#gmenu__price').val(),
            "gmenu__descr" : $('#gmenu__descr').val(),
            "gmenu__raiting" : $('#gmenu__raiting').val(),
            "gmenu__order" : $('#gmenu__order').val(),
         },
         function(data){
            if(data==1){
               alert('Update done');
               init();
            }
             else{
               console.log(data);
             }
         }
      );
   }
   else{
      $.post(
         "core.php",
         {
            "action" : "newGoods",
            "id" : 0,
            "gimg" : $('#gimg').val(),
            "gmenu__title" : $('#gmenu__title').val(),
            "gmenu__price" : $('#gmenu__price').val(),
            "gmenu__descr" : $('#gmenu__descr').val(),
            "gmenu__raiting" : $('#gmenu__raiting').val(),
            "gmenu__order" : $('#gmenu__order').val(),
         },
         function(data){
            if(data==1){
               alert('Item added');
               init();
            }
             else{
               console.log(data);
             }
         }
      );
   }
}

$(document).ready(function (){
   init();
   $('.add-to-db').on('click', saveToDb);
});