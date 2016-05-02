<style type="text/css">
#upload-file-<?php echo $self['name']?> {
    
    margin-top: -24px;
    right: 12px;
    margin-right: 5px;
}

#progress-upload-<?php echo $self['name']?>{
	width: 250px;
	display:none;
}


</style>



<div id="uploadimg-<?php echo $self['name']?>" style="border:1px solid;width:250px;height:250px;cursor: pointer;text-align:center;margin: 0 auto">
    <span id="upload-file-<?php echo $self['name']?>" class="xn xn-upload"  href-target="<?php echo $self['name']?>" style="font-size: 2em;position:relative;top:50%;"></span>
</div>
<input type="file" id="<?php echo $self['name']?>"  style="display:none"/>
<div id="progress-upload-<?php echo $self['name']?>">
	<progress value="0" max="100" style="width:100%;position:relative"></progress>
	<span class="progress-value">0%</span>
</div>


<script type="text/javascript">
$(function(){
	$("#uploadimg-<?php echo $self['name']?>").on('click',function(e){
		$('#'+$(e.target).attr('href-target')).trigger('click');

	});
	$('#<?php echo $self['name']?>').on('change',function(){
		var input = this;

		// var selector = this.querySelector('input[type="file"]');
        var data = new FormData();
        var name = this.name;
        var that = this;
        var prefixs = '<?php echo $url ."?bucket=".$self["bucket"] ?>';
        var urlimage = '<?php echo URL::base("data"); ?>';

        

        if (input.files && input.files[0]) {
        	data.append('files[]', input.files[0]);
        }else{
        	return;
        }

        $.ajax({
            url: prefixs,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();

                if (myXhr.upload) {
                    myXhr.upload.addEventListener('progress', function(e){
                        if (e.lengthComputable) {
                            var progress = Math.round(e.loaded / e.total * 100)

                            $('#progress-upload-<?php echo $self['name']?> progress').attr({value:e.loaded,max:e.total});
                            $('#progress-upload-<?php echo $self['name']?> .progress-value').html(progress + '%');
                        }
                    }, false);
                }
                return myXhr;
            },
            beforeSend: function(){
                $("#progress-upload-<?php echo $self['name']?>").show();
                
            },
            error: function(){
                $("#progress-upload-<?php echo $self['name']?>").hide();
            	
            },
        }).done(function(result){
            var data = JSON.parse(result);

            console.log(data);
            console.log("url('"+ urlimage +"/"+ data.uri+ data.filename + "'");

            $("#uploadimg-<?php echo $self['name']?>").css("background-image","url('"+ urlimage +"/"+ data.uri+ data.filename + "')");
            
            $("#progress-upload-<?php echo $self['name']?>").hide();
            if (input.files && input.files[0]) {
				$('input[name="<?php echo $self['name']?>"]').val(data.filename);
			}


        });


	});

})
</script>