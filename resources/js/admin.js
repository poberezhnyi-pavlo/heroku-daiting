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

    //Date picker
    $('#datePicker').datetimepicker({
        format: 'DD-MM-YYYY',
        viewMode: 'years',
    });

    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize sortable items
    $('.sortable-list').sortable({
        handle: '.sortable-button',
        revert: 100,
        cancel: '',
    }).on( 'sortstop', function( event, ui ) {
        $(this).children().each(function (index, item) {
            $(item).find('input').each(function() {
                this.name = this.name.replace(/\[[0-9]+\]/g, '[' + index + ']');
            });
        });
    });

    // Dynamic add fields
    let youtubeIndex = $( "#dynamicAddVideos .sortable-item" ).length;
    $("#add-video-button").click(function(){
        ++youtubeIndex;

        let videoField = '<div class="input-group sortable-item">\n' +
            '                <div class="input-group-prepend">\n' +
            '                    <span class="input-group-text"><i class="fab fa-youtube"></i></span>\n' +
            '                </div>\n' +
            '                <input\n' +
            '                    type="url"\n' +
            '                    name="woman[video][' + youtubeIndex + ']"\n' +
            '                    class="form-control"\n' +
            '                    placeholder="Enter Youtube vide URL"\n' +
            '                >\n' +
            '                <div class="input-group-append">\n' +
            '                    <button type="button" class="btn btn-danger btn-flat btn-remove">\n' +
            '                        <i class="fas fa-minus-circle"></i>\n' +
            '                    </button>\n' +
            '                    <button type="button" class="btn btn-warning btn-flat sortable-button">\n' +
            '                        <i class="fas fa-arrows-alt"></i>\n' +
            '                    </button>\n' +
            '                </div>\n' +
            '            </div>';

        $("#dynamicAddVideos").append(videoField);
    });

    let imageIndex = 1;
    let imageField = '<div class="input-group sortable-item">\n' +
        '                <div class="input-group-prepend">\n' +
        '                    <span class="input-group-text"><i class="far fa-image"></i></span>\n' +
        '                    <img src="" class="img-preview" />' +
        '                </div>\n' +
        '                <div class="custom-file">\n' +
        '                    <input type="file" class="custom-file-input" id="inputImages" name="woman[image][' + imageIndex + ']">\n' +
        '                    <label class="custom-file-label" for="inputImages">Choose image...</label>\n' +
        '                </div>\n' +
        '\n' +
        '                <div class="input-group-append">\n' +
        '                    <button type="button" class="btn btn-danger btn-flat btn-remove">\n' +
        '                        <i class="fas fa-minus-circle"></i>\n' +
        '                    </button>\n' +
        '                    <button type="button" class="btn btn-warning btn-flat sortable-button">\n' +
        '                        <i class="fas fa-arrows-alt"></i>\n' +
        '                    </button>\n' +
        '                </div>\n' +
        '            </div>';

    $("#add-image-button").click(function(){
        ++imageIndex;
        bsCustomFileInput.destroy();
        $("#dynamicAddImages").append(imageField);
        bsCustomFileInput.init();
    });

    // Dynamic remove fields
    $(document).on('click', '.btn-remove', function(){
        $(this).parents('.sortable-item').remove();
    });

    // Add image preview to file upload fields
    let readURL = (input) => {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = (e) => {
                $(input).parents('.sortable-item')
                    .find('.img-preview')
                    .attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on('change', '#inputImages', function () {
        readURL(this);
    });

    //Init AdminLTE file uploader
    bsCustomFileInput.init();

    //Init SUNEDITOR editor
    let divs  = document.getElementsByClassName('suneditor');

    _.forEach(divs, function(item, key) {
        const editor = SUNEDITOR.create((item || 'suneditor'),{
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

        editor.onChange = function (contents) {
            item.innerHTML = contents;
        }

        let imageList = editor.getImagesInfo();
        let fullImageList = [...imageList] //fucking JS array cloning trick;

        editor.onImageUpload = (targetElement, index, state, info) => {
            if (state === 'create') {
                imageList.push(info);
            } else if (state === 'delete') {
                let images = _.remove(fullImageList, element => {
                    return element.index === index;
                });
                return axios.delete(`/api/stuff/deleteImage/`, {
                    params: {
                        image: images[0].name,
                    }
                });
            }
        }
    });
});
