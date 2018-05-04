var db = require('../../utils/database.js')

var RestReaList = db.model("reaList", {
	id : String,
    title : String,
    imgBox : Object,
    style : String,
    author : String,
    comment : String,
    time : String,
    container : String
}, "reaList")

const getReaList = (callback) => {
	RestReaList.find({}).then((result) => {
		callback(result)
	})
}
module.exports = {
	getReaList
}