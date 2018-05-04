const db = require('../utils/database.js');

const Users = db.model('user', { 
	username: String,
	password: String
});


module.exports = Users;