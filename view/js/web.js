function plus(){
    num = parseInt($("#quantity").val());
    tem = num+1;
    $("#quantity").val(tem);
}
function minus(){
    num = parseInt($("#quantity").val());
    if(num>1){
    tem = num-1;
    }
    $("#quantity").val(tem);
}