"use strict";$(".item1").mouseover(function(){$(".item1Show").css({display:"block"}).mouseleave(function(){$(".item1Show").css({display:"none"})})}),$(".goTop").on("click",function(){$("html , body").animate({scrollTop:0},"slow")}),$(".goCar").on("click",function(){location.href="../html/car.html"});