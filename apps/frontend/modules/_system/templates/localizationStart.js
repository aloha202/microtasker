/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//var dev2_dictionary
//var dev2_lang

        
	function translate(index)
	{	         
		var values = dev2_dictionary;
		if(typeof values[index] == 'undefined'){
                    if(index)
			alert('Localization is done');
                    else
                        alert('There is nothing to localize, probably you have to add some localization data or check Force Overwrite')
		}else{
			var obj = values[index];
			var $source = $('#source');
			$source.val(obj.text);
			setTimeout(function(){
				var $resbox = $('#result_box');
				var translation = $resbox.text();
				send_translation(obj.id, translation, index);
			}, 5000);
		}
	}

	function send_translation(id, value, index)
	{
		var script = document.createElement('script');
		script.type='text/javascript';
                params = $.param({
                    id: id,
                    lang: dev2_lang,
                    value: value,
                    index: index
                });
		script.src = 'https://dev.2/_system/localizationProcess?' + params;
		document.body.appendChild(script);
	}
        
        
        translate(0);