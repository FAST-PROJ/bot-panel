$('.file-upload-input').on('change', function() {
    readURL(this);
});

$('.file-upload-btn').on('click', function() {
    $('.file-upload-input').trigger('click');
});

$('.remove-file').on('click', function() {
    removeUpload()
});

function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.file-upload-wrap').hide();

            $('.file-upload-file').attr('src', e.target.result);
            $('.file-upload-content').show();
            $('.file-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.file-upload-wrap').show();
}

$('.file-upload-wrap').bind('dragover', function () {
    $('.file-upload-wrap').addClass('file-dropping');
});

$('.file-upload-wrap').bind('dragleave', function () {
    $('.file-upload-wrap').removeClass('file-dropping');
});

(function($) {
    $.fn.onEnter = function(func) {
        this.bind('keydown', function(e) {
            if (e.keyCode == 13) func.apply(this, [e]);
        });
        return this;
     };
})(jQuery);

$( function () {
    $(".ChatInput").onEnter( function() {
        setTimeout(() => {
            $('.ChatLog').scrollTop(1000);
        }, 500);
    });
});