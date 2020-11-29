const mysql = require("mysql");

module.exports = () => {
    return mysql.createConnection({
        host:"localhost",
        database:"trabajoFinal",
        user:"root",
        password:""
    });
}