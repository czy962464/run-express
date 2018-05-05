var UserSQL = { 
	addUser:'INSERT INTO users(username,password) VALUES(?,?)', 
	queryAll:'SELECT * FROM users', 
	getUserIsHave:'SELECT * FROM users WHERE username = ?',
	getUserByName:'SELECT id FROM users WHERE username = ? AND password = ? Limit 1',
	getInfoById: 'SELECT * FROM users WHERE id = ? Limit 1',
	updateInfo: 'UPDATE users SET nickname = ? , signature = ?, home = ?, emotional = ? WHERE id = ?',
	updatePwd: 'UPDATE users SET password = ?  WHERE id = ?'
}; 

module.exports = UserSQL;
