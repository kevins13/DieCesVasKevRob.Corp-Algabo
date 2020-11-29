const app = require("./config/server");

require("./app/routes/news")(app);

//iniciar el servidor
app.listen(app.get('port'), ()=> {
    console.log("servidor en el puerto ", app.get('port'));
});