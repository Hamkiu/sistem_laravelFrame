<html>
    <body>
         <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="{{asset('template/src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('template/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('template/src/plugins/src/mousetrap/mousetrap.min.js')}}"></script>
        <script src="{{asset('template/src/plugins/src/waves/waves.min.js')}}"></script>
        <script src="{{asset('template/layouts/vertical-light-menu/app.js')}}"></script>
        <script src="{{asset('template/src/plugins/src/global/vendors.min.js')}}"></script>
        <script src="{{asset('template/src/assets/js/custom.js')}}"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{asset('template/src/plugins/src/apex/apexcharts.min.js')}}"></script>
        <script src="{{asset('template/src/assets/js/dashboard/dash_1.js')}}"></script>\

        <script type="importmap">
            {
                "imports": {
                    "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js",
                    "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.2.0/"
                }
            }
        </script>
        <script type="module">
            import {
                ClassicEditor,
                Essentials,
                Paragraph,
                Bold,
                Italic,
                Font
            } from 'ckeditor5';

            ClassicEditor
                .create( document.querySelector( '#editor' ), {
                    plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
                    toolbar: [
						'undo', 'redo', '|', 'bold', 'italic', '|',
						'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                    ]
                } )
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script>
        <script>
            function viewPreview(gambar, idpreview){
                var gb = gambar.files;
                for(var i = 0; i<gb.length; i++){
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var preview = document.getElementById(idpreview);
                    var reader = new FileReader();
                    if(gbPreview.type.match(imageType)){
                        preview.file = gbPreview;
                        reader.onload = (function (element){
                            return function (e){
                                element.src = e.target.result;
                            };
                        })(preview)
                        reader.readAsDataURL(gbPreview);
                    }else{
                        alert("Type file tidak sesuai.");
                    }
                }
            }
        </script>
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    </body>
</html>