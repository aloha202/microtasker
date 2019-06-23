
<div id="customer_support_popup" class="popup">
    <div class="popup_inner">
    <div id="customer_support_content" class="popup_content form">
        <div class='contact_form'>
        <?php include_component('contactus', 'form'); ?>
        </div>
    </div>
    </div>
    <a href="#" class="close"></a>
</div>

<div id="customer_support_zagl">

</div>

<script type="text/javascript">


    function popup_show($popup)
    {
        $('#customer_support_zagl').show().css('height', $(document).height());
        $popup.show();
                  
    }
            
    function popup_position($popup)
    {
        var left = ($(window).width() - $popup.width()) / 2;
        var top = ($(window).height() - $popup.height()) / 2;
        if(top < 0){
            top = 0;
        }
        $popup.css({
            left: left,
            top: top
        });                
    }
            
    function popup_hide($popup)
    {
        $('#customer_support_zagl').hide();
        $popup.hide();
    }
            
    function popup_init($popup)
    {
        $popup.find('form').submit(function(){
            $.post(this.action, $(this).serialize(), function(resp){
                if(resp == 1){
                    popup_hide($popup);
                    alert('Your message has been sent! Thank you!');
                    //document.location.href = document.location.href;
                }else{
                    $popup.find('.popup_content').html(resp);
                    popup_init($popup);
                    popup_position($popup);
                    
                    init_error_tr();
                }
            });
            return false; 
        });
    }
            
    $(function(){
               

        $('#customer_support').click(function(){
            popup_show($('#customer_support_popup'));
            popup_position($('#customer_support_popup'));
            return false; 
        });
        $('#customer_support_zagl, #customer_support_popup .close').click(function(){
            popup_hide($('#customer_support_popup'));
            return false;
        });
        popup_init($('#customer_support_popup'));
    });
</script>    