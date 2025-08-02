import $ from "jquery";

$(document).ready(function () {
    tinymce.init({
        selector: '.editor_tinyMce',
        plugins: 'link lists table code',
        toolbar: 'undo redo | bold italic | bullist numlist | link code',
        license_key: 'gpl',
        language: 'pl',
        language_url: '/js/tinymce/langs/pl.js',
        skin: 'oxide-dark',
        content_css: 'dark',
    });
});
