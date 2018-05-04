var db = require('../utils/database.js')

var Users = db.model('user', {
	username: String,
	password: String,
	nickname: String,
    signature: String,
    home: String,
    emotional: String,
    walking: String,
    running: String,
    grade: String,
    recently: String,
    cycling: String,
    fitness: String,
    latestCycling: String,
    latestFitness: String
});

const addUser = (username,password,callback) => {
	const user = new Users({
		username: username,
		password: password,
		nickname: '新导航人',
        signature: '该用户很懒，什么都没有留下',
        home: '',
        emotional: '',
        walking: '0',
	    running: '0',
	    grade: '0',
	    recently: '0',
	    cycling: '0',
	    fitness: '0',
	    latestCycling: '0',
	    latestFitness: '0'
	});
	user.save().then(() => {
		callback();
	})
}

const findUser = (userInfo = {},callback) => {
	Users.findOne(userInfo).then((res) => {
		callback(res);
	})
}
const updateUser = (userInfo = {},callback) => {
	Users.update({"username": userInfo.username},{$set:{
		"nickname":userInfo.nickname,
		"signature":userInfo.signature,
		"home":userInfo.home,
		"emotional": userInfo.emotional
	}}).then((res) => {
		callback(res);
	})
}
module.exports = {
	addUser,
	findUser,
	updateUser
}