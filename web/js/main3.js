document.querySelector('#product-category_id').addEventListener('click', function(e){ // Вешаем обработчик клика на UL, не LI
    var id = e.target.id; // Получили ID, т.к. в e.target содержится элемент по которому кликнули

    document.querySelector('#test strong').innerHTML = id; // For example

});

var id=document.getElementById("product-category_id").value;
document.querySelector('#test strong').innerHTML = id; // For example

document.querySelector('#product-brand_id').addEventListener('click', function(e){ // Вешаем обработчик клика на UL, не LI
    var id_block = e.target.id; // Получили ID, т.к. в e.target содержится элемент по которому кликнули

    if (id_block != id) {
        document.getElementById("product-brand_id").style.display='none';
    }


    document.querySelector('#test2 strong').innerHTML = id; // For example

});



function O(obj)
{
    if (typeof obj =='object') return obj
    else return document.getElementById(obj)
}

function S(obj)
{
   return O(obj).style
}

function C(name)
{
    var elements = documents.getElementsByTagName('*')
    var objects = []
    for (var i=0;i<elements.length; ++i)
        if (elements[i].classname==name)
            objects.push(elements[i])
    return objects
}

document.getElementById("product-brand_id").style.display='block';

function GetData()
{
    // получаем индекс выбранного элемента
    var selind = document.getElementById("SelectMyLove").options.selectedIndex;
    var txt= document.getElementById("SelectMyLove").options[selind].text;
    var val= document.getElementById("SelectMyLove").options[selind].value;

    alert("Теxt= "+ txt +" " + "Value= " + val);
}

$('#filtr2').on('click', function (){
    //url="<?php echo \Yii::$app->getUrlManager()->createUrl('category/start') ?>";
    $.ajax({

        url: '/category/start',
        data: {rang2: '123'},
        type: 'GET',
        success: function(res){
            console.log(res);

        },
        error: function(){
            alert('Error!');
        }
    });

});




$('.catalog').dcAccordion({
    speed: 300
});

function showCart(cart){
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}


$('.fart').on('click', function (e){
    url = e.currentTarget.href; // Линк берем из ссылки
    $.ajax({
       // url: './cart/show',
        url: url,
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showCart(res);
        },
        error: function(){
          //  getCart2();
            alert('Error!');
        }
    });
    return false;
});






$('#cart .modal-body').on('click', '.del-item', function(e){
    url = e.currentTarget; // Линк берем из ссылки
    var id = $(this).data('id');
    console.log(url,id);
    $.ajax({
        url: url,
        data: {id: id},
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showCart(res);
        },
        error: function(){
          alert("Error222");
        }
    });
    return false;
});


$('.cart-del').on('click', function (e){
    url = e.currentTarget; // Линк берем из ссылки
    $.ajax({
        url: url,
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showCart(res);
        },
        error: function(){
           alert("Ошибка");
        }
    });
    return false;
});

$('.add-to-cart').on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id'),
        qty = $('#qty').val();
    url = e.currentTarget.href; // Линк берем из ссылки
    $.ajax({
        url: url,
       // url: './cart/add',
        //url: "<?php echo \Yii::$app->getUrlManager()->createUrl('cart/add') ?>",
       // url: "'.\yii\helpers\Url::to(['/cart/add', 'id' => $product->id]).'",
       //  url: "'.Yii::$app->urlManager->createUrl(['cart/add').'",
        //"<?php echo \Yii::$app->getUrlManager()->createUrl('cases/ajax') ?>"
        data: {id: id, qty: qty},
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showCart(res);
        },
        error: function(){
            alert('Error!');
        }
    });
});


var RGBChange = function() {
    $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
};

/*scroll to top*/

$(document).ready(function(){
    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
});
