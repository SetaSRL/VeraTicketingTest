<?php
echo sprintf('<form action="%s" method="post" onsubmit="refreshAndClose();">',$info['action']); 
echo sprintf('<h3 class="drag-handle">%s</h3>',$info['title']);##tasks
?>
<b><a class="close" href="#"><i class="icon-remove-circle"></i></a></b>
<hr/>
<div class="clear"></div>
<div class="tab_content" id="summary">
<table border="0" cellspacing="" cellpadding="1" width="100%" class="ticket_info">
    <ul class="bleed-left" id="multitask"> 
    <?php echo $info['returncontent'];?>
    </ul> 
</table>
</div>               
<div>
    <p class="full-width">
        <span class="buttons pull-left">
            <input type="submit" id="done" value="<?php echo $info['buttontext']?>">
        </span>
    </p>
</div>
</form>

<script type="text/javascript">
function refreshAndClose() {
    setTimeout(function () {
        location.reload();
    }, 500);
}
</script>