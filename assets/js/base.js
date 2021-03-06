function initTools() {
	$("#tools a[href='#showoutlines']").click(function() {
		$("#flash").css("border", "1px solid red");
		
		$.doTimeout("hideoutlines");
		$.doTimeout("hideoutlines", 3000, function() {
			$("#flash").css("border", "0px");
		});
		
		return false;
	});
	
	function setToolsOpener() {
		$("#tools").animate({height: "150px"}, 300);
		
		$("#tools").unbind("click", setToolsOpener);
		$("#tools a[href='#closetools']").click(setToolsCloser);

		return false;
	}
	
	function setToolsCloser() {
		$("#tools").animate({height: "30px"}, 300);
		
		$("#tools a[href='#closetools']").unbind("click", setToolsCloser);
		$("#tools").click(setToolsOpener);

		return false;
	}

	$("#tools").click(setToolsOpener);
}

$(document).ready(function(){
	$("#bannerlist").change(function() {
    if(this.value !== '-') {
      document.location.href = this.value;
    }
	});
	
	$("#bannerversionslist").change(function() {
    if(this.value !== '-') {
      document.location.href = this.value;
    }
	});
	
	initTools();
});
