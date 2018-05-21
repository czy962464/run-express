const RunModel = require("../model/runCircle.js");

const getCircle = (req, res) => {
	let circle = [];
	RunModel.getCircle((result) => {
		for(let i=0;i<result.length;i++){
			circle.push(result[i])
		}
		res.json({
			ret: true,
			data: {
				circle: circle
			}
		})
	})
}
module.exports = {
	getCircle
}