//import plugins for the SUNEDITOR
import plugins from 'suneditor/src/plugins'

jQuery(document).ready(function() {
    //Add active class to menu item
    let currentUrl = window.location.href;
    let element = $("a[href='"+currentUrl+"']").addClass('active');

    //Init Tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    //Init Bootstrap Switchers
    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    //Init SUNEDITOR editor
    const editor = SUNEDITOR.create((document.getElementById('suneditor') || 'suneditor'),{
        height : 'auto',
        minHeight : '200px',
        imageUploadUrl: '/api/stuff/uploadImage',
        plugins: plugins,
        buttonList: [
            ['undo', 'redo'],
            ['fontSize', 'formatBlock'],
            ['paragraphStyle', 'blockquote'],
            ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
            ['fontColor', 'hiliteColor', /**'textStyle'**/],
            ['removeFormat'],
            ['outdent', 'indent'],
            ['align', 'horizontalRule', 'list', 'lineHeight'],
            ['table', 'link', 'image', 'video', 'audio'],
            /** ['imageGallery'] */ // You must add the "imageGalleryUrl".
            ['fullScreen', 'showBlocks', 'codeView'],
        ]
    });

    editor.onChange = function (contents, core) {
        document.getElementById("suneditor").innerHTML = contents;
    }

    // Called when the image is uploaded, updated, deleted.
    /**
     * targetElement: Target element
     * index: Uploaded index (key value)
     * state: Upload status ('create', 'update', 'delete')
     * info: {
     * - index: data index
     * - name: file name
     * - size: file size
     * - select: select function
     * - delete: delete function
     * - element: Target element
     * - src: src attribute of tag
     * }
     * remainingFilesCount: Count of remaining files to upload (0 when added as a url)
     * core: Core object
     */
    editor.onImageUpload = function (targetElement, index, state, info, remainingFilesCount, core) {
        //TODO: Implement image delete

        // if (state==='delete') {
            console.log(editor.getImagesInfo())
            // return axios.post('/api/stuff/deleteImage');
        // }
    }
});
