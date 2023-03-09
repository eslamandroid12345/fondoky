$(window).on('load', function () {
    if (feather) {
        feather.replace({
            width: 14,
            height: 14
        });
    }
})

var quill = new Quill('#editor', {
    modules: { toolbar: true },
    theme: 'snow'
    });


    var quill = new Quill('#editor', {
        modules: {
          // Equivalent to { toolbar: { container: '#toolbar' }}
          toolbar: '#toolbar'
        }
      });