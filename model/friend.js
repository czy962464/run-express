var FriendSQL = { 
	queryAll:'SELECT * FROM friend',
	getFriend: 'SELECT * FROM friend WHERE userid = ?',
	deleteFriend: 'DELETE FROM friend WHERE userid = ? AND item = ?',
	addFriend: 'INSERT INTO friend(userid, item)VALUES( ?, ?)'
}; 

module.exports = FriendSQL;