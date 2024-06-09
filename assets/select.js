$("#kabupaten").change(function(){
    if($(this).val() == 3){
      $("#select2").show();
    }else{
      $("#select2").hide();
    }
});