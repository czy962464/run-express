const Users = require('../model/user.js');

const register = (req, res) => {
	const {username, password} = req.body;
	const user = new Users({ 
		username: username,
		password: password
	});
	user.save((err) => {
		console.log(err);
	})
	res.json({
		"ret": true
	})
}
module.exports = {
	register
}