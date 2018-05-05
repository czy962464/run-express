// const RestModel = require("../model/rest.js");

// const getVideo = (req, res) => {
// 	let video = [];
// 	let reaList = [];
// 	RestModel.getVideo((result) => {
// 		for(let i=0;i<result.length;i++){
// 			if(result[i].type === "video"){
// 				video.push(result[i])
// 			}
// 			if(result[i].type === "reaList"){
// 				reaList.push(result[i])
// 			}
// 		}
// 		res.json({
// 			ret: true,
// 			data: {
// 				video: video,
// 				reaList: reaList
// 			}
// 		})
// 	})
// }
// module.exports = {
// 	getVideo
// }

var mysql = require('mysql'); 
var dbConfig = require('../utils/DBConfig'); 
var restSQL = require('../model/rest'); 
// 使用DBConfig.js的配置信息创建一个MySQL连接池 
var pool = mysql.createPool( dbConfig.mysql );
// 响应一个JSON数据 
var responseJSON = function (res, result) { 
	if(typeof result === 'undefined') { 
		res.json({
			ret: false
		}) 
	} else { 
		res.json({
			ret: true,
			data: result
		})  
	}
};


const getRest = (req, res, next) => { 
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) {
 		// 建立连接 增加一个用户信息 
 		connection.query(restSQL.queryAll, function(err, result) {
 			let video = [];
			let reaList = [];
 			for(let i=0;i<result.length;i++){
				if(result[i].type === "video"){
					video.push(result[i])
				}
				if(result[i].type === "reaList"){
					reaList.push(result[i])
				}
			}
 			if(result) {
 				data = {
					video: video,
					reaList: reaList
				}
 			}else{
 				data = {
 					rest: false
				}
 			}
 			// 以json形式，把操作结果返回给前台页面 
 			responseJSON(res, data); 
 			// 释放连接 
 			connection.release(); 
 		}); 
 	}); 
}
const getRestInfo = (req, res, next) => { 
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) {
		// 获取前台页面传过来的参数 
		var param = req.query;
 		// 建立连接 增加一个用户信息 
 		connection.query(restSQL.getRestInfo, [param.id], function(err, result) {
 			if(result) {
 				data = {
					reaList: result
				}
 			}else{
 				data = {
 					reaList: false
				}
 			}
 			// 以json形式，把操作结果返回给前台页面 
 			responseJSON(res, data); 
 			// 释放连接 
 			connection.release();  
 		}); 
 	}); 
}

module.exports = {
	getRest,
	getRestInfo
}