<div class="bloc">
    <div class="content">
		<?php if(isset($_GET['src'])): ?>
			<div class="expand item">
				<table>
					<tr>
						<td style="width:140px"><img src="<?php echo $_GET['src']; ?>"></td>
						<td>
							<p><strong>Nom du fichier :</strong> <?php echo basename($_GET['src']); ?></p>
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td style="width:140px"><label>Titre</label></td>
						<td><input class="title" name="title" type="text"></td>
					</tr>
					<tr>
						<td style="width:140px"><label>Texte alternatif</label></td>
						<td><input class="alt" name="alt" type="text" value="<?php echo $_GET['alt']; ?>"></td>
					</tr>
					<tr>
						<td style="width:140px"><label>Cible du lien</label></td>
						<td><input class="href" name="href" type="text"></td>
					</tr>
					<tr>
						<td style="width:140px"><label>Alignement</label></td>
						<td>
							<input type="radio" name="align" class="align" id="align-none-up" value="none" <?php if($_GET['class'] == '') echo 'checked'; ?>>
							<?php echo $this->Html->image('/media/img/align-none.png'); ?><label for="align-none-up">Aucun</label>

							<input type="radio" name="align" class="align" id="align-left-up" value="left" <?php if($_GET['class'] == 'alignleft') echo 'checked'; ?>>
							<?php echo $this->Html->image('/media/img/align-left.png'); ?><label for="align-left-up">Gauche</label>

							<input type="radio" name="align" class="align" id="align-center-up" value="center" <?php if($_GET['class'] == 'aligncenter') echo 'checked'; ?>>
							<?php echo $this->Html->image('/media/img/align-center.png'); ?><label for="align-center-up">Centre</label>

							<input type="radio" name="align" class="align" id="align-right-up" value="right" <?php if($_GET['class'] == 'alignright') echo 'checked'; ?>>
							<?php echo $this->Html->image('/media/img/align-right.png'); ?><label for="align-right-up">Droite</label>
						</td>
					</tr>
					<tr>
						<td style="width:140px"> &nbsp; </td>
						<td>
							<p><a href="" class="submit">Insérer dans l'article</a>
						</td>
					</tr>
					<input type="hidden" name="file" value="<?php echo $_GET['src']; ?>" class="file">
				</table>
			</div>
		<?php endif; ?>
		<div id="plupload">
		    <div id="droparea" href="#">
		    	<p>Déplacer les fichiers ici</p>
		    	ou<br/>
		    	<a id="browse" href="#">Parcourir</a>
		    </div>
		</div>
		<table class="head" cellspacing="0">
			<thead>
				<tr>
					<th style="width:55%">Médias</th>
					<th style="width:20%">Ordre</th>
					<th style="width:25%">Actions</th>
				</tr>
			</thead>
		</table>
		<div id="filelist">
			<?php echo $this->Form->create('Media',array('url'=>array('controller'=>'medias','action'=>'order'))); ?>
			<?php foreach($medias as $media): $media = current($media);  ?>
				<?php require('media.ctp'); ?>
			<?php endforeach; ?>
			<?php echo $this->Form->end(); ?>
		</div>

    </div>
</div>

<?php $this->Html->script('/media/js/jquery.form.js',array('inline'=>false)); ?>
<?php $this->Html->script('/media/js/plupload.js',array('inline'=>false)); ?>
<?php $this->Html->script('/media/js/plupload.html5.js',array('inline'=>false)); ?>
<?php $this->Html->script('/media/js/plupload.flash.js',array('inline'=>false)); ?>
<?php $this->Html->scriptStart(array('inline'=>false)); ?>

