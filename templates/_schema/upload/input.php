<input type="text" value="<?php $value ?>" id="<?php echo $self['name']?>" placeholder="<?php echo l($self['label']) ?>" autocomplete="off" style="display:block;padding-right:30px" />
<span id="upload-file-<?php echo $self['name']?>" class="xn xn-upload" style="position:absolute;cursor: pointer;margin-top:	-24px;right:4px;" href-target="<?php echo $self['name']?>"></span>
<input type="file" name="<?php echo $self['name']?>"   style="display:none"/>
<script type="text/javascript">
$(function(){

	$("#upload-file-<?php echo $self['name']?>").on('click',function(e){
		$('input[name="'+$(e.target).attr('href-target')+'"]').trigger('click');

	});

	$('input[name="<?php echo $self['name']?>"]').on('change',function(){
		var input = this;
		if (input.files && input.files[0]) {
				$('#<?php echo $self['name']?>').val(input.files[0].name);
		}

	});

})
</script>