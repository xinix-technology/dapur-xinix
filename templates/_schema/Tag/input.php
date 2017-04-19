
<link rel="stylesheet" href="<?php echo Theme::base('vendor/jqwidgets/jqwidgets/styles/jqx.base.css')?>" type="text/css" />
<script type="text/javascript" src="<?php echo Theme::base('vendor/jqwidgets/jqwidgets/jqxcore.js') ?>"></script>       
<script type="text/javascript" src="<?php echo Theme::base('vendor/jqwidgets/jqwidgets/jqxdata.js') ?>"></script>       
<script type="text/javascript" src="<?php echo Theme::base('vendor/jqwidgets/jqwidgets/jqxbuttons.js') ?>"></script>       
<script type="text/javascript" src="<?php echo Theme::base('vendor/jqwidgets/jqwidgets/jqxscrollbar.js') ?>"></script>       
<script type="text/javascript" src="<?php echo Theme::base('vendor/jqwidgets/jqwidgets/jqxlistbox.js') ?>"></script>       
<script type="text/javascript" src="<?php echo Theme::base('vendor/jqwidgets/jqwidgets/jqxcombobox.js') ?>"></script>       

<style>
#dropdownlistWrapperjqxComboBox-<?php echo $self["name"]?>{
	padding: 3px 30px 2px 5px!important;
 }

 #dropdownlistContentjqxComboBox-<?php echo $self["name"]?>{
 	width: 100%!important;
 	border-right: none;
 }
 #dropdownlistArrowjqxComboBox-<?php echo $self["name"]?>{
 	background: none!important;
 	left: 94%!important;
 	height: 25px!important;
    width: 28px!important;
 }
</style>

<div class="dpx-xinix-tag">
	<div style="border-color: #c6d5e7;" id='jqxComboBox-<?php echo $self["name"]?>'></div>
	<input type="hidden" name="<?php echo $self['name']?>" id="<?php echo $self['name']?>"/>
</div>



<script type="text/javascript">
            $(document).ready(function () {               
            	var url,source;
            	var result = <?php echo json_encode($value) ?>;
            	var dataAdapter = [];
				var field = '<?php echo $self['field'] ?>';
            	var def =  $.Deferred();
            	
            	def.then(function(){
            		<?php if ($flag == 2): ?>
	                	url = '<?php echo $data_sources ?>';
	                	
	                	var deferd = $.Deferred();
	                	$.get(url).done(function(data){

	                		if(data.entries){
	                			console.log(data.entries);
	                			for (var i = 0; i < data.entries.length; i++) {
	                				dataAdapter.push(data.entries[i][field]);
	                			};
	                		}
	                		return deferd.resolve(dataAdapter);

	                	}).fail(function(){
	                		return deferd.reject(dataAdapter);
	                	});

	                	return deferd.promise();
	                <?php else: ?>
	                	dataAdapter = <?php echo json_encode($data_sources) ?>;
	                	return dataAdapter;
	                <?php endif ?>
                 
            	}).then(function(dataAdapter){
            			// Create a jqxComboBox
                		$("#jqxComboBox-<?php echo $self['name']?>").jqxComboBox({ selectedIndex: 0, source: dataAdapter,multiSelect:true,width:'100%'});

                		for (var i = 0; i < result.length; i++) {
							$("#jqxComboBox-<?php echo $self['name']?>").jqxComboBox('selectItem',result[i]);
                		};

                		// trigger selection changes.
                		$("#jqxComboBox-<?php echo $self['name']?>").on('change', function (event) {
                		    var items = $(this).jqxComboBox('getSelectedItems');
			                var datarray = [];
			                for (var i = 0; i < items.length; i++) {
			                	datarray.push(items[i].value);
			                };
			                var jsonstring = JSON.stringify(datarray);
			                console.log(jsonstring);

			               $('.dpx-xinix-tag #<?php echo $self["name"]?>').val(jsonstring);

			            });

            		}
            	);
            	def.resolve();
            	
            });
</script>