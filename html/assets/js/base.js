
// Function will be called when jQuery is loaded and ready.
$(document).ready(function(){
	
	$("#bannerlist").change(function(){
		document.location.href = this.value;
	});
	
	$("#bannerversionslist").change(function(){
		document.location.href = this.value;
	});
	
	initTools();
	
});

function initTools() {
	$("#tools").click(setToolsOpener);
		
	$("#tools a[href='#showoutlines']").click(function() {
		$("#flash").css("border", "1px solid red");
		
		$.doTimeout("hideoutlines");
		$.doTimeout("hideoutlines", 4000, function() {
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
}