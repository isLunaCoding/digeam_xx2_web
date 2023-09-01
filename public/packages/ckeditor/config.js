/**
 * @license Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.filebrowserImageUploadUrl =
        "/ckeditor/upload?opener=ckeditor&type=images";
    config.filebrowserBrowseUrl = "/packages/ckfinder/filePath.html";
    config.filebrowserImageBrowseUrl = "/packages/ckfinder/filePath.html";
    config.filebrowserUploadMethod = "form";
    config.image_previewText = " ";
    config.width = "1280px";
    config.height = "500px";
};
