var express = require("express");
var formidable = require('formidable'); 
var http = require('http');
var fs = require('fs');

var app = express();
app.use(express.static(__dirname + "/public"));
var msg="Valid data";

const { body, validationResult } = require('express-validator');
http.createServer(function (req, res) {
   if (req.url == '/lab11') {
      var form = new formidable.IncomingForm(); 
      form.parse(req, function (err, fields, files) {
        if(fields.client==""){
          msg="ERROR: Client it's null";
          res.write(msg);
          return res.end(); 
        }
        if(isNaN(fields.total)){
          msg="ERROR: Total price isn t a number";
          res.write(msg);
          return res.end(); 
        }
        const isValidDate = function(date) {
          return (new Date(date) !== "Invalid Date") && !isNaN(new Date(date));
        }
        if(!isValidDate(fields.date)){
          msg="ERROR: Wrong date format.";
          res.write(msg);
          return res.end(); 
        }

        res.writeHead(200, {'Content-Type': 'text/html'});
        res.write('<table id="my_table" cellpadding="5" cellspacing="0" style="border:solid 1px black">');
        res.write('<tr><td>'+fields.client+'</td></tr>');
        res.write('<tr><td>'+fields.date+'</td></tr>');
        res.write('<tr><td>'+fields.total+'</td></tr>');
        for( var i=0;i<3;i++){
          if(isNaN(fields.pret[i])){
            msg="ERROR: Total price isn t a number";
            res.write(msg);
            return res.end(); 
          }

          res.write('<tr><td>'+fields.name[i]+'</td><td>');
          res.write("<img src='" + fields.img[i]+ "'/></td>");
          res.write('<td>'+fields.pret[i]+'</td></tr>');
        }
        
        res.end(); 
      }); 
   }
  }).listen(80); 

