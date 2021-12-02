$(".form-signin p.label").hide();
$(".form-signin input").on("input",function(a){
  if($(this).val()){
    $(this).parent().find("p.label").show();
    $(this).css("border", "1px solid #cda45e");
    $(this).css("border-start-start-radius", "0");
    console.log($(this).val())
  }else{
    $(this).parent().find("p.label").hide();
    $(this).css("border", "none");
    $(this).css("border-start-start-radius", "0.25rem");
  }
})

$(".btn-view-pass").on("click", function(e){
  e.preventDefault();
  if($(this).find("i").hasClass("fa-eye")){
    $(this).find("i").removeClass("fa-eye");
    $(this).find("i").addClass("fa-eye-slash");
    $(this).parent().find("input").attr("type", "text");
  }else{
    $(this).find("i").addClass("fa-eye");
    $(this).find("i").removeClass("fa-eye-slash");
    $(this).parent().find("input").attr("type", "password");
  }
})