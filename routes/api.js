var express = require('express');
var router = express.Router();
var multipart = require('connect-multiparty');
var multipartMiddleware = multipart();
const CircleController = require('../controller/circle');
// const RestVideoController = require('../controller/rest/video.js');
// const RegisterController = require('../controller/register.js');
/* GET home page. */
// router.get('/rest.json', RestVideoController.getVideo);
// router.post('/user/reg', RegisterController.register);
// router.post('/user/login', RegisterController.login);
// router.post('/user/update', RegisterController.updateInfo);
// router.post('/user/user_info', RegisterController.userInfo);
router.get('/circle/list', CircleController.getCircle);
router.get('/circle/hot', CircleController.getHot);
router.get('/circle/detail', CircleController.getDetail);
router.post('/circle/add',multipartMiddleware, CircleController.addDetail);


module.exports = router;