var ajax = {
    httpRequestVersions: [function () {
        return new XMLHttpRequest();
    }, function () {
        return new ActiveXObject('Msxml2.XMLHTTP');
    }, function () {
        return new ActiveXObject('Microsoft.XMLHTTP');
    }, function () {
        return new ActiveXObject('Msxml2.XMLHTTP.4.0');
    }, function () {
        throw "Browser does not support XMLHttpRequest";
        return false;
    }],
    getXMLHttpRequest: function () {
        for (var i = 0, len = this.httpRequestVersions.length; i < len; i++) {
            try {
                return this.httpRequestVersions[i]();
            } catch (e) {}
        }
    },
    send: function (url, parameters, callback) {
        var xmlhttp = this.getXMLHttpRequest();
        if (xmlhttp) {
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4) {
                    if (xmlhttp.status == 200) {
                        callback(xmlhttp.responseText);
                    } else {
                        callback("There was a problem while using XMLHTTP:\n" + xmlhttp.statusText);
                    }
                }
            }

            parameters = parameters || "";
            try {
                xmlhttp.open("POST", url, true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.setRequestHeader("Content-length", parameters.length);
                xmlhttp.send(parameters);
            } catch (e) {
                callback("There was a problem while using XMLHTTP:\n" + e);
            }
        }
    }

};