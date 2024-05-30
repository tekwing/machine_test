// FilePond Initialization
FilePond.registerPlugin(FilePondPluginFileEncode, FilePondPluginFileValidateSize, FilePondPluginImageExifOrientation, FilePondPluginImagePreview);

// Get multiple FilePond input elements
var inputMultipleElements = document.querySelectorAll("input.filepond-input-multiple");

// Check if there are multiple input elements
if (inputMultipleElements.length > 0) {
    // Loop through each input element
    inputMultipleElements.forEach(function(inputElement) {
        // Create FilePond instance
        var pond = FilePond.create(inputElement);
        // Set maxFiles option to 1
        pond.setOptions({
            maxFiles: 1
        });
    });
}

// Initialize FilePond for single input element
FilePond.create(document.querySelector(".filepond-input-circle"), {
    labelIdle: 'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',
    imagePreviewHeight: 170,
    imageCropAspectRatio: "1:1",
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200,
    stylePanelLayout: "compact circle",
    styleLoadIndicatorPosition: "center bottom",
    styleProgressIndicatorPosition: "right bottom",
    styleButtonRemoveItemPosition: "left bottom",
    styleButtonProcessItemPosition: "right bottom"
});
