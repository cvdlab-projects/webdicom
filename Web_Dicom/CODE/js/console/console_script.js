// Console SCRIPT version 2.5
//
// 

   
    
    //Hint code
    CodeMirror.commands.autocomplete = function(cm) {
        CodeMirror.showHint(cm, CodeMirror.javascriptHint);
    };
    

    /*Testing button*/
    function test() {
        if (editor.getOption("mode") === "coffeescript")
            alert("coffee");
        if (editor.getOption("mode") === "javascript")
            alert("java");
    }

    function coffeeMode() {
        jsb.style.display = "inline";
        csb.style.display = "none";
        editor.setOption("mode", "coffeescript");
        CodeMirror.autoLoadMode(editor, "coffeescript");
    }

    function javascriptMode() {
        csb.style.display = "inline";
        jsb.style.display = "none";
        editor.setOption("mode", "javascript");
        CodeMirror.autoLoadMode(editor, "javascript");
    }
    
    /*Execute the code*/
    function exec() {

        var js = editor.getValue();//http://codemirror.net/doc/manual.html#getValue
        var s = document.createElement('script');
        s.textContent = js;
        document.body.appendChild(s);
    }

    function toggleConsole() {
        var el = document.getElementById("consl");
        var body = document.getElementById("webindex")

        if(body !== null && document.body.style.overflow == 'hidden'){
        document.body.style.overflow = 'auto';}

        if (el.style.display !== 'none') {
            if(body !==null){
            document.getElementById("webindex").style.overflow = 'hidden';
        }
            el.style.display = 'none';
            editor.refresh();
        }
        else {
            el.style.display = 'inline';
            el.style.float = 'left'
            editor.refresh();
        }

    }
    
    /*keys for opening the console
     * for combo or other key:
     * ctrl -> ctrlKey
     * alt -> altrKey
     * c -> 67
     * shift -> 16*/
    document.onkeyup = function(e) {
        if (e.keyCode === 220) {
            toggleConsole();
        }
    };
    
    
    /*Access projects page*/
    
    function webdicom() {
        window.location.href = "Web-dicom.html";
    };
    
    function webindex() {
         window.location.href = "Web-index.html";
    };
    
    function weblar() {
        window.location.href = "Web-lar.html";
    };
