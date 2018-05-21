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
function diff(arr1, arr2) {  
  var newArr = [];  
  var arr3 = [];  
  for (var i=0;i<arr1.length;i++) {  
    if(arr2.indexOf(arr1[i]) === -1)     
      arr3.push(arr1[i]);  
  }  
   var arr4 = [];  
  for (var j=0;j<arr2.length;j++) {  
    if(arr1.indexOf(arr2[j]) === -1)  
      arr4.push(arr2[j]);  
  }  
   newArr = arr3.concat(arr4);  
  return newArr;  
}
const getNoFriend = (req, res, next) => {
	var brr = []
	var crr = []
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		const {userid} = req.query;
 		// 建立连接 增加一个用户信息 
 		connection.query(FriendModel.getFriend, [userid], function(err, result) {
 			for(let i = 0; i < result.length; i++){
				brr.push(result[i].item)
 			}
 			if(result) {
	 			connection.release();
	 			var arr = []
	 			pool.getConnection(function(err, connection) {
	 				connection.query(UserModel.queryName, function(err, resu) {
			 			for(let i = 0; i < resu.length; i++){
			 				arr.push(resu[i].username)
			 			} 
			 			// 释放连接 
			 			connection.release();
		 				crr = diff(arr, brr);
		 				var drr = []
		 				pool.getConnection(function(err, connection) {
			 				for(let j = 0; j < crr.length; j++){
				 				connection.query(UserModel.getUserIsHave, crr[j], function(err, resul) {
						 			drr.push(resul[0])
						 		});
		 					}
			 				setTimeout(function(){
					 			data = {
									nofriend: drr
								}
					 			//以json形式，把操作结果返回给前台页面 
					 			responseJSON(res, data); 
					 			// 释放连接 
					 			connection.release(); 
			 				}, 1000)
			 			})
			 		});
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
const addFriend = (req, res, next) => {
	// 从连接池获取连接 
 	pool.getConnection(function(err, connection) { 
 		const {userid, username} = req.body;
 		// 建立连接 增加一个用户信息 
 		connection.query(FriendModel.addFriend, [userid, username], function(err, result) { 
 			if(result) {
 				data = {
 					add: true
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
	deleteFriend,
	getNoFriend,
	addFriend
}