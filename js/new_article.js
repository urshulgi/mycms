// Variables
var name, link, inputname, newlink;

// ~~~~ startTiny: ~~~~
// Inicia el editor TinyMCE con los parámetros adecuados.
// Creado en base a la documentación de TinyMCE.
// No retorna valores.
function startTiny() {
  tinymce.init({
    selector: '#article',
    language : 'es',
    menubar: false,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor textcolor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table contextmenu paste code help wordcount',
      'placeholder'
    ],
    toolbar: 'insert | undo redo |  formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    mobile: {
      theme: 'mobile',
      plugins: [ 'autosave', 'lists', 'autolink' ],
      toolbar: [ 'undo', 'bold', 'italic', 'styleselect' ]
    },
    setup: function (editor) {
    editor.on('init', function (e) {
      doResize();
    });
    }
  });
} // ~~~~ end startTiny ~~~~

// ~~~~ doResize: ~~~~
// Cambia el tamaño del editor TinyMCE automáticamente
function doResize() {
    var hti = window.innerHeight;
    var htn = hti / 100;
    var ht = htn * 40;
    var TOOLBAR = document.getElementsByClassName('mce-toolbar-grp');
    var STATUSBAR = document.getElementsByClassName('mce-statusbar');
    var EDITAREA = document.getElementsByClassName('mce-edit-area');
    var ARTICLE = document.getElementById('article_ifr');
    if (TOOLBAR){
        ht += -TOOLBAR[0].offsetHeight;
        ht += -TOOLBAR[0].offsetTop;
    }
    if (STATUSBAR){
        ht += -STATUSBAR[0].offsetHeight;;
    }
    ht += -3;
    if (EDITAREA){
        EDITAREA[0].style.height = ht + "px";
    }
    if (ARTICLE) {
        ARTICLE.style.height = ht + "px";
    }
} // ~~~~ end doResize ~~~~

// ~~~~ createLink: ~~~~
// Elimina los espacios del nombre del artículo, reemplazando por guiones e
// inserta en el input link-article.
function createLink(name, link) {
  var NAME = document.getElementById('name-article');
  var LINK = document.getElementById('link-article');
  inputname = NAME.value;
  console.log(inputname);
  newlink = inputname.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
  newlink = newlink.replace(/\s+/g, '-').toLowerCase();
  LINK.value = newlink;
} // ~~~~ end createLink ~~~~

// ~~~~ startPage: ~~~~
// Inicia el editor TinyMCE y crea el listener para generar el link del
// artículo.
function startPage() {
  startTiny();
  document.getElementById('name-article').addEventListener("change", createLink);
} // ~~~~ end startPage ~~~~

window.onload=startPage;
window.onresize=doResize;
