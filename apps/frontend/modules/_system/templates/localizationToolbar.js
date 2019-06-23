/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document.body).prepend("<div id='DEV2localizationToolbar'></div>");
$(document.body).append("<link rel='stylesheet' type='text/css' href='https://dev.2/css/localizationToolbar.css?rand=" + Math.random() + "' />");
setTimeout(function(){
    $('#DEV2localizationToolbar').append("<span>DEV2</span>");    
    $('#DEV2localizationToolbar').append("<select id='dev2_langs'></select>");
    $('#DEV2localizationToolbar').append("<input type='button' value='Start localization!' id='dev2Start' />");    
    $('#DEV2localizationToolbar').append("<input type='checkbox' id='dev2ForceOverwrite' /><label for='dev2ForceOverwrite'>Force overwrite</label>");        
    for(var i in dev2_langs){
        var lang = dev2_langs[i];
        $('#dev2_langs').append("<option value='" + i + "'>" + lang + "</option>");
    }
    
    $('#dev2Start').click(function(){
        var lang = $('#dev2_langs').val();
        
        var script = document.createElement('script');
        script.type='text/javascript';
        var params = {lang: lang};
        if($('#dev2ForceOverwrite').attr('checked')){
            params.force_overwrite = 'on';
        }
        
        script.src = 'https://dev.2/_system/localizationStart?' + $.param(params);
        document.body.appendChild(script);
    });
    
}, 100);



