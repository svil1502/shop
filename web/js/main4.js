/**
 * Created by svetlanailina on 09.08.18.
 */
$("document").ready(function(){
    $("#new_note").on("pjax:end", function() {
        $.pjax.reload({container:"#notes"});  //Reload GridView
    });
});

$("#asc").click(function (e) {
    url = e.currentTarget.href; // Линк берем из ссылки
    var qty = $(this).attr('id');

    $.ajax({
        url: url,
        method: 'GET',
        data: {qty: qty},

        success:function (res) {

            console.log(res);

        },
        error: function() {
            alert('Error');
        }
    });

});


$(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".dropdown-menu li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});


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
