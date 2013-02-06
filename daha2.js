$(function(){
	$(".daha").click(function(){
		var id=$("#icerik tr:last").attr("id");
		var t=$(this);
		$("span",this).hide();
		$("div",this).show();
		$.ajax({
		
			type:"post",
			url:"ajax2.php",
			data:{"id":id},
			success:function(cevap){
			
				if (cevap=='yok'){
					alert("daha fazla veri kalmadı.");
					$(".daha").remove();
				}else{
				
					$("#icerik").append(cevap);
					$("div",t).hide();
					$("span",t).show();
				}
				
			}
		});
	});
});