
    function getValue()
    {
        return document.getElementById("username").value; // gets the entered text for username               
    }

    function makeAjaxCall() {
        ajax.send("dbcheck.php","username="+getValue(),cb); // make that ajax call and stuff
    }

    function cb(result){ // callback
        console.log(result); 
        var results = JSON.parse(result);
        document.getElementById("content").innerHTML = results.username;
        document.getElementById("content").innerHTML += results.msg;
    }
