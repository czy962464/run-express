var db = require('../utils/database.js')

var RunCircle = db.model("circle", {
	id: String,
	headImg: String,
	name: String,
	desc: String,
	sign: String,
	conImg: String,
	content: String,
	address: String,
	time: String
}, "circle")

const getCircle = (callback) => {
	RunCircle.find({}).then((result) => {
		callback(result)
	})
}
module.exports = {
	getCircle
}