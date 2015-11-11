<style type="text/css">
    #<?php echo 'display'.$name ?> { margin-bottom: 10px; display: inline-block; }
    #<?php echo 'display'.$name ?> div { background-color: #000; padding: 10px; border-radius: 2px; color: #fff; float: left; margin: 0px 5px 5px 0px; }
    #<?php echo 'display'.$name ?> div span.delete { margin-left: 10px; border: 2px solid #fff; border-radius: 100%; cursor: pointer; width: 20px; height: 20px; line-height: 18px; display: inline-block; text-align: center; }
</style>

<input id="<?php echo 'input'.$name ?>" type="text">
<div id="<?php echo 'display'.$name ?>"></div>

<script type="text/javascript">
    $("#<?php echo 'input'.$name ?>").autocomplete({
        source: function (request, response) {
            <?php if ($flag == 1): ?>
                return response(<?php echo $data_sources ?>);
            <?php else: ?>
                $.ajax({
                    url: '<?php echo $data_sources ?>',
                    data: { '<?php echo $key."!like" ?>': request.term },
                    dataType: "json",
                    success: function(data) {
                        response($.map(data.entries, function(item) {
                            return {
                                label: item.<?php echo $key ?>,
                                value: item.<?php echo $val ?>
                            }
                        }));
                    },
                    error: function () {
                        response([]);
                    }
                });
            <?php endif ?>
        },

        select: function(event, ui) {
            var label = ui.item.label,
                value = ui.item.value,
                dom   = '<div><input type="hidden" name="' + '<?php echo $name."[]" ?>' + '" value="' + value + '" />'+ label + '<span class="delete">x</span></div>';

            if (value) $("#<?php echo 'display'.$name ?>").append(dom);

            $("#<?php echo 'input'.$name ?>").val('');
            return false;
        },

        focus: function(event, ui){
            return false;
        }
    });

    $("#<?php echo 'display'.$name ?>").on('keydown', function(e){
        if (e.which == 13) return false;
    });

    $("#<?php echo 'display'.$name ?>").on('click', '.delete', function(e){
        $(this).parent().remove();
    });
</script>