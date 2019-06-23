$(function(){
   
    $('.table_view>table>tbody>tr:even, .table_view2>table>tbody>tr:even').addClass('even');
   
    sfForm.base_initialize();
    
    FormFormatter.Bootstrap.init();
    
    $('#authlink').click(function(){
       $('.auth_popup').fadeIn();
       return false; 
    });
   
   $('.product .buy a, #product_view .sub a').click(function(){
      if($(this).hasClass('unactive')){
          return true;
      }
      var $this = $(this);
      var $par = $(this).parents('.gp_holder');
      var qty = $par.find('.cart_qty input').size() ? Number($par.find('.cart_qty input').val()) : 1;
      if(isNaN(qty)){
          qty = 1;
      }
      var params = {qty: qty};
      if($par.find('table.radios').size()){
          params.product_id = $par.find('table.radios input:checked').val();
      }
      $.get(this.href, params, function(resp){
         //alert($par.prop('class'));
         gp_show(resp, $par);
         $this.removeClass('yellow');
         $this.text('В корзине');
      });
      return false; 
   });
   
   
    //initializing cart qty inputs
    $('.cart_qty input:text').each(function(){
        $(this).wrap("<div class='input_butts'></div>");
        $(this).parent().append("<div class='tri tri_up'></div><div class='tri tri_down'></div>");
      
        var $this = $(this);
        $this.parent().find('.tri').click(function(){
            var val = Number($this.val());
            if(!isNaN(val)){
                if($(this).hasClass('tri_up')){
                    val += 1;
                }else{
                    if(val > 1){ 
                        val -= 1;
                    }
                }
                $this.val(val);
                $this.change();
            }
        });
        $this.change(function(){
            var val = Number($(this).val());
            if(isNaN(val) || val <= 0){
                return false;
            }
            if($this.hasClass('no_ajax')){
                return false;
            }
            $.get(URL.cart_change_qty, {
                product_id: $(this).attr('product_id'),
                qty: parseInt(val)
            }, function(resp){
                try{
                    var json = $.parseJSON(resp);
                    $('#cart_total').text(json.cart_total);
                }catch(e){
                    alert(resp);
                }
            }); 
        });
    });
   
    $('a.submit').click(function(){
        $(this).parents('form').submit();
        return false;
    });
   
    $('.tabs .tab').click(function(){
        $(this).parent().find('.tab').removeClass('current');
        $(this).addClass('current');
        $(this).parent().parent().find('.tab_content').css({
            position: 'absolute',
            left: -10000,
            top: -10000,
            visibility: 'hidden'
        });
        $(this).parent().parent().find('.tab_content_' + $(this).attr('index')).css({
            position: 'relative',
            left: 0,
            top: 0,
            visibility: 'visible'
        });
        
        if($(this).attr('callback')){
            try{
                window[$(this).attr('callback')]();                
            }catch(e){}
        }

    });
    $('.tabs .tab.current').click();  
    
    setTimeout(function(){
        fix_product_height(45);

        setTimeout(function(){
            fix_product_height(10);
        }, 1000)        
    }, 1000);
    
    $('.rating.active').each(function(){
        var $this = $(this);
        $(this).find('span').hover(function(){
            var index = Number($(this).attr('index'));
            $this.find('span').each(function(){
                var ind  = Number($(this).attr('index'));
                if(ind <= index){
                    $(this).addClass('over');
                }
            });
        }, function(){
            if(!$this.hasClass('processing')){
                $this.find('span').removeClass('over');
            }
        });
       
        $this.find('a').click(function(){
            $this.addClass('processing');
            $.get(this.href, function(resp){
                $this.html(resp);
                $this.removeClass('active');
            });
            return false;
        });
    });

});


function gp_show(html, $parent)
{
    $('.gp').fadeOut();
    var $gp = "<div class='gp __just_added'></div>";
    $parent = $(document.body);
    $parent.append($gp);
    $gp = $parent.find('.__just_added');
    $gp.removeClass('__just_added');
    $gp.append(html);
    
    $gp.fadeIn();
    gp_init($gp);
}

function gp_init($gp){
    $gp.find('.close').click(function(){
        $(this).parents('.gp').fadeOut();
    });
}

function fix_product_height(add)
{

    $('.product_block').each(function(){
        var four = [];
        var height = 0;        
        $(this).find('.viewtype_vertical .product').each(function(index){
            $(this).css('height', 'auto');
            four.push(this);
            if($(this).height() > height){
                height = $(this).height();
            }
            if(!((index + 1) % 4)){
                $(this).addClass('last');
                $(four).each(function(){
                    $(this).css('height', height + add); 
                });
                four = [];
                height = 0;
            } 
        });
        if(four.length){
            $(four).each(function(){
                $(this).css('height', height + add); 
            });        
        }         
    });
   
}

function url_set(name, url)
{
    if(!window.URL){
        window.URL = {};
    }
    window.URL[name] = url;
}

var FormFormatter = {
    Bootstrap: {
        init: function(){
            this.fixCheckboxLabels();
            this.fixLabelPosition();
            this.fixFormErrors();
        },
        fixCheckboxLabels: function(){
            $('.control-group input:checkbox').each(function(){
               var $par = $(this).parents('.control-group');
               $par.find('label').addClass('checkbox-label')
               $(this).parent().append($par.find('label'));
            });
        },
        fixLabelPosition: function(){
            $('.form-horizontal .control-group').each(function(){
                var controls_height = $(this).find('.controls').height();
                var label_height = $(this).find('.control-label').height(); 
                var top = (controls_height - label_height) / 2;
                $(this).find('.control-label').css('margin-top', top);
            });            
        },
        fixFormErrors: function()
        {
            $('.form-error').each(function(){
               $(this).parents('.control-group').addClass('errors');
            });
        }
    }
}