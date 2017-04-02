var Language = require('./util/language.js');
var language = new Language();
var express = require('express');
var router = express.Router();

router.get('/', function(req, res, next) {
  res.render('index', {
      content: "fragment/session",
      lang: language.getLanguage(req)
    });
});

router.get('/session', function(req, res, next) {
  res.send({success: true, message:"[INTENCITY]-Success"});
});

module.exports = router;
