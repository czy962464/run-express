var mysql = require('mysql');
var path = require("path");
var dbConfig = require('../utils/DBConfig');
const CircleModel = require("../model/circle");
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
const getCircle = (req, res, next) => {
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		// 建立连接 增加一个用户信息 
 		connection.query(CircleModel.queryAll, function(err, result) { 
 			if(result) {
 				data = {
					other: result
				}
 			}
 			// 以json形式，把操作结果返回给前台页面 
 			responseJSON(res, data); 
 			// 释放连接 
 			connection.release(); 
 		}); 
 	}); 
}
const getHot = (req, res, next) => {
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) {
 		// 建立连接 增加一个用户信息 
 		connection.query(CircleModel.getHotAll, function(err, result) { 
 			if(result) {
 				data = {
					hot: result
				}
 			}
 			// 以json形式，把操作结果返回给前台页面 
 			responseJSON(res, data); 
 			// 释放连接 
 			connection.release(); 
 		}); 
 	}); 
}
const getDetail = (req, res, next) => {
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		// 获取前台页面传过来的参数 
 		var param = req.query || req.params;
 		// 建立连接 增加一个用户信息 
 		connection.query(CircleModel.getDetailById, [param.id], function(err, result) { 
 			if(result) {
 				data = {
					detail : result
				}
 			}
 			// 以json形式，把操作结果返回给前台页面 
 			responseJSON(res, data); 
 			// 释放连接 
 			connection.release(); 
 		}); 
 	}); 
}
const addDetail = (req, res, next) => {
      
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		// 获取前台页面传过来的参数
 		var param = req.body;
 		// 建立连接 增加一个用户信息 
 		connection.query(CircleModel.addDetailById, [param.img, param.address, param.content, param.sign, param.userid], function(err, result) { 
 			if(result) {
 				data = {
					add : true
				}
 			}else{
 				data = {
					add : false
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
	getCircle,
	getHot,
	getDetail,
	addDetail
}