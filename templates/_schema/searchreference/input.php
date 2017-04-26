<style type="text/css">
    .search.reference #<?php echo 'display'.$self['name'] ?> { margin-bottom: 10px; display: inline-block; }
    .search.reference #<?php echo 'display'.$self['name'] ?> div { background-color: #000; padding: 10px; border-radius: 2px; color: #fff; float: left; margin: 0px 5px 5px 0px; }
    .search.reference #<?php echo 'display'.$self['name'] ?> div span.delete { margin-left: 10px; border: 2px solid #fff; border-radius: 100%; cursor: pointer; width: 20px; height: 20px; line-height: 18px; display: inline-block; text-align: center; }
    .search.reference button { position: absolute; top: 2px;right: 0px;padding: 2px 10px!important;margin:0 2px 0 0!important;}
    .search.reference { position: relative;}
    #popupContent .content { width: 500px}
    #popupContent .popup-content {max-height: 210px;height: 210px;overflow: auto;}

</style>

<div class="search reference">
	<input id="<?php echo 'input'.$self['name'] ?>" type="text"  value="<?php echo $self->optionLabel($self['foreignLabel'],$self->rowData($value)) ?>" placeholder="<?php echo ucfirst(str_replace('_', ' ', $self['name'])) ?>" readonly>
	<button type="button" id="<?php echo 'button'.$self['name'] ?>"><i class="xn xn-search"></i></button>
	<input name="<?php echo $self['name'] ?>" value="<?php echo $value ?>" id="<?php echo 'search-'.$self['name'] ?>" type="hidden">


	<div id="target-<?php echo $self['name'] ?>" style="display:none">
            <div class="popup-header">
                <span>Search Data</span>
            </div>

            <div class="popup-search">
                <span class="placeholder"><i class="xn xn-search" ></i>Ketik untuk mencari data</span>
                <input type="search" >
            </div>

            <div class="popup-content">
                <table>
                <thead>
                	<th>test1</th>
                	<th>test2</th>
                	<th>test3</th>
                	<th>test3</th>
                	<th>test3</th>
                	<th>test3</th>
                	<th>test3</th>

                </thead>
                <tbody>
                		<tr>
                			<td>1</td>
                			<td>2</td>
                			<td>3</td>
                			<td>3</td>
                			<td>3</td>
                			<td>3</td>
                			<td>3</td>
                		</tr>
                </tbody>
                </table>
            </div>

            <!-- <ul class="actions popup-action">
                <li><a class="button" href="#" onclick="$.fn.popup().close(); return false;"><i class="fa fa-print"></i> Cetak</a></li>
                <li><a href="#" onclick="$.fn.popup().close(); return false;"><i class="fa fa-doc"></i> Eksport ke CSV</a></li>
            </ul> -->
            <div class="button-area">
                <a href="#" class="button pull-left" onclick="$.fn.popup().close(); return false;"><i class="xn xn-print"></i> Close</a>
                <div class="clear"></div>
            </div>
        </div>
</div>

<script>

$(function(){
	$('button#<?php echo 'button'.$self['name'] ?>').popup({ target : '#target-<?php echo $self['name'] ?>'});

	$.get()
});

</script>
