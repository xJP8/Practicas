const mysql = require('mysql');
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'world',
});

connection.connect((err) => {
    if (err){
        throw err;
    }

    console.log('Connected!');
});

connection.query('SELECT * FROM city WHERE ID = 4150', (err, rows) => {
    if (err){
        throw err;
    }

    console.log('Data received from Db:');
    console.log(rows);
});


// connection.query('INSERT INTO city(ID, Name, CountryCode, District, Population) VALUES(4570, "Parla", "ANT", "Madrid Sur", "130000")', (err) => {
//    if (err){
//        throw err;
//    }
//
//    console.log('Data inserted from Db:');
//});

connection.query('UPDATE city SET ID = 4150 WHERE ID = 4570', (err) => {
    if (err){
        throw err;
    }

    console.log('Data inserted from Db:');
});