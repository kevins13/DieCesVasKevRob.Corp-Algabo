const dbConnection = require("../../config/dbConnection");

module.exports = app =>{

    const connection = dbConnection();

    app.get('/' , (req,res) => {
        connection.query('SELECT * FROM productos',(err,result) =>{
            console.log(result);
            res.render('news/news',{
                news: result
            });
        });
    });

    app.post('/news', (req,res) => {
        const{nombre,provedor,cantidad} = req.body;
        connection.query('INSERT INTO productos SET?',{
            nombre,
            provedor,
            cantidad               
        }, (err,result) =>{
            res.redirect('/');
        });
    });
}