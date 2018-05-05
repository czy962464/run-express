var mysql = require('mysql');
var path = require("path");
var dbConfig = require('../utils/DBConfig');
const FriendModel = require("../model/friend");
const UserModel = require("../model/user");
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
const getFriend = (req, res, next) => {
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		const {userid} = req.query;
 		// 建立连接 增加一个用户信息 
 		connection.query(FriendModel.getFriend, [userid], function(err, result) { 
 			if(result) {
	 			connection.release();
	 			var arr = []
	 			pool.getConnection(function(err, connection) {
	 				for(let i = 0; i < result.length; i++){
		 				connection.query(UserModel.getUserIsHave, [result[i].item], function(err, res) {
				 			arr.push(res[0])
				 		});
		 			}
	 				setTimeout(function(){
			 			data = {
							friend: arr
						}
			 			//以json形式，把操作结果返回给前台页面 
			 			responseJSON(res, data); 
			 			// 释放连接 
			 			connection.release(); 
	 				}, 1000)
	 			})
 			}
 		}); 
 	}); 
}
const deleteFriend = (req, res, next) => {
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		const {userid, username} = req.body;
 		// 建立连接 增加一个用户信息 
 		connection.query(FriendModel.deleteFriend, [userid, username], function(err, result) { 
 			if(result) {
 				data = {
 					delete: true
 				}
 			}
 			//以json形式，把操作结果返回给前台页面 
 			responseJSON(res, data); 
 			//释放连接 
 			connection.release();
 		}); 
 	}); 
}
module.exports = {
	getFriend,
	deleteFriend
}