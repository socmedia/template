// var FroalaEditor = require('froala-editor');
// require('froala-editor/css/froala_editor.pkgd.min.css');

// // Load a plugin.
// require('froala-editor/js/plugins/align.min');

// Livewire.hook('component.initialized', function (component) {
//     FroalaEditor.INSTANCES.forEach(el => {
//         el.destroy()
//     })

//     if (component.fingerprint.name === 'user::profile.information') {
//         new FroalaEditor('textarea[name="bio"]', {
//             toolbarButtons: ['fontFamily', '|', 'fontSize', '|', 'paragraphFormat', '|', 'bold', 'italic', 'underline', 'undo',
//                 'redo', 'codeView'
//             ],
//             events: {
//                 'blur': function () {
//                     Livewire.emit('updatedBio', this.el.innerHTML);
//                 }
//             },
//         })
//     }
// })

// document.addEventListener('init-editor', () => {
//     FroalaEditor.INSTANCES.forEach(el => {
//         el.destroy()
//     })

//     new FroalaEditor('textarea[name="bio"]', {
//         toolbarButtons: ['fontFamily', '|', 'fontSize', '|', 'paragraphFormat', '|', 'bold', 'italic', 'underline', 'undo',
//             'redo', 'codeView'
//         ],
//         events: {
//             'blur': function () {
//                 Livewire.emit('updatedBio', this.el.innerHTML);
//             }
//         },
//     })
// })

// Livewire.hook('component.initialized', function (component) {
//     if (component.fingerprint.name === 'user::profile.information') {
//         CKEDITOR.replace('editor');
//     }
// })

// document.addEventListener('init-editor', () => {
//     CKEDITOR.replace('editor');
// })
