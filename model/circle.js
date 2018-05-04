var CircleSQL = { 
	queryAll:'SELECT * FROM circle',
	getHotAll: 'SELECT * FROM hot',
	getDetailById: 'SELECT * FROM hot WHERE id = ?',
	addDetailById: 'INSERT INTO circle (conImg, address, content, sign, userid) VALUES (?, ?, ?, ?, ?)'
}; 

module.exports = CircleSQL;