// if ($('#editor').length) {
//   let quill = new Quill('#editor', { theme: 'snow' });
// }
function initQuillEditorsByPrefix(editorPrefix = 'editor', hiddenPrefix = 'hidden') {
  if (typeof Quill === 'undefined') {
    console.warn('❌ Quill topilmadi.');
    return;
  }

  const langs = ['uz', 'ru', 'en'];

  langs.forEach(function (lang) {
    const editorId = '#' + editorPrefix + '-' + lang;
    const hiddenId = '#' + hiddenPrefix + '-' + lang;

    if ($(editorId).length && $(hiddenId).length) {
      const quill = new Quill(editorId, {
        theme: 'snow',
        modules: {
          toolbar: [
            [{ 'header': [1, 2, false] }],
            ['bold', 'italic', 'underline'],
            ['link', 'blockquote', 'code-block', 'image'],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'align': [] }],
            ['clean']
          ]
        }
      });

      const hidden = $(hiddenId).val();
      if (hidden) {
        quill.root.innerHTML = hidden;
      }

      $('form').on('submit', function () {
        $(hiddenId).val(quill.root.innerHTML);
      });
    }
  });
}

$(function () {
  $('[data-quill-init]').each(function () {
    const editorPrefix = $(this).data('quill-init') || 'editor';
    const hiddenPrefix = $(this).data('quill-hidden') || 'hidden';
    initQuillEditorsByPrefix(editorPrefix, hiddenPrefix);
  });
});
