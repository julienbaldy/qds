$(document).ready(function() 
{ 

  $(".full").hover(function(){
    $(this).addClass('starFull');
    //je recupe l'id radio
    var radioID = $(this).attr('for');
    //je recupe la radio
    var radioBtn = $("#"+radioID);
    //je recupe la valeur de la satisfaction
    var satisfaction = radioBtn.val() - 1;
    //je recupe la box parente
    var box = $(this).parent().parent();
    //je recupe la div qui contient les message à afficher
    var divMess = box.find("div");
    var isActive = false;
    var count = 0;
    divMess.children('span').each(function () {
      if($(this).hasClass("active"))
        {
          isActive = true;
        }
    });
    if(!isActive)
      {
        divMess.children('span').each(function () {
            
          if(count == satisfaction)
            {
              $(this).css( "display", "block" );
            }
            count++;
        });
      }
    
  }, function(){
    
    $(this).removeClass('starFull');
    //je recupe la box parente
    var box = $(this).parent().parent();
    //je recupe la div qui contient les message à afficher
    var divMess = box.find("div");
    var radioID = $(this).attr('for');
    var radioBtn = $("#"+radioID);
    var satisfaction = radioBtn.val() - 1;
    var count = 0;
    divMess.children('span').each(function () {
      if(count == satisfaction)
      {
        $(this).css( "display", "none" );
      }
      count++;
    });
  
  });
  
  $("label").on("click",function(){
    //je recupe l'id radio
    var radioID = $(this).attr('for');
    //je recupe la radio
    var radioBtn = $("#"+radioID);
    //je recupe la valeur de la satisfaction
    var satisfaction = radioBtn.val() - 1;
    //je recupe la box parente
    var box = $(this).parent().parent();
    //je recupe la div qui contient les message à afficher
    var divMess = box.find("div");
    var count = 0;
    divMess.children('span').each(function () {
      if($(this).hasClass("active"))
        {
          $(this).removeClass("active");
        }
    });
    divMess.children('span').each(function () {
      if(count == satisfaction)
        {
          $(this).addClass("active");
          return false;
        }
      count++;
    });
    
  });
  
  
	$("#btn-suivant").on("click",function(){
		var isActive = false;
		var length = $(".box-form-content > div").length;
		$(".box-form-content > div").each(function(index, element) {

			if(isActive)
			{

				$(this).removeClass("box-form-inactive");
				$(this).addClass("box-form-active");
				isActive = false;

				if (index === (length - 2)) {
					$("#btn-suivant").css("display","none");
					$("#btn-valider").css("display","block");
				}

				return false;
			}
			if($(this).hasClass("box-form-active"))
			{
				$(this).removeClass("box-form-active");
				$(this).addClass("box-form-inactive");
				isActive = true;
			}

			$(document).scrollTop( $(".box-form").offset().top );  


        });
	});
});