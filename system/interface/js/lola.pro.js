$(function(){
	var settingsPanel = $('.settings-panel'),
		saveSettings = $('#save-settings');

	$('#edit-settings').on('click', function(){
		settingsPanel.toggleClass('open');
	});
	$('.close-sidebar').on('click', function(){
		settingsPanel.removeClass('open');
	});
	saveSettings.on('click', function() {
		setTimeout(function() { saveSettings.removeClass('success').attr('value','Save settings'); settingsPanel.removeClass('open');}, 2000);
	});
	$('#add-website').on('click', function(){
		$('.dark-panel').toggleClass('open');
	});
	$('#create-website').on('click', function(){
		setTimeout(function() { $('#create-website').removeClass('success').attr('value','Create website'); $('.dark-panel').removeClass('open'); location.reload();}, 2000) ;
	});
});
$('#save-settings').on('click', function(){
				var dataString = $('#update-settings').serialize(); 
		$.ajax({  
		  type: "POST",  
		  url: "lola/init.lola.php",  
		  data: dataString,
		  success: function(data, status, xhr){
		     //You can use your 'data' var as always
		     if(xhr.getResponseHeader("settingsSaved") == 1){
		        $('#save-settings').addClass('success').attr('value','Settings saved');
		     }else{
		        $('#save-settings').addClass('error').attr('value', xhr.getResponseHeader("settingsSaved"));
		     }         
		  }  
			});  
		return false;  
		});

		$('#create-website').on('click', function(){
				var dataString = $('#process-website').serialize(); 
		$.ajax({  
		  type: "POST",  
		  url: "lola/init.lola.php",  
		  data: dataString,
		  success: function(data, status, xhr){
		     //You can use your 'data' var as always
		     if(xhr.getResponseHeader("createWebsite") == 1){
		        $('#create-website').addClass('success').attr('value','Website created');
		     }else{
		        $('#create-website').addClass('error').attr('value', xhr.getResponseHeader("websiteCreated"));
		     }         
		  }
			});  
		return false;  
		})
