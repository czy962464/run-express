 // const RestModel = require("../model/clientInfo.js");

// const getClientInfo = (req, res) => {
// 	let clientInfo = [];
// 	RestModel.getClientInfo((result) => {
// 		for(let i=0;i<result.length;i++){
// 			clien  tInfo.push(result[i])
// 		}
// 		res.json({
// 			ret: true,
// 			data: {
// 				clientInfo: clientInfo
// 			}
// 		})
// 	})
// }
// const getPersonInfo = (req, res) => {
// 	const id = req.body.id
// 	let personInfo = [];
// 	RestModel.getPersonInfo({id: id}, (result) => {
// 		personInfo.push(result)
// 		res.json({
// 			ret: true,
// 			data: {
// 				personInfo: personInfo
// 			}
// 		})
// 	})
// }
// const getStatusInfo = (req, res) => {
// 	const status = req.body.status
// 	let statusInfo = [];
// 	RestModel.getStatusInfo({status: status}, (result) => {
// 		for(let i=0;i<result.length;i++){
// 			statusInfo.push(result[i])
// 		}
// 		res.json({
// 			ret: true,
// 			data: {
// 				statusInfo: statusInfo
// 			}
// 		})
// 	})
// }
var mysql = require('mysql'); 
var dbConfig = require('../utils/DBConfig');
const RestModel = require("../model/clientInfo");
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
const getClientInfo = (req, res, next) => { 
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		// 获取前台页面传过来的参数 
 		var param = req.query || req.params; 
 		// 建立连接 增加一个用户信息 
 		connection.query(RestModel.queryAll, function(err, result) { 
 			if(result) {
 				data = {
					clientInfo: result
				}
 			}
 			// 以json形式，把操作结果返回给前台页面 
 			responseJSON(res, data); 
 			// 释放连接 
 			connection.release(); 
 		}); 
 	}); 
}
const getPersonInfo = (req, res) => {
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		// 获取前台页面传过来的参数 
 		const id = req.body.id
 		// 建立连接 增加一个用户信息 
 		connection.query(RestModel.queryPersonInfo, [id], function(err, result) { 
 			if(result) {
 				data = {
					personInfo: result
				}
 			}
 			// 以json形式，把操作结果返回给前台页面 
 			responseJSON(res, data); 
 			// 释放连接 
 			connection.release(); 
 		}); 
 	});
}
const getStatusInfo = (req, res) => {
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		// 获取前台页面传过来的参数 
 		const status = req.body.status
 		// 建立连接 增加一个用户信息 
 		connection.query(RestModel.queryStatusInfo, [status], function(err, result) { 
 			if(result) {
 				data = {
					statusInfo: result
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
	getClientInfo,
	getPersonInfo,
	getStatusInfo
}