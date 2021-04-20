download kcfinder https://github.com/sunhater/kcfinder
download ckeditor 4 https://ckeditor.com/ckeditor-4/download/


ckeditor/config.js

CKEDITOR.editorConfig = function( config ) {
	config.filebrowserBrowseUrl = '../assets/vendor/kcfinder/browse.php?type=Files';
	config.filebrowserImageBrowseUrl = '../assets/vendor/kcfinder/browse.php?type=Images';
	config.filebrowserFlashBrowseUrl = '../assets/vendor/kcfinder/browse.php?type=Flash';
	config.filebrowserUploadUrl = '../assets/vendor/kcfinder/upload.php?type=Files';
	config.filebrowserImageUploadUrl = '../assets/vendor/kcfinder/upload.php?type=Images';
	config.filebrowserFlashUploadUrl = '../assets/vendor/kcfinder/upload.php?type=Flash';
	config.filebrowserUploadMethod = 'form';
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};

kcfinder/conf/config.php

'disabled' => false,

or with session




CKEDITOR.replace('ckeditor', {
});


<div class="form-group">
                        <label for="formGroupExampleInput2">Isi Berita :</label>
                        <textarea id=
                        "isiBerita" class="ckeditor" name=""></textarea>
                    </div>
