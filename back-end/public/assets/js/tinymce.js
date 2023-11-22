$(function () {
    "use strict";

    //Tinymce editor
    if ($("#content").length) {
        tinymce.init({
            selector: "#content",
            height: 400,
            theme: "silver",
            plugins: "image",
            // plugins: [
            //     "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            //     "wordcount visualblocks visualchars code fullscreen",
            // ],
            toolbar1:
                "undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2:
                "print preview media | forecolor backcolor emoticons | codesample help",
            image_advtab: true,
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            file_picker_types: "image",
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement("input");
                input.setAttribute("type", "file");
                input.setAttribute("accept", "image/*");

                input.addEventListener("change", (e) => {
                    const file = e.target.files[0];

                    const reader = new FileReader();
                    reader.addEventListener("load", () => {
                        const id = "blobid" + new Date().getTime();
                        const blobCache =
                            tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(",")[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    });
                    reader.readAsDataURL(file);
                });

                input.click();
            },
            content_css: [],
        });
    }

    if ($("#content_edit").length) {
        tinymce.init({
            selector: "#content_edit",
            height: 400,
            theme: "silver",
            plugins: "image",
            // plugins: [
            //     "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            //     "wordcount visualblocks visualchars code fullscreen",
            // ],
            toolbar1:
                "undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2:
                "print preview media | forecolor backcolor emoticons | codesample help",
            image_advtab: true,
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            file_picker_types: "image",
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement("input");
                input.setAttribute("type", "file");
                input.setAttribute("accept", "image/*");

                input.addEventListener("change", (e) => {
                    const file = e.target.files[0];

                    const reader = new FileReader();
                    reader.addEventListener("load", () => {
                        const id = "blobid" + new Date().getTime();
                        const blobCache =
                            tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(",")[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    });
                    reader.readAsDataURL(file);
                });

                input.click();
            },
            content_css: [],
        });
    }
});
