</div>
		
	</div>
	<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script>
		$(".collapse").click(function(){
			$(".collapse").hide();
			$(".uncollapse").show();
			$(".collapse").parent().width("5%");
			$(".panelRight").css('width','95%');
			$(".panelRight").css('margin-left','5%');
			$(".liTxt").hide();
		});
		$(".uncollapse").click(function(){
			$(".uncollapse").hide();
			$(".collapse").show();
			$(".collapse").parent().width("20%");
			$(".panelRight").css('width','80%');
			$(".panelRight").css('margin-left','20%');
			$(".liTxt").show();
		});
		$(".menu li").click(function(){
			$(".menu").find(".menuSelected").removeClass("menuSelected");
			$(this).addClass("menuSelected");
		});
	</script>
</body>
</html>

