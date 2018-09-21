// Clone object
function cloneObject(obj) {
  const cloned = {};

  if(obj === null || typeof obj != "object") {
    return obj;
  }

  for(let key in obj) {
    if(obj.hasOwnProperty(key)) {
      cloned[key] = obj[key];
    }
  }

  return cloned;
}

// Class for work with AJAX
const Loader = (function() {
  class Loader {

    constructor(URL) {
      this.setURL(URL);
    }

    setURL(URL) {
      this.URL = URL;
    }

    // Check if url is valid
    isURL(URL) {
      const regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
      return regexp.test(URL);
    }

    // PArce URL. Get query parameters as object 
    parseURL(path) {
      const params = {};
      let parser = document.createElement('a');
      parser.href = path;

      const pathname = parser.pathname.slice(1).split("/");
      const search = parser.search.slice(1).split("/")[0];

      if (search) {
        const paramsArr =  search.split("&").map(part => {
          return part.split("=");
        });

        let paramsObj = {};
        for (let i = 0; i < paramsArr.length; i++) {
          for (let j = 0; j < paramsArr[i].length; j++) {
            params[paramsArr[i][j]] = paramsArr[i][j + 1];
            j += 2;
          }
        }
      }

      return params;
    }

    // Join path if it was passed as array
    serialPath(path) {
      if (!path) {
        return "";
      }

      return (Array.isArray(path)) ? path.join("/") : path;
    }

    // Encode URL parameters
    serialParams(params) {
      let result = "";

      if (!params) {
        return "";
      }

      if (typeof params != "object") {
        return params;
      }

      for (let key in params) {
        if (params.hasOwnProperty(key)) {
          if (result.length) {
            result += "&";
          }
          result += key + "=" + encodeURIComponent(params[key]);
        }
      }

      return result;
    }

    // Get full url for query
    getFullURL(method = "GET", path, params) {
      let fullURL = this.URL + "/" + this.serialPath(path);

      return (params) ? fullURL + "?" + this.serialParams(params) : fullURL;
    }

    // Set default error handler
    defaultErrorHandler(xhr) {
      console.log(xhr.status + ': ' + xhr.statusText);
    }

    // Check response query status
    checkStatus(response) {
      if (response.status >= 200 && response.status < 300) {
        return response
      } else {
        let error = new Error(response.statusText)
        error.response = response
        throw error
      }
    }

    // Create option object for query
    createOptionsObj({method = "GET", path, params, headers = {'Content-Type': 'application/x-www-form-urlencoded'}, data = null}) {
      if(this.isURL(path)) {
        const parseURL = this.parseURLHash(path);
        path = parseURL.path;
        params = parseURL.params;
      }     

      const optionsObj = {
        URL: this.getFullURL(method, path, params),
        options: {
          method,
          headers
        }
      }

      if(data) {
        const params = [];
        var formData = new FormData();
        
        for(let key in data){
          if(data.hasOwnProperty(key)) {
            params.push(`${key}=${encodeURIComponent(data[key])}`);
          }
        }

        optionsObj.options.body = params.join("&");
      }

      return optionsObj;
    }

    // Common query methos
    load(settings) {
      return fetch(settings.URL, settings.options)
        .then(this.checkStatus)
        .then(response => response.text())
        .catch(this.defaultErrorHandler)
    }

    // Query with get method
    get(settings) {
      let newSettings = cloneObject(settings);
      
      return this.load(this.createOptionsObj(newSettings));
    }

    // Query with post method
    post(settings) {
      let newSettings = cloneObject(settings);
      newSettings.method = "POST";

      return this.load(this.createOptionsObj(newSettings));
    }

  }

  return Loader;
})();