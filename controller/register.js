const RegisterModel = require("../model/register.js");
const crypto = require('crypto');
const register = (req, res) => {
	const {username, password} = req.body;
    RegisterModel.findUser({username:username}, (userInfo) => {
    	if(userInfo){
    		res.json({
				"ret": true,
				"data": {
					register: false
				}
			});
    	}else{
    		const hash = crypto.createHash('sha256');
		    hash.update(password);
		    RegisterModel.addUser(username, hash.digest('hex'), () => {
				res.json({
					"ret": true,
					"data": {
						register: true
					}
				});
		    })
    	}
    })
}
const login = (req,res) => {
	const {username,password} = req.body;
	const hash = crypto.createHash('sha256');
	hash.update(password);
	RegisterModel.findUser({
		username: username,
		password: hash.digest('hex')
	}, (userInfo) => {
		if(userInfo){
			res.json({
				"ret": true,
				"data": {
					login: true,
					userInfo: userInfo
				}
			});
		}else{
			res.json({
				"ret": true,
				"data": {
					login: false
				}
			});
		}
	})
}
const islogin = (req, res) => { 
	if (req.session.username) {
		res.json({
			ret: true,
			data: {
				username: req.session.username,
				isLogin: true
			}
		})
	}else {
		res.json({
			ret: true,
			data: {
				isLogin: false
			}
		})
	}
}

const logout = (req, res) => {
	req.session = null;
	res.json({
			ret: true,
			data: {
				logout: true
			}
		})
}
const updateInfo = (req, res) => {
	const {userid, nickname, signature, home, emotional} = req.body;
	RegisterModel.findUser({username:userid}, (userInfo) => {
    	if(userInfo){
    		RegisterModel.updateUser({
    			username:userid,
				nickname: nickname,
		        signature: signature,
		        home: home,
		        emotional: emotional
			}, (result) => {
		    	if(result.ok == 1){
		    		RegisterModel.findUser({username:userid}, (userInfo) => {
		    			if(userInfo){
		    				res.json({
								"ret": true,
								"data": {
									userInfo: userInfo
								}
							});
		    			}else{
		    				res.json({
								"ret": true,
								"data": {
									userInfo: false
								}
							});
		    			}
		    		});
		    	}
		    });
    	}else{
    		res.json({
				"ret": true,
				"data": {
					userInfo: false
				}
			});
    	}
    })
}
const userInfo = (req, res) => {
	const {userid} = req.body;
	RegisterModel.findUser({username:userid}, (userInfo) => {
		if(userInfo){
			res.json({
				"ret": true,
				"data": {
					userInfo: userInfo
				}
			});
		}else{
			res.json({
				"ret": true,
				"data": {
					userInfo: false
				}
			});
		}
	})
}
module.exports = {
	register,
	login,
	islogin,
	logout,
	updateInfo,
	userInfo
}