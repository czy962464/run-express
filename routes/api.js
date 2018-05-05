var express = require('express');
var router = express.Router();
var multipart = require('connect-multiparty');
var multipartMiddleware = multipart();
const RestController = require('../controller/rest.js');
const CircleController = require('../controller/circle.js');
const RegisterController = require('../controller/user.js');
const FriendController = require('../controller/friend.js');
// const RunController = require('../controller/runCircle.js');
/* GET home page. */
// router.get('/circle/list', RunController.getCircle);
router.get('/rest/list', RestController.getRest);
router.get('/rest/new?:id', RestController.getRestInfo)
router.get('/circle/list', CircleController.getCircle)
router.get('/circle/hot', CircleController.getHot)
router.get('/circle/detail?:id', CircleController.getDetail)
router.post('/user/reg', RegisterController.register);
router.post('/user/login', RegisterController.login);
router.post('/user/update', RegisterController.updateInfo);
router.post('/user/user_info', RegisterController.userInfo);
router.post('/user/updatepwd', RegisterController.updatepwd);

router.get('/circle/list', CircleController.getCircle);
router.get('/circle/hot', CircleController.getHot);
router.get('/circle/detail', CircleController.getDetail);
router.post('/circle/add',multipartMiddleware, CircleController.addDetail);

router.get('/friend/list', FriendController.getFriend);
router.post('/friend/delete', FriendController.deleteFriend);

module.exports = router;