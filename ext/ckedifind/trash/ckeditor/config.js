CKEDITOR.editorConfig = function(config) {
   config.filebrowserBrowseUrl = '/sbastore/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = '/sbastore/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = '/sbastore/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = '/sbastore/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = '/sbastore/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = '/sbastore/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=flash';
};
CKEDITOR.config.allowedContent = true; 
 