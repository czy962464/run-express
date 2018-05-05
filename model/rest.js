// var db = require('../utils/database.js')

// var RestVideo = db.model("rest", {
// 	id: String,
// 	style: String,
// 	author:String,
// 	comment:String,
// 	time:String,
// 	type: String,
// 	imgUrl:String,
//     title : String,
//     imgBox : Object,
//     container : String,
// 	videoUrl: String
// }, "rest")

// const getVideo = (callback) => {
// 	RestVideo.find({}).then((result) => {
// 		callback(result)
// 	})
// }
// module.exports = {
// 	getVideo
// }

var RestSQL = { 
	queryAll:'SELECT * FROM rest',
	getRestInfo: 'SELECT * FROM rest WHERE id = ?'
}; 

module.exports = RestSQL;