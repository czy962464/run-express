var express = require('express');
var router = express.Router();
var multipart = require('connect-multiparty');
var multipartMiddleware = multipart();
const RestController = require('../controller/rest.js');
const CircleController = require('../controller/circle.js');
const RegisterController = require('../controller/user.js');
const FriendController = require('../controller/friend.js');

router.get('/rest/list', RestController.getRest);
router.get('/rest/new?:id', RestController.getRestInfo)
router.post('/code', RegisterController.getCode)
router.post('/user/reg', RegisterController.register);
router.post('/user/login', RegisterController.login);
router.post('/user/update', RegisterController.updateInfo);
router.post('/user/user_info', RegisterController.userInfo);
router.post('/user/updatepwd', RegisterController.updatepwd);

router.get('/circle/list', CircleController.getCircle)
router.get('/circle/hot', CircleController.getHot)
router.get('/circle/detail?:id', CircleController.getDetail)
router.post('/circle/add',multipartMiddleware, CircleController.addDetail);

router.get('/friend/list', FriendController.getFriend);
router.get('/friend/nolist', FriendController.getNoFriend);
router.post('/friend/delete', FriendController.deleteFriend);
router.post('/friend/add', FriendController.addFriend);


module.exports = router;