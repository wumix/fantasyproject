tinymce.init({
    selector: '.wysiwyg',
    theme_advanced_font_sizes: "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 28pt 36pt 48pt 72pt",
    font_size_style_values: "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 28pt 36pt 48pt 72pt",
    height: 500,
    style_formats: [
        {title: 'Open Sans', inline: 'span', styles: {'font-family': 'Open Sans'}},
        {title: 'Arial', inline: 'span', styles: {'font-family': 'arial'}},
        {title: 'Book Antiqua', inline: 'span', styles: {'font-family': 'book antiqua'}},
        {title: 'Comic Sans MS', inline: 'span', styles: {'font-family': 'comic sans ms,sans-serif'}},
        {title: 'Courier New', inline: 'span', styles: {'font-family': 'courier new,courier'}},
        {title: 'Georgia', inline: 'span', styles: {'font-family': 'georgia,palatino'}},
        {title: 'Helvetica', inline: 'span', styles: {'font-family': 'helvetica'}},
        {title: 'Impact', inline: 'span', styles: {'font-family': 'impact,chicago'}},
        {title: 'Symbol', inline: 'span', styles: {'font-family': 'symbol'}},
        {title: 'Tahoma', inline: 'span', styles: {'font-family': 'tahoma'}},
        {title: 'Terminal', inline: 'span', styles: {'font-family': 'terminal,monaco'}},
        {title: 'Times New Roman', inline: 'span', styles: {'font-family': 'times new roman,times'}},
        {title: 'Roboto (gFont)', inline: 'span', styles: {'font-family': 'Roboto, sans-serif'}},
        {title: 'Verdana', inline: 'span', styles: {'font-family': 'Verdana'}}
    ],
    //theme: 'lightgray',
    //skin:"light",
    plugins: [
        'responsivefilemanager advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
    ],
    toolbar1: 'undo redo | insert | styleselect | fontselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link responsivefilemanager',
    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
    image_advtab: true,
    content_css: [
        '//fonts.googleapis.com/css?family=Roboto'
    ],
    external_filemanager_path: "/filemanager/",
    filemanager_title: "File Manager"
}
);