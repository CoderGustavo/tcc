$(document).ready(function(){
    setTimeout(function(){
      $(".autohide").hide(100);
    }, 5000);
    $(".confirm-conta").on("click",function(){
      let num_pessoas = $(this).parent().parent().find(".modal-body").find("#numeropessoas").val();
      let total = $(this).parent().parent().find(".modal-body").find("h2").text();
      let totalDividido = 0;
      total = parseInt(total.split(" ")[total.split(" ").length-1]);
      totalDividido = total/num_pessoas;
      $(this).parent().parent().find(".modal-body").find("h3").text("Total por pessoa: R$ "+totalDividido);
    })
});