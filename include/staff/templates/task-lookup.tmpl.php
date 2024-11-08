<?php
$msg_info = __('Search') . ' '. __('Task');
if ($info['search'] === false)
    $msg_info = __('Complete the form below to add a new task.');

?>

<div id="the-lookup-form">
<b><a class="close" href="#"><i class="icon-remove-circle"></i></a></b>
<hr/>
<div><p id="msg_info"><i class="icon-info-sign"></i>&nbsp; <?php echo $msg_info; ?></p></div>
<?php
if ($info['search'] !== false) { ?>
<div style="margin-bottom:10px;">
    <input type="text" class="search-input" style="width:100%;"
    placeholder="<?php echo 'Inserire almeno 3 lettere per avviare la ricerca'; ?>" id="task-search"
    autofocus autocorrect="off" autocomplete="off"/>
</div>
<?php } ?>
<script type="text/javascript">
$(function() {
    var last_req;
    $('#task-search').typeahead({
        source: function (typeahead, query) {
            if (last_req) last_req.abort();
            last_req = $.ajax({
                url: "ajax.php/tasks/titles?q="+query,
                dataType: 'json',
                success: function (data) {
                    typeahead.process(data);
                }
            });
        },
        onselect: function (obj) {
            $('input:text')[2].value = obj.id;
            this.$element.val('');
                    return false;
        },
        property: "/bin/true"
    });

    $('a#unselect-user').click( function(e) {
        e.preventDefault();
        $("#msg_error, #msg_notice, #msg_warning").fadeOut();
        $('div#selected-user-info').hide();
        $('div#new-user-form').fadeIn({start: function(){ $('#task-search').focus(); }});
        return false;
     });

    $(document).on('click', 'form.user input.cancel', function (e) {
        e.preventDefault();
        $('div#new-user-form').hide();
        $('div#selected-user-info').fadeIn({start: function(){ $('#task-search').focus(); }});
        return false;
     });
});
</script>