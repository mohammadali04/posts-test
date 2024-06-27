<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه شخصی</title>
    <link rel="stylesheet" href="{{asset('files/css/bootstrap.css')}}">
    <script src="{{asset('files/js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('files/js/bootstrap.js')}}"></script>
</head>

<body>
    <div class="container bg-light">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"href="{{Route('register')}}">ثبت نام</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('login')}}">ورود</a>
                            </li>
                           
                            <li class="nav-item">
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
            </div>

            @yield('content')
        </div>
    </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js">
    </script>
    <script>
    $(document).ready(function() {

        // Define function to open filemanager window
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix :
                '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager',
                'width=900,height=600');
            window.SetUrl = cb;
        };

        // Define LFM summernote button
        var LFMButton = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function() {

                    lfm({
                        type: 'image',
                        prefix: '/laravel-filemanager'
                    }, function(lfmItems, path) {
                        lfmItems.forEach(function(lfmItem) {
                            context.invoke('insertImage', lfmItem
                                .url);
                        });
                    });

                }
            });
            return button.render();
        };

        // Initialize summernote with LFM button in the popover button group
        // Please note that you can add this button to any other button group you'd like
        $('#summernote').summernote({
            height: 300,
            toolbar: [
                ['popovers', ['lfm']],
                ['style', ['style']],
                ['style', ['bold', 'italic', 'underline', 'strikethrough',
                    'superscript', 'subscript', 'clear'
                ]],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video', 'hr', 'readmore']],
                ['genixcms', ['elfinder']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
            buttons: {
                lfm: LFMButton
            }
        });
    });
    $('#lfm').filemanager('image');
    </script>
</body>

</html>