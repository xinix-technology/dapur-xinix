<style type="text/css">
    #<?php echo 'display'.$self['name'] ?> { margin-bottom: 10px; display: inline-block; }
    #<?php echo 'display'.$self['name'] ?> div { background-color: #000; padding: 10px; border-radius: 2px; color: #fff; float: left; margin: 0px 5px 5px 0px; }
    #<?php echo 'display'.$self['name'] ?> div span.delete { margin-left: 10px; border: 2px solid #fff; border-radius: 100%; cursor: pointer; width: 20px; height: 20px; line-height: 18px; display: inline-block; text-align: center; }
</style>

<input id="<?php echo 'input'.$self['name'] ?>" type="text">
<div id="<?php echo 'display'.$self['name'] ?>"></div>

<script type="text/javascript">
    $("#<?php echo 'input'.$self['name'] ?>").autocomplete({
        source: function (request, response) {
            <?php if ($flag == 1): ?>
                var matches = $.map(<?php echo $data_sources ?>, function (acItem) {
                    if (acItem.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                        return acItem;
                    }
                });
                response(matches);
            <?php elseif ($flag == 3): ?>
                var data = '<?php echo $data_sources ?>';
                data = JSON.parse(data);

                var matches = $.map(data, function (acItem) {
                    if (acItem.label.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                        return {
                            label: acItem.label,
                            value: acItem.value
                        }
                    }
                });
                response(matches);
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

        focus: function(event, ui){
            return false;
        }
    });

    $("#<?php echo 'display'.$self['name'] ?>").on('keydown', function(e){
        if (e.which == 13) return false;
    });

    $("#<?php echo 'display'.$self['name'] ?>").on('click', '.delete', function(e){
        $(this).parent().remove();
    });
</script>