jQuery(function(){
	$( "#filelist>form" ).sortable({
		update:function(){
			i = 0;
			$('#filelist>form>div').each(function(){
				i++;
				$(this).find('input').val(i);
			});
			$('#MediaAdminIndexForm').ajaxSubmit();
		}
	});

	var theFrame = $("#medias<?php echo $id; ?>", parent.document.body);
	console.log(theFrame);
	var uploader = new plupload.Uploader({
		runtimes : 'html5,flash',
		container: 'plupload',
		browse_button : 'browse',
		max_file_size : '50mb',
		flash_swf_url : '<?php echo Router::url('/media/js/plupload.flash.swf'); ?>',
		url : '<?php echo Router::url(array('controller'=>'medias','action'=>'upload',$ref,$ref_id,'editor'=>$editor,'?' => "id=$id")); ?>',
		 filters : [
			{title : "Image files", extensions : "jpg,gif,png"},
			{title : "Movie files", extensions : "avi,mov,mkv,mp4,wmv"},
			{title : "Audio files", extensions : "mp3,wma"},
			{title : "Zip files",   extensions : "rar,tar.gz,tgz,zip"},
		],
		drop_element : 'droparea',
		multipart:true,
		urlstream_upload:true
	});

	uploader.init();

	uploader.bind('FilesAdded', function(up, files) {
		for (var i in files) {
			$('#filelist>form').prepend('<div class="item" id="' + files[i].id + '">' + files[i].name + ' (' + plupload.formatSize(files[i].size) + ') <div class="progressbar"><div class="progress"></div></div></div>');
		}
		uploader.start();
		$('#droparea').removeClass('dropping');
		theFrame.css({ height:$('body').height() + 40 });

	});

	uploader.bind('UploadProgress', function(up, file) {
		$('#'+file.id).find('.progress').css('width',file.percent+'%')
	});

	uploader.bind('FileUploaded', function(up, file, response){
		$('#'+file.id).after(response.response);
		$('#'+file.id).remove();
	});
	uploader.bind('Error',function(up, err){
		alert(err.message);
		$('#droparea').removeClass('dropping');
		uploader.refresh();
	});
	$('#droparea').bind({
       dragover : function(e){
           $(this).addClass('dropping');
       },
       dragleave : function(e){
           $(this).removeClass('dropping');
       }
	});

	$('a.del').live('click',function(e){
		e.preventDefault();
		elem = $(this);
		if(confirm('Voulez vous vraiment supprimer ce média ?')){
			$.post(elem.attr('href'),{},function(data){
				elem.parents('.item').slideUp();
			});
		}
		theFrame.animate({ height:theFrame.height() - 40 });
	});

	$('a.toggle').live('click',function(e){
		e.preventDefault();
		var a = $(this);
		var height = a.parent().parent().find('.expand').outerHeight();
		if(a.text() == 'Afficher'){
			a.text('Cacher');
			a.parent().parent().animate({
				height : 40 + height
			});
			theFrame.animate({
				height : theFrame.height() + height
			});
		}else{
			a.text('Afficher');
			a.parent().parent().animate({
				height : 40
			});
			theFrame.animate({
				height : theFrame.height() - height
			});
		}
	});

	theFrame.height($(document.body).height() + 50);

	<?php if($editor): ?>
		$('a.submit').live('click', function(){
			var $this = $(this);
			var html = createHtmlElement($this);
			var editor = '<?php echo $editor; ?>';
			var win = window.dialogArugments || opener || parent || top;
			win.send_to_<?php echo $editor; ?>(html, window, "<?= $id; ?>");
			return false;
		});

		function createHtmlElement($this) {
			var item = $this.parents('.item');
			var type = $('.filetype', item).val();
			if(type === 'pic') {

				var html = '<img src="'+$('.file', item).val()+'"';
				if( $('.alt', item).val() != '' ){
					html += ' alt="'+$('.alt', item).val()+'"';
				}
				if( $('.align:checked', item).val() != 'none' ){
					html += ' class="align'+$('.align:checked', item).val()+'"';
				}
				html += ' />';
				if( $('.href', item).val() != '' ){
					html = '<a href="'+$('.href', item).val()+'" title="'+$('.title', item).val()+'">'+html+'</a>';
				}
			} else {
				html = '<a href="'+$('.href', item).val()+'" title="'+$('.title', item).val()+'">' + $('.title', item).val() + '</a>';
			}
			return html;
		}

	<?php endif; ?>
});

<?php $this->Html->scriptEnd(); ?>
