// tinymce.init({
//   selector: "textarea#mymce",
// });
function initTinyEditors() {
  if (typeof tinymce === 'undefined') {
    console.warn('❌ TinyMCE topilmadi.');
    return;
  }

  tinymce.remove(); // Avvalgi editorlarni tozalash

  tinymce.init({
    selector: 'textarea.tinymce',
    height: 300,
    menubar: false,
    plugins: 'link image code lists table',
    toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist outdent indent | link image table | code',
    branding: false
  });
}

$(function () {
  initTinyEditors();
});
