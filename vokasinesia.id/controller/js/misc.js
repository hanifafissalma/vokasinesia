$('#summernote').summernote({
	toolbar: [
	  ['style', ['style']],
	  ['font', ['bold', 'italic', 'underline', 'clear']],
	  ['color', ['color']],
	  ['para', ['ul', 'ol', 'paragraph']],
	  ['table', ['table']],
	  ['insert', ['link', 'picture', 'video']],
	  ['view', ['fullscreen', 'codeview']],
	],
	tabsize: 2,
	height: 150,
	callbacks: {
            onPaste: function (e) {
                if (document.queryCommandSupported("insertText")) {
                    var text = $(e.currentTarget).html();
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                    setTimeout(function () {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                    e.preventDefault();
                } else {
                    var text = window.clipboardData.getData("text")
                    if (trap) {
                        trap = false;
                    } else {
                        trap = true;
                        setTimeout(function () {
                            document.execCommand('paste', false, text);
                        }, 10);
                        e.preventDefault();
                    }
                }
             
            }
        }
});

$('#summernote-short').summernote({
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview']],
    ],
    tabsize: 2,
    height: 150,
    callbacks: {
        onKeydown: function (e) { 
            var t = e.currentTarget.innerText; 
            if (t.trim().length >= 250) {
                //delete keys, arrow keys, copy, cut, select all
                if (e.keyCode != 8 && !(e.keyCode >=37 && e.keyCode <=40) && e.keyCode != 46 && !(e.keyCode == 88 && e.ctrlKey) && !(e.keyCode == 67 && e.ctrlKey) && !(e.keyCode == 65 && e.ctrlKey))
                e.preventDefault(); 
            } 
        },
        onKeyup: function (e) {
            var t = e.currentTarget.innerText;
            $('#maxContentPost').text(250 - t.trim().length);
        },
        onPaste: function (e) {
            var t = e.currentTarget.innerText;
            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
            e.preventDefault();
            var maxPaste = bufferText.length;
            if(t.length + bufferText.length > 250){
                maxPaste = 250 - t.length;
            }
            if(maxPaste > 0){
                document.execCommand('insertText', false, bufferText.substring(0, maxPaste));
            }
            $('#maxContentPost').text(250 - t.length);
        }
    }
});

$('#summernote-long').summernote({
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview']],
    ],
    tabsize: 2,
    height: 300
});

$('#summernote2').summernote({
	toolbar: [
	  ['style', ['style']],
	  ['font', ['bold', 'italic', 'underline', 'clear']],
	  ['color', ['color']],
	  ['para', ['ul', 'ol', 'paragraph']],
	  ['table', ['table']],
	  ['insert', ['link', 'picture', 'video']],
	  ['view', ['fullscreen', 'codeview']],
	],
	tabsize: 2,
	height: 150,
	callbacks: {
        onPaste: function (e) {
            if (document.queryCommandSupported("insertText")) {
                var text = $(e.currentTarget).html();
                var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                setTimeout(function () {
                    document.execCommand('insertText', false, bufferText);
                }, 10);
                e.preventDefault();
            } else {
                var text = window.clipboardData.getData("text")
                if (trap) {
                    trap = false;
                } else {
                    trap = true;
                    setTimeout(function () {
                        document.execCommand('paste', false, text);
                    }, 10);
                    e.preventDefault();
                }
            }
         
        }
    }
});

$('#summernote3').summernote({
	toolbar: [
	  ['style', ['style']],
	  ['font', ['bold', 'italic', 'underline', 'clear']],
	  ['color', ['color']],
	  ['para', ['ul', 'ol', 'paragraph']],
	  ['table', ['table']],
	  ['insert', ['link', 'picture', 'video']],
	  ['view', ['fullscreen', 'codeview']],
	],
	tabsize: 2,
	height: 150,
	callbacks: {
            onPaste: function (e) {
                if (document.queryCommandSupported("insertText")) {
                    var text = $(e.currentTarget).html();
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                    setTimeout(function () {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                    e.preventDefault();
                } else {
                    var text = window.clipboardData.getData("text")
                    if (trap) {
                        trap = false;
                    } else {
                        trap = true;
                        setTimeout(function () {
                            document.execCommand('paste', false, text);
                        }, 10);
                        e.preventDefault();
                    }
                }
             
            }
        }
});

var input1 = document.querySelector('input[name=tags]')
    tagify1 = new Tagify(input1, {})

// toggle Tagify on/off
document.querySelector('input[type=checkbox]').addEventListener('change', function(){
    document.body.classList[this.checked ? 'add' : 'remove']('disabled');
})