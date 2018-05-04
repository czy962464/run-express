const RestModel = require("../../model/rest/video.js");

const getVideo = (req, res) => {
	let video = [];
	let reaList = [];
	RestModel.getVideo((result) => {
		for(let i=0;i<result.length;i++){
			if(result[i].type === "video"){
				video.push(result[i])
			}
			if(result[i].type === "reaList"){
				reaList.push(result[i])
			}
		}
		res.json({
			ret: true,
			data: {
				video: video,
				reaList: reaList
			}
		})
	})
}
module.exports = {
	getVideo
}