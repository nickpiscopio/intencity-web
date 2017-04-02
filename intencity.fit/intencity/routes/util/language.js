'use strict';

var path = require('path');
var fs = require('fs');

module.exports = class Language {
  /**
   * Gets the language file we want so we can localize the webpage.
   *
   * @param req   The request to get the language from the URL.
   *
   * @returns {string} The language we can use for localization.
   */
  getLanguage(req) {
    var language = req.query.lang;

    var file = "../../public/javascript/constant/localization/" + language + ".js";
    var filePath = path.join(__dirname, file);

    // If we can't find a language file, then we default to english.
    if (!fs.existsSync(filePath)) {
      language = "en-US";
    }

    return language;
  }
};