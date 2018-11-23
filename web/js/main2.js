

function GetData()
{
    var id=document.getElementById("product-category_id").value; //id категории
    // получаем индекс выбранного элемента
    var selind = document.getElementById("product-brand_id").options.selectedIndex;
    var id_cat= document.getElementById("product-brand_id").options[selind].id; //category_id
    var txt= document.getElementById("product-brand_id").options[selind].text; //название бренда
    var val= document.getElementById("product-brand_id").options[selind].value; //brand_id
    var col=document.getElementById("product-brand_id").length; //количество брендов в select
    //console.log("product-category_id.value= ", id ," selind=" , selind, "id_cat=", id_cat, "txt= " ,txt+",val="+val+",col=",col);
    var i=0;
    while (i<col) {

        //var per = document.getElementById("product-brand_id").options[i].value; //берем id бренда
        var per= document.getElementById("product-brand_id").options[i].id; // берем id категории
        if (id == per) {
            document.getElementById("product-brand_id")[i].style.display = 'block';

        } else if  (per ==1)
        {
            document.getElementById("product-brand_id")[i].style.display = 'block';


        } else {
            document.getElementById("product-brand_id")[i].style.display = 'none';
        }
        // console.log(i, id, val, document.getElementById("product-brand_id").options[i].value);
        i++;

    }

   // console.log("Теxt= "+ txt +" " + "Value= " + val);
    // console.log( "количество элементов= " + document.getElementById("product-brand_id").length);
}

GetData();

function Selected(a) {
    GetData();
}
