function product_type(){

    var type = document.getElementById("productType").value;
    if(type == "DVD"){
        document.getElementById("dvd_form").style.display="block";
        document.getElementById("furniture_form").style.display="none";
        document.getElementById("book_form").style.display="none";
    }else if (type == "Furniture"){
        document.getElementById("dvd_form").style.display="none";
        document.getElementById("furniture_form").style.display="block";
        document.getElementById("book_form").style.display="none";
    }else if (type == "Book"){
        document.getElementById("dvd_form").style.display="none";
        document.getElementById("furniture_form").style.display="none";
        document.getElementById("book_form").style.display="block";
    }else{
        document.getElementById("dvd_form").style.display="none";
        document.getElementById("furniture_form").style.display="none";
        document.getElementById("book_form").style.display="none";
    }

}

function check_value(){
    if(document.getElementById("sku").value == parseInt(document.getElementById("sku").value)) {
        document.getElementById("sku").required = true;
        alert("Please, provide the data of indicated type");
        return false;

    }else if(document.getElementById("sku").value == ""){
        alert("Please, submit required data");
        return false;

    }else if(document.getElementById("name").value == parseInt(document.getElementById("name").value)){
        alert("Please, provide the data of indicated type");
        return false;

    }else if(document.getElementById("name").value == "") {
        alert("Please, submit required data");
        return false;

    }else if(document.getElementById("price").value == ""){
        alert("Please, submit required data");
        return false;

    }else if(document.getElementById("DVD").selected == true) {
        if(document.getElementById("size").value == "") {
            alert("Please, submit required data");
            return false;
        }
    }else if(document.getElementById("Furniture").selected == true){
        if(document.getElementById("height").value == "" || document.getElementById("width").value == "" || document.getElementById("length").value == ""){
            alert("Please, submit required data");
            return false;
        }
    }else if(document.getElementById("Book").selected == true){
        if(document.getElementById("weight").value == ""){
            alert("Please, submit required data");
            return false;
        }
    }else if(document.getElementById("none").selected == true){
        alert("Please, choose type of product");
        return false;
    }else{
        return true;
    }
}
