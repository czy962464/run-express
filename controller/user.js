var mysql = require('mysql'); 
var dbConfig = require('../utils/DBConfig'); 
var userSQL = require('../model/user'); 
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
const register = (req, res, next) => {
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		// 获取前台页面传过来的参数 
 		var param = req.body;
 		// 建立连接 增加一个用户信息 
 		connection.query(userSQL.getUserIsHave, [param.username], function(err, result) {
 			if(result.length !== 0) {
 				data = {
					register: false
				}
				// 以json形式，把操作结果返回给前台页面 
	 			responseJSON(res, data); 
 				// 释放连接 
	 			connection.release();
 			}else{
 				// 释放连接 
	 			connection.release();
	 			// 从连接池获取连接 
			 	pool.getConnection(function(err, connection) { 
			 		// 获取前台页面传过来的参数 
			 		var param = req.body; 
			 		// 建立连接 增加一个用户信息 
			 		connection.query(userSQL.addUser, [param.username, param.password], function(err, result) {
			 			if(result) {
			 				data = {
			 					register: true
							}
			 			}
			 			// 以json形式，把操作结果返回给前台页面 
			 			responseJSON(res, data); 
			 			// 释放连接 
			 			connection.release(); 
			 		}); 
			 	}); 
 			}
 		}); 
 	}); 
}
const login = (req, res, next) => { 
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		// 获取前台页面传过来的参数 
 		var param = req.body; 
 		// 建立连接 增加一个用户信息 
 		connection.query(userSQL.getUserByName, [param.username, param.password], function(err, result) {
 			if(result) {
 				data = {
 					login: true,
					userInfo: result
				}
 			}else{
 				data = {
 					login: false
				}
 			}
 			// 以json形式，把操作结果返回给前台页面 
 			responseJSON(res, data); 
 			// 释放连接 
 			connection.release(); 
 		}); 
 	}); 
}

const userInfo = (req, res, next) => { 
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		// 获取前台页面传过来的参数 
 		var param = req.body; 
 		// 建立连接 增加一个用户信息 
 		connection.query(userSQL.getInfoById, [param.userid], function(err, result) {
 			if(result) {
 				data = {
					userInfo: result
				}
 			}else{
 				data = {
 					userInfo: false
				}
 			}
 			// 以json形式，把操作结果返回给前台页面 
 			responseJSON(res, data); 
 			// 释放连接 
 			connection.release(); 
 		}); 
 	}); 
}
const updateInfo = (req, res, next) => { 
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		// 获取前台页面传过来的参数 
 		var param = req.body; 
 		// 建立连接 增加一个用户信息 
 		connection.query(userSQL.updateInfo, [param.nickname, param.signature, param.home, param.emotional, param.id], function(err, result) {
 			// 释放连接 
 			connection.release();
 			// 从连接池获取连接 
		 	pool.getConnection(function(err, connection) { 
		 		// 获取前台页面传过来的参数 
		 		var param = req.body;
		 		// 建立连接 增加一个用户信息 
		 		connection.query(userSQL.getInfoById, [param.id], function(err, rest) {
		 			if(rest) {
		 				data = {
							userInfo: rest
						}
		 			}else{
		 				data = {
		 					userInfo: false
						}
		 			}
		 			// 以json形式，把操作结果返回给前台页面 
		 			responseJSON(res, data); 
		 			// 释放连接 
		 			connection.release(); 
		 		}); 
		 	}); 
 		}); 
 	}); 
}
const updatepwd = (req, res, next) => { 
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		// 获取前台页面传过来的参数 
 		var param = req.body; 
 		// 建立连接 增加一个用户信息 
 		connection.query(userSQL.getInfoById, [param.userid], function(err, result) {
 			if(result[0].password !== param.oldpwd){
 				data = {
 					isSucc: false
				}
				// 以json形式，把操作结果返回给前台页面 
	 			responseJSON(res, data); 
	 			// 释放连接 
	 			connection.release(); 
 			}else{	
	 			// 释放连接 
	 			connection.release();
	 			// 从连接池获取连接 
			 	pool.getConnection(function(err, connection) { 
			 		// 获取前台页面传过来的参数 
			 		var param = req.body;
			 		// 建立连接 增加一个用户信息 
			 		connection.query(userSQL.updatePwd, [param.newpwd, param.userid], function(err, rest) {
			 			if(rest) {
			 				data = {
								isSucc: true
							}
			 			}else{
			 				data = {
			 					isSucc: false
							}
			 			}
			 			// 以json形式，把操作结果返回给前台页面 
			 			responseJSON(res, data); 
			 			// 释放连接 
			 			connection.release(); 
			 		}); 
 				});
 			}
 		}); 
 	}); 
}
module.exports = {
	register,
	login,
	userInfo,
	updateInfo,
	updatepwd
}