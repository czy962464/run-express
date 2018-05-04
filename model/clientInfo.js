// var db = require('../utils/database.js')

// var RestVideo = db.model("clientInfo", {
// 	id: String,
// 	name: String,
// 	tel: Number,
// 	sex: String,
// 	money: String
// }, "clientInfo")

// const getClientInfo = (callback) => {
// 	RestVideo.find({}).then((result) => {
// 		callback(result)
// 	})
// }
// const getPersonInfo = (personInfo = {},callback) => {
// 	RestVideo.findOne(personInfo).then((result) => {
// 		callback(result)
// 	})
// }
// const getStatusInfo = (personInfo = {},callback) => {
// 	RestVideo.find(personInfo).then((result) => {
// 		callback(result)
// 	})
// }
// module.exports = {
// 	getClientInfo,
// 	getPersonInfo,
// 	getStatusInfo
// }


var ClientSQL = { 
	queryAll:'SELECT * FROM clientInfo',
	queryPersonInfo: 'SELECT * FROM clientInfo WHERE id = ?',
	queryStatusInfo: 'SELECT * FROM clientInfo WHERE status = ?'
}; 

module.exports = ClientSQL;
