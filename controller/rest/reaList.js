const RestModel = require("../../model/rest/reaList.js");

const getReaList = (req, res) => {
	let reaList = [];
	RestModel.getReaList((result) => {
		for(let i=0;i<result.length;i++){
			reaList.push(result[i])
		}
		res.json({
			ret: true,
			data: {
				reaList: reaList
			}
		})
	})
}
module.exports = {
	getReaList
}