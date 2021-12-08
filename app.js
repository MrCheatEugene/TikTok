const readline = require('readline');//readline libs
const http = require('http');//webserver lib
const fs = require('fs');// filesystem stuff
const mime = require('mime-types');
var execPhp = require('exec-php');//php
function read(path) {
    const fileContent = fs.readFileSync(path);
    const array = JSON.parse(fileContent);
    return array;
}function read_normal(path) {
    const fileContent = fs.readFileSync(path);
    return fileContent;
}
let port="8908";
let html='Refresh the page or go to <a href="/">home page</a>';

const server = http.createServer((req, res) => {  try{

let ecode=200;
let uurl;
let mimetype= mime.lookup((req.url));
uurl = req.url;
if(mimetype == false){
	mimetype="text/html";
}console.log(req.url);
if(req.socket.remoteAddress=="::ffff:172.17.0.2"){
  res.setHeader('Powered-by','NodeServer by MrCheat,Inc.');
  res.writeHead(ecode, { 'Content-Type': mimetype });
    res.end(read_normal(uurl)); }}catch(e){console.log(e);}
});
server.listen(port);
console.log("Done! Listening on port "+port+"");
// set data


