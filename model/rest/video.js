var db = require('../../utils/database.js')

var RestVideo = db.model("video", {
	id: String,
	videoUrl: String,
	style: String,
	author:String,
	comment:String,
	time:String,
	type: String,
	imgUrl:String,
    title : String,
    imgBox : Object,
    container : String
}, "video")

const getVideo = (callback) => {
	RestVideo.find({}).then((result) => {
		callback(result)
	})
}
module.exports = {
	getVideo
}