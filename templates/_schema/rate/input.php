<?php if(!$self['readonly']): ?>
	<?php if($self['multiple']): ?>
		<input type="hidden" id="<?php echo $self['name'].'-1'?>" name="<?php echo $self['name'].'[]'?>" value="<?php echo $value ?>">
		<div class="rateit bigstars"  data-rateit-starwidth="32" data-rateit-starheight="32" data-rateit-backingfld="#<?php echo $self['name'].'-1'?>"	data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
	<?php else : ?>
		<input type="hidden" id="<?php echo $self['name']?>" name="<?php echo $self['name']?>" value="<?php echo $value ?>">
		<div class="rateit bigstars"  data-rateit-starwidth="32" data-rateit-starheight="32" data-rateit-backingfld="#<?php echo $self['name']?>"	data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
	<?php endif ?>		

<?php else :?>
	<div class="rateit bigstars"  data-rateit-value="<?php echo $value ?>" data-rateit-readonly="true" data-rateit-starwidth="32" data-rateit-starheight="32" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
<?php endif ?>	
